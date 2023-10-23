<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'specialist_id',
        'service_id',
        'date',
        'time',
        'phone',
    ];
    public function specialist()
    {
        return $this->belongsTo(Specialist::class, 'specialist_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
