<x-guest-layout>
    <div class="container px-4">
        <div class="row mt-5">
            <div class="col-12 mt-3">
                <h2 class="text-center">Enter Reservation Details</h2>
                <form class="mt-4" action="{{route('tamu.edit', $result->id)}}">
                    @csrf
                    <div class="mb-3">
                        <label for="booking_number" class="form-label">Reservation number</label>
                        <input type="number" class="form-control" id="booking_number" placeholder="ex: 123456" value="{{$result->booking_number ?? ''}}" @if(empty($result->booking_number)) @else disabled @endif>
                    </div>
                    <div class="mb-3">
                        <label for="full_name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="full_name" placeholder="ex: 123456" value="{{$result->guest->full_name ?? ''}}" @if(empty($result->booking_number)) @else disabled @endif>
                    </div>
                    <div class="mb-3">
                        <label for="arrival" class="form-label">Check-in date</label>
                        <input type="date" class="form-control" id="arrival" value="{{$result->arrival ?? ''}}" @if(empty($result->booking_number)) @else disabled @endif>
                    </div>
                    <div class="mt-5">
                        <button type="submit" class="btn btn-success" style="width: 100%">NEXT</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>