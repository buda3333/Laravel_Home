<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    use HasFactory;
    protected $fillable = [
        'specialist_service_id',
        'date',
        'time',
    ];
    public function specialistservice()
    {
        return $this->belongsTo(SpecialistService::class, 'specialist_service_id');
    }
    public function records()
    {
        return $this->hasMany(Record::class);
    }

    public static function getFreeCalendars()
    {
        return Calendar::
        leftJoin('specialist_services', 'calendars.specialist_service_id', '=', 'specialist_services.id')
            ->leftJoin('records', function($join)
            {
                $join->on('specialist_services.specialist_id', '=', 'records.specialist_id')
                    ->on('specialist_services.service_id', '=', 'records.service_id')
                    ->on('calendars.date', '=', 'records.date')
                    ->on('calendars.time', '=', 'records.time');
            })
            ->select('calendars.date', 'calendars.time','calendars.specialist_service_id')
            ->whereNull('records.id')
            ->get();
    }
}
