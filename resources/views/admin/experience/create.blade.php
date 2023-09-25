@section('title', 'New experience')
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
                        <a href="{{route('experience.index')}}" class="btn btn-danger text-uppercase fw-bold shadow-lg"><i class="fa-regular fa-circle-xmark me-1"></i> Cancel</a>
                        <button class="btn btn-success text-uppercase fw-bold shadow-lg" type="submit" form="formCreate"><i class="fa-solid fa-floppy-disk me-1"></i> Save</button>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-xl px-4 mt-n10">
        <form method="POST" action="{{ route('experience.store') }}" class="row justify-content-center" id="formCreate" enctype="multipart/form-data">
            @csrf
            <div class="col-lg-8">
                {{-- general card --}}
                <div class="card mb-4">
                    <div class="card-header">General</div>
                    <div class="card-body row">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input class="form-control" id="title" type="text" name="title" />
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input class="form-control" id="price" type="text" name="price" />
                        </div>
                        <div class="mb-3">
                            <label for="note" class="form-label">Note</label>
                            <input class="form-control" id="note" type="text" name="note" />
                        </div>
                        <div class="mb-3 col-6">
                            <label for="button_label" class="form-label">Button label</label>
                            <input class="form-control" id="button_label" type="text" name="button_label" />
                        </div>
                        <div class="mb-3 col-6">
                            <label for="button_link" class="form-label">Button link</label>
                            <input class="form-control" id="button_link" type="text" name="button_link" />
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
                            <label for="order" class="form-label">Position order</label>
                            <input class="form-control" id="order" type="number" name="order" />
                        </div>
                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="statusCreate" name="status" value="1" checked>
                                <label class="form-check-label" for="status">Publish</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>