@include('layout.header')

@if ($message = Session::get('success'))
    <div class="container mt-3">
        <div class="alert alert-success">
            {{ $message }}
        </div>
    </div>
@endif


<div class="container mt-3">
    <h2 class="text-center">Add Blog</h2>
</div>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="card p-4">

                <form method="POST" action="/blog/store" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" rows="5" class="form-control">{{ old('description') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>
            </div>
        </div>
    </div>
</div>

