@include('layout.header')

<div class="container mt-5 d-flex justify-content-center">
    <div class="card shadow-sm" style="max-width: 420px; width: 100%;">
        <div class="card-body text-center">

            <h4 class="mb-4 fw-semibold">Profile</h4>


            <div class="mb-3">
                @if(auth()->user()->profile_image)
                    <img src="{{ asset('images/' . auth()->user()->profile_image) }}" alt="Profile Image"
                        class="rounded-circle border" width="130" height="130" style="object-fit: cover;">

                @endif
            </div>


            <div class="fw-semibold fs-5">
                {{ auth()->user()->name }}
            </div>


            <div class="text-muted small mb-2">
                {{ auth()->user()->email }}
            </div>


            <div>
                <p class="text-muted fst-italic mt-3">
                    {{ auth()->user()->description }}
                </p>
            </div>

            <div class="text-muted small mb-2">
                <b>Total Number Of Blogs is :</b>{{ auth()->user()->blogs()->count() }}
            </div>

        </div>
    </div>
</div>