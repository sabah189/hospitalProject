<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    use HasFactory;
    
    public function medecins()
    {
        return $this->hasMany(Medecin::class, 'foreign_key');
    }

    public function infirmieres()
    {
        return $this->hasMany(Infirmiere::class, 'foreign_key');
    }


}
