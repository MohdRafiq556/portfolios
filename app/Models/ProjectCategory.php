<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectCategory extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    protected $fillable = [
        'name'
    ];

    public function Projects() {
        return $this->hasMany(Project::class);
    }

    public function User() {
        return $this->belongsTo(User::class);
    }
}
