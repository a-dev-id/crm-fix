@section('navigation')
<div>&nbsp;</div>
@endsection
<x-guest-layout>
    <div class="container px-4 mb-5">
        <div class="row mt-5 justify-content-center">
            <h2 class="text-center mb-3">Special Request</h2>
            <div class="col-6 mt-4">
                <div class="text-center mb-4" style="font-size:14px !important">
                    <span>Guest name</span><br>
                    <span class="fw-bold">{{$check_booking_number->guest->title.' '.$check_booking_number->guest->first_name.' '.$check_booking_number->guest->last_name}}</span>
                </div>
                <div class="d-flex justify-content-between text-center mb-4 py-2" style="font-size:12px !important">
                    <div class="pe-2 ps-lg-4">
                        Booking number<br>
                        <span class="fw-bold">{{$check_booking_number->booking_number}}</span>
                    </div>
                    <div class="border border-top-0 border-bottom-0 px-3 px-md-5">
                        Arrival<br>
                        <span class="fw-bold">{{date('M d, Y', strtotime($check_booking_number->arrival));}}</span>
                    </div>
                    <div class="ps-2 pe-lg-4">
                        Departure<br>
                        <span class="fw-bold">{{date('M d, Y', strtotime($check_booking_number->departure));}}</span>
                    </div>
                </div>
            </div>
            <div class="row my-5 justify-content-center">
                @foreach ($experiences as $data)
                <div class="col-12 col-md-4 mb-4">
                    <div class="card">
                        <div class="ratio ratio-16x9">
                            <img src="{{asset('storage/'.$data->image)}}" alt="Special Offer - Jungle Spa Getaway Day-Pass" class="w-100 object-fit-cover object-position-center card-img-top">
                        </div>
                        <div class="card-body">
                            <div class="card-text">
                                <h4>{{$data->title}}</h4>
                                <div class="mt-3" style="font-size:12px !important" class="mb-3">{!! $data->description !!}</div>
                                <p class="fw-bold p-0 m-0"><i>{{$data->price}}</i></p>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="button" class="btn btn-success float-end">Request <i class="fa-solid fa-arrow-right ms-2"></i></button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row mt-5 justify-content-center">
                <div class="col-6">
                    <button type="submit" class="btn btn-success py-3 fw-bold" style="width: 100%">SUBMIT REQUEST<i class="fa-regular fa-floppy-disk ms-2"></i></button>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>

{{--
<div class="position-relative">
    <div class="ratio ratio-1x1">
        <img src="https://hanginggardensofbali.com/storage/tBeD5W5n6XzEKd7z6DemI2KSPCWTVO-metaZ2NrekhUSExtNkJBekNONk5WSlRLT3Z5WnN4d1N0LW1ldGFWMlZpYzJsMFpTMHhPVEl3ZURFd09EQXRMUzFLZFc1bmJHVXRVM0JoTFVkbGRHRjNZWGt0TWpBeU15NXFjR2M9LS53ZWJw-.webp" alt="Special Offer - Jungle Spa Getaway Day-Pass" class="w-100 object-fit-cover object-position-center">
    </div>
    <div class="offers-element-overlay">
        <div class="offers-element-overlay-content">
            <p>Embrace total well-being by taking time out to rejuvenate and then experience one of the best cascading pools in the world!</p>
            <a href="https://hanginggardensofbali.com/offers" class="btn btn-outline-light text-uppercase py-3 px-4 fw-bold rounded-0" tabindex="-1">Explore</a>
        </div>
    </div>
</div> --}}