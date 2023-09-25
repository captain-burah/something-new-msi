<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Unit extends Model
{
    use HasFactory;

    public function unit_brochure(): HasOne
    {
        return $this->hasOne(Unit_brochure::class);
    }

    public function unit_image(): HasOne
    {
        return $this->hasOne(Unit_image::class);
    }

    public function unit_paymentplan(): HasOne
    {
        return $this->hasOne(Unit_paymentplan::class);
    }


    public function unit_floorplan(): HasOne
    {
        return $this->hasOne(Unit_floorplan::class);
    }


}
