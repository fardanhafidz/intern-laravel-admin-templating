@extends('admin.layout.parent')

@section('content')
    <div class="card">
        <div class="card-body">
            @if (session()->has('success'))
                <div class="alert alert-success my-3" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <h5 class="card-title">Categories Data Table</h5>
            <a href="{{ route('category.create') }}" class="btn btn-primary my-3"><i class="bi bi-journal-plus"></i> Create
                Category</a>

            @if ($categories)
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Book/s</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $category->name }}</td>
                                <td>
                                    @if (count($category->books) > 1)
                                        <span class="badge bg-dark"><i class="bi bi-bookmark-check me-1"></i>
                                            {{ count($category->books) }}</span>
                                    @elseif (count($category->books) == 1)
                                        <span class="badge bg-dark"><i class="bi bi-bookmark-check me-1"></i>
                                            {{ count($category->books) }}</span>
                                    @else
                                        <span class="badge bg-secondary"><i class="bi bi-bookmark-x me-1"></i>
                                            {{ count($category->books) }}</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('category.show', $category->id) }}" type="button"
                                        class="btn btn-info text-white">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                {{-- Start | Catatan ketika terjadi kesalahan pengambilan data --}}
                <div class="alert alert-warning  alert-dismissible fade show" role="alert">
                    <h4 class="alert-heading">Data Kategori Belum tersedia</h4>
                    <p>Terjadi kesalahan ketika mencoba mengambil data kategori, kemungkinan yang dapat terjadi yaitu tidak
                        adanya data kategori yang tersimpan atau adanya bug di sistem yang kami jalankan.</p>
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
