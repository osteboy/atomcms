<?php

namespace App\Http\Controllers\Housekeeping;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('housekeeping.users.index', [
            'users' => User::select(['id', 'mail', 'username', 'motto', 'look', 'online', 'rank', 'account_created', 'last_login'])->latest('account_created')->with('permission')->paginate(10),
        ]);
    }

    public function destroy(User $user)
    {
        if ($user->rank >= (int)setting('min_staff_rank') && !Auth::user()->god_mode) {
            return response()->json([
                'success' => false,
                'message' => __('You cannot delete other staff accounts')
            ], 403);
        }

        $user->delete();

        return response()->json([
            'success' => true,
            'message' => __('The user has been deleted!')
        ]);
    }

    public function ban(User $user)
    {
        if ($user->rank >= (int)setting('min_staff_rank') && !Auth::user()->god_mode) {
            return response()->json([
                'success' => false,
                'message' => __('You cannot delete other staff accounts')
            ], 403);
        }

        // TODO: Send ban rcon and return success
    }
}
