<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RobotStatusController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->user()->robot->status;

        return response()->json([
            'data' => [
                'status' => $status,
            ]
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'status' => 'required|string|in:detenido,adelante,atras,derecha,izquierda',
        ]);

        $robot = $request->user()->robot;
        $robot->status = $data['status'];
        $robot->save();

        return response()->json([
            'data' => [
                'status' => $robot->status,
            ]
        ]);
    }
}
