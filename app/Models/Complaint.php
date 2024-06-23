<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Complaint extends Model implements HasMedia
{

    use InteractsWithMedia;
    protected $fillable = ['title', 'description', 'name', 'phone_number', 'city_id', 'address', 'location', 'category_id', 'status', 'resolution', 'resolved_at'];

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function city(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
