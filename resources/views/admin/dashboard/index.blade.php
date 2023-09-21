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

                            <div class="accordion-item">
                                <div class="accordion-header">
                                    <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#target8137822" aria-expanded="false" aria-controls="target8137822">
                                        Mr. John Doe
                                    </button>
                                </div>
                                <div id="target8137822" class="accordion-collapse collapse">
                                    <div class="accordion-body p-0">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item text-xs">Booking Number: <strong>813782</strong></li>
                                            <li class="list-group-item text-xs">Arrival: <strong>21 Sept 2023</strong></li>
                                            <li class="list-group-item text-xs">Departure: <strong>23 Sept 2023</strong></li>
                                            <li class="list-group-item text-xs">Adult: <strong>2 person(s)</strong></li>
                                            <li class="list-group-item text-xs">Child: <strong>0 person(s)</strong></li>
                                            <li class="list-group-item text-xs"><a href="#" class="btn btn-outline-success fw-bold"><i class="fa-regular fa-eye me-2"></i>View Detail</a></li>
                                        </ul>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <div class="card-header text-white bg-success">Today's Arrival</div>
                    <div class="card-body">
                        <div class="accordion">

                            <div class="accordion-item">
                                <div class="accordion-header">
                                    <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#target813782" aria-expanded="false" aria-controls="target813782">
                                        Mr. John Doe
                                    </button>
                                </div>
                                <div id="target813782" class="accordion-collapse collapse">
                                    <div class="accordion-body p-0">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item text-xs">Booking Number: <strong>813782</strong></li>
                                            <li class="list-group-item text-xs">Arrival: <strong>21 Sept 2023</strong></li>
                                            <li class="list-group-item text-xs">Departure: <strong>23 Sept 2023</strong></li>
                                            <li class="list-group-item text-xs">Adult: <strong>2 person(s)</strong></li>
                                            <li class="list-group-item text-xs">Child: <strong>0 person(s)</strong></li>
                                            <li class="list-group-item text-xs"><a href="#" class="btn btn-outline-success fw-bold"><i class="fa-regular fa-eye me-2"></i>View Detail</a></li>
                                        </ul>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <div class="card-header text-white bg-primary">Today's Departure</div>
                    <div class="card-body">
                        <div class="accordion">

                            <div class="accordion-item">
                                <div class="accordion-header">
                                    <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#target8137821" aria-expanded="false" aria-controls="target8137821">
                                        Mr. John Doe
                                    </button>
                                </div>
                                <div id="target8137821" class="accordion-collapse collapse">
                                    <div class="accordion-body p-0">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item text-xs">Booking Number: <strong>813782</strong></li>
                                            <li class="list-group-item text-xs">Arrival: <strong>21 Sept 2023</strong></li>
                                            <li class="list-group-item text-xs">Departure: <strong>23 Sept 2023</strong></li>
                                            <li class="list-group-item text-xs">Adult: <strong>2 person(s)</strong></li>
                                            <li class="list-group-item text-xs">Child: <strong>0 person(s)</strong></li>
                                            <li class="list-group-item text-xs">Room: <strong>Panoramic Villa</strong></li>
                                            <li class="list-group-item text-xs"><a href="#" class="btn btn-outline-success fw-bold"><i class="fa-regular fa-eye me-2"></i>View Detail</a></li>
                                        </ul>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>