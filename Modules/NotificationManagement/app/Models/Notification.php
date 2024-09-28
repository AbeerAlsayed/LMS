<?php

namespace Modules\NotificationManagement\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\UserManagement\Models\User;

// use Modules\NotificationManagement\Database\Factories\NotificationFactory;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'message',
        'is_read',
    ];

    // Relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // protected static function newFactory(): NotificationFactory
    // {
    //     // return NotificationFactory::new();
    // }
}
