@extends('admin.layout.parent')

@section('content')
    <div class="card">
        <div class="card-body">
            @if (session()->has('success'))
                <div class="alert alert-success my-3" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <h5 class="card-title">{{ $book->title }}'s Book Detail</h5>
            <ol class="list-group list-group-numbered">
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Book Title</div>
                        {{ $book->title }}
                    </div>
                    <span class="badge bg-info rounded-pill">{{ $book->category->name }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Book Cover</div>
                        @if ($book->cover)
                            <img src="/storage/books/{{ $book->cover }}" style="max-height: 500px"
                                class="img-thumbnail mt-1">
                        @else
                            <img src="/storage/books/book-default-cover.jpg" class="img-thumbnail mt-1">
                        @endif
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Book ISBN</div>
                        ISBN: {{ $book->isbn }}
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto"style="width: 100%">
                        <div class="fw-bold">Book Description</div>
                        <textarea disabled style="width: 100%; height:200px;" class="form-control my-1">{{ $book->description }}</textarea>
                    </div>
                </li>
                <div class="row my-3">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10 d-flex flex-row-reverse">
                        <form action="{{ route('book.destroy', $book->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger ms-2"><i class="bi bi-trash"></i>
                                Delete</button>
                        </form>
                        <a href="{{ route('book.edit', $book->id) }}" class="btn text-white btn-warning ms-2"><i
                                class="bi bi-pencil-square"></i>
                            Edit</a>
                        <a href="{{ route('book.index') }}" class="btn btn-primary ms-2"><i
                                class="bi bi-arrow-left-square"></i>
                            Back</a>
                    </div>
                </div>
            </ol>
        </div>
    </div>
@endsection
