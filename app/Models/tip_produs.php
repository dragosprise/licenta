<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tip_produs extends Model
{

    protected $table = 'tip_produses';
    protected $fillable = ['nume',
        'slug',
        'text',
        'image'];
    public function produs(){
        return $this->belongsTo(User::class);
    }
}
