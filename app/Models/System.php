<?php

namespace App\Models;

use App\Models\User;
use App\Models\Machine;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class System extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'user_id',
        'company',
        'location',
        'email',
        'description',
        'tags',
        'logo',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function scopeFilter($query, array $filters)
    {
        if ($filters['tag'] ?? false) {
            $query->where('tags', 'like', '%' . $filters['tag'] . '%');
        } else if ($filters['search'] ?? false) {
            $query->where('name', 'like', '%' . $filters['search'] . '%')
                ->orWhere('description', 'like', '%' . $filters['search'] . '%')
                ->orWhere('tags', 'like', '%' . $filters['search'] . '%')
                ->orWhere('company', 'like', '%' . $filters['search'] . '%');
        }
    }
    //Relationship to user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    //Relationsip with Systems
    public function systems()
    {
        return $this->hasMany(Machine::class, 'system_id');
    }
}
