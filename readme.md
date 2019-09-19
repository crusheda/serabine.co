<p align="center"><img src="https://raw.githubusercontent.com/crusheda/serabine.co/dev/public/image/serabine.png" width="400"></p>
<p align="center">Serabine.co</p>

## BAHAN SEBELUM INSTALL 
1. Install [Composer]()
2. PHP 7++
3. DB(MariaDB)

## Cara Install Serabine.co

- [Download / Clone dulu Repositori diatas.](https://git-scm.com/book/id/v1/Dasar-dasar-Git-Mengambil-Repositori-Git).
- Buka Folder yang sudah diClone/Download, ../Serabine.co/
- Klik Tombol SHIFT lalu Klik Kanan Mouse seperti Gambar Dibawah:
<p align="center"><img src="https://raw.githubusercontent.com/crusheda/serabine.co/dev/public/image/scr1.png" width="400"></p>
- Ketik pada CMD Admin "composer update" lalu ENTER, tunggu proses Update Selesai
<p align="center"><img src="https://raw.githubusercontent.com/crusheda/serabine.co/dev/public/image/scr2.png" width="400"></p>
- Cari file ".env.example" di dalam Project, Rename menjadi ".env"
- Buka file .env tadi, rubah kode menjadi seperti gambar dibawah:
<p align="center"><img src="https://raw.githubusercontent.com/crusheda/serabine.co/dev/public/image/scr3.png" width="400"></p>
- Ketik "php artisan key:generate" pada CMD lalu enter 
- Ketik "php artisan migrate" -> ENTER
- Ketik "php artisan db:seed" -> ENTER
- Terakhir, RUNNING FILE dengan mengetik pada CMD "php artisan serve", jangan lupa menghidupkan Apache & Mysql jika menggunakan XAMPP
