<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
    ];
    public function marques()
    {
        return $this->hasMany(Marque::class,"type_id");
        
    }
    public function devices()
    {
        return $this->hasMany(Devices::class, 'type_id');
    }
    public function accessoires()
    {
        return $this->hasMany(Accessoires::class, 'type_id');
    }
}
