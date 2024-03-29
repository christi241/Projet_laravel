<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidat extends Model
{
    use HasFactory;
    protected $fillable= ['nom','prenom','parti','validate','biografie','photo'];

    public function programmes(){
        return $this->hasMany(Programme::class);
    }

}
