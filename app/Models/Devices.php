<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
class Devices extends Model
{
    use HasFactory,LogsActivity;
    protected $fillable = [
        "establishement_id",
        "label",
        "type_id",
        "n_série",
        "n_inventaire",
        "ram",
        "stockage",
        "classe_id",
        "marque_id",
        "model_id",
        "cpu_id",
        "os_id",
        "status"
    ];
    public function getDescriptionForEvent()
    {
        $user = auth()->user()->First_name." ".auth()->user()->Last_name;
        return $user;
    }
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['id', 'establishement_id','label','type_id',"n_série"]);
    }
    public function classe() {
        return $this->belongsTo(Classe::class, 'classe_id');
    }
    
    public function establishement() {
        return $this->belongsTo(Establishement::class, 'establishement_id');
    }
    public function marque() {
        return $this->belongsTo(Marque::class, 'marque_id');
    }
    public function model() {
        return $this->belongsTo(Models::class, 'model_id');
    }
    public function cpu() {
        return $this->belongsTo(Processors::class, 'cpu_id');
    }
    public function os() {
        return $this->belongsTo(OS::class, 'os_id');
    }

    public function type()
    {
        return $this->belongsTo(Type::class,"type_id");
    }
    public function accessoires()
    {
        return $this->hasMany(Accessoires::class, 'parent_ref');
    }

    public function declarations()
    {
        return $this->hasMany(Declaration::class, 'device_id');
    }

}
