<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = ['name', 'slug', 'description'];

    public function complaints(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Complaint::class);
    }
}
