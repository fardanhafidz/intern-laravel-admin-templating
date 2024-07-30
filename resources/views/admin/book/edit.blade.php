@extends('admin.layout.parent')

@section('content')
    <div class="card">
        <div class="card-body">

            <h5 class="card-title">Edit {{ $book->title }} Data</h5>
            <form action="{{ route('book.update', $book->id) }}" method="POST" enctype="multipart/form-data">
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
                    <label class="col-sm-2 col-form-label">Book Title</label>
                    <div class="col-sm-10">
                        <input required name="title" value="{{ $book->title }}" type="text" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">ISBN Number</label>
                    <div class="col-sm-10">
                        <input required name="isbn" value="{{ $book->isbn }}" type="text" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Change Cover</label>
                    <div class="col-sm-10">
                        <input name="cover" class="form-control" type="file">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Select Category</label>
                    <div class="col-sm-10">
                        <select name="category_id" required class="form-select">
                            <option disabled selected>Select Book Category</option>
                            @foreach ($categories as $category)
                                @if ($book->category_id == $category->id)
                                    <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                                @endif
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea required name="description" class="form-control" style="height: 200px">{{ $book->description }}</textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10 d-flex flex-row-reverse">
                        <button type="submit" class="btn btn-warning text-white ms-2"><i class="bi bi-save"></i>
                            Submit</button>
                        <a href="{{ route('book.index') }}" class="btn btn-primary ms-2"><i
                                class="bi bi-arrow-left-square"></i>
                            Back</a>
                    </div>
                </div>
            </form>
        @endsection

    </div>
</div>
