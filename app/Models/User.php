<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use EloquentFilter\Filterable;
use App\Http\Controllers\MainController;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Filterable;

    /**
     * The database connection that should be used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';

    private static $whiteListFilter = [
        'login',
        'email'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'login',
        'password',
        'email',
        'social_id',
        'create_time'
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = MainController::toMD5($password);
    }


    // TODO set email verification here
    protected $attributes = [
        'silver_expire' => '2035-05-05 21:00:00',
        'safebox_expire' => '2035-05-05 21:00:00',
        'autoloot_expire' => '2035-05-05 21:00:00',
        'fish_mind_expire' => '2035-05-05 21:00:00',
        'marriage_fast_expire' => '2035-05-05 21:00:00',
        'money_drop_rate_expire' => '2035-05-05 21:00:00'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'account';

    public $timestamps = false;

    public function players()
    {
        return $this->hasMany('App\Models\Player', 'account_id', 'id');
    }
}
