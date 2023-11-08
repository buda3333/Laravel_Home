<?php

namespace App\Services;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
/**
 *@deprecated
 */
class VerificationEmailService
{
    public function sendVerificationEmail($user)
    {
        $connection = new AMQPStreamConnection('rabbitmq', 5672, 'user', 'user');
        $channel = $connection->channel();

        $channel->queue_declare('Registration', false, true, false, false);
        $userData = ['id' => $user->id];
        $jsonUser = json_encode($userData);
        $msg = new AMQPMessage($jsonUser);
        $channel->basic_publish($msg, '', 'Registration');

        $channel->close();
        $connection->close();

        return true;
    }
}
