<?php

namespace App\Services;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class RabbitMQService
{
    protected AMQPStreamConnection $connection;
    public function __construct()
    {
        $this->connection = new AMQPStreamConnection('rabbitmq', 5672, 'user', 'user');

    }

    public function publish(string $queue, array $data)
    {
        $channel = $this->connection->channel();
        $channel->queue_declare($queue, false, true, false, false);
        $jsonMessage = json_encode($data);
        $msg = new AMQPMessage($jsonMessage);
        $channel->basic_publish($msg, '', $queue);
        $channel->close();
        $this->connection->close();
    }
    public function consume(string $queue, callable $callback)
    {
        $channel = $this->connection->channel();
        $channel->queue_declare($queue, false, true, false, false);

        echo " [*] Waiting for messages. To exit press CTRL+C\n";

        $channel->basic_consume(
            $queue,
            '',
            false,
            true,
            false,
            false,
            function ($msg) use ($callback) {
            call_user_func($callback, $msg->body);
        });

        while (count($channel->callbacks)) {
            $channel->wait();
        }
        $channel->close();
        $this->connection->close();
    }






}
