@include('layout.header')

<div class="container mt-5">

    <div class="d-flex justify-content-end mb-3">
        <a href="blog/create" class="btn btn-primary">Add Blog</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Blog Content</th>
                <th>Image</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($blogs as $blog)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <a href="/blog/{{ $blog->id }}" class="text-decoration-none text-dark">
                            {{ $blog->title }}
                        </a>
                    </td>
                    <td>{{ $blog->description }}</td>
                    <td>
                        <img src="{{ asset('images/' . $blog->image) }}" width="80">
                    </td>

                </tr>
            @endforeach
        </tbody>

    </table>
    {{ $blogs->links() }}
</div>

</body>

</html>