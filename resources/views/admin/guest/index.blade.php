@section('title', 'Guests')
@section('guest_active', 'active')
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
                        <button type="button" class="btn btn-success text-uppercase fw-bold shadow-lg" data-bs-toggle="modal" data-bs-target="#addGuest"><i class="fa-solid fa-circle-plus me-1"></i> add new</button>
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
                            <th>Guest name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Country</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($guests as $data)
                        <tr>
                            <td>{{$data->title." ".$data->full_name}}</td>
                            <td>{{$data->email}}</td>
                            <td>{{$data->phone}}</td>
                            <td>{{$data->country}}</td>
                            <td>
                                <button type="button" class="btn btn-datatable btn-icon btn-transparent-dark" data-bs-toggle="modal" data-bs-target="#editUser{{$data->id}}"><i class="fa-solid fa-pen-to-square text-warning"></i></button>
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
                                                <form method="POST" action="{{ route('guest.destroy', [$data->id]) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit"><i class="fa-regular fa-trash-can me-1"></i> Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Edit Modal --}}
                                <div class="modal fade" id="editUser{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="editUser{{$data->id}}Title" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-warning">
                                                <h5 class="modal-title" id="editUser{{$data->id}}Title">Edit Guest</h5>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{ route('guest.update', [$data->id]) }}" id="editGuestForm">
                                                    @method('PUT')
                                                    @csrf
                                                    <div class="row">
                                                        <div class="mb-3 col-lg-6">
                                                            <label for="title" class="form-label">Title</label>
                                                            <select class="form-select" id="title" name="title">
                                                                <option>- Choose -</option>
                                                                @foreach ($titles as $editData)
                                                                <option value="{{$editData->value}}" @if($editData->title == $data->title) selected @else @endif>{{$editData->title}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-lg-6">
                                                            <label for="full-name" class="form-label">Full name</label>
                                                            <input class="form-control" id="full-name" type="text" name="full_name" value="{{$data->full_name}}" />
                                                        </div>
                                                        <div class="mb-3 col-lg-6">
                                                            <label for="email" class="form-label">Email</label>
                                                            <input class="form-control" id="email" type="email" name="email" value="{{$data->email}}" />
                                                        </div>
                                                        <div class="mb-3 col-lg-6">
                                                            <label for="phone" class="form-label">Phone</label>
                                                            <input class="form-control" id="phone" type="text" name="phone" value="{{$data->phone}}" />
                                                        </div>
                                                        <div class="mb-3 col-lg-6">
                                                            <label for="country" class="form-label">Country</label>
                                                            <select class="form-select" id="country" name="country">
                                                                <option selected>- Choose -</option>
                                                                @foreach ($countries as $editData)
                                                                <option value="{{$editData->value}}" @if($editData->value == $data->country) selected @else @endif>{{$editData->title}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-lg-6">
                                                            <label for="birth-date" class="form-label">Birth date</label>
                                                            <input class="form-control" id="birth-date" type="date" name="birth_date" value="{{$data->birth_date}}" />
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-outline-danger" type="button" data-bs-dismiss="modal">
                                                    <i class="fa-solid fa-xmark me-1"></i> Cancel
                                                </button>
                                                <button class="btn btn-success" type="submit" form="editGuestForm">
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
    <div class="modal fade" id="addGuest" tabindex="-1" role="dialog" aria-labelledby="addGuestTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addGuestTitle">New Guest</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('guest.store') }}" id="addGuestForm">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-lg-6">
                                <label for="title" class="form-label">Title</label>
                                <select class="form-select" id="title" name="title">
                                    <option selected>- Choose -</option>
                                    @foreach ($titles as $data)
                                    <option value="{{$data->value}}">{{$data->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="full-name" class="form-label">Full name</label>
                                <input class="form-control" id="full-name" type="text" name="full_name" />
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="email" class="form-label">Email</label>
                                <input class="form-control" id="email" type="email" name="email" />
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="phone" class="form-label">Phone</label>
                                <input class="form-control" id="phone" type="text" name="phone" />
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="country" class="form-label">Country</label>
                                <select class="form-select" id="country" name="country">
                                    <option selected>- Choose -</option>
                                    @foreach ($countries as $data)
                                    <option value="{{$data->value}}">{{$data->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="birth-date" class="form-label">Birth date</label>
                                <input class="form-control" id="birth-date" type="date" name="birth_date" />
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-danger" type="button" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark me-1"></i> Cancel
                    </button>
                    <button class="btn btn-success" type="submit" form="addGuestForm">
                        <i class="fa-regular fa-floppy-disk me-1"></i> Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>