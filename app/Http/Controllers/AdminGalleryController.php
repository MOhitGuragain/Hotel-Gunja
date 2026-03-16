<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GalleryImage;
use Illuminate\Support\Facades\Storage;

class AdminGalleryController extends Controller
{
    // Show images
    public function index()
    {
        $images = GalleryImage::latest()->paginate(20);
        return view('admin.gallery.index', compact('images'));
    }

    // Upload form
    public function create()
    {
        return view('admin.gallery.create');
    }

    // Store multiple images
    public function store(Request $request)
    {
        $request->validate([
            'image.*' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'category' => 'required'
        ]);

        if($request->hasFile('image')){

            foreach($request->file('image') as $file){

                $path = $file->store('gallery','public');

                GalleryImage::create([
                    'image_path' => $path,
                    'category' => $request->category,
                    'is_approved' => false,
                    'show_on_homepage' => false
                ]);
            }
        }

        return back()->with('success','Images uploaded successfully!');
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

        return back()->with('success','Image added to homepage');
    }

    // Hide from homepage
    public function hideHomepage($id)
    {
        $image = GalleryImage::findOrFail($id);
        $image->show_on_homepage = false;
        $image->save();

        return back()->with('success','Image removed from homepage');
    }

    // Delete image
    public function destroy($id)
    {
        $image = GalleryImage::findOrFail($id);

        // Delete file from storage
        if (Storage::disk('public')->exists($image->image_path)) {
            Storage::disk('public')->delete($image->image_path);
        }

        // Delete database record
        $image->delete();

        return redirect()->back()->with('success', 'Image deleted successfully!');
    }

    // Navbar Gallery Page
    public function galleryPage()
    {
        // Guest images
        $guestImages = GalleryImage::where('category', 'guest')
            ->where('is_approved', 1)
            ->latest()
            ->take(200)
            ->get();

        // Celebrity images
        $celebrityImages = GalleryImage::where('category', 'celebrity')
            ->where('is_approved', 1)
            ->latest()
            ->get();

        // Exterior images
        $exteriorImages = GalleryImage::where('category', 'exterior')
            ->where('is_approved', 1)
            ->latest()
            ->get();

        // Interior images
        $interiorImages = GalleryImage::where('category', 'interior')
            ->where('is_approved', 1)
            ->latest()
            ->get();

        // Event hall images
$eventImages = GalleryImage::where('category', 'hall')
    ->where('is_approved', 1)
    ->latest()
    ->get();

// Lounge images
$loungeImages = GalleryImage::where('category', 'lounges')
    ->where('is_approved', 1)
    ->latest()
    ->get();

// Food images
$foodImages = GalleryImage::where('category', 'food & drinks')
    ->where('is_approved', 1)
    ->latest()
    ->get();

// Restaurant images
$restaurantImages = GalleryImage::where('category', 'restaurant')
    ->where('is_approved', 1)
    ->latest()
    ->get();

// Pool images
$poolImages = GalleryImage::where('category', 'swimming pool')
    ->where('is_approved', 1)
    ->latest()
    ->get();

// Parking images
$parkingImages = GalleryImage::where('category', 'parking')
    ->where('is_approved', 1)
    ->latest()
    ->get();

        return view('gallery', compact(
            'guestImages',
            'celebrityImages',
            'exteriorImages',
            'interiorImages',
            'eventImages',
            'loungeImages',
            'foodImages',
            'restaurantImages',
            'poolImages',
            'parkingImages'
        ));
    }
}