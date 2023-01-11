<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    use HasFactory;
    protected $table = 'elections';
    protected $primaryKey = 'electionID';
    //removed timestamp for created_at and updated_at
    public $timestamps = false;

    protected $fillable = [
        'name',
        'year',
        'category',
        'course',
        'manifesto',
        'filePath',
        'approveStatus',
        'rejectReason',
        'vote',
        'positionStatus',
        'position'
    ];
}
