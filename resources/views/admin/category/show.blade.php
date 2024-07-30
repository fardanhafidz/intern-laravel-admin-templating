@extends('admin.layout.parent')

@section('content')
    <div class="card">
        <div class="card-body">
            @if (session()->has('success'))
                <div class="alert alert-success my-3" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <h5 class="card-title">{{ $category->name }}'s Category Detail</h5>
            <ol class="list-group list-group-numbered">
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Category Name</div>
                        {{ $category->name }}
                    </div>
                    @if (count($category->books) > 1)
                        <span class="badge bg-info rounded-pill">{{ count($category->books) }} Books</span>
                    @elseif (count($category->books) == 1)
                        <span class="badge bg-info rounded-pill">1 Book</span>
                    @else
                        <span class="badge bg-secondary rounded-pill">0 Book</span>
                    @endif
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Book/s Tagged With This Category</div>
                        @if (count($category->books) == 0)
                            There's no book with this category
                        @else
                            @foreach ($category->books as $book)
                                {{ $loop->iteration }}. {{ $book->title }}<br />
                            @endforeach
                        @endif
                    </div>
                </li>

                <div class="row my-3">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10 d-flex flex-row-reverse">
                        <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger ms-2"><i class="bi bi-trash"></i>
                                Delete</button>
                        </form>
                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning text-white ms-2"><i
                                class="bi bi-pencil-square"></i>
                            Edit</a>
                        <a href="{{ route('category.index') }}" class="btn btn-primary ms-2"><i
                                class="bi bi-arrow-left-square"></i>
                            Back</a>
                    </div>
                </div>
            </ol>
        </div>
    </div>
@endsection
