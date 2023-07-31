<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PlayerIndex;

class Player extends Model
{
    use HasFactory;

    protected $connection = 'mysql_player';

    private static $whiteListFilter = [
        'name',
        'ip'
    ];

    protected $table = 'player';

    public $timestamps = false;

    public function index() {
        return $this->hasOne(PlayerIndex::class, 'id', 'account_id');
    }
}
