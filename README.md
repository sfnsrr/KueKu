# KueKu - Aplikasi Pengelolaan Data Kue

KueKu adalah aplikasi CRUD sederhana berbasis Laravel untuk mengelola data kue.

## Fitur

- **Create**: Tambah data kue baru
- **Read**: Lihat daftar kue dan detail kue
- **Update**: Edit data kue yang sudah ada
- **Delete**: Hapus data kue

## Teknologi

- Laravel (Versi Terbaru)
- PHP 8.2
- MySQL 8.0
- Docker
- Nginx
- Bootstrap 5

## Cara Menjalankan Proyek dengan Docker

### Prasyarat

- Docker dan Docker Compose terinstall di komputer Anda
- Git (opsional)

### Langkah-langkah

1. **Clone repositori** (jika menggunakan Git)
   ```bash
   git clone <repository-url>
   cd kueku
   ```

   Atau download dan extract zip file proyek ini

2. **Copy file .env**
   ```bash
   cp .env.example .env
   ```

3. **Jalankan Docker Compose**
   ```bash
   docker-compose up -d
   ```

4. **Masuk ke container aplikasi**
   ```bash
   docker exec -it kueku-app bash
   ```

5. **Install dependency Laravel menggunakan Composer**
   ```bash
   composer install
   ```

6. **Generate application key**
   ```bash
   php artisan key:generate
   ```

7. **Jalankan migrasi database**
   ```bash
   php artisan migrate
   ```

8. **Buka aplikasi di browser**
   
   Kunjungi [http://localhost:8000](http://localhost:8000)

## Struktur Database

Tabel `cakes`:
- `id` - Primary key, auto increment
- `nama` - Nama kue (string)
- `deskripsi` - Deskripsi kue (text)
- `harga` - Harga kue (integer)
- `stok` - Jumlah stok kue (integer)
- `created_at` - Timestamp pembuatan (otomatis)
- `updated_at` - Timestamp update terakhir (otomatis)

## Kontribusi

Silakan buat Pull Request untuk kontribusi ke proyek ini.

## Lisensi

MIT# KueKu
