<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
class ActivityLogController extends Controller
{
    public function index()
    {
        $activities = Activity::latest()->get();

        return view('panel.bitacora', compact('activities'));
    }
}
