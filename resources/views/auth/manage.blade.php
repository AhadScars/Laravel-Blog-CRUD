@include('layout.header')

<div class="container mt-5">
    <h4 class="mb-4">Manage</h4>
    <p class="text-muted">Manage your account and content here.</p>

    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Manage Blogs</h1>
        </div>
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Updated_At</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($blogs as $blog)
                        <tr>
                        <td>
                            <a href="/blog/{{ $blog->id }}" class="fw-semibold text-dark text-decoration-none">
                                {{ $blog->title }}
                            </a>
                        </td>
                        <td class="text-muted">
                            {{ Str::limit($blog->description, 40) }}
                        </td>
                        <td>
                            <img src="{{ asset('images/' . $blog->image) }}" width="50" height="50" class="rounded-circle border">
                        </td>
                        
                            <td>{{ $blog->updated_at->format('d-m-Y H:i:s') }}</td>
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
        </div>
    </div>
</div>


</div>
