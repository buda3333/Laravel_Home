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
    public function calendar()
    {
        return $this->hasMany(Calendar::class, 'specialist_service_id');
    }
}

