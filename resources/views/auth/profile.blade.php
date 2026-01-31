@include('layout.header')



<div class="container mt-3">
    <h2 class="text-center">Hello {{ auth()->user()->name }}</h2>
    <h2 class="text-center">Your Email is {{ auth()->user()->email }}</h2>

</div>