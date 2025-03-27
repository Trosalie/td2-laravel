<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sauce extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'idSauce',
        'userID',
        'name',
        'manufacturer',
        'description',
        'imageUrl',
        'mainPepper',
        'heat',
        'likes',
        'dislikes',
        'usersLiked',
        'usersDisliked',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'usersLiked'=>'array',
        'usersDisliked'=>'array',
    ];
}
