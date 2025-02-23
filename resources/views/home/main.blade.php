<div id="beranda" class="container" style="padding-top: 20px;">
  <div class="slogan">"Jelajahi Dunia Ilmu, Temukan Buku Favoritmu di LibraryQ!"</div>
</div>

<div class="container">
  <div class="genre-list">
    <span>Fiksi</span>
    <span>Sejarah</span>
    <span>Fantasi</span>
    <span>Self-Help</span>
    <span>Biografi</span>
    <span>Misteri</span>
    <span>Romansa</span>
    <span>Teknologi</span>z
  </div>
</div>




<div style="margin-top: 20px;" class="container">
    <h1 style="text-align: center;">📖Buku Terbaru</h1>x`
    <div style="display: flex; justify-content: center;">
        <svg width="200" height="20" viewBox="0 0 200 25" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M5 15 C 50 30, 150 5, 195 15" stroke="#007bff" stroke-width="6" stroke-linecap="round" fill="none" stroke-opacity="0.8"/>
        </svg>
    </div>
    <div style="margin-top: 30px;" class="swiper-container">
        <div class="swiper-wrapper">
            @foreach ($data as $data)
                <div class="swiper-slide">
                    <div class="card">
                    <img src="{{ asset('book/' . $data->book_img) }}" alt="{{ $data->judul }}">
                        <div class="card-content">
                            <h3>{{ $data->judul }}</h3>
                            <p>{{ $data->penulis }}</p>
                            <p>{{ $data->penerbit }}</p>
                            <p>{{ $data->tahun_terbit }}</p>
                            <p>{{ $data->stock }} tersedia</p>
                            <button>Pinjam</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div>
