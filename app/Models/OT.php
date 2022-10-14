<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OT extends Model
{
    use HasFactory;
    protected $table = 'ot_cost';
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'staff_id',
        'time_OT',
        'OT_cost',
        'time',
    ];
    public $timestamp = true;
}
