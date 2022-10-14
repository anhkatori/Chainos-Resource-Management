<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outsource extends Model
{
    use HasFactory;
    protected $table = 'outsource_cost';
            /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'project_id',
        'staff_id',
        'outsource_cost',
        'time',
    ];
    public $timestamp = true;
}
