@section('title', 'New booking')
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
                        {{-- <a href="" class="btn btn-success text-uppercase fw-bold shadow-lg"><i class="fa-solid fa-circle-plus me-1"></i> add new</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-xl px-4 mt-n10">
        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-header">General</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('booking.store') }}">
                            @csrf

                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="guest-id" class="form-label">Guest name</label>
                                    <div class="input-group mb-3">
                                        <select type="text" class="form-control form-control-solid" id="guest-id" name="guest_id" aria-describedby="add-user">
                                            <option>- Choose -</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                        <button class="input-group-text btn btn-success" id="add-user" type="button" data-bs-toggle="modal" data-bs-target="#addUser"><i class="fa-solid fa-user-plus"></i></button>
                                    </div>
                                </div>
                                <div class="col-lg-6"></div>
                            </div>


                            <div class="mb-3">
                                <label for="booking-number">Booking number</label>
                                <input class="form-control form-control-solid" id="booking-number" type="text" name="booking_number" />
                            </div>

                            <div class="mb-3">
                                <label for="arrival">Arrival</label>
                                <input class="form-control form-control-solid" id="arrival" type="date" name="arrival" />
                            </div>

                            <div class="mb-3">
                                <label for="departure">Departure</label>
                                <input class="form-control form-control-solid" id="departure" type="date" name="departure" />
                            </div>

                            <div class="mb-3">
                                <label for="villa-id" class="form-label">Room category</label>
                                <select type="text" class="form-control form-control-solid" id="villa-id" name="villa_id">
                                    <option>- Choose -</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="adult">Adult</label>
                                <input class="form-control form-control-solid" id="adult" type="number" name="adult" />
                            </div>

                            <div class="mb-3">
                                <label for="child">Child</label>
                                <input class="form-control form-control-solid" id="child" type="number" name="child" />
                            </div>

                            <div class="mb-3">
                                <label for="total-charge">Total charge</label>
                                <input class="form-control form-control-solid" id="total-charge" type="number" name="total_charge" />
                            </div>

                            <div class="mb-0">
                                <label for="exampleFormControlTextarea1">Example textarea</label>
                                <textarea class="form-control form-control-solid" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                        </form>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4"></div>
        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="addUserTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserTitle">New Guest</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('booking.store') }}">
                        @csrf
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-danger" type="button" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark me-1"></i> Cancel
                    </button>
                    <button class="btn btn-success" type="submit">
                        <i class="fa-regular fa-floppy-disk me-1"></i> Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>