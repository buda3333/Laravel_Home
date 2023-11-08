<?php

namespace App\Console\Commands;

use App\Models\Record;
use Illuminate\Console\Command;
use Nutnet\LaravelSms\SmsSender;


class SendScheduledSms extends Command
{
    protected $signature = 'sms:send';
    protected $description = 'Send scheduled SMS';

    protected $smsSender;

    public function __construct(SmsSender $smsSender)
    {
        parent::__construct();
        $this->smsSender = $smsSender;
    }

    public function handle()
    {
        $records = Record::whereDate('date', '=', now()->addDay())->get();
        foreach ($records as $record) {
            $text = "Ждем вас завтра в ".$record->time;
            $phoneNumber = $record->phone;
            $this->smsSender->send($phoneNumber, $text);
            print_r($text);
        }
    }
}
