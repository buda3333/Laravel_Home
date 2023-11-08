<?php

namespace App\Services;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class RabbitMQService
{
    protected AMQPStreamConnection $connection;
    protected $channel;
    public function __construct()
    {
        $this->connection = new AMQPStreamConnection('rabbitmq', 5672, 'user', 'user');
        $this->channel = $this->connection->channel();
    }

    public function sendMessage(string $queue, array $data)
    {
        $this->channel->queue_declare($queue, false, true, false, false);
        $jsonMessage = json_encode($data);
        $msg = new AMQPMessage($jsonMessage);
        $this->channel->basic_publish($msg, '', $queue);
        $this->channel->close();
        $this->connection->close();
    }
    public function getMessage($queue,$callback)
    {
        $this->channel->queue_declare($queue, false, true, false, false);

        echo " [*] Waiting for messages. To exit press CTRL+C\n";

        $this->channel->basic_consume($queue, '', false, true,
            false, false, function ($msg) use ($callback) {
            call_user_func($callback, $msg->body);
        });

        while (count($this->channel->callbacks)) {
            $this->channel->wait();
        }
        $this->channel->close();
        $this->connection->close();
    }






}
