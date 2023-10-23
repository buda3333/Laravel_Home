<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialistService extends Model
{
    use HasFactory;
    protected $fillable = [
        'service_id',
        'specialist_id',
    ];
    public function calendars()
    {
        return $this->hasMany(Calendar::class, 'specialist_service_id');
    }
    public function records()
    {
        return $this->hasMany(Record::class, 'specialist_id', 'specialist_id')
            ->where('service_id', $this->service_id);
    }
}

