<?php

namespace App\Http\Controllers\Housekeeping;

use App\Http\Controllers\Controller;
use App\Models\CatalogItem;
use App\Models\ChatlogRoom;
use App\Models\User;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('housekeeping.dashboard', [
            'registeredUsers' => User::count(),
            'vipUsers' => User::where('rank', '>', 1)->where('rank', '<', setting('min_staff_rank'))->count(),
            'furnitureInCatalog' => CatalogItem::count(),
            'users' => User::select(['id', 'username', 'look', 'motto', 'online', 'account_created', 'last_login'])->latest('id')->take(30)->paginate(5),
            'chats' => ChatlogRoom::latest('timestamp')->with(['user:id,username,look', 'room'])->take(30)->paginate(5),
        ]);
    }
}
