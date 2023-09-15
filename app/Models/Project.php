<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Project extends Model
{
    use HasFactory;

    public function project_brochure(): HasOne
    {
        return $this->hasOne(Project_brochure::class);
    }

    public function project_image(): HasOne
    {
        return $this->hasOne(Project_image::class);
    }
}
