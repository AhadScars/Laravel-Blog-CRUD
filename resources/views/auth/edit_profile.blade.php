@include('layout.header')

<div class="container mt-5 d-flex justify-content-center">
    <div class="card shadow-sm" style="max-width: 480px; width: 100%;">
        <div class="card-body">
            <h4 class="mb-4 fw-semibold">Edit Profile</h4>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ url('/auth/edit_profile') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control"
                           value="{{ old('name', $user->name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control"
                           value="{{ old('email', $user->email) }}" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" class="form-control" rows="3" required>{{ old('description', $user->description) }}</textarea>
                </div>

                <div class="mb-3">
                    @if($user->profile_image)
                        <div class="mb-2">
                            <img src="{{ asset('images/' . $user->profile_image) }}" alt="Current"
                                 class="rounded-circle border" width="80" height="80" style="object-fit: cover;">
                            <span class="text-muted small ms-2">Current photo</span>
                        </div>
                    @endif
                    <label for="profile_image" class="form-label">Profile image (optional)</label>
                    <input type="file" name="profile_image" id="profile_image" class="form-control"
                           accept="image/jpeg,image/png,image/jpg">
                    <div class="form-text">Leave empty to keep current. JPG/PNG, max 2MB.</div>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                    <a href="{{ url('/profile') }}" class="btn btn-outline-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
