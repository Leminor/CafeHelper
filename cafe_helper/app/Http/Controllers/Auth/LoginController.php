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

class LoginController extends Controller
{
    private const LOGIN_ERROR = 'Email or password is invalid';

    private ?User $user = null;

    public function process(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|exists:staff',
            'password' => function ($attribute, $value, $fail) use ($request) {
            /** @var User $user */
            $this->user = User::where('email', $request->get('email'))->first();
            if(!$this->user) {
                $fail(self::LOGIN_ERROR);
            }
            $isValidPassword = Hash::check($request->get('password'), $this->user->password);
            if(!$isValidPassword) {
                $fail(self::LOGIN_ERROR);
            }
            },
        ]);

        Auth::login($this->user);

        return redirect('/');
    }




}
