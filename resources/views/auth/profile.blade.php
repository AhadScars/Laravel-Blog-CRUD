@include('layout.header')

<div class="container mt-5 d-flex justify-content-center">
    <div class="card shadow-sm" style="max-width: 420px; width: 100%;">
        <div class="card-body text-center">

            <h4 class="mb-4 fw-semibold">Profile</h4>

            {{-- Profile Image --}}
            <div class="mb-3">
                @if(auth()->user()->profile_image)
                    <img 
                        src="{{ asset('images/' . auth()->user()->profile_image) }}" 
                        alt="Profile Image"
                        class="rounded-circle border"
                        width="130"
                        height="130"
                        style="object-fit: cover;"
                    >
                @else
                    <div 
                        class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center mx-auto"
                        style="width:130px;height:130px;font-size:48px;"
                    >
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                @endif
            </div>

            {{-- Name --}}
            <div class="fw-semibold fs-5">
                {{ auth()->user()->name }}
            </div>

            {{-- Email --}}
            <div class="text-muted small mb-2">
                {{ auth()->user()->email }}
            </div>

            {{-- Description --}}
            @if(auth()->user()->description)
                <p class="text-muted fst-italic mt-3">
                    {{ auth()->user()->description }}
                </p>
            @endif

        </div>
    </div>
</div>
