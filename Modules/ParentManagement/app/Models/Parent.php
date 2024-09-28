<?php

namespace Modules\ParentManagement\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\ParentManagement\Database\Factories\ParentFactory;

class Parent extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): ParentFactory
    // {
    //     // return ParentFactory::new();
    // }
}
