<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
      protected $casts = [
        'created_at' => 'date:F j, Y',  // e.g. "June 2, 2025"

    ];
}
