<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomepageImage;
use Illuminate\Support\Facades\Storage;

class HomepageImageController extends Controller
{
    public function index()
    {
        $images = HomepageImage::all();
        return view('admin.homepage-images', compact('images'));
    }

    public function update(Request $request, $id)
    {
        $image = HomepageImage::findOrFail($id);

        if ($request->hasFile('image')) {

            if ($image->image) {
                Storage::disk('public')->delete($image->image);
            }

            $path = $request->file('image')->store('homepage','public');

            $image->update([
                'image'=>$path
            ]);
        }

        return back()->with('success','Image updated');
    }

    public function delete($id)
    {
        $image = HomepageImage::findOrFail($id);

        if ($image->image) {
            Storage::disk('public')->delete($image->image);
        }

        $image->update(['image'=>null]);

        return back()->with('success','Image deleted');
    }
}