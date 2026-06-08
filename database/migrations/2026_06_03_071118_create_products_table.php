<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            
            // --- KODE TAMBAHAN BARU DI SINI ---
            $table->string('image');
            $table->string('title');
            $table->text('description');
            $table->bigInteger('price');
            $table->integer('stock')->default(0);
            // ----------------------------------
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
    /**
     * edit
     *
     * @param  string $id
     * @return View
     */
    public function edit(string $id): \Illuminate\View\View
    {
        // Cari data produk berdasarkan ID
        $product = Product::findOrFail($id);

        // Render view 'products.edit' dengan membawa data produk lama
        return view('products.edit', compact('product'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  string $id
     * @return RedirectResponse
     */
    public function update(\Illuminate\Http\Request $request, string $id): \Illuminate\Http\RedirectResponse
    {
        // 1. Validasi Form
        $request->validate([
            'image'       => 'image|mimes:jpeg,jpg,png|max:2048', // Di sini image tidak wajib (required) karena boleh tidak diganti
            'title'       => 'required|min:5',
            'description' => 'required|min:10',
            'price'       => 'required|numeric',
            'stock'       => 'required|numeric'
        ]);

        // Cari data produk berdasarkan ID
        $product = Product::findOrFail($id);

        // 2. Cek apakah user mengunggah gambar baru?
        if ($request->hasFile('image')) {

            // Upload gambar baru
            $image = $request->file('image');
            $image->hashName();
            $image->storeAs('products', $image->hashName(), 'public');

            // Hapus gambar lama yang ada di folder storage
            \Illuminate\Support\Facades\Storage::disk('public')->delete('products/' . $product->image);

            // Update produk dengan gambar baru
            $product->update([
                'image'       => $image->hashName(),
                'title'       => $request->title,
                'description' => $request->description,
                'price'       => $request->price,
                'stock'       => $request->stock
            ]);

        } else {

            // Jika gambar tidak diganti, update data selain gambar
            $product->update([
                'title'       => $request->title,
                'description' => $request->description,
                'price'       => $request->price,
                'stock'       => $request->stock
            ]);
        }

        // 3. Alihkan halaman kembali ke index dengan pesan sukses
        return redirect()->route('products.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
};