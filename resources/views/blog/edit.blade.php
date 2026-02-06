@include('layout.header')

@if ($message = Session::get('success'))
    <div class="container mt-3">
        <p class="text-success text-center small">
            {{ $message }}
        </p>
    </div>
@endif

@if ($errors->any())
    <div class="container mt-3">
        <ul class="text-danger small mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container mt-5" style="max-width: 600px;">
    <h4 class="mb-4 text-center">Edit Blog</h4>

    <form
        method="POST"
        action="{{ url('blog/update/' . $blog->id) }}"
        enctype="multipart/form-data"
    >
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label small text-muted">Title</label>
            <input
                type="text"
                name="title"
                class="form-control border-0 border-bottom rounded-0"
                value="{{ old('title', $blog->title) }}"
                required
            >
        </div>

        <div class="mb-4">
            <label class="form-label small text-muted">Description</label>
            <textarea
                name="description"
                rows="5"
                class="form-control border-0 border-bottom rounded-0"
                required
            >{{ old('description', $blog->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label small text-muted">Tags</label>
            <input
                type="text"
                name="tags"
                class="form-control border-0 border-bottom rounded-0"
                value="{{ old('tags',$blog->tags) }}"
                required
            >
        </div>

        @if ($blog->image)
            <div class="mb-4">
                <label class="form-label small text-muted">Current image</label>
                <div>
                    <img
                        src="{{ asset('images/' . $blog->image) }}"
                        width="120"
                        class="img-fluid"
                    >
                </div>
            </div>
        @endif

        <div class="mb-4">
            <label class="form-label small text-muted">Replace image (optional)</label>
            <input
                type="file"
                name="image"
                class="form-control border-0 rounded-0"
                accept="image/*"
            >
        </div>
        <div class="d-flex gap-3">
            <button type="submit" class="btn btn-dark">
                Update
            </button>

            <a
                href="{{ url('/blog/' . $blog->id) }}"
                class="btn btn-outline-secondary"
            >
                Cancel
            </a>
        </div>
       
    </form>
</div>

</body>
</html>
