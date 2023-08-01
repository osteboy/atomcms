<?php

namespace App\Http\Controllers\Housekeeping;

use App\Http\Controllers\Controller;
use App\Models\ChatlogPrivate;
use App\Models\ChatlogRoom;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('housekeeping.dashboard', [
            'recentUsers' => User::select(['id', 'username', 'look', 'online'])->orderByDesc('id')->take(20)->get(),
            'chatlogsRoom' => ChatlogRoom::orderByDesc('timestamp')->take(10)->with('user:id,username,look,online', 'room:id,owner_id,name')->get(),
            'chatlogsPrivate' => ChatlogPrivate::orderByDesc('timestamp')->take(10)->with('sender:id,username,look,online')->get(),
        ]);
    }
}
