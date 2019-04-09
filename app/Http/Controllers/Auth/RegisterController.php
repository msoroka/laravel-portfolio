<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\RegisterUserRequest;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * RegisterController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * @param  RegisterUserRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(RegisterUserRequest $request)
    : RedirectResponse {
        $data = $request->validated();

        if ($user = User::create($data)) {
            flash(__('auth.registered'))->success();

            Auth::login($user);

            return redirect()->route('home');
        }

        flash(__('auth.registered-error'))->error();

        return redirect()->back()->withErrors()->withInput();
    }
}
