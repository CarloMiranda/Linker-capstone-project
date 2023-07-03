<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'profile_picture',
        'wallpaper_picture',
        'background_photo'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function twats()
    {
        return $this->hasMany(Twat::class);
    }

    public function hasReaction(int $twatId)
    {
        $reaction = Reaction::where(['user_id' => $this->id, 'twat_id' => $twatId])->first();
        if ($reaction == null) {
            return false;
        }
        return true;
    }

    public function friends()
    {
        return $this->belongsToMany(User::class, 'friendships', 'user_id', 'friend_id')
            ->withPivot('status')
            ->wherePivot('status', 'accepted');
    }

    public function friendRequestsReceived()
    {
        return $this->belongsToMany(User::class, 'friendships', 'friend_id', 'user_id')
            ->withPivot('status')
            ->wherePivot('status', 'pending');
    }

    public function friendRequestsSent()
    {
        return $this->belongsToMany(User::class, 'friendships', 'user_id', 'friend_id')
            ->withPivot('status')
            ->wherePivot('status', 'pending');
    }

    public function addFriend(User $friend)
    {
        $this->friends()->attach($friend, ['status' => 'pending']);
        $friend->friends()->attach($this, ['status' => 'requested']);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
}
