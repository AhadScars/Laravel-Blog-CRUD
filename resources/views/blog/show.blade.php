@include('layout.header')

<div class="container mt-5">
    <div class="card p-4">
        <h3>Title: {{ $blog->title }}</h3>
        <p class="mt-3">Description: {{ $blog->description }}</p>

        @if($blog->image)
            <img src="{{ asset('images/' . $blog->image) }}" class="img-fluid mt-3">
        @endif
    </div>

    <a href="/blog/edit/{{ $blog->id }}" class="btn btn-primary mt-3">Edit Blog</a>

    <form action="/blog/delete/{{ $blog->id }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger mt-3">Delete Blog</button>
    </form>

</div>

