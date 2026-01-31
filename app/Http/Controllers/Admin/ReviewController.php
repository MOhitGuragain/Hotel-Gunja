<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
         // Paginate 10 reviews per page, newest first
        $reviews = Review::withTrashed()
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.reviews.index', compact('reviews'));
    }

    public function create()
    {
        return view('admin.reviews.create');
    }

    public function store(Request $request)
    {
        Review::create([
            'name' => $request->name,
            'location' => $request->location,
            'rating' => $request->rating,
            'comment' => $request->comment,
            'status' => 'pending',
        ]);

        return redirect()
            ->route('admin.reviews.index')
            ->with('success', 'Review added and awaiting approval.');
    }

    public function approve($id)
    {
        Review::where('id', $id)->update(['status' => 'approved']);
        return back()->with('success', 'Review approved successfully.');
    }

    public function reject($id)
    {
        Review::where('id', $id)->update(['status' => 'rejected']);
        return back()->with('success', 'Review rejected successfully.');
    }

    //soft delete instead of hard delete for reviews
    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete(); // soft delete
        return back()->with('success', 'Review deleted successfully.');
    }

    
    // Add a restore feature for reviews if needed
    public function restore($id)
    {
        $review = Review::onlyTrashed()->findOrFail($id);
        $review->restore();
        return back()->with('success', 'Review restored successfully.');
    }

}
