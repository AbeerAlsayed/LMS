<?php

namespace Modules\ParentManagement\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\UserManagement\Models\User;

// use Modules\ParentManagement\Database\Factories\ParentFactory;

class ParentClass extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['user_id','phone_number'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // protected static function newFactory(): ParentFactory
    // {
    //     // return ParentFactory::new();
    // }
}
