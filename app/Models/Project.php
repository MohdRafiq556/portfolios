<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

use Cviebrock\EloquentSluggable\Sluggable;

class Project extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = [];

    protected $fillable = [
        'title',
        'author',
        'links',
        'project_category_id',
        'details',
        'intro',
        'slug',
        'thumbnail',
        'feature',
        'framework',
        'language',
        'styling',
        'others',
        //'project_image_id'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function getImagesAttribute($value) {
        return asset($value);
    }

    public function project_category() {
        return $this->belongsTo(ProjectCategory::class);
    }

    // public function project_images() {
    //     return $this->hasMany(ProjectImage::class);
    // }

    public function images() {
        return $this->hasMany(ProjectImage::class);
    }
}
