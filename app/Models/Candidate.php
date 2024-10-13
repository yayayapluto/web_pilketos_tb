<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Candidate extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'candidate_id',
        'image',
        'name',
        'description',
        'external_link',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function votings()
    {
        return $this->hasMany(Voting::class, 'candidate_id', "candidate_id");
    }
}
