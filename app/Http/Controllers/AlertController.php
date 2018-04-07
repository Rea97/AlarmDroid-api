<?php

namespace App\Http\Controllers;

use App\Alert;
use Illuminate\Http\Request;
use App\Http\Resources\Alert as AlertResource;

class AlertController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $limit = $request->query('limit', 5);
        $alerts = Alert::where('robot_id', $request->user()->robot->id)->orderBy('created_at', 'desc')->take($limit)->get();

        if ($request->filled('search')) {
            $alerts = Alert::where('type', 'LIKE', "%{$search}%")->orWhere('message', 'LIKE', "%{$search}%")->take($limit)->get();
        }

        return AlertResource::collection($alerts);
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
        $alert->save();

        return new AlertResource($alert);
    }
}
