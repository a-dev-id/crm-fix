<x-guest-layout>
    <div class="container px-4 mb-5">
        <div class="row mt-5">
            <div class="col-12">
                <h2 class="text-center mb-4">Guest Detail</h2>
                <form method="POST" action="{{ route('guest-detail.update', $guest->id) }}" id="editGuestForm">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-lg-12">
                            <label for="title" class="form-label">Title</label>
                            <select class="form-select" id="title" name="title">
                                <option>- Choose -</option>
                                @foreach ($titles as $data)
                                <option value="{{$data->value}}" @if($data->title == $guest->title) selected @else @endif>{{$data->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="first-name" class="form-label">First name</label>
                            <input class="form-control" id="first-name" type="text" name="first_name" value="{{$guest->first_name}}" />
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="last-name" class="form-label">Last name</label>
                            <input class="form-control" id="last-name" type="text" name="last_name" value="{{$guest->last_name}}" />
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="email" class="form-label">Email</label>
                            <input class="form-control" id="email" type="email" name="email" value="{{$guest->email}}" />
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="phone" class="form-label">Phone</label>
                            <input class="form-control" id="phone" type="text" name="phone" value="{{$guest->phone}}" />
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="country" class="form-label">Country</label>
                            <select class="form-select" id="country" name="country">
                                <option selected>- Choose -</option>
                                @foreach ($countries as $data)
                                <option value="{{$data->value}}" @if($data->value == $guest->country) selected @else @endif>{{$data->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="birth-date" class="form-label">Birth date</label>
                            <input class="form-control" id="birth-date" type="date" name="birth_date" value="{{$guest->birth_date}}" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>