<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectImage extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'project_id',
        'first_image',
        'second_image',
        'third_image',
        'fourth_image',
    ];

    public function Project() {
        return $this->belongsTo(Project::class);
    }
}
