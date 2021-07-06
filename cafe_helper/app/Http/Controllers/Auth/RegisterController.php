<?php


namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Models\Entities\UserEntity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function process(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:2|max:255',
            'email' => 'required|email:rfc,dns|unique:staff',
            'password' => 'min:5|required_with:repeatPassword|same:repeatPassword',
            'repeatPassword' => ''
        ]);

        $staff = new UserEntity();
        $staff->name = $validated['name'];
        $staff->login = $validated['name'];
        $staff->contact = $validated['email'];
        $staff->email = $validated['email'];
        $staff->password = Hash::make($validated['password']);
        $staff->access = 'waiter';
        $staff->save();

        return redirect('/login');
    }




}
