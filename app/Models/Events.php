<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;

    protected $connection = 'mysql_settings';

    protected $table = 'Events';

    protected $fillable = [
        'title',
        'event_date',
        'created_by'
    ];
}
