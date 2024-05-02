<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Favorities extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'favorities';

    protected $primaryKey = 'favorite_id';

    public $incrementing = true;

    /**
     * Relationship many to many
     * @return HasMany
     */
    public function favorities(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'favorite_id',
        'favorite_name',
        'favorite_description',
    ];
}
