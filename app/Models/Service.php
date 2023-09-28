<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'description',
        'is_active',
    ];
    public function specialists()
    {
        return $this->belongsToMany(Specialist::class, 'specialist_services', 'service_id', 'specialist_id');
    }
}
