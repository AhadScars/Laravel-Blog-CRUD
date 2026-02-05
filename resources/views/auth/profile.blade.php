@include('layout.header')

<div class="container mt-5" style="max-width: 480px;">

    <h4 class="text-center mb-4">
        Profile
    </h4>

    <div class="text-center mb-3">
        <div class="text-muted small">Welcome</div>
        <div class="fw-semibold fs-5">
            {{ auth()->user()->name }}
        </div>
    </div>

    <div class="text-center text-muted">
        {{ auth()->user()->email }}
    </div>

    <div class="text-center text-muted">
        {{ auth()->user()->description }}
    </div>

    <div class="text-center mt-3">
        @if(auth()->user()->profile_image)
            <img 
                src="{{ asset('images/' . auth()->user()->profile_image) }}" 
                alt="Profile Image"
                class="img-fluid rounded-circle"
                width="150"
            >
        @endif
    </div>
</div>
