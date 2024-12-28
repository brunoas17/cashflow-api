<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cashflow extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'description',
        'created_by',
    ];
}