<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model

{
    protected $casts = [
        'created_at' => 'date:F j, Y',  // e.g. "June 2, 2025"

    ];
}
