<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrbitLanding extends Model
{
    protected $table = 'orbit_landings';

    protected $fillable = [
        'locale',
        'hero_title',
        'hero_subtitle',
        'about_text',
        'about_image',
        'services',
        'showcase_images',
        'clients',
        'cta_title',
        'cta_subtitle',
        'cta_email',
    ];

    protected $casts = [
        'services' => 'array',
        'showcase_images' => 'array',
        'clients' => 'array',
    ];
}
