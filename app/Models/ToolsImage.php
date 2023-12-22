<?php

namespace App\Models;

use App\Models\Tool;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ToolsImage extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function tool()
    {
    	return $this->belongsTo(Tool::class);
    }
}
