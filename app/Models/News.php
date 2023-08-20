<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Player;

class News extends Model
{
    use HasFactory;

    protected $connection = 'mysql_settings';

    protected $table = 'News';

    protected $fillable = [
        'title',
        'content',
        'created_by'
    ];
}
