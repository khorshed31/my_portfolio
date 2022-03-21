<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    private static $banner;
    private static $image;
    private static $imageName;
    private static $imageUrl;
    private static $directory;

    public static function getImageURL($request){

        self::$image = $request->file('image');
        self::$imageName = self::$image->getClientOriginalName();
        self::$directory = 'assets/img/banner/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl = self::$directory.self::$imageName;
        return self::$imageUrl;
    }

    public static function newBanner($request){

        self::$banner = new Banner();

        self::$banner->image = self::getImageURL($request);
        self::$banner->save();
    }
    public static function updateBanner($request, $id){

        self::$banner = Banner::find($id);
        if ($request->file('image')){

            if (file_exists(self::$banner->image)){

                unlink(self::$banner->image);
            }
            self::$imageUrl = self::getImageURL($request);
        }
        else{

            self::$imageUrl = self::$banner->image;
        }
        self::$banner->image   = self::$imageUrl;
        self::$banner->save();
    }

}
