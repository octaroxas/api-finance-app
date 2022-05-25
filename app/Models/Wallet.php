<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wallet extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }
}
