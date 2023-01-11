<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'proposals';
    protected $primaryKey = 'proposalID';

    protected $fillable = [
        'proposalTitle',
        'date',
        'proposalDescription',
        'proposalUrl',
        'firstName',
        'lastName',
        'phoneNumber',
    ];

}
