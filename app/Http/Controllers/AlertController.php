<?php

namespace App\Http\Controllers;

use App\Alert;
use Illuminate\Http\Request;
use App\Http\Resources\Alert as AlertResource;
use Pusher\PushNotifications\PushNotifications;

class AlertController extends Controller
{
    private $pushNotifications;

    public function __construct()
    {
        $this->pushNotifications = new PushNotifications([
            'instanceId' => config('broadcasting.connections.pusher.push_notifications.instance_id'),
            'secretKey' => config('broadcasting.connections.pusher.push_notifications.secret_key'),
        ]);
    }

    public function index(Request $request)
    {
        $search = $request->query('search');
        $limit = $request->query('limit', null);
        $alerts = Alert::where('robot_id', $request->user()->robot->id)->orderBy('created_at', 'desc');

        if ($request->filled('search')) {
            $alerts = $alerts->where('type', 'LIKE', "%{$search}%")->orWhere('message', 'LIKE', "%{$search}%");
        }

        if ($limit !== null) {
            $alerts = $alerts->take($limit);
        }

        return AlertResource::collection($alerts->get());
    }

    public function show(Alert $alert)
    {
        return new AlertResource($alert);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'robot_id' => 'required|integer',
            'type' => 'required|string|max:100',
            'message' => 'required|string',
        ]);

        $alert = new Alert($data);
        $saved = $alert->save();

        if ($saved) {
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
        }

        return new AlertResource($alert);
    }
}
