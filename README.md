# TP10DPBO2025C1

## Janji
Saya Nashwa Nadria Futi dengan NIM 2308130 mengerjakan Tugas Praktikum 10 dalam mata kuliah DPBO untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

## Struktur Kode MVVM

**MVVM_PHP**  

```
musik_mvvm_php
├── 📂 config
│   └── Database.php
│
├── 📂 database
│   └── musik_mvvm.sql
│
├── 📂 model
│   ├── Albums.php
│   ├── Artists.php
│   └── Songs.php
│
├── 📂 viewmodel
│   ├── AlbumsViewModel.php
│   ├── ArtistsViewModel.php
│   └── SongsViewModel.php
│
├── 📂 views
│   ├── 📂 template
│   │   ├── footer.php
│   │   └── header.php
│   ├── albums_form.php
│   ├── albums_list.php
│   ├── artists_form.php
│   ├── artists_list.php
│   ├── songs_form.php
│   ├── songs_list.php
│   └── index.php
```

---

## Dokumentasi
![Screenshot_6](https://github.com/user-attachments/assets/f542e130-244d-4486-b010-c1d49d9f3ba1)
![Screenshot_5](https://github.com/user-attachments/assets/33566005-b556-4137-b2ce-5d918c00fede)
![Screenshot_4](https://github.com/user-attachments/assets/68b935c9-c9c8-4431-bea8-d4a292e858be)
![Screenshot_3](https://github.com/user-attachments/assets/01c4a843-6349-45dd-a040-e34850423384)
![Screenshot_2](https://github.com/user-attachments/assets/5f9ef418-fa59-4b75-a130-3a028badb168)
![Screenshot_1](https://github.com/user-attachments/assets/7905155b-85c4-43bb-bdab-83889a993886)


---

## Alur Program MVVM

### 1. Menampilkan Daftar Data (Album, Artist, Song)
Ketika pengguna membuka halaman utama (`index.php`), View akan menampilkan daftar entitas seperti daftar album, artis, atau lagu. View ini menggunakan ViewModel untuk mendapatkan data. ViewModel bertugas mengambil data dari Model, kemudian memformat atau memproses data agar siap ditampilkan oleh View. Model sendiri bertugas berkomunikasi langsung dengan database untuk pengambilan data mentah.

**Alur: View → ViewModel → Model → ViewModel → View**

---

### 2. Menambah Data
Saat pengguna mengklik tombol “Tambah Data”, sistem akan menampilkan form entri yang berada di View (`albums_form.php`, `artists_form.php`, dll). Ketika form dikirimkan, View akan mengirimkan data ke ViewModel. ViewModel kemudian melakukan validasi dan meneruskan perintah penyimpanan data ke Model. Setelah proses berhasil, ViewModel akan memberi tahu View untuk menampilkan perubahan (redirect ke halaman list, misalnya).

**Alur: View (Form) → ViewModel → Model → ViewModel → View**

---

### 3. Mengedit Data
Saat pengguna memilih opsi untuk mengedit data, View akan memanggil ViewModel untuk mengambil data yang akan diubah. ViewModel akan mengambil data dari Model, lalu mengembalikannya dalam bentuk yang bisa ditampilkan oleh View. Setelah pengguna menyimpan perubahan, data dikirim kembali ke ViewModel, yang kemudian memerintahkan Model untuk menyimpan perubahan ke database.

**Alur: View → ViewModel → Model → ViewModel → View (Form) → ViewModel → Model**

---

### 4. Menghapus Data
View akan memicu proses penghapusan data melalui ViewModel. ViewModel akan meneruskan perintah ke Model untuk menghapus data dari database. Setelah proses selesai, ViewModel akan meminta View untuk memperbarui tampilan (biasanya redirect ke halaman list yang sudah diperbarui).

**Alur: View → ViewModel → Model → ViewModel → View**
