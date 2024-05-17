<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recept extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'nev',
        'kateg_id',
        'kep',
        'leiras'
    ];
    
    public function kategoria()
    {
        return $this->belongsTo(Kategoria::class, 'kateg_id');
    }
}
