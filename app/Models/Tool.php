<?php

namespace App\Models;

use App\Models\User;
use App\Models\ToolsImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tool extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function images()
    {
    	return $this->hasMany(ToolsImage::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
