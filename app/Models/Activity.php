<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'activities';
    protected $primaryKey = 'activityID';

    protected $fillable = [
        'activityName',
        'activityDescription',
        'activityStatus',
        'startDate',
        'endDate',
        'startTime',
        'endTime',
        'activityVenue',
        'grantAmount',
        'proposalUrl',
        'posterUrl'
    ];
}
