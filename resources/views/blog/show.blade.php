@include('layout.header')

<div class="container mt-5" style="max-width: 720px;">

    <div class="mb-4 text-muted small">
        By - {{ $blog->user ? $blog->user->name : 'Unknown' }}
        {{ $blog->created_at->format('F j, Y') }}
    </div>

    <h2 class="fw-semibold">
        {{ $blog->title }}
    </h2>

    <h2 class="text-muted small mb-4">
        Tags : {{ $blog->tags }}
    </h2>

    <p class="fw-semibold mb-4">
        {{ $blog->description }}
    </p>

    @if($blog->image)
        <div class="my-4">
            <img src="{{ asset('images/' . $blog->image) }}" class="img-fluid rounded">
        </div>
    @endif


    @if(auth()->check() && $blog->user_id === auth()->id())
        <div class="d-flex gap-3 mt-5">
            <a href="/blog/edit/{{ $blog->id }}" class="btn btn-outline-secondary btn-sm">
                Edit
            </a>

            <form action="/blog/delete/{{ $blog->id }}" method="POST" onsubmit="return confirm('Delete this blog?')">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-link text-danger btn-sm p-0">
                    Delete
                </button>
            </form>
        </div>
    @endif

</div>