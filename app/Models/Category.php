<?php

namespace App\Models;

use App\Models\Announcement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

     protected $fillable=[

        'Motori','Informatica','Elettrodomestici','Libri','Giochi','Sport','Immobili','Smartphone','Arredamento','Giardinaggio'


    ]; 
    public function announcements(){

        return $this->hasMany(Announcement::class);
    }

}
