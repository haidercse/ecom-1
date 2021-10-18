<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;
    /**
     * Get all of the district for the Division
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function district()
    {
        return $this->hasMany(District::class);
    }
}
