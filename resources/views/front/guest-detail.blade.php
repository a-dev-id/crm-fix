@section('title')
Check-in | {{ config('app.name') }}
@endsection
@section('navigation')
<a class="navbar-brand text-white" href="{{url()->previous()}}"><i class="fa-solid fa-arrow-left me-2"></i> Back</a>
@endsection
<x-guest-layout>
    <div class="container px-4 mb-5">
        <div class="row mt-5 justify-content-center">
            <div class="col-12 col-md-6">
                <h2 class="text-center mb-4">Room Detail</h2>
                <div class="card mb-5">
                    {{-- <img src="{{asset('storage/'.$booking->villa->image)}}" class="card-img-top" alt="..."> --}}
                    <img src="{{asset($booking->villa->image)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <div class="card-text">
                            <div class="d-flex justify-content-between text-center mb-4 py-2" style="font-size:12px !important">
                                <div class="pe-2 ps-lg-4">
                                    Booking number<br>
                                    <span class="fw-bold">{{$booking->booking_number}}</span>
                                </div>
                                <div class="border border-top-0 border-bottom-0 px-3 px-md-5">
                                    Arrival<br>
                                    <span class="fw-bold">{{date('M d, Y', strtotime($booking->arrival));}}</span>
                                </div>
                                <div class="ps-2 pe-lg-4">
                                    Departure<br>
                                    <span class="fw-bold">{{date('M d, Y', strtotime($booking->departure));}}</span>
                                </div>
                            </div>
                            <h4>{{$booking->villa->title}}</h4>
                            <div style="font-size:12px !important" class="mb-3">{!! $booking->villa->description !!}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5 justify-content-center">
            <div class="col-12 col-md-6">
                <h2 class="text-center mb-3">Guest Detail</h2>
                <div class="px-2 text-center">
                    <small style="font-size:12px">Please verify the details of each guest(s) below to proceed with check-in</small>
                </div>
                <div class="d-grid gap-3 mt-4 mb-5">
                    @foreach ($guests as $data)

                    @if (empty($data->identity))
                    <a href="{{route('upload-passport.edit', $data->id)}}" class="btn btn-success btn-lg py-3">
                        {{$data->title." ".$data->first_name." ".$data->last_name}}
                        <i class="fa-solid fa-arrow-right ms-2"></i>
                    </a>
                    {{-- @elseif(empty($data->credit_card))
                    <a href="{{route('upload-passport.edit', $data->id)}}" class="btn btn-success btn-lg py-3">
                        {{$data->title." ".$data->first_name." ".$data->last_name}}
                        <i class="fa-solid fa-arrow-right ms-2"></i>
                    </a> --}}
                    @else
                    <a href="{{route('upload-passport.edit', $data->id)}}" class="btn btn-outline-success btn-lg py-3 @if($booking->check_in_status == '1') disabled" role="button" aria-disabled="true" @else " @endif>
                    {{-- <a href=" {{route('upload-passport.edit', $data->id)}}" class="btn btn-outline-success btn-lg py-3"> --}}
                        {{$data->title." ".$data->first_name." ".$data->last_name}}
                        <i class=" fa-regular fa-circle-check ms-2"></i>
                    </a>
                    @endif
                    @endforeach
                    @for ($i = 0; $i < $total_guest; $i++) <a href="{{route('upload-passport.show',$booking->booking_number)}}" class="btn btn-outline-success btn-lg py-3">Add Guest <i class="fa-solid fa-user-plus ms-2"></i></a> @endfor
                </div>
                <div class="mt-5">

                    {{$check_in_status}}

                    @if ($total_guest == '0')
                    <form method="POST" action="{{ route('checkin.update', [$booking->id]) }}">
                        @method('PUT')
                        @csrf
                        <button type="submit" class="btn btn-success py-3 fw-bold" style="width: 100%" @if ($booking->check_in_status == '1') disabled @else @endif>CHECK IN <i class="fa-solid fa-arrow-right ms-2"></i></button>
                    </form>
                    @else
                    <button type="submit" class="btn btn-success py-3 fw-bold" style="width: 100%" disabled>CHECK IN <i class="fa-solid fa-arrow-right ms-2"></i></button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>