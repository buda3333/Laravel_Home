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
            $recordTime=json_encode($record->time);
            $text = "Ждем вас завтра в $recordTime";
            $phoneNumber = json_encode($record->phone);
            $this->smsSender->send($phoneNumber, $text);
        }
    }
}
