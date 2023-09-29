@section('title')
Thank you | {{ config('app.name') }}
@endsection
@section('navigation')
<a class="navbar-brand text-white" href="{{url('/')}}"><i class="fa-solid fa-house ms-3"></i></a>
@endsection
<x-guest-layout>
    <div class="container px-4">
        <div class="row mt-5">
            <div class="col-12 mt-3 text-center">
                <h4 class="text-success mb-3">Complete <i class="fa-regular fa-circle-check ms-1"></i></h4>
                <h1 class="text-success mb-3">Thank you!</h1>
                <p>We have received your data. Can't wait to see you at the resort!</p>
            </div>
        </div>
    </div>
</x-guest-layout>