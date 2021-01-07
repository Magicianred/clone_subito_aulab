<?php

namespace App\Models;

use App\Models\Category;
use Laravel\Scout\Searchable;
use App\Models\AnnouncementImage;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Announcement extends Model
{
    use Searchable;
    use HasFactory;
    protected $fillable =[
        'title',
        'body',
        'price',
       'category_id'
     ];

     public function toSearchableArray()
     {
            

            $array = [
            'id' =>  $this->id,
            'title' =>  $this->title,
            'body' =>  $this->body,
            
            
        ];
 
         
 
         return $array;
     }
 

    public function category(){

        return $this->belongsTo(Category::class);
    }

    public function user(){

        return $this->belongsTo(User::class);
    }
    static public function ToBeRevisionedCount(){
        return Announcement::where('is_accepted',null)->count();
    }

    public function images(){

        return $this->hasMany(AnnouncementImage::class);
    }
}
