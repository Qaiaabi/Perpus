<div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar" class="bg-dark text-white">
    <h1 class="text-center py-3">𓍢ִ໋🀦LibraryQ</h1>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="active nav-link text-white" href="{{ url('home') }}">Dashboard</a>
        </li>

        <!-- Dropdown Buku -->
        <li class="nav-item">
            <a class="nav-link text-white dropdown-toggle" href="#" id="bukuMenu">Buku</a>
            <ul class="nav flex-column submenu" id="bukuSubmenu">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('add_book') }}">➕ Tambah Buku</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('view_books') }}">📚 Lihat Buku</a>
                </li>
            </ul>
        </li>

        <!-- Kategori dan Laporan -->
        <li class="nav-item">
            <a class="nav-link text-white" href="{{ url('category_page') }}">Kategori</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="#">Laporan</a>
        </li>
    </ul>
</nav>