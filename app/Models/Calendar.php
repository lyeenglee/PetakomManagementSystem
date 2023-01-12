<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'calendar';
    protected $primaryKey = 'id';

    protected $fillable = [
        'calendarYear',
        'activityID',
        'calendarDate',
        'activityDetInfo',
        'activityUrl',
        'semestr'
    ];

}