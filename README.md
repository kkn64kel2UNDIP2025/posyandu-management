# 🩺 Manajemen Posyandu
![Dynamic JSON Badge](https://img.shields.io/badge/dynamic/json?url=https%3A%2F%2Fraw.githubusercontent.com%2Fkkn64kel2UNDIP2025%2Fpembasmi-nyamuk%2Frefs%2Fheads%2Fmain%2Fcomposer.json&query=require.codeigniter4%2Fframework&logo=codeigniter&logoColor=%23EF4223&label=Codeigniter&color=%23EF4223)
![Supabase](https://img.shields.io/badge/Supabase-3FCF8E?style=flat&logo=supabase&logoColor=white)
![Dynamic JSON Badge](https://img.shields.io/badge/dynamic/json?url=https%3A%2F%2Fraw.githubusercontent.com%2Fkkn64kel2UNDIP2025%2Fpembasmi-nyamuk%2Frefs%2Fheads%2Fmain%2Fpackage.json&query=dependencies.%40tailwindcss%2Fcli&logo=tailwindcss&logoColor=%2306B6D4&label=TailwindCSS&color=%2306B6D4)

Aplikasi **Manajemen Posyandu** adalah aplikasi berbasis web yang dirancang untuk membantu pengelolaan data balita dan pencatatan hasil pengukuran secara digital. Aplikasi ini memudahkan pengguna dalam menambahkan, mencari, mengelola, memantau, serta merekap data pertumbuhan balita secara lebih terstruktur.

## ✨ Fitur

### 🔐 Authentication

Sistem autentikasi untuk mengelola akses pengguna ke dalam aplikasi.

<p align="center">
  <img width="80%" alt="Halaman Login" src="https://github.com/user-attachments/assets/ca0d8981-92a4-4c74-8915-5261001c6dfe" />
</p>

### 📊 Dashboard

Menampilkan ringkasan dan visualisasi data balita untuk membantu pengguna memantau informasi secara cepat.

<p align="center">
  <img width="80%" alt="Halaman Dashboard" src="https://github.com/user-attachments/assets/d53a7cb8-f088-4a65-baf0-e8954ab03386" />
</p>

### 👶 Manajemen Data Balita

Pengguna dapat menambahkan, mengelola, dan mencari data balita yang terdaftar pada sistem.
<p align="center">
  <img width="80%" alt="Manajemen Data Balita" src="https://github.com/user-attachments/assets/2c016bc4-f6ee-4a20-861e-9d628534d960" />
</p>

### 📏 Manajemen Data Pengukuran

Mencatat dan mengelola data hasil pengukuran balita, seperti berat badan, tinggi badan, dan data pengukuran lainnya.
<p align="center">
  <img width="80%" alt="Manajemen Data Pengukuran" src="https://github.com/user-attachments/assets/de2ea0f3-f334-42f7-a4aa-0f80758062cc" />
</p>

### 📈 Visualisasi Pertumbuhan Balita

Menampilkan visualisasi data pengukuran untuk membantu memantau perkembangan dan pertumbuhan setiap balita.

<p align="center">
  <img width="80%" alt="Manajemen Data Pengukuran" src="https://github.com/user-attachments/assets/8e6d13e8-537e-46de-8d9e-12cdd928b136" />
</p>

### 📅 Rekap Data Pengukuran Bulanan

Menyediakan rekapitulasi data pengukuran balita berdasarkan periode atau bulan tertentu.

<p align="center">
  <img width="80%" alt="Manajemen Data Pengukuran" src="https://github.com/user-attachments/assets/1c90d831-a3b3-4abb-bc8b-f7abc5c9a4a5" />
</p>

## 🛠️ Tech Stack

* **Backend:** CodeIgniter 4
* **Database:** Supabase
* **Database Engine:** PostgreSQL

## 🚀 Installation

### 1. Clone Repository

```bash
git clone <repository-url>
cd <repository-name>
```

### 2. Install Dependencies

```bash
composer install
```

### 3. Konfigurasi Environment

Salin file `.env` dan sesuaikan konfigurasi database:

```bash
cp env .env
```

Konfigurasikan koneksi PostgreSQL Supabase pada file `.env`:

```env
database.default.hostname=your_supabase_host
database.default.database=postgres
database.default.username=your_database_username
database.default.password=your_database_password
database.default.DBDriver=Postgre
database.default.port=5432
```

### 4. Jalankan Migrasi

```bash
php spark migrate
```

### 5. Jalankan Aplikasi

```bash
php spark serve
```

Aplikasi akan berjalan secara default pada:

```text
http://localhost:8080
```

## 🎯 Tujuan

Aplikasi ini dikembangkan untuk membantu proses administrasi dan pengelolaan data di Posyandu dengan menyediakan sistem yang lebih **digital, terstruktur, dan mudah digunakan**, sehingga data balita dan riwayat pengukurannya dapat dikelola serta dipantau dengan lebih efektif.

## 📄 License

This project is intended for educational and development purposes.
