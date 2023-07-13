<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Comments extends Model
{
    use HasFactory;
    protected $table = "comments";

    public function creator(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function cobine(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
