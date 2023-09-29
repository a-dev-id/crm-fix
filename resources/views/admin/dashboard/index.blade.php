@section('title', 'Dashboard')
@section('dashboard_active', 'active')
<x-app-layout>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i class="fa-solid fa-chart-line"></i></div>
                            @yield('title')
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container-xl px-4 mt-n10">
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <div class="card-header text-dark">Today's Online Check-in</div>
                    <div class="card-body">
                        <div class="accordion">

                            @foreach ($check_in_today as $data)
                            <div class="accordion-item">
                                <div class="accordion-header">
                                    <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#checkin{{$data->id}}" aria-expanded="false" aria-controls="checkin{{$data->id}}">
                                        {{$data->guest->title.' '.$data->guest->first_name.' '.$data->guest->last_name}}
                                    </button>
                                </div>
                                <div id="checkin{{$data->id}}" class="accordion-collapse collapse">
                                    <div class="accordion-body p-0">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item text-xs">Booking Number: <strong>{{$data->booking_number}}</strong></li>
                                            <li class="list-group-item text-xs">Arrival: <strong>{{date('M d, Y', strtotime($data->arrival))}}</strong></li>
                                            <li class="list-group-item text-xs">Departure: <strong>{{date('M d, Y', strtotime($data->departure))}}</strong></li>
                                            <li class="list-group-item text-xs">Adult: <strong>{{$data->adult}} person(s)</strong></li>
                                            <li class="list-group-item text-xs">Child: <strong>@if ($data->child == null) 0 @else {{$data->child}} @endif person(s)</strong></li>
                                            <li class="list-group-item text-xs"><a href="{{route('booking.show',$data->id)}}" class="btn btn-outline-success fw-bold"><i class="fa-regular fa-eye me-2"></i>View Detail</a></li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <div class="card-header text-white bg-success">Today's Arrival</div>
                    <div class="card-body">
                        <div class="accordion">

                            @foreach ($arrival_today as $data)
                            <div class="accordion-item">
                                <div class="accordion-header">
                                    <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#arrival{{$data->id}}" aria-expanded="false" aria-controls="arrival{{$data->id}}">
                                        {{$data->guest->title.' '.$data->guest->first_name.' '.$data->guest->last_name}}
                                    </button>
                                </div>
                                <div id="arrival{{$data->id}}" class="accordion-collapse collapse">
                                    <div class="accordion-body p-0">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item text-xs">Booking Number: <strong>{{$data->booking_number}}</strong></li>
                                            <li class="list-group-item text-xs">Arrival: <strong>{{date('M d, Y', strtotime($data->arrival))}}</strong></li>
                                            <li class="list-group-item text-xs">Departure: <strong>{{date('M d, Y', strtotime($data->departure))}}</strong></li>
                                            <li class="list-group-item text-xs">Adult: <strong>{{$data->adult}} person(s)</strong></li>
                                            <li class="list-group-item text-xs">Child: <strong>@if ($data->child == null) 0 @else {{$data->child}} @endif person(s)</strong></li>
                                            <li class="list-group-item text-xs"><a href="{{route('booking.show',$data->id)}}" class="btn btn-outline-success fw-bold"><i class="fa-regular fa-eye me-2"></i>View Detail</a></li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <div class="card-header text-white bg-primary">Today's Departure</div>
                    <div class="card-body">
                        <div class="accordion">

                            @foreach ($departure_today as $data)
                            <div class="accordion-item">
                                <div class="accordion-header">
                                    <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#departure{{$data->id}}" aria-expanded="false" aria-controls="departure{{$data->id}}">
                                        {{$data->guest->title.' '.$data->guest->first_name.' '.$data->guest->last_name}}
                                    </button>
                                </div>
                                <div id="departure{{$data->id}}" class="accordion-collapse collapse">
                                    <div class="accordion-body p-0">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item text-xs">Booking Number: <strong>{{$data->booking_number}}</strong></li>
                                            <li class="list-group-item text-xs">Arrival: <strong>{{date('M d, Y', strtotime($data->arrival))}}</strong></li>
                                            <li class="list-group-item text-xs">Departure: <strong>{{date('M d, Y', strtotime($data->departure))}}</strong></li>
                                            <li class="list-group-item text-xs">Adult: <strong>{{$data->adult}} person(s)</strong></li>
                                            <li class="list-group-item text-xs">Child: <strong>@if ($data->child == null) 0 @else {{$data->child}} @endif person(s)</strong></li>
                                            <li class="list-group-item text-xs"><a href="{{route('booking.show',$data->id)}}" class="btn btn-outline-success fw-bold"><i class="fa-regular fa-eye me-2"></i>View Detail</a></li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>