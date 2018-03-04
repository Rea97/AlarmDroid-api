<?php

namespace App\Http\Controllers;

use App\Robot;
use Illuminate\Http\Request;
use App\Http\Resources\Robot as RobotResource;

class RobotController extends Controller
{
    public function show(Robot $robot)
    {
        return new RobotResource($robot);
    }
}
