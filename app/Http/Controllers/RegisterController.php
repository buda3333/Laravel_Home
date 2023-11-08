<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;

use App\Services\RabbitMQService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class RegisterController extends Controller
{
    /**
     * Display register page.
     *
     * @return Application|Factory|View
     */
    public function __construct(protected RabbitMQService $rabbitMQService)
    {
    }
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
        $data=['id' => $user->id];
        $queue='Registration';
        $this->rabbitMQService->publish($queue,$data);
        return redirect('/email/verify')
            ->with('success', "Account successfully registered. Please verify your email.");
    }
}
