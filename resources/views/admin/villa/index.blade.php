@section('title', 'Rooms')
@section('room_active', 'active')
<x-app-layout>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i class="fa-solid fa-users"></i></div>
                            @yield('title')
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mt-4">
                        <button type="button" class="btn btn-success text-uppercase fw-bold shadow-lg" data-bs-toggle="modal" data-bs-target="#addRoom"><i class="fa-solid fa-circle-plus me-1"></i> add new</button>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-xl px-4 mt-n10">

        @if (session('message'))
        <div class="row auto-close">
            <div class="col-12">
                <div class="alert alert-success" role="alert">
                    <i class="fa-solid fa-circle-check me-1"></i> {{ session('message') }}
                </div>
            </div>
        </div>
        @endif

        <div class="card mb-4">
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($villas as $data)
                        <tr>
                            <td><img src="{{asset('storage/'.$data->image)}}" style="width: 100px"></td>
                            <td>{{$data->title}}</td>
                            <td>
                                @if ($data->status == '1')
                                <div class="badge bg-success rounded-pill"><i class="fa-solid fa-circle-check"></i> Published</div>
                                @else
                                <div class="badge bg-dark rounded-pill"><i class="fa-solid fa-circle-pause"></i> Draft</div>
                                @endif
                            </td>
                            <td>
                                <button type="button" class="btn btn-datatable btn-icon btn-transparent-dark" data-bs-toggle="modal" data-bs-target="#editRoom{{$data->id}}"><i class="fa-solid fa-pen-to-square text-warning"></i></button>
                                <button type="button" class="btn btn-datatable btn-icon btn-transparent-dark" data-bs-toggle="modal" data-bs-target="#deleteModal{{$data->id}}"><i class="fa-regular fa-trash-can text-danger"></i></button>

                                {{-- Delete Modal --}}
                                <div class="modal fade" id="deleteModal{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModal{{$data->id}}Title" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger">
                                                <h5 class="modal-title text-white" id="deleteModal{{$data->id}}Title"><i class="fa-solid fa-circle-exclamation me-1"></i> Warning</h5>
                                                <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure want to delete this item?
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-outline-dark" type="button" data-bs-dismiss="modal">Close</button>
                                                <form method="POST" action="{{ route('room.destroy', [$data->id]) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit"><i class="fa-regular fa-trash-can me-1"></i> Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Edit Modal --}}
                                <div class="modal fade" id="editRoom{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="editRoom{{$data->id}}Title" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-warning">
                                                <h5 class="modal-title" id="editRoom{{$data->id}}Title">Edit Guest</h5>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{ route('room.update', [$data->id]) }}" id="editGuestForm{{$data->id}}" enctype="multipart/form-data">
                                                    @method('PUT')
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="title" class="form-label">Title</label>
                                                        <input class="form-control" id="title" type="text" name="title" value="{{$data->title}}" />
                                                    </div>
                                                    <label for="image" class="form-label">Image</label>
                                                    <div class="mb-3">
                                                        <input type="file" class="form-control" id="image" name="image">
                                                        <input type="hidden" name="old_image" value="{{$data->image}}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="image" class="form-label">Current mage</label><br>
                                                        <img src="{{asset('storage/'.$data->image)}}" style="width: 100px">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Description</label>
                                                        <input class="form-control" id="title" type="text" name="description" value="{{$data->description}}" />
                                                        {{-- <textarea class="form-control" name="description" rows="5">
                                                            {{$data->description}}
                                                        </textarea>
                                                    </div>
                                                    @push('js')
                                                    <script>
                                                        ClassicEditor
                                                        .create( document.querySelector( '#descriptionRoom{{$data->id}}' ) )
                                                        .catch( error => {
                                                            console.error( error );
                                                        } );
                                                    </script>
                                                    @endpush --}}
                                                    <div class="mb-3">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" role="switch" id="statusEdit" name="status" value="1" @if ($data->status == '1') checked @else @endif>
                                                            <label class="form-check-label" for="statusEdit">Publish</label>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-outline-danger" type="button" data-bs-dismiss="modal">
                                                    <i class="fa-solid fa-xmark me-1"></i> Cancel
                                                </button>
                                                <button class="btn btn-success" type="submit" form="editGuestForm{{$data->id}}">
                                                    <i class="fa-regular fa-floppy-disk me-1"></i> Update
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Create-->
    <div class="modal fade" id="addRoom" tabindex="-1" role="dialog" aria-labelledby="addRoomTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addRoomTitle">New Room</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('room.store') }}" id="addRoomForm" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input class="form-control" id="title" type="text" name="title" />
                        </div>
                        <label for="image" class="form-label">Image</label>
                        <div class="mb-3">
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="5"></textarea>
                        </div>
                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="statusCreate" name="status" value="1" checked>
                                <label class="form-check-label" for="status">Publish</label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-danger" type="button" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark me-1"></i> Cancel
                    </button>
                    <button class="btn btn-success" type="submit" form="addRoomForm">
                        <i class="fa-regular fa-floppy-disk me-1"></i> Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>