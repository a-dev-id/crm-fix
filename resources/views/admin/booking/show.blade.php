@section('title', 'Booking detail')
@section('booking_active', 'active')
@push('js')
<script>
    ClassicEditor
    .create(document.querySelector('#campaign-benefit-show'), {toolbar: [],})
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
    .create(document.querySelector('#remarks-show'), {toolbar: [],})
    .then(editor => {
        editor.enableReadOnlyMode("editor");
        console.log(editor);
    })
    .catch(error => {
        console.error(error);
    });
</script>
@endpush
<x-app-layout>
    <header class="page-header page-header-dark bg-dark pb-10">
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
                        <a href="{{route('booking.index')}}" class="btn btn-danger text-uppercase fw-bold shadow-lg"><i class="fa-solid fa-arrow-left me-1"></i> Back</a>
                        {{-- <button class="btn btn-success text-uppercase fw-bold shadow-lg" type="submit" form="formCreate"><i class="fa-solid fa-floppy-disk me-1"></i> Update</button> --}}
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-xl px-4 mt-n10">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-6">
                        <div class="card mb-4">
                            <div class="card-header">Booking detail</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="booking-number" class="form-label">Booking number</label>
                                            <input class="form-control" id="booking-number" type="number" name="booking_number" value="{{$detail->booking_number}}" disabled />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="arrival" class="form-label">Arrival</label>
                                            <input class="form-control" id="arrival" type="date" name="arrival" value="{{$detail->arrival}}" disabled />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="departure" class="form-label">Departure</label>
                                            <input class="form-control" id="departure" type="date" name="departure" value="{{$detail->departure}}" disabled />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="adult">Adult</label>
                                            <input class="form-control" id="adult" type="number" name="adult" value="{{$detail->adult}}" disabled />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="child">Child</label>
                                            <input class="form-control" id="child" type="number" name="child" value="{{$detail->child}}" disabled />
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="villa-id" class="form-label">Room category</label>
                                    <select class="form-control" id="villa-id" name="villa_id" disabled>
                                        <option>- Choose -</option>
                                        @foreach ($villas as $data)
                                        <option value="{{$data->id}}" @if($data->id == $detail->villa_id) selected @else @endif>{{$data->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="total-charge">Total charge</label>
                                    <input class="form-control" id="total-charge" type="number" name="total_charge" value="{{$detail->total_charge}}" disabled />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card mb-4">
                            <div class="card-header">Campaign</div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="campaign-name" class="form-label">Campaign name</label>
                                    <input class="form-control" id="campaign-name" type="text" name="campaign_name" value="{{$detail->campaign_name}}" disabled />
                                </div>
                                <div class="mb-3">
                                    <label for="campaign-benefit" class="form-label">Campaign benefit</label>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="overflow-auto" style="height: 100px">
                                                {!! $detail->campaign_benefit !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="remarks" class="form-label">Remarks</label>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="overflow-auto" style="height: 100px">
                                                {!! $detail->remarks !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row">
                    @foreach ($guests as $data)
                    <div class="col-6">
                        <div class="card mb-4">
                            <div class="card-header">Guest</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Title</label>
                                            <input class="form-control" id="title" type="text" name="title" value="{{$data->title}}" disabled />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="first_name" class="form-label">First name</label>
                                            <input class="form-control" id="first_name" type="text" name="first_name" value="{{$data->first_name}}" disabled />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="last_name" class="form-label">Last name</label>
                                            <input class="form-control" id="last_name" type="text" name="last_name" value="{{$data->last_name}}" disabled />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input class="form-control" id="email" type="text" name="email" value="{{$data->email}}" disabled />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Phone</label>
                                            <input class="form-control" id="phone" type="text" name="phone" value="{{$data->phone}}" disabled />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="country" class="form-label">Country</label>
                                            <input class="form-control" id="country" type="text" name="country" value="{{$data->country}}" disabled />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="birth_date" class="form-label">Birth date</label>
                                            <input class="form-control" id="birth_date" type="text" name="birth_date" value="{{$data->birth_date}}" disabled />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="country" class="form-label">Passport</label>
                                            <div class="card">
                                                <div class="card-body">
                                                    <img src="{{asset('storage/'.$data->identity)}}" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</x-app-layout>