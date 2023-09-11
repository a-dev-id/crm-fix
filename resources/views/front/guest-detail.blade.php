<x-guest-layout>
    <div class="container px-4 mb-5">
        <div class="row mt-5">
            <div class="col-12">
                <h2 class="text-center mb-4">Room Detail</h2>
                <div class="card mb-5">
                    <img src="{{asset('storage/'.$booking->villa->image)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <div class="card-text">
                            <h4>{{$booking->villa->title}}</h4>
                            <div style="font-size:12px !important">{!! $booking->villa->description !!}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <h2 class="text-center mb-4">Guest Detail</h2>
                <div class="d-grid gap-2">
                    @foreach ($guests as $data)
                    <a href="{{route('guest-detail.edit', $data->id)}}" class="btn btn-success btn-lg">
                        {{$data->title." ".$data->first_name." ".$data->last_name}}
                        @if (empty($data->identity))
                        <i class="fa-solid fa-arrow-right ms-2"></i>
                        @elseif(empty($data->credit_card))
                        <i class="fa-solid fa-arrow-right ms-2"></i>
                        @else
                        <i class="fa-regular fa-circle-check ms-2"></i>
                        @endif
                    </a>
                    @endforeach
                    @for ($i = 0; $i < $total_guest; $i++) <a href="#" class="btn btn-outline-success btn-lg">Add Guest <i class="fa-solid fa-user-plus ms-2"></i></a> @endfor
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>