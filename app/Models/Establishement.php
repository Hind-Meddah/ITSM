<?php

namespace App\Models;

use App\Models\Classe;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Establishement extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "ville"
    ];

    public function classes(){
        return $this->hasMany(Classe::class,'establishement_id');   
    }
}
