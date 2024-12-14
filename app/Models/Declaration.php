<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Declaration extends Model
{
    use HasFactory;
    protected $fillable = [
        'accessoire_id',
        "type_Anci_Dmd",
        "urgence",
        "user_id",
        "classe_id",
        "device_id",
        "description_issue",
        "date_declaration",
        "Technom",
        "Techprenom",
        "description_solution",
        "date_accept_or_refus",
        "date_confirmation",
        "date_Terminer",
        "status"
    ];
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function classe() {
        return $this->belongsTo(Classe::class, 'classe_id');
    }

    public function device() {
        return $this->belongsTo(Devices::class, 'device_id');
    }
    public function accessoire()
    {
        return $this->belongsTo(Accessoires::class,"accessoire_id");
    }
}
