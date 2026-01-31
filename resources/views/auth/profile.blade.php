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

</div>
