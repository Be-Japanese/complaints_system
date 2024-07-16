<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Statistic extends Model implements HasMedia
{
    use HasUuids;
    use InteractsWithMedia;

    protected $fillable = ['title', 'description', 'icon', 'status'];
}
