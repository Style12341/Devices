<?php

namespace App\Models;

use App\Models\TypeInstrument;
use App\Models\InstrumentValue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Instrument extends Model
{
    use HasFactory;

    //Relationship with values
    public function values()
    {
        return $this->hasMany(InstrumentValue::class,'instrument_id');
    }
    //Relationship with instrument type
    public function instrumentType()
    {
        return $this->belongsTo(TypeInstrument::class,'type');
    }
    //Relationship with Machine
    public function machine()
    {
        return $this->belongsTo(Machine::class,'machine_id');
    }
}
