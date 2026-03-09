<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GalleryImage;

class AdminGalleryController extends Controller
{
    // Show images
    public function index()
    {
        $images = GalleryImage::latest()->get();
        return view('admin.gallery.index', compact('images'));
    }

    // Upload form
    public function create()
    {
        return view('admin.gallery.create');
    }

    // Store image
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image',
            'category' => 'required'
        ]);

        $path = $request->file('image')->store('gallery', 'public');

        GalleryImage::create([
            'image_path' => $path,
            'category' => $request->category,
            'is_approved' => false,
            'show_on_homepage' => false
        ]);

        return redirect()->back()->with('success', 'Uploaded!');
    }

    // Approve image
    public function approve($id)
    {
        $image = GalleryImage::findOrFail($id);
        $image->is_approved = true;
        $image->save();

        return redirect()->back()->with('success', 'Image Approved');
    }

    // Show on homepage
    public function homepage($id)
    {
        $image = GalleryImage::findOrFail($id);
        $image->show_on_homepage = true;
        $image->save();

        return back();
    }

    // Navbar Gallery Page
public function galleryPage()
{
    // Guest images (approved only)
    $guestImages = GalleryImage::where('category', 'guest')
        ->where('is_approved', 1)
        ->latest()
        ->take(200)
        ->get();

    // Celebrity images
    $celebrityImages = GalleryImage::where('category', 'celebrities')
        ->where('is_approved', 1)
        ->latest()
        ->get();

    // Exterior admin images
    $exteriorImages = GalleryImage::where('category', 'exterior')
        ->where('is_approved', 1)
        ->latest()
        ->get();

    // Interior admin images
    $interiorImages = GalleryImage::where('category', 'interior')
        ->where('is_approved', 1)
        ->latest()
        ->get();

    return view('gallery', compact(
        'guestImages',
        'celebrityImages',
        'exteriorImages',
        'interiorImages'
    ));
}

}


