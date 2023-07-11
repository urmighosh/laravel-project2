<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherImage extends Model
{
    use HasFactory;
    private static $otherImage,$image, $otherImages,$imageName,$directory,$imageUrl,$imageExtension;


    public static function getImageUrl($image)
    {

            self::$imageExtension     =$image->getClientOriginalExtension();
            self::$imageName          = rand(1, 500000). '.'.self::$imageExtension;
            self::$directory          ='upload/product-other-images/';
            $image->move(self::$directory,self::$imageName);
            self::$imageUrl           =self::$directory.self::$imageName;
            return self::$imageUrl;

    }

    public static function newOtherImage($images,$id)
    {
    $otherImages = OtherImage::where('product_id',$id)->get();
    foreach($otherImages as $images)
    {
        unlink($images->image);
    }
    foreach($images as $image)
    {
    self::$otherImage              = new OtherImage();
    self::$otherImage->product_id  = $id;
    self::$otherImage->image       =self::getImageUrl($image);
    self::$otherImage->save();

    }

    }

    public static function updateOtherImage($images,$id)
    {
    self::deleteOtherImage($id);
    self::newOtherImage($images, $id);
    }

    public static function deleteOtherImage($id){
        self::$otherImages = OtherImage::where('product_id', $id)->get();
        foreach(self::$otherImages as $image)
        {
        if(file_exists($image->image))
        {
            unlink($image->image);
        }
            $image->delete();
        }
    }
}
