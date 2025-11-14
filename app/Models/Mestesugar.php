<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mestesugar extends Model
{
    use HasFactory;

    protected $table = 'mestesugar';
    protected $fillable = [
        'denumire',
        'user_id',
        'slug',
        'descriere',
        'image'
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function scopeNotAccepted($query)
    {
        return $query->where('is_accepted', false);
    }

}
