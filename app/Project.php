<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'project_id',
        'contract_address',
        'name',
        'url',
        'description',
        'total_deposit',
        'rewards',
        'participants',
        'minimum_deposit'
    ];
}
