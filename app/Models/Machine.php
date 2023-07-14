<?php

namespace App\Models;

use App\Models\System;
use App\Models\Instrument;
use App\Models\TypeMachine;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Machine extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'equipo';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'instrument_id',
        'type_instrument_id',
        'type_id',
        'state',
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    //Relationship to System
    public function user()
    {
        return $this->belongsTo(System::class, 'system_id');
    }
    //Relationship to TipoMaquina
    public function machineType()
    {
        return $this->belongsTo(TypeMachine::class, 'type');
    }
    //Relationsip with Systems
    public function instruments()
    {
        return $this->hasMany(Instrument::class, 'machine_id');
    }
}
