<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marque extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
 "type_id"
    ];

    public function Models()
    {
        return $this->hasMany(Model::class, 'marque_id');
    }
    public function type()
    {
        return $this->belongsTo(Type::class,"type_id");
    }
    public function devices()
    {
        return $this->hasMany(Devices::class, 'marque_id');
    }
    public function accessoire()
    {
        return $this->hasMany(Accessoires::class, 'marque_id');
    }
}
