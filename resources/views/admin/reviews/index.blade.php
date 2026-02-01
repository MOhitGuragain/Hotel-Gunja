<h2>Guest Reviews</h2>

@if(session('success'))
    <div style="color: green; margin-bottom: 15px; font-weight: bold;">
        {{ session('success') }}
    </div>
@endif

<table border="1" cellpadding="10" cellspacing="0" style="width: 100%; border-collapse: collapse;">
    <thead>
        <tr style="background-color: #f2f2f2; text-align: left;">
            <th>ID</th>
            <th>Guest</th>
            <th>Location</th>
            <th>Rating</th>
            <th>Review</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($reviews as $review)
            <tr>
                <td>{{ $review->id }}</td>
                <td>{{ $review->name }}</td>
                <td>{{ $review->location ?? '—' }}</td>
                <td>{{ number_format($review->rating, 1) }} ★</td>
                <td style="max-width: 300px; word-wrap: break-word;">{{ $review->comment }}</td>
                <td>
                    @if($review->status === 'approved')
                        <span style="color: green; font-weight: bold;">Approved</span>
                    @elseif($review->status === 'pending')
                        <span style="color: orange; font-weight: bold;">Pending</span>
                    @else
                        <span style="color: red; font-weight: bold;">Rejected</span>
                    @endif
                </td>
                <td>
                    @if($review->status === 'pending')
                        <form action="{{ route('admin.reviews.approve', $review->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" style="background: green; color: white; padding: 5px 10px; border: none; margin-right: 3px;">
                                Approve
                            </button>
                        </form>

                        <form action="{{ route('admin.reviews.reject', $review->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" style="background: red; color: white; padding: 5px 10px; border: none; margin-right: 3px;">
                                Reject
                            </button>
                        </form>
                    @endif

                    <form action="{{ route('admin.reviews.destroy', $review->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background: gray; color: white; padding: 5px 10px; border: none;">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" style="text-align:center; padding: 10px;">No reviews found.</td>
            </tr>
        @endforelse
    </tbody>
</table>

<div style="margin-top: 20px;">
    {{ $reviews->links('pagination::tailwind') }}
</div>
