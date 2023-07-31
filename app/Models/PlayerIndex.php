<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Player;

class PlayerIndex extends Model
{
    use HasFactory;

    protected $connection = 'mysql_player';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'player_index';

    public $timestamps = false;

//    public function player() {
//        return $this->hasMany(Player::class, 'account_id');
//    }
}
