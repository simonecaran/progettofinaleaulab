<?php

namespace App\Models;

use App\Models\Announcement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'icon'
    ];

    public function announcements(){
        return $this->hasMany(Announcement::class);
    }

    public static function MoreAnn(){
        $categories = Category::all();
        $moreAnn = [];
        $categories_name = [];
        foreach($categories as $category){
            $moreAnn[] = $category->announcements; 
        }
        rsort($moreAnn);
        $moreAnnslice = array_slice($moreAnn,0,4);
        foreach($moreAnnslice as $category){
            if($category->first()){
                $categories_name[] = $category->first()->category;
            }
        }
        return $categories_name;
    } 

}
