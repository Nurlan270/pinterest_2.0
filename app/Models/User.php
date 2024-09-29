<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\SendResetLinkNotification;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements CanResetPassword, FilamentUser
{
    use HasFactory, Notifiable, \Illuminate\Auth\Passwords\CanResetPassword;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'avatar',
        'name',
        'email',
        'password',
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function saved_pins(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Pin::class, 'saves');
    }

    public function subscribers(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class, 'subscribers', 'author_id', 'subscriber_id');
    }

    public function pins(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Pin::class);
    }

    public function sendPasswordResetNotification($token): void
    {
        $url = url('/reset-password?token='.$token);

        $this->notify(new SendResetLinkNotification($url));
    }

    public function canAccessPanel(Panel $panel): bool
    {
        $trustedEmails = ['nick@mail.ru', 'alex@mail.com'];
        return in_array($this->email, $trustedEmails);
    }
}
