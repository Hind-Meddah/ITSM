<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OS extends Model
{
    use HasFactory;
    
    protected $fillable = [
        "name",

    ];

    public function os() {
        return $this->hasMany(OS::class, 'os_id');
    }

}
