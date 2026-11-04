<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PropertyRequest;
use App\Models\Property;
use App\Models\PropertyImage;
use Illuminate\Support\Facades\Storage;

class PropertyImageController extends Controller
{
   
    
    public function addImage(Request $request, $property_id)
    {
        $property = Property::findOrFail($property_id);
    
        $request->validate([
            'image' => 'required|image|max:2048',
        ]);
    
        // ✅ احفظ الصورة في مجلد public
        $path = $request->file('image')->store('property_images', 'public');
    
        // ✅ حفظ المسار في قاعدة البيانات
        $property->images()->create([
            'image_path' => $path,
        ]);
    
        return response()->json(['message' => 'Image uploaded successfully'], 201);
    }

// public function addImage(Request $request, $property_id)
// {
//     $request->validate([
//         'image' => 'required|image|max:2048',
//         'property_id' => 'required|exists:properties,id',
//     ]);

//     $path = $request->file('image')->store('property_images', 'public');

//     $image = PropertyImage::create([
//         'image_path' => $path,
//         'property_id' => $property_id,
//     ]);

//     return response()->json([
//         'message' => 'Image uploaded successfully'
//     ], 201);
// }

public function deleteImage( $imageId)
{
   
    $image = PropertyImage::findOrFail($imageId);
     $image->delete();

    return response()->json(['message' => 'Image deleted successfully']);
}


public function getImageUrl($imageId)
{
    $image = PropertyImage::findOrFail($imageId);

    if (!Storage::disk('public')->exists($image->image_path)) {
        return response()->json([
            'error' => 'Image file not found'
        ], 404);
    }

    // ✅ استخدام Storage::url() ليعيد المسار النسبي
    $url = Storage::url($image->image_path);

    return response()->json([
        'url' => $url,
    ]);
}
}
