<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bulletin extends Model
{
    use HasFactory;
    protected $table = 'bulletins';
    protected $primaryKey = 'bulletinID';
    public $timestamps = false;

    protected $fillable = [
        'bulletinTitle',
        'bulletinDescription',
        'bulletinDate'
    ];
}
