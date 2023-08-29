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
                            <td>{{$data->guest->title." ".$data->guest->full_name}}</td>
                            <td>{{$data->guest->country}}</td>
                            <td>{{$data->arrival}}</td>
                            <td>{{$data->departure}}</td>
                            <td>{{$data->villa->title}}</td>
                            <td>
                                @if ($data->status == '0')
                                <div class="badge bg-warning rounded-pill"><i class="fa-solid fa-clock"></i> On progress</div>
                                @else
                                <div class="badge bg-success rounded-pill"><i class="fa-solid fa-circle-check"></i> Success</div>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('booking.edit',[$data->id])}}" class="btn btn-datatable btn-icon btn-transparent-dark me-2"><i class="fa-solid fa-pen-to-square text-warning"></i></a>
                                <button class="btn btn-datatable btn-icon btn-transparent-dark"><i class="fa-regular fa-trash-can text-danger"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>