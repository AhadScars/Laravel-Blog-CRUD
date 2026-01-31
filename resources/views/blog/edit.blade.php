@include('layout.header')

@if ($message = Session::get('success'))
    <div class="container mt-3">
        <div class="alert alert-success">
            {{ $message }}
        </div>
    </div>
@endif

@if ($errors->any())
    <div class="container mt-3">
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

<div class="container mt-3">
    <h2 class="text-center">Edit Blog</h2>
</div>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="card p-4">
                <form method="POST" action="{{ url('blog/update/' . $blog->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title', $blog->title) }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" rows="5" class="form-control">{{ old('description', $blog->description) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Current Image</label>
                        @if($blog->image)
                            <div class="mb-2">
                                <img src="{{ asset('images/' . $blog->image) }}" alt="Current" class="img-fluid" width="120">
                            </div>
                        @endif
                        <label class="form-label text-muted">Replace image (optional)</label>
                        <input type="file" name="image" class="form-control" accept="image/*">
                    </div>

                    <button type="submit" class="btn btn-primary">Update Blog</button>
                    <a href="{{ url('/blog/' . $blog->id) }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
