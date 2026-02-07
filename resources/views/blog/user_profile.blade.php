@include('layout.header')

<div class="container mt-5">
    <div class="row">
        
        <div class="col-lg-4 col-md-5 mb-5">
            <div class="text-center">
                <img src="{{ $user->profile_image ? asset('images/' . $user->profile_image) : asset('images/default-avatar.png') }}" 
                     alt="Profile Image"
                     class="rounded-circle border mb-3" width="150" height="150" style="object-fit: cover;">
                
                <h3 class="fw-bold">{{ $user->name }}</h3>
                <p class="text-muted mb-2">{{ $user->email }}</p>

                @if($user->description)
                    <p class="fst-italic text-secondary px-3">{{ $user->description }}</p>
                @endif

                <div class="mt-3">
                    <span class="badge bg-primary">{{ $user->blogs()->count() }} Blogs</span>
                </div>
            </div>
        </div>

       
        <div class="col-lg-8 col-md-7">
            <h4 class="mb-4 fw-semibold">Articles by {{ $user->name }}</h4>

            @if($blogs->isEmpty())
                <p class="text-muted">This user has not posted any blogs yet.</p>
            @else
                <div class="row g-4">
                    @foreach($blogs as $blog)
                        <div class="col-12">
                            <div class="card shadow-sm border-0">
                                <div class="row g-0 align-items-center">
                                    @if($blog->image)
                                        <div class="col-md-4">
                                            <img src="{{ asset('images/' . $blog->image) }}" 
                                                 class="img-fluid rounded" width="100" height="100" 
                                                 alt="{{ $blog->title }}">
                                        </div>
                                    @endif
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <a href="/blog/{{ $blog->id }}" class="text-dark text-decoration-none">
                                                <h5 class="card-title fw-bold">{{ $blog->title }}</h5>
                                            </a>
                                            <p class="card-text text-truncate">{{ $blog->description }}</p>
                                            <p class="card-text"><small class="text-muted">{{ $blog->created_at->format('F j, Y') }}</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="mt-4">
                {{ $blogs->links() }}
            </div>
        </div>
    </div>
</div>
