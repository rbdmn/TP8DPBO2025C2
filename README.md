# JANJI
Saya Abdurrahman Rauf Budiman dengan NIM 2301102 mengerjakan Tugas Praktikum 8 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

# Desain Program
Tugas Praktikum 8 ini yaitu untuk membuat Aplikasi manajemen data mahasiswa. Aplikasi ini dibuat untuk dapat mengelola data-data mahasiswa menggunakan pola arsitektur **MVC** (Model-View-Controller). Aplikasi ini juga menerap fitur atau operasi CRUD (Create-Read-Update-Delete) untuk tiap table pada Database. Dispesifikasikan juga harus ada minimal 1 relasinya dan minimal menambah 2 tabel.

Berikut penjelasan lebih lanjutnya.

## 1. ERD dan relasinya
![image](https://github.com/user-attachments/assets/b16591e9-178c-4e13-8453-95fa0fec3638)

Keterangan:
Disini total tabel ada 3, yaitu students, prestasi, dan akademik. Relasinya yaitu tabel students memiliki 2 kunci asing (foreign key) yang merujuk ke tabel prestasi dan tabel akademik.
Jadi nanti kalo mau melakukan insert data itu akan muncul dropdown dari table prestasi dan table akademik. Maka dari itu di tabel prestasi dan tabel akademik hanya memiliki satu ID dan satu atribut saja.

## 2. Penjelasan Detail tiap tabel

### 1. Students
Berikut isi atribut serta deskripsinya
| Atribut        | Deskripsi                              |
|----------------|----------------------------------------|
| `id`      | Identitas tabel students (PK)             |
| `name`         | Nama mahasiswa                             |
| `nim`  | Nomor Induk Mahasiswa                      |
| `phone`          | Telefon mahasiswa                             |
| `join_date`          | Masuk kapan                             |
| `id_prestasi`          | Identitas tabel prestasi (FK)                             |
| `id_akademik`          | Identitas tabel akademik (FK)                             |

Keterangan:
Tabel student ini akan menjadi main table yang berisi semua identitas atau biodata pada mahasiswa. Memiliki foreign key yang merujuk ke table prestasi dan akademik

### 2. Prestasi
Berikut isi atribut serta deskripsinya
| Atribut        | Deskripsi                              |
|----------------|----------------------------------------|
| `id_prestasi`   | Identitas tabel prestasi (PK)          |
| `tingkat_prestasi`         | Tingkat suatu prestasi                          |

Keterangan:
Tabel prestasi ini akan jadi patokan untuk hal hal yang berkaitan dengan prestasi yang akan dipakai di tabel students.

### 3. Akademik
Berikut isi atribut serta deskripsinya
| Atribut        | Deskripsi                              |
|----------------|----------------------------------------|
| `id_akademik`      | Identitas tabel Akademik (PK)             |
| `status_akademik`   | Status Akademik Mahasiswa                             |

Keterangan:
Tabel akademik ini akan jadi patokan untuk hal hal yang berkaitan dengan prestasi yang akan dipakai di tabel students.

## 3. Arsitektur MVC + Template
Di MVC ini mempunyai tiga komponen utama, berikut penjelasan komponen dan fungsinya:
- Model = Untuk mengelola koneksi ke database dan per-kueri an (MySQL)
- View = Untuk tampilan ke user, disini juga menyediakan template HTML
- Controller = Menangani logika proses (seperti CRUD) dan sebagai perantara antara view dan model yang dapat menghubungkan kedua komponen terseubt (seperti jembatan).

Lalu ada juga satu komponen yaitu Template, template ini adalah file html mentah yang nggak digunakan untuk web browser, tapi diproses dulu oleh kode php di **view**. Contohnya seperti adanya placeholder (DATA_TABEL, JUDUL, dll) yang akan diganti dengan data dari controller atau model.

## 4. Struktur Folder Proyek
![image](https://github.com/user-attachments/assets/4cb0c98c-3e74-493f-af48-81d1f8f37381)
![image](https://github.com/user-attachments/assets/71c3200b-8fef-43d1-8514-61088443dfa2)

Keterangan:
Terdapat 4 folder utama pada project ini yaitu controllers, models, views, dan templates. Masing masing mempunyai kegunaan masing masing dan saling sinkron bekerja satu sama lain. Untuk kegunaan tiap komponennya sudah saya jelaskan di Bab Arsitektur MVC. Tapi ada satu komponen yang terlewat yaitu Entry Point tiap table (akademik.php, prestasi.php, students.php) yang berada di luar folder komponen lainnya. Entry point ini gunanya untuk pengatur alur eksekusi dan penentu aksi (action) apa yang akan dilakukan (berdasarkan inputan dari URL seperti $_GET atau $_POST).

Selain itu jika lihat di folder models terdapat `DB.class.php`, nah class ini intinya untuk menghubungkan database ke project kita sekarang ini. Kemudian di folder template terdapat bentukan html untuk tabel isi data dan bentukan html untuk form nya tiap tabel.

# Alur Program
Pertama tama kita pastikan server Apache dan MySQL menyala, lalu buka browser dan di url nya itu ditujukan ke index.php. Setelah muncul visualisasinya, di index.php (halaman utama) terdapat navbar diatas berisi 3, yaitu students, prestasi, dan akademik. Jika di klik salah satu yang pertama akan muncul yaitu isi data berbentuk tabel, disini kita bisa melakukan operasi CRUD. Lalu jika ingin melakukan insert data atau update/edit data akan diredirect kan ke bentukan form html nya. Untuk alur MVC nya sebagai berikut:
- Misalkan kita ingin menambahkan data student (insert data), setelah tombol diklik akan ngegenerate URL `student.php?action=add`.
- Nah setelah ngegenerate, Controller pada student (student.controller.php) akan mendeteksi dan memanggil fungsi add
- Jika form di submit controller akan memanggil method add($data) dari model student
- Lalu di model ini akan melakukan/menjalankan query yang ada di sana.
- Setelah berhasil, baru user diarahkan ke page yang ada tabel isi datanya

Berlaku juga dengan edit.

# Rekaman Dokumentasi Alur Program
https://github.com/user-attachments/assets/eb8e4aeb-3aac-4067-a312-769cdca917ac



