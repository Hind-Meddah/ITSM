<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Processors extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "frequency",
        "manufacturer",
        "nbcores"
    ];

    public function cpu() {
        return $this->hasMany(Processors::class, 'cpu_id');
    }
}
