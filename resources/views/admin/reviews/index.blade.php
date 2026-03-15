@extends('admin.layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-6 py-10">

```
{{-- PAGE HEADER --}}
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-800">Guest Reviews</h1>
    <p class="text-gray-500 text-sm">Manage guest feedback and approvals</p>
</div>


{{-- SUCCESS MESSAGE --}}
@if(session('success'))
<div id="successToast"
    class="fixed top-6 right-6 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50">
    {{ session('success') }}
</div>

<script>
    setTimeout(function(){
        let toast=document.getElementById("successToast");
        if(toast){
            toast.style.opacity="0";
            toast.style.transition="0.5s";
            setTimeout(()=>toast.remove(),500);
        }
    },3000);
</script>
@endif


{{-- TABLE CARD --}}
<div class="bg-white shadow-xl rounded-xl overflow-hidden">

    <table class="w-full text-left">

        {{-- TABLE HEADER --}}
        <thead class="bg-gray-100 text-gray-600 text-sm uppercase">
            <tr>
                <th class="px-6 py-4">ID</th>
                <th class="px-6 py-4">Guest</th>
                <th class="px-6 py-4">Location</th>
                <th class="px-6 py-4">Rating</th>
                <th class="px-6 py-4">Review</th>
                <th class="px-6 py-4">Status</th>
                <th class="px-6 py-4 text-center">Actions</th>
            </tr>
        </thead>


        {{-- TABLE BODY --}}
        <tbody class="divide-y">

            @forelse($reviews as $review)

            <tr class="hover:bg-gray-50 transition">

                <td class="px-6 py-4 text-gray-700">
                    {{ $review->id }}
                </td>

                <td class="px-6 py-4 font-semibold text-gray-800">
                    {{ $review->name }}
                </td>

                <td class="px-6 py-4 text-gray-600">
                    {{ $review->location ?? '—' }}
                </td>

                <td class="px-6 py-4 text-yellow-500 font-semibold">
                    {{ number_format($review->rating,1) }} ★
                </td>

                <td class="px-6 py-4 max-w-xs text-gray-600">
                    {{ $review->comment }}
                </td>


                {{-- STATUS BADGE --}}
                <td class="px-6 py-4">

                    @if($review->status === 'approved')
                    <span class="bg-green-100 text-green-700 text-xs px-3 py-1 rounded-full font-semibold">
                        Approved
                    </span>

                    @elseif($review->status === 'pending')
                    <span class="bg-yellow-100 text-yellow-700 text-xs px-3 py-1 rounded-full font-semibold">
                        Pending
                    </span>

                    @else
                    <span class="bg-red-100 text-red-700 text-xs px-3 py-1 rounded-full font-semibold">
                        Rejected
                    </span>
                    @endif

                </td>


                {{-- ACTIONS --}}
                <td class="px-6 py-4 text-center">

                    <div class="flex flex-wrap gap-2 justify-center">

                        @if($review->status === 'pending')

                        <form action="{{ route('admin.reviews.approve',$review->id) }}" method="POST">
                            @csrf
                            <button
                                class="bg-green-500 hover:bg-green-600 text-white text-xs px-3 py-1 rounded">
                                Approve
                            </button>
                        </form>

                        <form action="{{ route('admin.reviews.reject',$review->id) }}" method="POST">
                            @csrf
                            <button
                                class="bg-red-500 hover:bg-red-600 text-white text-xs px-3 py-1 rounded">
                                Reject
                            </button>
                        </form>

                        @endif

                        <form action="{{ route('admin.reviews.destroy',$review->id) }}"
                              method="POST"
                              onsubmit="return confirm('Delete this review?')">

                            @csrf
                            @method('DELETE')

                            <button
                                class="bg-gray-600 hover:bg-gray-700 text-white text-xs px-3 py-1 rounded">
                                Delete
                            </button>

                        </form>

                    </div>

                </td>

            </tr>

            @empty

            <tr>
                <td colspan="7" class="text-center py-6 text-gray-500">
                    No reviews found.
                </td>
            </tr>

            @endforelse

        </tbody>

    </table>

</div>


{{-- PAGINATION --}}
<div class="mt-6">
    {{ $reviews->links('pagination::tailwind') }}
</div>
```

</div>

@endsection
