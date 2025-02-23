<div id="buku" class="container mt-5 pt-5">
  <h1 style="padding-top: 30px;" class="text-center">📚 Koleksi Buku</h1>
  <div style="display: flex; justify-content: center;">
    <svg width="200" height="25" viewBox="0 0 200 25" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M5 15 C 50 30, 150 5, 195 15" stroke="#007bff" stroke-width="6" stroke-linecap="round" fill="none"
        stroke-opacity="0.8" />
    </svg>
  </div>
  <br>
  <!-- Genre: Buku -->
  <div class="genre-section">
    <div class="genre-title">
      <h4>📚 Fiksi / Fantasi</h4>
    </div>

    <!-- @foreach ($data as $data)
    <div class="book-container">
      <div class="koleksi-buku">
        <img src=" book {{ $data->book_img }}" width="150" class="mb-2" alt="Gambar Buku">
        <h6>{{ $data->judul }}</h6>
        <p>{{ $data->penulis }}</p>
        <p>Stock: {{ $data->stock }}</p>
        <button class="btn">Pinjam</button>
      </div>
    </div>
    @endforeach -->

  </div>

  <div class="genre-section">
    <div class="genre-title">
      <h4>📚 Sejarah</h4>
    </div>
    <div class="book-container">
      <div class="koleksi-buku">
        <img src="sapul buku/sejarah/babad tanah jawi.jpeg">
        <h6>Babad Tanah Jawa</h6>
        <p>Soejipto Abimanyu</p>
        <p>Stock: 1</p>
        <button class="btn">Pinjam</button>
      </div>
      <div class="koleksi-buku">
        <img src="sapul buku/sejarah/homodeus.avif">
        <h6>Homodeus</h6>
        <p>Yuval Noah Harari</p>
        <p>Stock: 5</p>
        <button class="btn">Pinjam</button>
      </div>
      <div class="koleksi-buku">
        <img src="sapul buku/sejarah/majapahit.jpg">
        <h6>Majapahit</h6>
        <p>Herald Van Der Linde</p>
        <p>Stock: 8</p>
        <button class="btn">Pinjam</button>
      </div>
      <div class="koleksi-buku">
        <img src="sapul buku/sejarah/sapiens.jpg">
        <h6>Sapiens</h6>
        <p>Yuval Noah Harari</p>
        <p>Stock: 2</p>
        <button class="btn">Pinjam</button>
      </div>
      <div class="koleksi-buku">
        <img src="sapul buku/sejarah/soekarno hatta syahrir.jpg">
        <h6>Soekarno Hatta Syahrir</h6>
        <p>M Ronadhon MK</p>
        <p>Stock: 1</p>
        <button class="btn">Pinjam</button>
      </div>
    </div>
  </div>
  <div style="text-align: center;" class="more">
    <a href="all-book.html">
      <button
        style="padding: 10px 30px; color: white; background-color: #007bff; font-weight: 400; border: none; border-radius: 5px;">
        Lihat Semua Buku
      </button>
    </a>
  </div>
</div>