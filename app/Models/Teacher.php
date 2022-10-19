<?php

namespace App\Models;

use http\Env\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Teacher extends Model
{
    use HasFactory;
    private static $teacher;
    private static $extension;
    private static $name;
    private static $imageName;
    private static $imageUrl;
    private static $directory;

    public static function getImageUrl($image)
    {
        self::$extension = $image->getClientOriginalExtension();
        self::$name      = Str::random('10');

        self::$imageName = self::$name.'.'.self::$extension;

        self::$directory = 'teacher-images/';
        $image->move(self::$directory, self::$imageName);

        self::$imageUrl = self::$directory.self::$imageName;
        return self::$imageUrl;
    }

    public static function newTeacher($request)
    {
        self::$teacher = new Teacher();
        self::$teacher->name        = $request->name;
        self::$teacher->designation = $request->designation;
        self::$teacher->email       = $request->email;
        self::$teacher->password    = bcrypt($request->password);
        self::$teacher->mobile      = $request->mobile;
        self::$teacher->address     = $request->address;
        self::$teacher->image       = self::getImageUrl($request->file('image'));
        self::$teacher->save();
    }

    public static function updateTeacher($request, $id)
    {
        self::$teacher = Teacher::find($id);
        if ($request->file('image'))
        {
            if (file_exists(self::$teacher->image))
            {
                unlink(self::$teacher->image);
            }
            self::$imageUrl = self::getImageUrl($request->file('image'));
        }
        else
        {
            self::$imageUrl = self::$teacher->image;
        }
        self::$teacher->name        = $request->name;
        self::$teacher->designation = $request->designation;
        self::$teacher->email       = $request->email;
        self::$teacher->password    = bcrypt($request->password);
        self::$teacher->mobile      = $request->mobile;
        self::$teacher->address     = $request->address;
        self::$teacher->image       = self::$imageUrl;
        self::$teacher->save();
    }

    public static function deleteTeacher($id)
    {
        self::$teacher = Teacher::find($id);
        if (file_exists(self::$teacher->image))
        {
            unlink(self::$teacher->image);
        }
        self::$teacher->delete();
    }
}
