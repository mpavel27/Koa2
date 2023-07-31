<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Player;

class Guild extends Model
{
    use HasFactory;

    protected $connection = 'mysql_player';

    private static $whiteListFilter = [
        'name'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'guild';

    public $timestamps = false;

    public function masterTable() {
        return $this->hasOne(Player::class, 'id', 'master');
    }
}
