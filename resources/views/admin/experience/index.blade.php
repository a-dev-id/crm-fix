@section('title', 'Experiences')
@section('experience_active', 'active')
<x-app-layout>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i class="fa-solid fa-person-biking"></i></div>
                            @yield('title')
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mt-4">
                        <a href="{{route('experience.create')}}" class="btn btn-success text-uppercase fw-bold shadow-lg"><i class="fa-solid fa-circle-plus me-1"></i> add new</a>
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
                        @foreach ($experiences as $data)
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
                                <a href="{{route('experience.edit',$data->id)}}" class="btn btn-datatable btn-icon btn-transparent-dark"><i class="fa-solid fa-pen-to-square text-warning"></i></a>
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
                                                <form method="POST" action="{{ route('experience.destroy', [$data->id]) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit"><i class="fa-regular fa-trash-can me-1"></i> Delete</button>
                                                </form>
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
</x-app-layout>