
# Cara Instalasi Aplikasi API dan Admin Sikemas

1. Clone repository ini.
2. Buat database baru di DBMS MySQL.
3. Kemudian, buka repository yang tadi diclone, buka folder sql, lalu import file sql yang ada di dalam folder tersebut ke database yang tadi dibuat.
4. Edit file app/config/development.php, kemudian rubah setelan database pada line 45.

 Anda juga bisa merubah file service_account.json dengan punya anda, file tersebut adalah file setelan layanan notifikasi firebase.

 Anda juga bisa merubah setelan email menggunakan punya anda.

7. Kemudian, jalankan aplikasi menggunakan XAMPP, atau kontrol panel lain yang anda gunakan.
8. Lalu, jalankan perintah NGROK berikut untuk membuat API anda dapat diakses secara online

```
$ ngrok http 80
```

Atau jika anda mempunyai domain kustom di akun NGROK anda, anda bisa menggunakan perintah berikut

```
$ ngrok http --domain=<your-domain> 80
```

Ketika NGROK sudah berjalan, akan ada url yang dapat anda akses, salin dan simpan url tersebut di setelan service api aplikasi android SIKEMAS.

