<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'project';
                /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'project_name',
        'Sale_PIC',
        'Market',
        'Time_deployment_start',
        'Time_deployment_end',
        'status',
    ];
    public $timestamp = true;
}
