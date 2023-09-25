@section('title', 'Edit setting')
@section('setting_active', 'active')
<x-app-layout>
    <header class="page-header page-header-dark bg-warning pb-10">
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
                        <a href="{{route('setting.index')}}" class="btn btn-danger text-uppercase fw-bold shadow-lg"><i class="fa-regular fa-circle-xmark me-1"></i> Cancel</a>
                        <button class="btn btn-success text-uppercase fw-bold shadow-lg" type="submit" form="formEdit"><i class="fa-solid fa-floppy-disk me-1"></i> Save</button>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-xl px-4 mt-n10">
        <form method="POST" action="{{ route('setting.update',$detail->id) }}" class="row justify-content-center" id="formEdit">
            @method('PUT')
            @csrf
            <div class="col-lg-8">
                {{-- general card --}}
                <div class="card mb-4">
                    <div class="card-header">General</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input class="form-control" id="title" type="number" name="title" value="{{$detail->title}}" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="value" class="form-label">Value</label>
                                    <input class="form-control" id="value" type="text" name="value" value="{{$detail->value}}" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="image" class="form-label">Image</label>
                                    <input class="form-control" id="image" type="file" name="image" />
                                    <input type="hidden" name="old_image" value="{{$detail->image}}" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea name="" rows="5" class="form-control" id="description">{{$detail->description}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>