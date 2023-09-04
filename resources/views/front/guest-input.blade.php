<x-guest-layout>
    <div class="container px-4 mb-5">
        <div class="row mt-5">
            <div class="col-12 mt-3">
                <h2 class="text-center mb-4">Room Detail</h2>
                <div class="card mb-5">
                    <img src="{{asset('storage/'.$result->villa->image)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <div class="card-text">
                            <h4>{{$result->villa->title}}</h4>
                            <p style="font-size:12px">{{$result->villa->description}}</p>
                        </div>
                    </div>
                </div>
                <h2 class="text-center mb-4">Guest Detail</h2>
                <div class="accordion" id="accordionExample">
                    @php $number=1; $kolapse=1; $kolapse1=1; $kolapse2=1; @endphp
                    @for ($i = 0; $i < $total_guest; $i++) <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $kolapse++ }}" aria-expanded="false" aria-controls="collapse{{ $kolapse1++ }}">
                                Guest #{{ $number++ }}
                            </button>
                        </h2>
                        <div id="collapse{{ $kolapse2++ }}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                        </div>
                </div>
                @endfor
                <div class="mt-5">
                    <button type="submit" class="btn btn-success" style="width: 100%">CHHECK IN</button>
                </div>

            </div>
        </div>
    </div>
</x-guest-layout>