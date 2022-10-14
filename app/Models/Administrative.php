<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrative extends Model
{
    use HasFactory;
    protected $table = 'administrative_cost';
            /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'office_cost',
        'other_cost',
        'staff_cost',
        'staffs',
        'time',
    ];
    public $timestamp = true;
}
