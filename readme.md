<p align="center"><img src="https://raw.githubusercontent.com/crusheda/serabine.co/dev/public/image/serabine.png" width="400"></p>
<h3 align="center">Serabine.co</h3>

## BAHAN SEBELUM INSTALL 
1. Install [Composer](https://getcomposer.org/download/)
2. PHP 7++
3. DB(MariaDB)

## Cara Install Serabine.co

- [Download / Clone dulu Repositori diatas.](https://git-scm.com/book/id/v1/Dasar-dasar-Git-Mengambil-Repositori-Git).
- Buka Folder yang sudah diClone/Download, ../Serabine.co/
- Klik Tombol SHIFT lalu Klik Kanan Mouse, lihat Gambar 1
- Ketik pada CMD Admin "composer update" lalu ENTER, tunggu proses Update Selesai, lihat Gambar 2
- Cari file ".env.example" di dalam Project, Rename menjadi ".env"
- Buka file .env tadi, rubah kode lihat Gambar 3
- Ketik "php artisan key:generate" pada CMD lalu enter 
- Ketik "php artisan migrate" lalu ENTER
- Ketik "php artisan db:seed" lalu ENTER
- Terakhir, RUNNING FILE dengan mengetik pada CMD "php artisan serve", jangan lupa menghidupkan Apache & Mysql jika menggunakan XAMPP

## Lampiran Gambar
<p align="center">Gambar 1</p>
<p align="center"><img src="https://raw.githubusercontent.com/crusheda/serabine.co/dev/public/image/scr1.png" width="400"></p>
<p align="center">Gambar 2</p>
<p align="center"><img src="https://raw.githubusercontent.com/crusheda/serabine.co/dev/public/image/scr2.png" width="400"></p>
<p align="center">Gambar 3</p>
<p align="center"><img src="https://raw.githubusercontent.com/crusheda/serabine.co/dev/public/image/scr3.png" width="400"></p>
