<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
    protected $fillable = ['name','status','description'];



    public function users(): HasMany
    {
        return $this->hasMany(User::class,'city_id');
    }
}
