<?php

namespace App\Models;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accessoires extends Model
{
    use HasFactory,LogsActivity;
    protected $fillable = [
        "label",
        "type_id",
        "n_série",
        "n_inventaire",
        "classe_id",
        "marque_id",
        "model_id",
        "status",
        "parent_ref"
    
    ];
    public function getDescriptionForEvent()
    {
        $user = auth()->user()->First_name." ".auth()->user()->Last_name;
        return $user;
    }
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['id', 'classe_id','label','type_id','n_série']);
    }
    public function marque() {
        return $this->belongsTo(Marque::class, 'marque_id');
    }
    public function model() {
        return $this->belongsTo(Models::class, 'model_id');
    }
    public function type()
    {
        return $this->belongsTo(Type::class,"type_id");
    }
    public function device()
    {
        return $this->belongsTo(Devices::class,"parent_ref");
    }
    public function classe() {
        return $this->belongsTo(Classe::class, 'classe_id');
    }

    public function declarations()
    {
        return $this->hasMany(Declaration::class, 'accessoire_id');
    }
}
