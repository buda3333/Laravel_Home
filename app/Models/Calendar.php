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
}
