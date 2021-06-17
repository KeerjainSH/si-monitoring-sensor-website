# SI Monitoring Sensor
## Cara Clone Project Laravel dari Github
### Tahap Persiapan
Pastikan sudah menginstall composer dalam pc anda

1. Clone repositori dengan menggunakan command line atau bisa juga dengan mendownload zip nya
2. Jika menggunakan zip, ekstrak folder project ke direktori xampp/htdocs
3. Buka command prompt (Jika menggunakan windows), lalu pindahkan working directory ke folder project
4. Masukkan perintah ```composer install``` pada command prompt, lalu command prompt akan menginstall library yang digunakan dalam project
5. Copy file ```.env.example``` dan beri nama ```.env``` dengan cara memasukkan perintah ```copy .env.example .env``` kedalam comand prompt
6. Buat kode enkripsi aplikasi laravel dengan memasukkan perintah ```php artisan key:generate```

### Tahap Penyelarasan Aplikasi dengan Database
1. Membuka phpmyadmin melalui browser
2. Buat database baru dengan "nama" yang sesuai dengan keinginan anda
3. Buka file .env yang dibuat pada tahap persiapan
4. Pada bagian ini
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```
ganti ```DB_DATABASE=laravel```, menjadi ```DB_DATABASE="nama" database yang telah dibuat```
5. Masukkan perintah ```php artisan migrate``` pada command prompt
6. Sistem akan menggenerate akun admin dengan email ```admin@admin.com``` dan password ```admin``` dengan role "admin" secara otomatis (silahkan gunakan untuk login pertama kali)

### Tahap Akhir
Gunakan perintah ```php artisan serve``` untuk memulai local development server
