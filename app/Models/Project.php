<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Project extends Model
{
    use HasFactory, HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'name',
        'description',
        'status',
        'start_date',
        'end_date',
        'owner_id',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
