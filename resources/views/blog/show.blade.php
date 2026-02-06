@include('layout.header')



<div class="container mt-5" style="max-width: 720px;">

    
    <h2 class="fw-semibold mb-3">
        {{ $blog->title }}
    </h2>

    
    <div class="mb-4 text-muted small">
        By 
        <a href="/profile">
            {{ $blog->user ? $blog->user->name : 'Unknown' }}
        </a>
        • {{ $blog->created_at->format('F j, Y') }}
    </div>

   
    @if($blog->tags)
        <div class="mb-4">
            @foreach(explode(',', $blog->tags) as $tag)
                <span class="badge bg-secondary me-1">{{ trim($tag) }}</span>
            @endforeach
        </div>
    @endif

    
    <p class="fw-semibold mb-4">
        {{ $blog->description }}
    </p>

    
    @if($blog->image)
        <div class="my-4">
            <img src="{{ asset('images/' . $blog->image) }}" 
                 class="img-fluid rounded" 
                 alt="{{ $blog->title }}">
        </div>
    @endif

    
    @if(auth()->check() && $blog->user_id === auth()->id())
        <div class="d-flex gap-3 mt-5">
            <a href="{{ route('blog.edit', $blog->id) }}" class="btn btn-outline-secondary btn-sm">
                Edit
            </a>

            <form action="{{ route('blog.delete', $blog->id) }}" method="POST" onsubmit="return confirm('Delete this blog?')">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-link text-danger btn-sm p-0">
                    Delete
                </button>
            </form>
        </div>
    @endif

</div>