<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mestesug extends Model
{

    protected $table = 'tip_mestesugs';
    protected $fillable = ['denumire', 'descriere'];

    public function mestesug()
    {
        return $this->belongsTo(User::class);
    }

}
