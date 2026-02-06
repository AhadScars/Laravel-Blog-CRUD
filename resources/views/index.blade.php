@include('layout.header')

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="mb-0">Blogs</h5>

        
    </div>

    <table class="table align-middle">
        <thead>
            <tr>
                <th class="text-muted small">#</th>
                <th class="text-muted small">Title</th>
                <th class="text-muted small">Content</th>
                <th class="text-muted small">Tags</th>
                <th class="text-muted small">Image</th>
                <th class="text-muted small">Action</th>
            </tr>
        </thead>

        <tbody>
    @forelse ($blogs as $blog)
        <tr>
            <td class="text-muted">{{ $loop->iteration }}</td>

            <td>
                <a href="/blog/{{ $blog->id }}" class="text-decoration-none fw-medium text-dark">
                    {{ $blog->title }}
                </a>
            </td>

            <td class="text-muted">
                {{ Str::limit($blog->description, limit: 50) }}
            </td>

             <td class="text-muted">
                {{ Str::limit($blog->tags, 80) }}
            </td>

            <td>
                <img src="{{ asset('images/' . $blog->image) }}" width="70" class="img-fluid">
            </td>
            <td>
            @if(auth()->check() && $blog->user_id === auth()->id())
            <div class="d-flex gap-3 mt-2">
        <a
            href="/blog/edit/{{ $blog->id }}"
            class="btn btn-outline-secondary btn-sm"
        >
            Edit
        </a>

        <form
            action="/blog/delete/{{ $blog->id }}"
            method="POST"
            onsubmit="return confirm('Delete this blog?')"
        >
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-link text-danger btn-sm p-0">
                Delete
            </button>
        </form>
    </div>
            @endif
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="4" class="text-center text-muted py-4">
                No blog found.
            </td>
        </tr>
    @endforelse
</tbody>
    </table>

    <div class="mt-4">
        {{ $blogs->links() }}
    </div>
</div>

</body>
</html>
