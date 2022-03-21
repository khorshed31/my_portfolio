<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    private static $about;
    private static $image;
    private static $imageName;
    private static $imageUrl;
    private static $directory;

    public static function getImageURL($request){

        self::$image = $request->file('image');
        self::$imageName = self::$image->getClientOriginalName();
        self::$directory = 'assets/img/aboutUs/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl = self::$directory.self::$imageName;
        return self::$imageUrl;
    }

    public static function newAbout($request){

        self::$about = new About();

        self::$about->phone = $request->phone;
        self::$about->city = $request->city;
        self::$about->experience = $request->experience;
        self::$about->summary = $request->summary;
        self::$about->image = self::getImageURL($request);
        self::$about->save();
    }
    public static function updateAbout($request, $id){

        self::$about = About::find($id);
        if ($request->file('image')){

            if (file_exists(self::$about->image)){

                unlink(self::$about->image);
            }
            self::$imageUrl = self::getImageURL($request);
        }
        else{

            self::$imageUrl = self::$about->image;
        }
        self::$about->phone = $request->phone;
        self::$about->city = $request->city;
        self::$about->experience = $request->experience;
        self::$about->summary = $request->summary;
        self::$about->image   = self::$imageUrl;
        self::$about->save();
    }
}
