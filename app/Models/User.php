<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\UserRole;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Modules\Pengaduan\Models\Pengajuan;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;
      protected $fillable = [
        'name',
        'email',
        'role',
        'password',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    // Nilai bawaan role pada objek User baru
    protected $attributes = [
        'role' => 'Pemohon',
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
            'role' => UserRole::class,
        ];
    }
     public function isAdmin(): bool
    {
        return $this->role === UserRole::Admin;
    }
    public function hasRole(UserRole|string ...$roles): bool
    {
        foreach ($roles as $role) {
            if ($this->role === ($role instanceof UserRole ? $role : UserRole::tryFrom($role))) {
                return true;
            }
        }
        return false;
    }

    public function Pengajuan(): HasMany
    {
        return $this->hasMany(Penjaduan::class);
    } 
}
