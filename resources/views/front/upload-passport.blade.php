<x-guest-layout>
    <div class="container px-4 mb-5">
        <div class="row mt-5">
            <div class="col-12">
                <h2 class="text-center mb-5">Submit Passport image</h2>
                @if (empty($id))
                <form method="POST" action="{{ route('upload-passport.store') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{$booking_number}}" name="booking_number">
                    @else
                    <form method="POST" action="{{ route('upload-passport.update', $id) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        @endif

                        <div class="row">
                            <div class="mb-2">
                                <div class="card border-0">
                                    <img src="{{asset('images/visa.png')}}" class="card-img-top m-auto" style="width: 200px">
                                    <div class="card-body">
                                        <div class="card-text mt-3">
                                            Few pointers totake note:
                                            <ul>
                                                <li>Environtment is not dark or dimmed</li>
                                                <li>Text and/or image are visible and not cut-off</li>
                                                <li>Image is clear and not blured</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <input name="identity" type="file" class="form-control border border-success" required>
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="btn btn-success py-3 fw-bold" style="width: 100%">NEXT <i class="fa-solid fa-arrow-right ms-2"></i></button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</x-guest-layout>