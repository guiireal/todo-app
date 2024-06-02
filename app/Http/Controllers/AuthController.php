<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Mail\SendMagicLoginMail;
use App\Models\EmailToken;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Inertia\Response;

class AuthController extends Controller
{
    public function index(): Response
    {
        return inertia('Login', [
            'message' => session('message')
        ]);
    }

    public function store(LoginRequest $request)
    {
        $emailToken = EmailToken::generate($request->email);

        Mail::to($request->email)
            ->send(
                mailable: new SendMagicLoginMail(emailToken: $emailToken)
            );

        return redirect()
            ->route('login.index')
            ->with('message', 'E-mail enviado com sucesso! Verifique sua caixa de entrada.');
    }

    public function magic(EmailToken $emailToken)
    {
        User::loginWithEmailToken($emailToken);

        return redirect()->route('app.index');
    }
}
