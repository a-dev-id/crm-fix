@section('navigation')
<a class="navbar-brand text-white" href="{{url('/')}}"><i class="fa-solid fa-house ms-3"></i></a>
@endsection
@push('js')
<script>
    setTimeout(() => {
            const box = document.getElementById('alert');
            box.style.display = 'none';
        }, 3000);
</script>
@endpush
<x-guest-layout>
    <div class="container px-4">
        <div class="row mt-5 justify-content-center">
            @if (session('message'))
            <div class="col-12 mt-3">
                <div class="alert alert-danger" role="alert" id="alert">
                    {!! session('message') !!}
                </div>
            </div>
            @endif

            <div class="col-12 col-md-6 mt-3">
                <h2 class="text-center">Enter Reservation Details</h2>
                <form class="mt-4" action="{{route('check-in.store')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="booking_number" class="form-label">Reservation number</label>
                        <input type="number" class="form-control" id="booking_number" name="booking_number" placeholder="123456" value="{{$result->booking_number ?? ''}}" @if(empty($result->booking_number)) @else disabled @endif>
                    </div>
                    <div class="mb-3">
                        <label for="full_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Doe" value="{{$result->guest->last_name ?? ''}}" @if(empty($result->last_name)) @else disabled @endif>
                    </div>
                    <div class="mb-3">
                        <label for="arrival" class="form-label">Check-in date</label>
                        <input type="date" class="form-control" id="arrival" name="arrival" value="{{$result->arrival ?? ''}}" @if(empty($result->arrival)) @else disabled @endif>
                    </div>
                    <div class="mt-5">
                        <button type="submit" class="btn btn-success py-3" style="width: 100%">NEXT <i class="fa-solid fa-arrow-right ms-2"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>