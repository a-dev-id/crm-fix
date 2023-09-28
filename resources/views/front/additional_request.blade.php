@section('title')
Special Request | {{ config('app.name') }}
@endsection
@section('navigation')
<a class="navbar-brand text-dark disabled" href="{{url('/')}}" role="button" aria-disabled="true"><i class="fa-solid fa-house ms-3"></i></a>
@endsection
@push('css')
<style>
    .nav-link {
        color: var(--bs-green);
    }

</style>
@endpush
<x-guest-layout>
    <div class="container px-4 mb-5">
        <div class="row mt-5 justify-content-center">
            <h2 class="text-center mb-3">Special Request</h2>
            <div class="col-12 col-md-6 mt-4">
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


            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-list-item-tab" data-bs-toggle="tab" data-bs-target="#nav-list-item" type="button" role="tab" aria-controls="nav-list-item" aria-selected="true">Special Request</button>
                    <button class="nav-link" id="nav-my-request-tab" data-bs-toggle="tab" data-bs-target="#nav-my-request" type="button" role="tab" aria-controls="nav-my-request" aria-selected="false">My Request</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-list-item" role="tabpanel" aria-labelledby="nav-list-item-tab" tabindex="0">
                    <div class="row my-5 justify-content-center">
                        @foreach ($experiences as $data)

                        <div class="col-12 col-md-4 mb-4">
                            <div class="card">
                                <div class="ratio ratio-16x9">
                                    <img src="{{asset('storage/'.$data->image)}}" class="w-100 object-fit-cover object-position-center card-img-top">
                                </div>
                                <div class="card-body">
                                    <div class="card-text">
                                        <h4>{{$data->title}}</h4>
                                        <div class="mt-3" style="font-size:12px !important" class="mb-3">{!! $data->description !!}</div>
                                        <p class="fw-bold p-0 m-0"><i>{{$data->price}}</i></p>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="button" class="btn btn-success float-end">Cancel<i class="fa-solid fa-arrow-right ms-2"></i></button>
                                </div>
                            </div>
                        </div>

                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-my-request" role="tabpanel" aria-labelledby="nav-my-request-tab" tabindex="0">
                    <div class="row my-5 justify-content-center">
                        @foreach ($experiences as $data)

                        @foreach ($data->Bookings as $subdata)
                        <div class="col-12 col-md-4 mb-4">
                            <div class="card">
                                <div class="ratio ratio-16x9">
                                    <img src="{{asset('storage/'.$subdata->Experiences->image)}}" class="w-100 object-fit-cover object-position-center card-img-top">
                                </div>
                                <div class="card-body">
                                    <div class="card-text">
                                        <h4>{{$subdata->Experiences->title}}</h4>
                                        <div class="mt-3" style="font-size:12px !important" class="mb-3">{!! $subdata->Experiences->description !!}</div>
                                        <p class="fw-bold p-0 m-0"><i>{{$subdata->Experiences->price}}</i></p>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="button" class="btn btn-success float-end">Cancel<i class="fa-solid fa-arrow-right ms-2"></i></button>
                                </div>
                            </div>
                        </div>
                        @endforeach


                        @endforeach
                    </div>
                </div>
            </div>


            <div class="row mt-5 justify-content-center">
                <div class="col-12 col-md-3">
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-success py-3 fw-bold">SUBMIT REQUEST<i class="fa-regular fa-floppy-disk ms-2"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>