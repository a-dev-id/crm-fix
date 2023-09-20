@section('navigation')
<a class="navbar-brand text-white" href="{{url()->previous()}}"><i class="fa-solid fa-arrow-left me-2"></i> Back</a>
@endsection
<x-guest-layout>
    <div class="container px-4 mb-5">
        <div class="row mt-5 justify-content-center">
            <div class="col-12 col-md-6">
                <h2 class="text-center mb-4">Guest Detail</h2>
                <form method="POST" action="{{ route('guest-detail.update', $guest->id) }}" id="editGuestForm" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row justify-content-center">
                        <div class="mb-3 col-12 col-md-12">
                            <label for="title" class="form-label fw-bold">Title</label>
                            <select class="form-select" id="title" name="title">
                                <option>- Choose -</option>
                                @foreach ($titles as $data)
                                <option value="{{$data->value}}" @if($data->title == $guest->title) selected @else @endif>{{$data->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-6">
                            <label for="first-name" class="form-label fw-bold">First name</label>
                            <input class="form-control" id="first-name" type="text" name="first_name" value="{{$guest->first_name}}" />
                        </div>
                        <div class="mb-3 col-6">
                            <label for="last-name" class="form-label fw-bold">Last name</label>
                            <input class="form-control" id="last-name" type="text" name="last_name" value="{{$guest->last_name}}" />
                        </div>
                        <div class="mb-3 col-6">
                            <label for="email" class="form-label fw-bold">Email</label>
                            <input class="form-control" id="email" type="email" name="email" value="{{$guest->email}}" />
                        </div>
                        <div class="mb-3 col-6">
                            <label for="phone" class="form-label fw-bold">Phone</label>
                            <input class="form-control" id="phone" type="text" name="phone" value="{{$guest->phone}}" />
                        </div>
                        <div class="mb-3 col-6">
                            <label for="country" class="form-label fw-bold">Country</label>
                            <select class="form-select" id="country" name="country">
                                <option selected>- Choose -</option>
                                @foreach ($countries as $data)
                                <option value="{{$data->value}}" @if($data->value == $guest->country) selected @else @endif>{{$data->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-5 col-6">
                            <label for="birth-date" class="form-label fw-bold">Birth date</label>
                            <input class="form-control" id="birth-date" type="date" name="birth_date" value="{{$guest->birth_date}}" />
                        </div>
                        <div class="mb-3 col-6">
                            <div class="card">
                                <img src="{{asset('storage/'.$guest->identity)}}" class="card-img-top">
                                <div class="card-footer fw-bold">
                                    Passport
                                </div>
                            </div>
                        </div>
                        {{-- <div class="mb-3 col-lg-6">
                            <div class="card">
                                <div class="card-header fw-bold">
                                    Credit Card
                                </div>
                                <img src="{{asset('storage/'.$guest->credit_card)}}" class="card-img-top">
                            </div>
                        </div> --}}
                        <div class="mt-4">
                            <button type="submit" class="btn btn-success py-3 fw-bold" style="width: 100%">SAVE <i class="fa-regular fa-floppy-disk ms-2"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>