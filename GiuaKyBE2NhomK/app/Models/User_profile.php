<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User_profile extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'user_profile';

    protected $primaryKey = 'user_profile_id';

    public $incrementing = true;


    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_profile_id ',
        'user_id',
        'first_name',
        'last_name',
        'sex',
        'phone',
        'address',   
    ];
}
