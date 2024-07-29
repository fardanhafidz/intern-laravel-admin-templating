@extends('admin.layout.parent')

@section('content')
    {{-- @if (session()->has('success'))
        <div class="card">
            <div class="card-body">
                <div class="alert alert-success my-3" role="alert">
                    {{ session('success') }}
                </div>
            </div>
        </div>
    @elseif (session()->has('error'))
        <div class="card">
            <div class="card-body">
                <div class="alert alert-danger my-3" role="alert">
                    {{ session('success') }}
                </div>
            </div>
        </div>
    @endif --}}



    <div class="card">
        <div class="card-body">

            <h5 class="card-title">Books Data Table</h5>
            <a href="{{ route('book.create') }}" class="btn btn-primary my-3"><i class="bi bi-journal-plus"></i> Add
                Book</a>


            @if ($books)
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Cover</th>
                            <th scope="col">Name</th>
                            <th scope="col">ISBN</th>
                            <th scope="col">Description</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>coming soon</td>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->isbn }}</td>
                                <td>{{ $book->description }}</td>
                                <td>coming soon</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                {{-- Start | Catatan ketika terjadi kesalahan pengambilan data --}}
                <div class="alert alert-warning  alert-dismissible fade show" role="alert">
                    <h4 class="alert-heading">Data Buku Belum tersedia</h4>
                    <p>Terjadi kesalahan ketika mencoba mengambil data buku, kemungkinan yang dapat terjadi yaitu tidak
                        adanya data buku yang tersimpan atau adanya bug di sistem yang kami jalankan.</p>
                    <hr>
                    <p class="mb-0">Tolong hubungi admin atau service center kami terkait kesalahan ini, terima kasih.</p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                {{-- End | Catatan ketika terjadi kesalahan pengambilan data --}}
            @endif

        </div>
        </table>
    </div>


@endsection
