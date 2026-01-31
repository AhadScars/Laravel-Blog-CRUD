@include('layout.header')

@if ($message = Session::get('success'))
    <div class="container mt-3">
        <p class="text-success text-center small">
            {{ $message }}
        </p>
    </div>
@endif

<div class="container mt-5" style="max-width: 600px;">
    <h4 class="mb-4 text-center">Add Blog</h4>

    <form method="POST" action="/blog/store" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label small text-muted">Title</label>
            <input
                type="text"
                name="title"
                class="form-control border-0 border-bottom rounded-0"
                value="{{ old('title') }}"
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
            >{{ old('description') }}</textarea>
        </div>

        <div class="mb-4">
            <label class="form-label small text-muted">Image</label>
            <input
                type="file"
                name="image"
                class="form-control border-0 rounded-0"
            >
        </div>

        <button type="submit" class="btn btn-dark w-100">
            Publish
        </button>
    </form>
</div>
