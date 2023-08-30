@section('title', 'Edit booking')
@section('booking_active', 'active')
<x-app-layout>
    <header class="page-header page-header-dark bg-warning pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i class="fa-solid fa-bell-concierge"></i></div>
                            @yield('title')
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mt-4">
                        <a href="{{route('booking.index')}}" class="btn btn-danger text-uppercase fw-bold shadow-lg"><i class="fa-regular fa-circle-xmark me-1"></i> Cancel</a>
                        <button class="btn btn-success text-uppercase fw-bold shadow-lg" type="submit" form="formCreate"><i class="fa-solid fa-floppy-disk me-1"></i> Update</button>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-xl px-4 mt-n10">
        <form method="POST" action="{{ route('booking.update', $detail->id) }}" class="row" id="formCreate">
            @method('PUT')
            @csrf
            <div class="col-lg-6">
                {{-- general card --}}
                <div class="card mb-4">
                    <div class="card-header">General</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="guest_id" class="form-label">Guest name</label>
                                <div class="input-group mb-3">
                                    <select class="selectpicker guest_id form-control" name="guest_id" data-live-search="true">
                                        @foreach ($guests as $data)
                                        <option value="{{$data->id}}" @if($data->id == $detail->guest_id) selected @else @endif>{{$data->title." ".$data->full_name}}</option>
                                        @endforeach
                                    </select>
                                    <button class="input-group-text btn btn-success" id="add-user" type="button" data-bs-toggle="modal" data-bs-target="#addGuest"><i class="fa-solid fa-user-plus"></i></button>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="booking-number" class="form-label">Booking number</label>
                                    <input class="form-control" id="booking-number" type="number" name="booking_number" value="{{$detail->booking_number}}" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="arrival" class="form-label">Arrival</label>
                                    <input class="form-control" id="arrival" type="date" name="arrival" value="{{$detail->arrival}}" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="departure" class="form-label">Departure</label>
                                    <input class="form-control" id="departure" type="date" name="departure" value="{{$detail->departure}}" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="adult">Adult</label>
                                    <input class="form-control" id="adult" type="number" name="adult" value="{{$detail->adult}}" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="child">Child</label>
                                    <input class="form-control" id="child" type="number" name="child" value="{{$detail->child}}" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- room card --}}
                <div class="card mb-4">
                    <div class="card-header">Room</div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="villa-id" class="form-label">Room category</label>
                            <select class="form-control" id="villa-id" name="villa_id">
                                <option>- Choose -</option>
                                @foreach ($villas as $data)
                                <option value="{{$data->id}}" @if($data->id == $detail->villa_id) selected @else @endif>{{$data->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="total-charge">Total charge</label>
                            <input class="form-control" id="total-charge" type="number" name="total_charge" value="{{$detail->total_charge}}" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                {{-- campaign card --}}
                <div class="card mb-4">
                    <div class="card-header">Campaign</div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="campaign-name" class="form-label">Campaign name</label>
                            <input class="form-control" id="campaign-name" type="text" name="campaign_name" value="{{$detail->campaign_name}}" />
                        </div>
                        <div class="mb-3">
                            <label for="campaign-benefit" class="form-label">Campaign benefit</label>
                            <textarea class="form-control" id="campaign-benefit" name="campaign_benefit" rows="5">{{$detail->campaign_benefit}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="remarks" class="form-label">Remarks</label>
                            <textarea class="form-control" id="remarks" name="remarks" rows="5">{{$detail->remarks}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addGuest" tabindex="-1" role="dialog" aria-labelledby="addGuestTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addGuestTitle">New Guest</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('guest.store') }}" id="addGuestForm">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-lg-6">
                                <label for="title" class="form-label">Title</label>
                                <select class="form-select" id="title" name="title">
                                    <option selected>- Choose -</option>
                                    @foreach ($titles as $data)
                                    <option value="{{$data->value}}">{{$data->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="full-name" class="form-label">Full name</label>
                                <input class="form-control" id="full-name" type="text" name="full_name" />
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="email" class="form-label">Email</label>
                                <input class="form-control" id="email" type="email" name="email" />
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="phone" class="form-label">Phone</label>
                                <input class="form-control" id="phone" type="text" name="phone" />
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="country" class="form-label">Country</label>
                                <select class="form-select" id="country" name="country">
                                    <option selected>- Choose -</option>
                                    @foreach ($countries as $data)
                                    <option value="{{$data->value}}">{{$data->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="birth-date" class="form-label">Birth date</label>
                                <input class="form-control" id="birth-date" type="date" name="birth_date" />
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-danger" type="button" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark me-1"></i> Cancel
                    </button>
                    <button class="btn btn-success" type="submit" form="addGuestForm">
                        <i class="fa-regular fa-floppy-disk me-1"></i> Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>