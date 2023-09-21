<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'logo_header', 'logo_footer', 'hero_text', 'benefits_text', 'benefits_video', 'map', 'conditions',
        'tour', 'link_tour', 'progress', 'installations', 'foundation', 'structure', 'front', 'finishing',
        'features', 'two_rooms', 'three_rooms', 'court', 'pool', 'childreen_pool', 'playground', 'party_room', 'gourmet', 'security', 'green_area', 'commerce',
        'address', 'phone', 'email', 'facebook', 'twitter', 'instagram', 'youtube', 'user_id'
    ];
}
