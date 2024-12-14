<?php

namespace App\Models;

use App\Models\Establishement;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "establishement_id"
    ];

    public function establishement()
    {
        return $this->belongsTo(Establishement::class, 'establishement_id'); // Assuming foreign key is 'establishement_id'
    }
    public function devices()
    {
        return $this->hasMany(Devices::class, 'classe_id');
    }
    public function declartions()
    {
        return $this->hasMany(Declaration::class, 'classe_id');
    }
}
