<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Models extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "marque_id",
    ];


    public function marque()
    {
        return $this->belongsTo(Marque::class, 'marque_id');
    }

    public function devices()
    {
        return $this->hasMany(Devices::class, 'model_id');
    }
    public function accessoires()
    {
        return $this->hasMany(Accessoires::class, 'model_id');
    }
}
