<?php


namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Models\Entities\StaffEntity;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Auth\AuthManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LogoutController extends Controller
{
    private const LOGIN_ERROR = 'Email or password is invalid';

    private ?User $user = null;

    public function process()
    {

        Auth::logout();

        return redirect('/login');
    }




}
