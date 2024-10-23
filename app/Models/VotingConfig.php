<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VotingConfig extends Model
{
    use HasFactory;

    protected $fillable = [
        "start_datetime",
        "end_datetime"
    ];
}
