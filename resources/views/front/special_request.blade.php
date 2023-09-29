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

            {{-- item list --}}
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-list-item-tab" data-bs-toggle="tab" data-bs-target="#nav-list-item" type="button" role="tab" aria-controls="nav-list-item" aria-selected="true">Special Request</button>
                    <button class="nav-link" id="nav-my-request-tab" data-bs-toggle="tab" data-bs-target="#nav-my-request" type="button" role="tab" aria-controls="nav-my-request" aria-selected="false">My Request ({{$special_request_count}})</button>
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
                                        <div class="mt-3" style="font-size:12px !important" class="mb-3">{!!$data->description!!}</div>
                                        <p class="fw-bold p-0 m-0"><i>{{$data->price}}</i></p>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#requestModal{{$data->id}}">Request<i class="fa-solid fa-arrow-right ms-2"></i></button>
                                </div>
                            </div>
                        </div>

                        <!-- Request Modal -->
                        <div class="modal fade" id="requestModal{{$data->id}}" tabindex="-1" aria-labelledby="requestModal{{$data->id}}Label" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-warning">
                                        <h1 class="modal-title fs-5" id="requestModal{{$data->id}}Label"><i class="fa-solid fa-triangle-exclamation me-2"></i>Attention</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure want to request <span class="fw-bold">"{{$data->title}}"</span> ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel<i class="fa-solid fa-xmark ms-2"></i></button>
                                        <form method="POST" action="{{ route('special-request.store') }}">
                                            @csrf
                                            <input type="hidden" name="booking_number" value="{{$check_booking_number->booking_number}}">
                                            <input type="hidden" name="title" value="{{$data->title}}">
                                            <input type="hidden" name="description" value="{{$data->description}}">
                                            <input type="hidden" name="price" value="{{$data->price}}">
                                            <input type="hidden" name="note" value="{{$data->note}}">
                                            <input type="hidden" name="image" value="{{$data->image}}">
                                            <button type="submit" class="btn btn-success">Request<i class="fa-solid fa-arrow-right ms-2"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-my-request" role="tabpanel" aria-labelledby="nav-my-request-tab" tabindex="0">
                    <div class="row my-5 justify-content-center">

                        @foreach ($check_special_request as $data)
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
                                    @if ($data->status == '1')
                                    <button type="button" class="btn btn-warning float-end" disabled>On progress<i class="fa-solid fa-hourglass-half ms-2"></i></button>
                                    @else
                                    <button type="button" class="btn btn-danger float-end" data-bs-toggle="modal" data-bs-target="#deleteRequestModal{{$data->id}}">Remove<i class="fa-regular fa-trash-can ms-2"></i></button>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Remove Modal -->
                        <div class="modal fade" id="deleteRequestModal{{$data->id}}" tabindex="-1" aria-labelledby="deleteRequestModal{{$data->id}}Label" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-danger text-white">
                                        <h1 class="modal-title fs-5" id="deleteRequestModal{{$data->id}}Label"><i class="fa-solid fa-triangle-exclamation me-2"></i>Attention</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure want to remove the <span class="fw-bold">"{{$data->title}}"</span> request?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel<i class="fa-solid fa-xmark ms-2"></i></button>
                                        <form method="POST" action="{{ route('special-request.destroy', [$data->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-secondary" type="submit"><i class="fa-regular fa-trash-can me-1"></i> Remove</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
            {{-- end item list --}}

            <div class="row mt-2 justify-content-center">
                <div class="col-12 col-md-3">
                    <form class="d-grid gap-2" method="POST" action="{{ route('special-request.update', $check_booking_number->booking_number) }}">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-success py-3 fw-bold">SUBMIT REQUEST<i class="fa-regular fa-floppy-disk ms-2"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>