<?php

namespace App\Models;

use App\Models\Instrument;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InstrumentValues extends Model
{
    use HasFactory;


    //Relationship with instrumento
    public function instrument()
    {
        return $this->belongsTo(Instrument::class,'instrument_id');
    }
}
