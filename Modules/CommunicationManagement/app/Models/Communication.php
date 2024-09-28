<?php

namespace Modules\CommunicationManagement\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\CommunicationManagement\Database\Factories\CommunicationFactory;

class Communication extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): CommunicationFactory
    // {
    //     // return CommunicationFactory::new();
    // }
}
