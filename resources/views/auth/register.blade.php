@include('layout.header')

<div class="container mt-3">
    <h2 class="text-center">Register</h2>
</div>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <div class="card p-4">

                <form action="/register" method="POST">
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

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input 
                            type="password" 
                            name="password" 
                            class="form-control" 
                            required
                        >
                    </div>

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
