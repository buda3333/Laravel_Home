<?php

namespace App\Console\Commands;

use App\Models\User;

use App\Services\RabbitMQService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Console\Command;


class ConsumeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rabbitmq:consume';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */

    public function handle()
    {
        $rabbitMQService= new RabbitMQService();
        $rabbitMQService->getMessage('Registration', function ($body) {
            $id = json_decode($body)->id;
            $user = User::find($id);
            event(new Registered($user));
        });
    }
}
