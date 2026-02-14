@include('layout.header')

@if ($message = Session::get('success'))
    <div class="container mt-3">
        <p class="text-success text-center">
            {{ $message }}
        </p>
    </div>
@elseif ($errors->any())
    <div class="container mt-3">
        <ul class="text-danger text-center">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div class="container mt-5" style="max-width: 420px;">
    <h4 class="text-center mb-4">Login</h4>

    <form action="/auth/login" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label small text-muted">Email</label>
            <input
                type="email"
                name="email"
                class="form-control border-0 border-bottom rounded-0"
                value="{{ old('email') }}"
                required
            >
            {{ $errors->first('email') }}
        </div>

        <div class="mb-4">
            <label class="form-label small text-muted">Password</label>
            <input
                type="password"
                name="password"
                class="form-control border-0 border-bottom rounded-0"
                required
            >
            {{ $errors->first('password') }}
        </div>

        <button type="submit" class="btn btn-dark w-100 mb-3">
            Login
        </button>

        <div class="text-center">
            <a href="/auth/register" class="text-muted small text-decoration-none">
                Don’t have an account? Register
            </a>
        </div>
    </form>
</div>
