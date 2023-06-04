<?php

namespace App\Http\Controllers\Housekeeping;

use App\Http\Controllers\Controller;
use App\Models\Ban;
use App\Models\User;
use App\Services\RconService;
use Carbon\Carbon;
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

    public function ban(User $user, RconService $rconService)
    {
        if ($user->ban) {
            return response()->json([
                'success' => false,
                'message' => __('The user is already banned')
            ], 403);
        }

        if ($user->rank >= (int)setting('min_staff_rank') && !Auth::user()->god_mode) {
            return response()->json([
                'success' => false,
                'message' => __('You cannot ban other staff accounts')
            ], 403);
        }

        if ($rconService->isConnected && $user->online !== '0') {
            $rconService->alertUser($user, 'You have been banned');
            $rconService->disconnectUser($user);
        }

        $user->ban()->create([
            'ip' => $user->ip_current,
            'user_staff_id' => Auth::id(),
            'timestamp' => Carbon::now()->timestamp,
            'ban_expire' => Carbon::now()->addYears(10)->timestamp,
            'ban_reason' => 'Banned through housekeeping',
            'type' => 'account',
        ]);

        return response()->json([
            'success' => true,
            'message' => __('The user received a 10 year ban!')
        ]);
    }
}
