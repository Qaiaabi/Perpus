<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\book;
use App\Models\Category;
use GuzzleHttp\Psr7\Message;
use Illuminate\Support\Facades\Auth;

    class AdminController extends Controller
{
    public function index()
    {
        if (Auth::id()) // Memeriksa apakah user sudah login
        {
            $user_type = Auth()->user()->usertype; // Mengambil usertype dari user yang login

            if ($user_type == 'admin') {
                return view("admin.index"); // Mengarahkan ke view admin.index jika usertype adalah admin
            } else if ($user_type == 'pegawai') {
                return view("pegawai.index"); // Mengarahkan ke view pegawai.index jika usertype adalah pegawai
            } else if ($user_type == 'user') {
                return view("home.index"); // Mengarahkan ke view home.index jika usertype adalah user
            } else {
                return redirect()->back()->with('error', 'Usertype tidak valid.'); // Jika usertype tidak dikenali, kembalikan ke halaman sebelumnya dengan pesan error
            }
        }
    }
    public function category_page(Request $request)
    {
        $data = Category::orderBy('created_at', 'desc')->get(); // Urutkan dari yang terbaru
        return view('admin.category', compact('data'));
    }
    public function add_category(Request $request)
    {
        // Validasi input
        $request->validate([
            'category' => 'required|string|max:255',
        ]);

        // Periksa apakah kategori sudah ada (case-insensitive)
        $existingCategory = Category::whereRaw('LOWER(cat_title) = ?', [strtolower($request->category)])->first();

        if ($existingCategory) {
            return redirect()->back()->with('error', 'Kategori sudah ada!');
        }

        // Simpan kategori jika belum ada
        $data = new Category;
        $data->cat_title = $request->category;
        $data->save();

        return redirect()->back()->with('success', 'Kategori berhasil ditambahkan.');
    }

    //fungsi untuk menghapus kategori
    public function cat_delete($id)
    {
        $data = Category::find($id);

        if ($data) {
            $data->delete();
            return redirect()->back()->with('success', 'Kategori berhasil dihapus!');
        }

        return redirect()->back()->with('error', 'Kategori tidak ditemukan.');
    }
    public function edit_category($id)
    {
        $data = category::find($id);
        return view('admin.edit_category', compact('data'));
    }
    public function update_category(Request $request, $id)
    {
        $data = Category::find($id);
        $data->cat_title = $request->cat_name;
        $data->save();
        return redirect('/category_page')->with('message', 'Kategori berhasil di edit!');
    }


    
    public function add_book()
{
    $data = category::all();
    return view('admin.add_book', compact('data'));
}

public function upload_book(Request $request)
{
    $data = new Book;
    $data->judul = $request->judul;
    $data->penulis = $request->penulis;
    $data->penerbit = $request->penerbit;
    $data->deskripsi = $request->deskripsi;
    $data->tahun_terbit = $request->tahun_terbit;
    $data->category_id = $request->kategori;
    $data->stock = $request->stock;

    // Simpan gambar jika ada
    if ($request->hasFile('book_img')) {
        $file = $request->file('book_img');
        $filename = time() . '_' . $file->getClientOriginalName();

        // Pastikan folder ada
        $destinationPath = public_path('uploads/book_images');
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        $file->move($destinationPath, $filename);
        $data->book_img = 'uploads/book_images/' . $filename; // Perbaikan path
    }

    $data->save();

    return redirect()->route('view_books')->with('success', 'Buku berhasil ditambahkan!');
}

public function view_books()
{
    $books = Book::with('category')->orderBy('created_at', 'desc')->get();
    return view('admin.view_books', compact('books'));
}

public function delete_book(Request $request, $id)
{
    $book = Book::findOrFail($id);

    // Hapus gambar jika ada
    if ($book->book_img && file_exists(public_path($book->book_img))) {
        unlink(public_path($book->book_img));
    }

    $book->delete();

    return response()->json(['success' => true, 'message' => 'Buku berhasil dihapus!']);
}

public function edit_book($id)
{
    $data = Book::findOrFail($id);
    $categories = Category::all();
    return view('admin.edit_book', compact('data', 'categories'));
}

public function update_book(Request $request, $id)
{
    $data = Book::findOrFail($id);

    $data->judul = $request->judul;
    $data->penulis = $request->penulis;
    $data->penerbit = $request->penerbit;
    $data->deskripsi = $request->deskripsi;
    $data->tahun_terbit = $request->tahun_terbit;
    $data->stock = $request->stock;
    $data->category_id = $request->kategori;

    // Update gambar jika ada file baru
    if ($request->hasFile('book_img')) {
        // Hapus gambar lama jika ada
        if ($data->book_img && file_exists(public_path($data->book_img))) {
            unlink(public_path($data->book_img));
        }

        $file = $request->file('book_img');
        $filename = time() . '_' . $file->getClientOriginalName();

        // Pastikan folder ada
        $destinationPath = public_path('uploads/book_images');
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        $file->move($destinationPath, $filename);
        $data->book_img = 'uploads/book_images/' . $filename;
    }

    $data->save();

    return redirect()->route('view_books')->with('success', 'Buku berhasil diperbarui!');
}

}
