@include('layout.header')

@if ($message = Session::get('success'))
    <div class="container mt-3">
        <p class="text-success text-center small">
            {{ $message }}
        </p>
    </div>
@endif

<div class="container mt-5" style="max-width: 420px;">
    <h4 class="text-center mb-4">Register</h4>

    <form action="/auth/register" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label small text-muted">Name</label>
            <input
                type="text"
                name="name"
                class="form-control border-0 border-bottom rounded-0"
                value="{{ old('name') }}"
                required
            >
            @error('name')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label small text-muted">Email</label>
            <input
                type="email"
                name="email"
                class="form-control border-0 border-bottom rounded-0"
                value="{{ old('email') }}"
                required
            >
            @error('email')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label class="form-label small text-muted">Password</label>
            <input
                type="password"
                name="password"
                class="form-control border-0 border-bottom rounded-0"
                required
            >
            @error('password')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label class="form-label small text-muted">Description</label>
            <input
                type="text"
                name="description"
                class="form-control border-0 border-bottom rounded-0"
                required
            >
            @error('description')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label class="form-label small text-muted">Profile Photo</label>
            <input
                type="file"
                name="profile_image"
                class="form-control border-0 rounded-0"
            >
        </div>
        @error('profile_image')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror


        <button type="submit" class="btn btn-dark w-100 mb-3">
            Register
        </button>

        <div class="text-center">
            <a
                href="/auth/login"
                class="text-muted small text-decoration-none"
            >
                Already have an account? Login
            </a>
        </div>
    </form>
</div>
