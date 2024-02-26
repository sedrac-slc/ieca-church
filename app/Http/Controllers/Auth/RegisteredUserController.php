<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Register',User::getSelects());
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            User::FULLNAME => 'required|string|max:255',
            User::FULLNAME_FATHER => 'required|string|max:255',
            User::FULLNAME_MOTHER => 'required|string|max:255',
            User::EMAIL => 'required|string|lowercase|email|max:255|unique:'.User::class,
            User::NUMBER_BI => 'required|string|max:255|unique:'.User::class,
            User::PASSWORD => ['required', 'confirmed', Rules\Password::defaults()],
            User::MARITAL_STATUS => 'required|string|max:255',
            User::GENDER => 'required|string|max:255',
            User::BIRTHDAY => 'required|date' ,
        ]);

        $data = $request->all();

        $data[User::PASSWORD] = Hash::make($request->password);

        $user = User::create($data);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
