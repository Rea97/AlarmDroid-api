<?php

namespace App\Http\Controllers;

use App\Alert;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Resources\Alert as AlertResource;
use Pusher\PushNotifications\PushNotifications;

class FixtureAlertController extends Controller
{
    private $http;

    public function __construct()
    {
        $this->pushNotifications = new PushNotifications([
            'instanceId' => config('broadcasting.connections.pusher.push_notifications.instance_id'),
            'secretKey' => config('broadcasting.connections.pusher.push_notifications.secret_key'),
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'type' => 'nullable|integer|min:1|max:3'
        ]);

        $alert = null;
        $alertType = (int) $request->get('type');

        switch ($alertType) {
            case 1:
                $alert = Alert::createFireAlert($request->user()->robot);
                break;
            case 2:
                $alert = Alert::createGasAlert($request->user()->robot);
                break;
            case 3:
                $alert = Alert::createTemperatureAlert($request->user()->robot);
                break;
            default:
                return response()->json(['Alert type does not exist.'], 404);
                break;
        }

        if ($alert === null) {
            return response()->json(['Unexpected error'], 500);
        }

        $this->pushNotifications->publish(
            ['user-alerts-' . $request->user()->id],
            [
                "fcm" => [
                    "notification" => [
                        "title" => "Nueva alerta!",
                        "body" => "Tu robot ha generado una nueva alerta de tipo '{$alert->type}'",
                    ]
                ],
            ]
        );

        return new AlertResource($alert);
    }
}
