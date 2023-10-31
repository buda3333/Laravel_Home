<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class RegisterController extends Controller
{
    /**
     * Display register page.
     *
     * @return Application|Factory|View
     */
    public function show()
    {
        return view('auth.register');
    }

    /**
     * Handle account registration request
     *
     * @param RegisterRequest $request
     *
     * @return Application|RedirectResponse|Redirector
     */
    public function register(RegisterRequest $request)
    {
        $user = User::create($request->validated());
        auth()->login($user);
        //event(new Registered($user));

        $connection = new AMQPStreamConnection('rabbitmq', 5672, 'user', 'user');
        $channel = $connection->channel();

        $channel->queue_declare('Registration', false, true, false, false);
        $user = ['id' => $user->id];
        $jsonUser = json_encode($user);
        $msg = new AMQPMessage($jsonUser);
        $channel->basic_publish($msg, '', 'Registration');


        $channel->close();
        $connection->close();

        return redirect('/email/verify')->with('success', "Account successfully registered. Please verify your email.");
    }
}
