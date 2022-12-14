<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded=['id'];
    // protected $fillable = [
    //     'name',
    //     'username',
    //     'utype',
    //     'email',
    //     'password',
    // ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function setPasswordAttribute($password)
    {
        return $this->attributes['password']=Hash::make($password);
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function scopeSearch($query, $search)
    {
        $query->when(
            $search?? false,
            fn ($query, $search) =>
                $query->where('id', $search)
                ->orWhere('name', 'Like', '%'.$search.'%')
                ->orWhere('username', 'Like', '%'.$search.'%')
        );
    }
    public function posts()
    {
        return $this->hasMany(Post::class, 'author_id');
    }
}
