<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToolUser extends Model
{
    use HasFactory;

    protected $table = 'tool_user';

    protected $guarded = [];
}
