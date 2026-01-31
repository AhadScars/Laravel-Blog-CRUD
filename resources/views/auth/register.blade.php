@include('layout.header')

@if ($message = Session::get('success'))
    <div class="container mt-3">
        <div class="alert alert-success">
            {{ $message }}
        </div>
    </div>
@endif

<div class="container mt-3">
    <h2 class="text-center">Register</h2>
</div>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <div class="card p-4">

                <form action="/auth/register" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input 
                            type="text" 
                            name="name" 
                            class="form-control" 
                            value="{{ old('name') }}" 
                            required
                        >
                    </div>

                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input 
                            type="email" 
                            name="email" 
                            class="form-control" 
                            value="{{ old('email') }}" 
                            required
                        >
                    </div>

                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input 
                            type="password" 
                            name="password" 
                            class="form-control" 
                            required
                        >
                    </div>

                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">
                            Register
                        </button>

                        <a href="/auth/login" class="btn btn-secondary">
                            Login
                        </a>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
