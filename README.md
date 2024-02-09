# dapodikkw
Aplikasi Dapodik KW untuk MFTHD2

Client:
- Pak Hilman (Memen)

[![Private Repository](https://img.shields.io/badge/private-%E2%9C%93-red)](https://www.cenah.co.id/) [![Staging](https://img.shields.io/website-up-down-green-red/http/www.cenah.co.id)](https://www.cenah.co.id/) [![Website cenah.co.id](
https://img.shields.io/badge/developed%20by-Cipta%20Esensi%20Merenah-blue)](https://www.cenah.co.id/) [![versi 1.0.0](https://img.shields.io/badge/version-1.0.0-yellow)](https://www.cenah.co.id/)

## Cara Install dengan XAMPP
Untuk menginstall pertama-tama pastikan XAMPP sudah terinstall baik di mac, linux, maupun windows. Kemudian lakukan langkah-langkah dibawah ini:

1. Pindah dulu ke directory \xampp\htdocs
2. `git clone git@github.com:cenahcoid/dapodikkw.git dapodikkw`
3. Tunggu sampai selesai, nanti file project nya ada didalam folder dapodikkw.
4. setelah itu, masuk ke dalam folder `app` kemudian buat folder baru bernama `cache`
5. Setelah itu lanjutkan langkah dibawah ini.



### Install Admin Theme di Windows
Berikut ini adalah cara setup / install bundle Theme untuk Development. Jika menggunakan windows, harap download terlebih dahulu [CMDER Full](https://github.com/cmderdev/cmder/releases/download/v1.3.19/cmder.zip). Bisa pakai MIGW64 / MINGW32, tapi ketika melakukan symbolic link harus full path.

1. Buka CMDER
2. pindah ke directory `cd \XAMPP\htdocs\`
3. Kemudian jalankan `git clone git@git.thecloudalert.com:/repo/cenah/skin_admin.git admin_theme`
4. Masukan password `kamiJuara1`
5. Setelah itu masuk ke folder admin_theme dengan `cd admin_theme` kemudian run `git remote update` dan `git pull origin master`
6. Setelah itu `ln -s C:\xampp\htdocs\admin_theme C:\xampp\htdocs\dapodikkw\skin\admin`
7. Cek didalam direktory `C:\XAMPP\htdocs\sbp\kpi\skin` sudah ada folder admin atau belum dengan cara mengeksekusi perintah `ls`. Apabila belum ada isinya, lakukan `git pull origin master` didalam folder admin.


### Windows Local

Sebelum dapat menginstall di local, pastikan XAMPP sudah terpasang dan dijalankan.

1. Buka CMDER dan Pindah dulu ke folder `C:\xampp\htdocs\dapodikkw`
2. Buatlah database baru beri nama `dapodik_kwdb`
5. kemudian import dari file `sql\dapodik_kwdb.sql` ke database `dapodik_kwdb`
6. Setelah itu buka `http://localhost/dapodikkw/`
7. Let see how it goes :D

# Development Workflow

Baca Selengkapnya tentang Development workflow di [Cenah Product Knowledge: Git Workflow](https://github.com/cenahcoid/product_knowledge/wiki/Convention:-Git:-Workflow).

## Unit Testing

TBD

## Integration Testing

TBD

## Full Testing

TBD

## Manual Testing (Regression)

TBD

# Cheatsheet
Berikut ini adalah cheatsheet untuk mengetahui aliran flow development database dari aplikasi ini.

## Query

1. Query untuk melihat berapa banyak invoice yang belum dibayar per institusi

```SQL

select 
ai.nama,
sum(bui.total) total,
count(*) jumlah
from b_user_invoice bui 
join b_user bu on bui.b_user_id = bu.id
join a_institusi ai on ai.id = bui.a_institusi_id 
where bui.is_batal = 1 and bui.is_bayar = 0
group by bui.a_institusi_id 
```

2. Query untuk melihat berapa banyak invoice yang sudah dibayar per institusi per tahun ajaran

```SQL

select 
at2.nama tahun_ajaran,
ai.nama institusi,
sum(bui.total) total,
count(*) jumlah
from b_user_invoice bui 
join b_biaya bb on bui.b_biaya_id = bb.id
join a_tahunajaran at2 on at2.id = bb.a_tahunajaran_id
join b_user bu on bui.b_user_id = bu.id
join a_institusi ai on ai.id = bui.a_institusi_id 
where bui.is_batal = 0 and bui.is_bayar = 1
group by bui.a_institusi_id, at2.id 
```

3. List siswa pada pertahun ajaran, per lembaga, per kelas, dan per wali kelas

```SQL
select 
at2.nama tahun_ajaran,
ai2.nama lembaga,
bu.fnama siswa,
bk.nama kelas,
bu2.fnama walikelas
from c_siswa cs
join b_user bu on bu.id = cs.b_user_id
join a_institusi ai on cs.a_institusi_id 
join d_kelas_siswa dks on dks.c_siswa_id = cs.id
join d_kelas dk on dk.id = dks.d_kelas_id 
join a_institusi ai2 on ai2.id = dk.a_institusi_id 
join a_tahunajaran at2 on at2.id = dk.a_tahunajaran_id 
join b_kelasrombel bk on bk.id = dk.b_kelasrombel_id 
join c_gurutendik cg on cg.id = dk.c_gurutendik_id_walikelas 
join b_user bu2 on bu2.id = cg.b_user_id
order by at2.nama asc, ai2.jenjang asc, bk.jenjang_kelas asc
```
4. Tampilkan Guru dan Tenaga Pendidik yang memiliki Jabatan

```SQL
select 
cg.nip,
cg.nuptk,
cg.kode,
cg.utype,
bu2.fnama nama,
aj.nama jabatan,
ai.nama penempatan
from c_gurutendik_jabatan cgj 
join a_jabatan aj on aj.id = cgj.a_jabatan_id 
join c_gurutendik cg on cg.id = cgj.c_gurutendik_id 
join a_institusi ai on ai.id = cgj.a_institusi_id  
join b_user bu2 on bu2.id = cg.b_user_id
```

Tampilkan jumlah guru per masing2 instansi

```SQL
select 
ai.nama,
count(*) jml_guru_tendik
from 
a_institusi ai 
left join c_gurutendik cg on cg.a_institusi_id = ai.id
group by 1
```
## Generate Technical Documentation

Untuk mengupdate technical documentation, cukup jalankan perintah ini menggunakan PowerShell7, Terminal atau MingGw. Pastikan docker sudah diinstal dan dijalankan. Dan juga posisi CLI sedang ada didalam root directory project ini.

```cli
docker run --rm -v "$(pwd):/data" "phpdoc/phpdoc:3"
```

### Open the Technical Documentation
Untuk membuka technical documentation, bisa menggunakan bawaan server PHP.
```cli
cd docs
php -S localhost:8002
```
Kemudian setelah itu di browser, buka localhost:8002

## Generate Technical documentation

Untuk mengupdate technical documentation, cukup jalankan perintah ini menggunakan CMD, PowerShell7 atau MingGw. Pastikan docker sudah diinstal dan dijalankan. Dan juga posisi CLI sedang ada didalam root directory project ini.

```cli
docker run --rm -v "$(pwd):/data" "phpdoc/phpdoc:3"
```

## License
This is a private project developed by [![Cipta Esensi Merenah](https://www.cenah.co.id/favicon.png)](https://www.cenah.co.id/) doesn't have any license to spread or published as public used except by permission from **Project owner** or **The Client**.

### Copyright
Copyright 2022-2023, Cipta Esensi Merenah.
