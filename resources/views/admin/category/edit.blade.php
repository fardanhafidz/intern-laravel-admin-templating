@extends('admin.layout.parent')

@section('content')
    <div class="card">
        <div class="card-body">

            <h5 class="card-title">Edit {{ $category->name }} Data</h5>
            <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Category Name</label>
                    <div class="col-sm-10">
                        <input required name="name" value="{{ $category->name }}" type="text" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10 d-flex flex-row-reverse">
                        <button type="submit" class="btn btn-warning text-white ms-2"><i class="bi bi-save"></i>
                            Submit</button>
                        <a href="{{ route('category.index') }}" class="btn btn-primary ms-2"><i
                                class="bi bi-arrow-left-square"></i>
                            Back</a>
                    </div>
                </div>
            </form>
        @endsection

    </div>
</div>
