@section('title', 'Bookings')
@section('booking_active', 'active')
<x-app-layout>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
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
                        <a href="{{route('booking.create')}}" class="btn btn-success text-uppercase fw-bold shadow-lg"><i class="fa-solid fa-circle-plus me-1"></i> add new</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-xl px-4 mt-n10">

        @if (session('message'))
        <div class="row auto-close">
            <div class="col-12">
                <div class="alert alert-success" role="alert">
                    <i class="fa-solid fa-circle-check me-1"></i> {{ session('message') }}
                </div>
            </div>
        </div>
        @endif

        <div class="card mb-4">
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Booking number</th>
                            <th>Guest name</th>
                            <th>Country</th>
                            <th>Arrival</th>
                            <th>Departure</th>
                            <th>Room name</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $data)
                        <tr>
                            <td>{{$data->booking_number}}</td>
                            <td>{{$data->guest->title." ".$data->guest->first_name." ".$data->guest->last_name}}</td>
                            <td>{{$data->guest->country}}</td>
                            <td>{{$data->arrival}}</td>
                            <td>{{$data->departure}}</td>
                            <td>{{$data->villa->title}}</td>
                            <td>
                                @if ($data->confirmation_letter_status == '0')
                                <div class="badge bg-warning rounded-pill"><i class="fa-solid fa-clock"></i> On progress</div>
                                @else
                                <div class="badge bg-success rounded-pill"><i class="fa-solid fa-circle-check"></i> Success</div>
                                @endif
                            </td>
                            <td>
                                <button type="button" class="btn btn-datatable btn-icon btn-transparent-dark me-2" data-bs-toggle="modal" data-bs-target="#viewModal{{$data->id}}"><i class="fa-solid fa-eye text-success"></i></button>
                                <a href="{{route('booking.edit',[$data->id])}}" class="btn btn-datatable btn-icon btn-transparent-dark me-2"><i class="fa-solid fa-pen-to-square text-warning"></i></a>
                                <button type="button" class="btn btn-datatable btn-icon btn-transparent-dark" data-bs-toggle="modal" data-bs-target="#deleteModal{{$data->id}}"><i class="fa-regular fa-trash-can text-danger"></i></button>

                                {{-- Delete Modal --}}
                                <div class="modal fade" id="deleteModal{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModal{{$data->id}}Title" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger">
                                                <h5 class="modal-title text-white" id="deleteModal{{$data->id}}Title"><i class="fa-solid fa-circle-exclamation me-1"></i> Warning</h5>
                                                <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure want to delete this item?
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-outline-dark" type="button" data-bs-dismiss="modal">Close</button>
                                                <form method="POST" action="{{ route('booking.destroy', [$data->id]) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit"><i class="fa-regular fa-trash-can me-1"></i> Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- View Modal --}}
                                <div class="modal fade" id="viewModal{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="viewModal{{$data->id}}Title" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-success">
                                                <h5 class="modal-title text-white" id="viewModal{{$data->id}}Title"><i class="fa-solid fa-eye text-white me-1"></i> {{$data->guest->title." ".$data->guest->first_name." ".$data->guest->last_name}}</h5>
                                                <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        {{-- general card --}}
                                                        <div class="card mb-4">
                                                            <div class="card-header">General</div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="mb-3">
                                                                            <label for="guest-name" class="form-label">Guest name</label>
                                                                            <input class="form-control" id="guest-name" type="text" name="guest_name" value="{{$data->guest->title." ".$data->guest->first_name." ".$data->guest->last_name}}" disabled />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="mb-3">
                                                                            <label for="booking-number" class="form-label">Booking number</label>
                                                                            <input class="form-control" id="booking-number" type="number" name="booking_number" value="{{$data->booking_number}}" disabled />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="mb-3">
                                                                            <label for="arrival" class="form-label">Arrival</label>
                                                                            <input class="form-control" id="arrival" type="date" name="arrival" value="{{$data->arrival}}" disabled />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="mb-3">
                                                                            <label for="departure" class="form-label">Departure</label>
                                                                            <input class="form-control" id="departure" type="date" name="departure" value="{{$data->departure}}" disabled />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="mb-3">
                                                                            <label for="adult">Adult</label>
                                                                            <input class="form-control" id="adult" type="number" name="adult" value="{{$data->adult}}" disabled />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="mb-3">
                                                                            <label for="child">Child</label>
                                                                            <input class="form-control" id="child" type="number" name="child" value="{{$data->child}}" disabled />
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
                                                                    <label for="room-category">Room category</label>
                                                                    <input class="form-control" id="room-category" type="text" name="room_category" value="{{$data->villa->title}}" disabled />
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="total-charge">Total charge</label>
                                                                    <input class="form-control" id="total-charge" type="number" name="total_charge" value="{{$data->total_charge}}" disabled />
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
                                                                    <input class="form-control" id="campaign-name" type="text" name="campaign_name" value="{{$data->campaign_name}}" disabled />
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="campaign-benefit" class="form-label">Campaign benefit</label>
                                                                    <textarea class="form-control" id="campaign-benefit{{$data->id}}" name="campaign_benefit" rows="5" disabled>{{$data->campaign_benefit}}</textarea>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="remarks" class="form-label">Remarks</label>
                                                                    <textarea class="form-control" id="remarks{{$data->id}}" name="remarks" rows="5" disabled>{{$data->remarks}}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-outline-dark" type="button" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                    @push('js')
                                    <script>
                                        ClassicEditor
                                        .create(document.querySelector('#campaign-benefit{{$data->id}}'), {toolbar: [],})
                                        .then(editor => {
                                            editor.enableReadOnlyMode("editor");
                                            console.log(editor);
                                        })
                                        .catch(error => {
                                            console.error(error);
                                        });
                                    </script>
                                    <script>
                                        ClassicEditor
                                        .create(document.querySelector('#remarks{{$data->id}}'), {toolbar: [],})
                                        .then(editor => {
                                            editor.enableReadOnlyMode("editor");
                                            console.log(editor);
                                        })
                                        .catch(error => {
                                            console.error(error);
                                        });
                                    </script>
                                    <script>
                                        $('#campaign-benefit{{$data->id}}').ckeditorGet().setReadOnly();
                                        $('#remarks{{$data->id}}').ckeditorGet().setReadOnly();
                                    </script>
                                    @endpush
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>