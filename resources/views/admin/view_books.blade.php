<!DOCTYPE html>
<html lang="id">

<head>
    @include('admin.css')
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome untuk ikon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <style>
        .form-header {
            background-color: #343a40;
            color: #fff;
            padding: 20px;
            border-radius: 10px 10px 0 0;
        }

        .table-container {
            background-color: #fff;
            border-radius: 0 0 10px 10px;
            padding: 20px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .custom-table {
            width: 100%;
            border-collapse: collapse;
            border: 2px solid #dee2e6;
            font-size: 16px;
        }

        .custom-table th,
        .custom-table td {
            padding: 16px 20px;
            text-align: center;
        }

        .custom-table th {
            background-color: #495057;
            color: #fff;
            font-weight: 600;
        }

        .custom-table tr:hover {
            background-color: #f1f3f5;
        }

        .action-buttons .btn {
            margin: 0 4px;
            padding: 8px 14px;
            font-size: 15px;
        }

        .action-buttons .btn i {
            margin-right: 4px;
        }
    </style>
</head>

<body>
    @include('admin.sidebar')

    <div id="page-content-wrapper">
        @include('admin.navbar')

        <div style="margin-top: 20px;" class="container mt-12">
            <div class="row justify-content-center">
                <div>
                    @if(session()->has('message'))
                    <div class="alert alert-success">{{ session()->get('message') }}</div>
                    @endif

                    @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <div class="form-header mb-14">
                        <h5 class="m-0">List Buku</h5>
                    </div>

                    <div class="table-container">
                        <table id="booksTable" class="table custom-table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Gambar</th>
                                    <th>Judul</th>
                                    <th>Penulis</th>
                                    <th>Penerbit</th>
                                    <th>Tahun Terbit</th>
                                    <th>Kategori</th>
                                    <th>Stok</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($books as $index => $book)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        @if($book->book_img)
                                        <img src="{{ asset($book->book_img) }}" width="150" height="100" alt="Cover Buku" class="rounded">
                                        @else
                                        <span class="text-muted">Tidak ada gambar</span>
                                        @endif
                                    </td>
                                    <td>{{ $book->judul }}</td>
                                    <td>{{ $book->penulis }}</td>
                                    <td>{{ $book->penerbit }}</td>
                                    <td>{{ $book->tahun_terbit }}</td>
                                    <td>{{ $book->category->cat_title ?? '-' }}</td>
                                    <td>{{ $book->stock }}</td>
                                    <td class="action-buttons">
                                        <a href=" " class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>Edit
                                        </a>
                                        <!-- Tombol Hapus -->
                                        <button class="btn btn-danger btn-sm delete-book" data-id="{{ $book->id }}">Hapus</button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="9" class="text-center">Tidak ada buku tersedia.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @include('admin.footer')
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script>
        document.querySelectorAll('.delete-book').forEach(button => {
            button.addEventListener('click', function() {
                const bookId = this.dataset.id;

                Swal.fire({
                    title: 'Yakin ingin menghapus buku ini?',
                    text: "Tindakan ini tidak dapat dibatalkan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal',
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch(`{{ url('/delete_book') }}/${bookId}`, {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                    'Accept': 'application/json'
                                }
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    Swal.fire({
                                        title: 'Terhapus!',
                                        text: data.message,
                                        icon: 'success',
                                        timer: 1500,
                                        showConfirmButton: false
                                    });

                                    // 🔄 Auto refresh setelah 1.6 detik
                                    setTimeout(() => location.reload(), 1600);
                                }
                            });
                    }
                });
            });
        });
    </script>
</body>

</html>