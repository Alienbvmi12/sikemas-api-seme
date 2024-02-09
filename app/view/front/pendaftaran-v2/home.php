<style>
  * {
    box-sizing: border-box;
  }

  body {
    background-color: #f1f1f1;
  }

  #regForm {
    background-color: #ffffff;
    margin: 100px auto;
    font-family: Raleway;
    padding: 40px;
    width: 70%;
    min-width: 300px;
  }

  h1 {
    text-align: center;
  }

  input[type=text],
  input[type=date],
  input[type=number] {
    padding: 10px;
    width: 100%;
    font-size: 17px;
    font-family: Raleway;
    border: 1px solid #aaaaaa;
  }

  /* Styling the dropdown */
  .select2-container .select2-selection--single {
    height: 43px;
    width: 100%;
    font-size: 15px;
    font-family: Raleway;
    border: 1px solid #aaaaaa;
  }

  /* Styling the selected option */
  .select2-container--default .select2-selection--single .select2-selection__rendered {
    line-height: 40px;
  }

  /* Styling the dropdown arrow */
  .select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 38px;
  }

  /* Styling the search input */
  .select2-container--default .select2-search__field {
    border: none;
    outline: none;
    padding: 5px;
  }


  /* Mark input boxes that gets an error on validation: */
  input.invalid {
    border: 1px solid red;
  }

  .invalid {
    border: 1px solid red;
  }

  /* Hide all steps by default: */
  .tab {
    display: none;
  }

  button:hover {
    opacity: 0.8;
  }

  #prevBtn {
    background-color: #bbbbbb;
  }

  /* Make circles that indicate the steps of the form: */
  .step {
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #bbbbbb;
    border: none;
    border-radius: 50%;
    display: inline-block;
    opacity: 0.5;
  }

  .step.active {
    opacity: 1;
  }

  /* Mark the steps that are finished and valid: */
  .step.finish {
    background-color: #04AA6D;
  }

  .questions-form {
    margin-top: 10px;
  }

  p {
    font-size: 14px;
  }

  #nextBtn {
    background-color: #0561A5;
    color: #ffffff;
    border: none;
    padding: 10px 20px;
    font-size: 17px;
    font-family: Raleway;
    cursor: pointer;
  }

  @media only screen and (max-width : 576px) {
    #nextBtn {
      width: 100%;
      margin-top: 20px;
    }
  }

  .pd-checkbox-container {
    display: flex;
    flex-wrap: wrap;
    flex-direction: column;
  }

  .pd-checkbox-container label {
    display: flex;
    cursor: pointer;
    font-weight: 400;
    position: relative;
    overflow: hidden;
    margin-bottom: 0.375em;
  }

  .pd-checkbox-container label input {
    position: absolute;
    left: -9999px;
  }

  .pd-checkbox-container label input:checked+span {
    background-color: #0561A5;
    color: white;
  }

  .pd-checkbox-container label input:checked+span:before {
    box-shadow: inset 0 0 0 0.4375em #06345B;
  }

  .pd-checkbox-container label span {
    display: flex;
    align-items: center;
    padding: 0.375em 0.75em 0.375em 0.375em;
    border-radius: 99em;
    transition: 0.25s ease;
    color: #000;
  }

  .pd-checkbox-container label span:hover {
    background-color: #d6d6e5;
  }

  .pd-checkbox-container label span:before {
    display: flex;
    flex-shrink: 0;
    content: "";
    background-color: #fff;
    width: 1.5em;
    height: 1.5em;
    border-radius: 50%;
    margin-right: 0.375em;
    transition: 0.25s ease;
    box-shadow: inset 0 0 0 0.100em #000;
  }
</style>

<body>

  <form id="regForm" action="/action_page.php">
    <h1 id="magical-title"></h1>
    <br>
    <!--Tabs-->
    <div id="branch-permulaan">
      <div class="tab" id="xform-welcome">
        <input type="hidden" class="tab-title" value="Selamat Datang">
        <article></article>
        <div class="questions-form" style="margin : 20px 0;">
          <p>Selamat Datang di pendaftaran peserta didik aplikasi <?= $app_name ?></p>
        </div>
      </div>
      <div class="tab" id="xform-welcome2">
        <input type="hidden" class="tab-title" value="Tujuan Aplikasi">
        <article></article>
        <div class="questions-form" style="margin : 20px 0;">
          <p>Pada aplikasi pendaftaran ini, anda akan diajukan sejumlah pertanyaan terkait informasi peserta didik dan sejumlah informasi lainnya yang kami butuhkan</p>
        </div>
      </div>
      <div class="tab" id="xform-tutorial-confirm">
        <input type="hidden" class="tab-title" value="Tutorial?">
        <article>
          <p>Sebelum kita masuk ke pertanyaan, kami akan memberikan tutorial terlebih dahulu.</p>
          <p>Apakah anda ingin mengikuti tutorial terlebih dahulu?</p>
        </article>
        <div class="questions-form pd-checkbox-container" style="margin : 20px 0;">
          <label>
            <input type="radio" value=true class="wiz-form" oninput="" name="tutor_confirm">
            <span>Ya, saya ingin mengikuti tutorial</span>
          </label>
          <label>
            <input type="radio" value=false class="wiz-form" oninput="" name="tutor_confirm">
            <span>Tidak, lewati tutorial</span>
          </label>
        </div>
      </div>
      <div class="tab" id="xform-langsung">
        <input type="hidden" class="tab-title" value="Baiklah">
        <article>
          <p>Baiklah <span class="{tutor}"></span></p>
        </article>
        <div class="questions-form" style="margin : 20px 0;">
        </div>
      </div>
    </div>

    <div id="branch-tutorial">
      <div class="tab" id="xform-input-title">
        <input type="hidden" class="tab-title" value="Tutorial pertama, mengisi kolom">
        <div class="questions-form">
        </div>
      </div>
      <div class="tab" id="xform-input">
        <input type="hidden" class="tab-title" value="Tutorial 1">
        <article>
          <p>Untuk melanjukan ke langkah selanjutnya, anda harus mengisi kolom dibawah ini dengan huruf alfabet (abc) atau angka.</p>
          <p>Kolom dibawah harus diisi, jika tidak, akan ada pemberitahuan</p>
        </article>
        <div class="questions-form">
          <p><input type="text" class="wiz-form" placeholder="Masukan disini..." oninput="this.classList.remove('invalid')" name="tutorial1"></p>
        </div>
      </div>
      <div class="tab" id="xform-input-batasan-title">
        <input type="hidden" class="tab-title" value="Tutorial kedua, mengisi kolom dengan batasan">
        <div class="questions-form">
        </div>
      </div>
      <div class="tab" id="xform-input-batasan">
        <input type="hidden" class="tab-title" value="Tutorial 2">
        <article>
          <p>Sama seperti sebelumnya, disini anda harus mengisi kolom dibawah.</p>
          <p>Bedanya, ada batasan yang harus diikuti</p>
          <p>Pada tahap ini, anda harus mengisi kolom dengan jumlah karakter minimal 5, dan maksimal 10</p>
        </article>
        <div class="questions-form">
          <p><input type="text" class="wiz-form" placeholder="Masukan disini..." oninput="this.classList.remove('invalid')" name="tutorial2" minlength="5" maxlength="10"></p>
        </div>
      </div>
      <div class="tab" id="xform-number-title">
        <input type="hidden" class="tab-title" value="Tutorial ketiga, kolom nomor">
        <div class="questions-form">
        </div>
      </div>
      <div class="tab" id="xform-number">
        <input type="hidden" class="tab-title" value="Tutorial 3">
        <article>
          <p>Sama seperti sebelumnya, disini anda harus mengisi kolom dibawah.</p>
          <p>Bedanya, pada kolom di tahap ini, anda hanya bisa memasukan angka</p>
        </article>
        <div class="questions-form">
          <p><input type="number" class="wiz-form" placeholder="Masukan disini..." oninput="this.classList.remove('invalid')" name="tutorial3"></p>
        </div>
      </div>
      <div class="tab" id="xform-keputusan-title">
        <input type="hidden" class="tab-title" value="Tutorial Keempat, pilihan">
        <div class="questions-form">
        </div>
      </div>
      <div class="tab" id="xform-keputusan">
        <input type="hidden" class="tab-title" value="Tutorial 4">
        <article>
          <p>Pada tahap ini, anda harus memilih salah satu dari beberapa pilihan dibawah:</p>
          <p>Caranya, setelah anda memilih, tekan titik dibagian kiri teks pilihan tersebut:</p>
        </article>
        <div class="questions-form pd-checkbox-container">
          <label>
            <input type="radio" value=true class="wiz-form" oninput="" name="tutorial4">
            <span>Ya</span>
          </label>
          <label>
            <input type="radio" value=false class="wiz-form" oninput="" name="tutorial4">
            <span>Tidak</span>
          </label>
          <label>
            <input type="radio" value=maybe class="wiz-form" oninput="" name="tutorial4">
            <span>Mungkin</span>
          </label>
        </div>
      </div>
      <div class="tab" id="xform-tu-alamat-title">
        <input type="hidden" class="tab-title" value="Tutorial Kelima, alamat">
        <div class="questions-form">
        </div>
      </div>
      <div class="tab" id="xform-tu-alamat">
        <input type="hidden" class="tab-title" value="Tutorial 5">
        <article>
          <p>Pada tahap ini, anda harus mencari suatu alamat dan memilihnya.</p>
          <p>Caranya, anda klik kolom dibawah, lalu ketikan nama suatu daerah (desa/kelurahan atau kecamatan atau kota/kabupaten atau provinsi). Ketika hasilnya sudah muncul, pilih opsi yang diinginkan.</p>
        </article>
        <div class="questions-form">
          <p><select class="js-example-basic-single wiz-form" name="tutorial5" style="width: 100%; height : 30px;" placeholder="Pilih Alamat">
            </select></p>
        </div>
      </div>
      <div class="tab" id="xform-tutorial-finish">
        <input type="hidden" class="tab-title" value="Bagus!">
        <div class="questions-form">
          <p>Bagus!! Anda telah menyelesaikan tutorial! selanjutnya anda akan menjawab pertanyaan yang sesungguhnya! bersiaplah!!</p>
        </div>
      </div>
    </div>

    <div id="branch-main">
      <!-- One "tab" for each step in the form: -->
      <div class="tab" id="xform-nama">
        <input type="hidden" class="tab-title" value="Nama Anda">
        <article>Siapakah Nama anda?</article>
        <div class="questions-form">
          <p><input type="text" class="wiz-form" placeholder="Nama lengkap anda..." oninput="this.classList.remove('invalid')" name="nama" maxlength="255" minlength="2"></p>
        </div>
      </div>

      <div class="tab" id="xform-nama-confirm">
        <input type="hidden" class="tab-title" value="Nama Anda">
        <article>Benarkah Nama anda <span class="{nama}"></span></article>
        <div class="questions-form pd-checkbox-container" style="margin : 20px 0;">
          <label>
            <input type="radio" value=true id="nama-confirm-ya" class="wiz-form" oninput="" name="nama_confirm">
            <span>Ya, Itu nama saya</span>
          </label>
          <label>
            <input type="radio" value=false id="nama-confirm-tidak" class="wiz-form" oninput="" name="nama_confirm">
            <span>Bukan, bukan nama saya</span>
          </label>
        </div>
      </div>

      <div class="tab" id="xform-has-bank-confirm">
        <input type="hidden" class="tab-title" value="Rekening">
        <article>
          <p>Baiklah <span class="{nama}"></span>, Apakah anda memiliki rekening bank?</p>
          <p>Atau apakah orang terdekat anda memiliki rekening yang dapat digunakan untuk melakukan transfer?(contoh: Orang tua anda, kakak anda)</p>
        </article>
        <div class="questions-form pd-checkbox-container" style="margin : 20px 0;">
          <label>
            <input type="radio" value=true id="rekening-confirm-ya" class="wiz-form" oninput="" name="rekening_confirm">
            <span>Ya</span>
          </label>
          <label>
            <input type="radio" value=false class="wiz-form" oninput="" name="rekening_confirm">
            <span>Tidak</span>
          </label>
        </div>
      </div>

      <div class="tab" id="xform-telp-confirm">
        <input type="hidden" class="tab-title" value="Konfirmasi No Telepon">
        <article>
          <p>Apakah nomor telepon yang anda masukan sudah benar <span class="{telp}"></span>?</p>
        </article>
        <div class="questions-form pd-checkbox-container" style="margin : 20px 0;">
          <label>
            <input type="radio" value=true id="telp-confirm-ya" class="wiz-form" oninput="" name="telp_confirm">
            <span>Ya, sudah benar</span>
          </label>
          <label>
            <input type="radio" value=false id="telp-confirm-tidak" class="wiz-form" oninput="" name="telp_confirm">
            <span>Tidak, masukan ulang</span>
          </label>
        </div>
      </div>

      <div class="tab" id="xform-alamat">
        <input type="hidden" class="tab-title" value="Alamat">
        <article>
          <p>Masukan alamat tinggal anda saat ini!</p>
          <p><b>Petunjuk Pengisian Alamat:</b></p>
          <ul>
            <li>
              <p>Pada field/kolom pertama, anda pilih alamat anda yang mencakup desa/kelurahan sampai dengan provinsi.</p>
              <p> <b>Format: kelurahan/desa, kecamatan, kabupaten/kota, provinsi, negara</b> </p>
              <p> <b>Contoh: Canggu, Kuta Utara, Kabupaten Manggarai Barat, Nusa Tenggara Timur, Indonesia</b> </p>
            </li>
            <li>
              <p>Pada kolom kedua, anda isikan detail alamat anda. </p>
              <p><b>Contoh: Komplek Perumahan SIL, Blok B1 No 14, RT 06 RW 12</b></p>
            </li>
          </ul>
          <p><b>Petunjuk Pencarian Alamat:</b></p>
          <p>Untuk Mencari alamat pada kolom pertama, anda dapat mengetikan nama kelurahan/desa atau kecamatan atau kabupaten/kota atau provinsi, tetapi anda hanya bisa mencari berdasarkan satu, misalnya hanya mencari berdasarkan nama desa anda</p>
          <p>Anda tidak bisa mencari dengan mengetikan nama desa sekaligus nama kecamatan</p>
        </article>
        <div class="questions-form" style="margin : 20px 0;">
          <p><select class="js-example-basic-single wiz-form" name="alamat" style="width: 100%; height : 30px;" placeholder="Pilih Alamat">
            </select></p>
          <p><input type="text" class="wiz-form" placeholder="Masukan detail alamat..." oninput="this.classList.remove('invalid')" name="alamat_detail" maxlength="156" minlength="2"></p>
        </div>
      </div>

      <div class="tab" id="xform-kewarganegaraan">
        <input type="hidden" class="tab-title" value="Kewarganegaraan">
        <article>
          <p>Apakah anda orang indonesia?</p>
        </article>
        <div class="questions-form pd-checkbox-container" style="margin : 20px 0;">
          <label>
            <input type="radio" value=true class="wiz-form" oninput="" name="kewarganegaraan">
            <span>Ya</span>
          </label>
          <label>
            <input type="radio" value=false class="wiz-form" oninput="" name="kewarganegaraan">
            <span>Bukan</span>
          </label>
        </div>
      </div>

      <div class="tab" id="xform-pekerjaan">
        <input type="hidden" class="tab-title" value="Pekerjaan Anda">
        <article>
          <p>Apa pekerjaan anda?</p>
          <p>Jika pekerjaan anda <b>tidak ada di daftar</b> berikut, pilihlah <b>opsi "Pegawai Swasta" atau "Pegawai BUMN".</b></p>
          <p>Atau pilih opsi "pelajar" jika anda adalah seorang peserta didik yang mau daftar.</p>
        </article>
        <div class="questions-form pd-checkbox-container" style="margin : 20px 0;">
          <label>
            <input type="radio" value="pelajar/mahasiswa" class="wiz-form" oninput="" name="pekerjaan">
            <span>Pelajar/Mahasiswa</span>
          </label>
          <label>
            <input type="radio" value="pns" class="wiz-form" oninput="" name="pekerjaan">
            <span>PNS</span>
          </label>
          <label>
            <input type="radio" value="Guru" class="wiz-form" oninput="" name="pekerjaan">
            <span>Guru</span>
          </label>
          <label>
            <input type="radio" value="tenaga kependidikan" class="wiz-form" oninput="" name="pekerjaan">
            <span>Tenaga Kependidikan</span>
          </label>
          <label>
            <input type="radio" value="polisi" class="wiz-form" oninput="" name="pekerjaan">
            <span>Polisi</span>
          </label>
          <label>
            <input type="radio" value="tni" class="wiz-form" oninput="" name="pekerjaan">
            <span>TNI</span>
          </label>
          <label>
            <input type="radio" value="pemadam kebakaran" class="wiz-form" oninput="" name="pekerjaan">
            <span>Pemadam Kebakaran</span>
          </label>
          <label>
            <input type="radio" value="dokter" class="wiz-form" oninput="" name="pekerjaan">
            <span>Dokter</span>
          </label>
          <label>
            <input type="radio" value="staff kesehatan" class="wiz-form" oninput="" name="pekerjaan">
            <span>Staff Kesehatan</span>
          </label>
          <label>
            <input type="radio" value="satpol pp" class="wiz-form" oninput="" name="pekerjaan">
            <span>Satpol PP</span>
          </label>
          <label>
            <input type="radio" value="petani" class="wiz-form" oninput="" name="pekerjaan">
            <span>Petani</span>
          </label>
          <label>
            <input type="radio" value="buruh" class="wiz-form" oninput="" name="pekerjaan">
            <span>Buruh</span>
          </label>
          <label>
            <input type="radio" value="rumah tangga" class="wiz-form" oninput="" name="pekerjaan">
            <span>Rumah Tangga</span>
          </label>
          <label>
            <input type="radio" value="pegawai bumn" class="wiz-form" oninput="" name="pekerjaan">
            <span>Pegawai BUMN</span>
          </label>
          <label>
            <input type="radio" value="pegawai swasta" class="wiz-form" oninput="" name="pekerjaan">
            <span>Pegawai Swasta</span>
          </label>
        </div>
      </div>

      <div class="tab" id="xform-mau-apa">
        <input type="hidden" class="tab-title" value="Mendaftarkan Siapa?">
        <article>
          <p>Siapa yang akan anda daftarkan?</p>
          <p>Mendaftarkan <b>diri anda sendiri</b>, atau anda sebagai seorang <b>orangtua/wali</b> dan ingin <b>mendaftarkan anak anda</b>, atau mendaftarkan saudara/orang lain (contoh: keponakan, anak tetangga, anak yatim piatu)?</p>
        </article>
        <div class="questions-form pd-checkbox-container" style="margin : 20px 0;">
          <label>
            <input type="radio" value=0 class="wiz-form" oninput="" name="daftarkan_siapa">
            <span>Diri saya sendiri</span>
          </label>
          <label>
            <input type="radio" value=1 class="wiz-form" oninput="" name="daftarkan_siapa">
            <span>Anak saya</span>
          </label>
          <label>
            <input type="radio" value=2 class="wiz-form" oninput="" name="daftarkan_siapa">
            <span>Saudara/orang lain</span>
          </label>
        </div>
      </div>

      <div class="tab" id="xform-jenjang">
        <input type="hidden" class="tab-title" value="Institusi">
        <article>
          <p>Di sekolah mana <span class="{actor}"></span> akan mendaftar?</p>
          <p>Pilih sekolah/institusi!</p>
        </article>
        <div class="questions-form pd-checkbox-container" style="margin : 20px 0;">
          <?php foreach ($list_sekolah as $sekolah) {
          ?>
            <label>
              <input type="radio" value=<?= $sekolah->jenjang ?> value-sekolah=<?= $sekolah->id ?> value-yayasan=<?= $sekolah->id ?> class="wiz-form" oninput="" name="jenjang">
              <span><?= $sekolah->nama ?></span>
            </label><?php
                  } ?>
        </div>
      </div>

      <div class="tab" id="xform-nisn">
        <input type="hidden" class="tab-title" value="NISN">
        <article>
          <p>Masukan nisn <span class="{actor}"></span></p>
          <p><span class="{optional}"></span> </p>
        </article>
        <div class="questions-form" style="margin : 20px 0;">
          <p><input type="number" class="wiz-form" placeholder="Masukan NISN..." oninput="this.classList.remove('invalid')" name="nisn" maxlength="10" minlength="10"></p>
        </div>
      </div>

      <div class="tab" id="xform-kelamin">
        <input type="hidden" class="tab-title" value="Kelamin">
        <article>
          <p>Apakah <span class="{actor}"></span> seorang perempuan?</p>
        </article>
        <div class="questions-form pd-checkbox-container" style="margin : 20px 0;">
          <label>
            <input type="radio" value=0 class="wiz-form" oninput="" name="kelamin">
            <span>Ya</span>
          </label>
          <label>
            <input type="radio" value=1 class="wiz-form" oninput="" name="kelamin">
            <span>Tidak</span>
          </label>
        </div>
      </div>

      <div class="tab" id="xform-agama">
        <input type="hidden" class="tab-title" value="Kepercayaan">
        <article>
          <p>Tidak bisa dipungkiri, indonesia merupakan agama kesatuan dengan keberagaman ras, agama, budaya, dan golongan.</p>
          <p>Dengan keberagaman tersebut, instansi-instansi pendidikan memerlukan informasi terkait kepercayaan <span class="{actor}"></span> demi memaksimalkan pendidikan dan pembentukan akhlak dan perilaku sesuai dengan kepercayaan-nya.</p>
          <p>Tanpa mengurangi rasa hormat, kami meminta izin mengetahui kepercayaan apa yang dianut oleh <b><span class="{actor}"></span></b>.</p>
          <p>Silahkan memilih agama dibawah, tekan lainnya jika kepercayaan anda tidak ada di dalam daftar dibawah.</p>
        </article>
        <div class="questions-form pd-checkbox-container" style="margin : 20px 0;">
          <label>
            <input type="radio" value="islam" class="wiz-form" oninput="" name="agama">
            <span>Islam</span>
          </label>
          <label>
            <input type="radio" value="protestan" class="wiz-form" oninput="" name="agama">
            <span>Protestan</span>
          </label>
          <label>
            <input type="radio" value="katholik" class="wiz-form" oninput="" name="agama">
            <span>Katholik</span>
          </label>
          <label>
            <input type="radio" value="hindu" class="wiz-form" oninput="" name="agama">
            <span>Hindu</span>
          </label>
          <label>
            <input type="radio" value="buddha" class="wiz-form" oninput="" name="agama">
            <span>Buddha</span>
          </label>
          <label>
            <input type="radio" value="konghucu" class="wiz-form" oninput="" name="agama">
            <span>Konghucu</span>
          </label>
          <label>
            <input type="radio" value="lainnya" class="wiz-form" oninput="" name="agama">
            <span>Lainnya</span>
          </label>
        </div>
      </div>

      <div class="tab" id="xform-tempat-lahir">
        <input type="hidden" class="tab-title" value="Tempat Lahir">
        <article>
          <p>Dimana kota/kabupaten tempat <span class="{actor}"></span> lahir?</p>
          <p>Contoh : Kota Bandung, Kota Sumedang, Kabupaten Cirebon</p>
        </article>
        <div class="questions-form" style="margin : 20px 0;">
          <p><input type="text" class="wiz-form" placeholder="Masukan Tempat Lahir..." oninput="this.classList.remove('invalid')" name="birth_place" maxlength="255" minlength="2"></p>
        </div>
      </div>

      <div class="tab" id="xform-tanggal-lahir">
        <input type="hidden" class="tab-title" value="Tanggal Lahir">
        <article>
          <p>Kapan <span class="{actor}"></span> lahir?</p>
          <p>Petunjuk: Tekan Gambar kalender di paling kanan kolom, kemudian akan muncul kalender, lalu pilih tanggal lahir</p>
        </article>
        <div class="questions-form" style="margin : 20px 0;">
          <p><input type="date" class="wiz-form" placeholder="Masukan Tanggal Lahir..." oninput="this.classList.remove('invalid')" name="birth_date"></p>
        </div>
      </div>

      <div class="tab" id="xform-anak-ke">
        <input type="hidden" class="tab-title" value="Anak Ke">
        <article>
          <p><span class="{actor}"></span> anak ke berapa?</p>
        </article>
        <div class="questions-form" style="margin : 20px 0;">
          <p><input type="number" class="wiz-form" placeholder="Anak ke..." oninput="this.classList.remove('invalid')" name="anak_ke" maxlength="2" minlength="1"></p>
        </div>
      </div>

    </div>

    <div id="branch-gabisa-daftar">
      <div class="tab" id="xform-mohon-maaf">
        <input type="hidden" class="tab-title" value="Maaf">
        <article></article>
        <div class="questions-form" style="margin : 20px 0;">
          <p>Terimakasih sudah mau menjawab pertanyaan-pertanyaan dari kami, <b> tetapi tanpa mengurangi rasa hormat, Mohon Maaf.</b></p>
          <p>Anda tidak dapat mendaftar jika tidak memiliki/tidak ada rekening yang tersedia.</p>
          <p>Dikarenakan untuk membayar biaya pendaftaran anda <b>harus menggunakan metode transfer.</b></p>
          <p>Jika anda benar-benar tidak bisa melakukan transfer atau pendaftaran secara online anda bisa <b>mendaftar dengan mendatangi sekolah/yayasan tujuan anda secara langsung</b> secara langsung.</p>
        </div>
      </div>
    </div>

    <div id="branch-masukan-ulang-telepon">
      <div class="tab" id="xform-masukan-ulang-telepon">
        <input type="hidden" class="tab-title" value="Masukan No Telepon">
        <article>Masukan ulang no telepon anda</article>
        <div class="questions-form" style="margin : 20px 0;">
          <p><input type="text" class="wiz-form" placeholder="Nomor telepon anda..." oninput="this.classList.remove('invalid')" name="telp" maxlength="15" minlength="7"></p>
        </div>
      </div>
    </div>

    <div id="branch-no-warga-negara">
      <div class="tab" id="xform-nik">
        <input type="hidden" class="tab-title" value="NIK">
        <article>
          <p>Masukan NIK (Nomor Induk Kewrganegaraan) anda!</p>
        </article>
        <div class="questions-form" style="margin : 20px 0;">
          <p><input type="number" class="wiz-form" placeholder="Masukan Disini..." oninput="this.classList.remove('invalid')" name="nik" maxlength="16" minlength="16"></p>
        </div>
      </div>

      <div class="tab" id="xform-kitas">
        <input type="hidden" class="tab-title" value="No. Kitas">
        <article>
          <p>No. Kitas anda!</p>
        </article>
        <div class="questions-form" style="margin : 20px 0;">
          <p><input type="number" class="wiz-form" placeholder="Masukan Disini..." oninput="this.classList.remove('invalid')" name="kitas" maxlength="16" minlength="16"></p>
        </div>
      </div>
    </div>

    <div id="branch-no-warga-negara-anak">
      <div class="tab" id="xform-nik-anak">
        <input type="hidden" class="tab-title" value="NIK">
        <article>
          <p>Masukan NIK (Nomor Induk Kewarganegaraan) <span class="{actor}"></span>!</p>
        </article>
        <div class="questions-form" style="margin : 20px 0;">
          <p><input type="number" class="wiz-form" placeholder="Masukan Disini..." oninput="this.classList.remove('invalid')" name="nik_anak" maxlength="16" minlength="16"></p>
        </div>
      </div>

      <div class="tab" id="xform-kitas-anak">
        <input type="hidden" class="tab-title" value="No. Kitas">
        <article>
          <p>No. Kitas <span class="{actor}"></span>!</p>
        </article>
        <div class="questions-form" style="margin : 20px 0;">
          <p><input type="number" class="wiz-form" placeholder="Masukan Disini..." oninput="this.classList.remove('invalid')" name="kitas_anak" maxlength="16" minlength="16"></p>
        </div>
      </div>
    </div>

    <div id="branch-no-warga-negara-ayah">
      <div class="tab" id="xform-nik-ayah">
        <input type="hidden" class="tab-title" value="NIK Ayah">
        <article>
          <p>Masukan NIK (Nomor Induk Kewarganegaraan) Ayah <span class="{actor}"></span>!</p>
        </article>
        <div class="questions-form" style="margin : 20px 0;">
          <p><input type="number" class="wiz-form" placeholder="Masukan Disini..." oninput="this.classList.remove('invalid')" name="nik_ayah" maxlength="16" minlength="16"></p>
        </div>
      </div>

      <div class="tab" id="xform-kitas-ayah">
        <input type="hidden" class="tab-title" value="No. Kitas Ayah">
        <article>
          <p>No. Kitas Ayah <span class="{actor}"></span>!</p>
        </article>
        <div class="questions-form" style="margin : 20px 0;">
          <p><input type="number" class="wiz-form" placeholder="Masukan Disini..." oninput="this.classList.remove('invalid')" name="kitas_ayah" maxlength="16" minlength="16"></p>
        </div>
      </div>
    </div>

    <div id="branch-no-warga-negara-ibu">
      <div class="tab" id="xform-nik-ibu">
        <input type="hidden" class="tab-title" value="NIK Ibu">
        <article>
          <p>Masukan NIK (Nomor Induk Kewarganegaraan) Ibu <span class="{actor}"></span>!</p>
        </article>
        <div class="questions-form" style="margin : 20px 0;">
          <p><input type="number" class="wiz-form" placeholder="Masukan Disini..." oninput="this.classList.remove('invalid')" name="nik_ibu" maxlength="16" minlength="16"></p>
        </div>
      </div>

      <div class="tab" id="xform-kitas-ibu">
        <input type="hidden" class="tab-title" value="No. Kitas Ibu">
        <article>
          <p>No. Kitas Ibu <span class="{actor}"></span>!</p>
        </article>
        <div class="questions-form" style="margin : 20px 0;">
          <p><input type="number" class="wiz-form" placeholder="Masukan Disini..." oninput="this.classList.remove('invalid')" name="kitas_ibu" maxlength="16" minlength="16"></p>
        </div>
      </div>
    </div>

    <div id="branch-no-warga-negara-wali">
      <div class="tab" id="xform-nik-wali">
        <input type="hidden" class="tab-title" value="NIK wali">
        <article>
          <p>Masukan NIK (Nomor Induk Kewarganegaraan) wali <span class="{actor}"></span>!</p>
        </article>
        <div class="questions-form" style="margin : 20px 0;">
          <p><input type="number" class="wiz-form" placeholder="Masukan Disini..." oninput="this.classList.remove('invalid')" name="nik_wali" maxlength="16" minlength="16"></p>
        </div>
      </div>

      <div class="tab" id="xform-kitas-wali">
        <input type="hidden" class="tab-title" value="No. Kitas wali">
        <article>
          <p>No. Kitas wali <span class="{actor}"></span>!</p>
        </article>
        <div class="questions-form" style="margin : 20px 0;">
          <p><input type="number" class="wiz-form" placeholder="Masukan Disini..." oninput="this.classList.remove('invalid')" name="kitas_wali" maxlength="16" minlength="16"></p>
        </div>
      </div>
    </div>

    <div id="branch-daftarkan-anak">
      <div class="tab" id="xform-pemberitahuan-anak">
        <input type="hidden" class="tab-title" value="Seputar yang didaftarkan">
        <article>
          <p>Sekarang kita akan masuk ke pertanyaan seputar <span class="{actor}"></span> yang akan anda daftarkan</p>
        </article>
        <div class="questions-form" style="margin : 20px 0;">
        </div>
      </div>
      <div class="tab" id="xform-daftar-anak">
        <input type="hidden" class="tab-title" value="Nama">
        <article>
          <p>Siapa nama <span class="{actor}"></span>?</p>
        </article>
        <div class="questions-form" style="margin : 20px 0;">
          <p><input type="text" class="wiz-form" placeholder="Masukan nama lengkap..." oninput="this.classList.remove('invalid')" name="nama_anak" maxlength="255" minlength="2"></p>
        </div>
      </div>
      <div class="tab" id="xform-telp-anak">
        <input type="hidden" class="tab-title" value="No.Telp">
        <article>
          <p>Masukan nomor telepon <span class="{actor}"></span></p>
        </article>
        <div class="questions-form" style="margin : 20px 0;">
          <p><input type="text" class="wiz-form" placeholder="Masukan no telp..." oninput="this.classList.remove('invalid')" name="telp_anak" maxlength="15" minlength="7"></p>
        </div>
      </div>
      <div class="tab" id="xform-kewarganegaraan-anak">
        <input type="hidden" class="tab-title" value="Kewarganegaraan">
        <article>
          <p>Apakah <span class="{actor}"></span> orang indonesia?</p>
        </article>
        <div class="questions-form pd-checkbox-container" style="margin : 20px 0;">
          <label>
            <input type="radio" value=true class="wiz-form" oninput="" name="kewarganegaraan_anak">
            <span>Ya</span>
          </label>
          <label>
            <input type="radio" value=false class="wiz-form" oninput="" name="kewarganegaraan_anak">
            <span>Bukan</span>
          </label>
        </div>
      </div>
      <div class="tab" id="xform-tinggal-bersama">
        <input type="hidden" class="tab-title" value="Tinggal bersama">
        <article>
          <p>Apakah <span class="{actor}"></span> tinggal bersama anda?</p>
        </article>
        <div class="questions-form pd-checkbox-container" style="margin : 20px 0;">
          <label>
            <input type="radio" value=true class="wiz-form" oninput="" name="tinggal_bersama_confirm">
            <span>Ya</span>
          </label>
          <label>
            <input type="radio" value=false class="wiz-form" oninput="" name="tinggal_bersama_confirm">
            <span>Tidak</span>
          </label>
        </div>
      </div>
      <div class="tab" id="xform-alamat-anak">
        <input type="hidden" class="tab-title" value="Alamat Peserta Didik">
        <article>
          <p>Masukan alamat tinggal <span class="{actor}"></span> saat ini!</p>
          <p><b>Petunjuk Pengisian Alamat:</b></p>
          <ul>
            <li>
              <p>Pada field/kolom pertama, anda pilih alamat <span class="{actor}"></span> yang mencakup desa/kelurahan sampai dengan provinsi.</p>
              <p> <b>Format: kelurahan/desa, kecamatan, kabupaten/kota, provinsi, negara</b> </p>
              <p> <b>Contoh: Canggu, Kuta Utara, Kabupaten Manggarai Barat, Nusa Tenggara Timur, Indonesia</b> </p>
            </li>
            <li>
              <p>Pada kolom kedua, anda isikan detail alamat <span class="{actor}"></span>. </p>
              <p><b>Contoh: Komplek Perumahan SIL, Blok B1 No 14, RT 06 RW 12</b></p>
            </li>
          </ul>
          <p><b>Petunjuk Pencarian Alamat:</b></p>
          <p>Untuk Mencari alamat pada kolom pertama, anda dapat mengetikan nama kelurahan/desa atau kecamatan atau kabupaten/kota atau provinsi, tetapi anda hanya bisa mencari berdasarkan satu, misalnya hanya mencari berdasarkan nama desa anda</p>
          <p>Anda tidak bisa mencari dengan mengetikan nama desa sekaligus nama kecamatan</p>
        </article>
        <div class="questions-form" style="margin : 20px 0;">
          <p><select class="js-example-basic-single wiz-form" name="alamat_anak" style="width: 100%; height : 30px;" placeholder="Pilih Alamat">
            </select></p>
          <p><input type="text" class="wiz-form" placeholder="Masukan detail alamat..." oninput="this.classList.remove('invalid')" name="alamat_anak_detail" maxlength="156" minlength="2"></p>
        </div>
      </div>
    </div>

    <div id="branch-ayah">
      <div class="tab" id="xform-pemberitahuan-ayah">
        <input type="hidden" class="tab-title" value="Seputar ayah">
        <article>
          <p>Sekarang kita akan masuk ke pertanyaan seputar ayah <span class="{actor}"></span></p>
        </article>
        <div class="questions-form" style="margin : 20px 0;">
        </div>
      </div>

      <div class="tab" id="xform-nama-ayah">
        <input type="hidden" class="tab-title" value="Nama Ayah">
        <article>Siapakah Ayah <span class="{actor}"></span>?</article>
        <div class="questions-form">
          <p><input type="text" class="wiz-form" placeholder="Nama lengkap anda..." oninput="this.classList.remove('invalid')" name="nama_ayah" maxlength="255" minlength="2"></p>
        </div>
      </div>

      <div class="tab" id="xform-alamat-ayah">
        <input type="hidden" class="tab-title" value="Alamat Ayah">
        <article>
          <p>Masukan alamat tinggal Ayah <span class="{actor}"></span> saat ini!</p>
          <p><b>Petunjuk Pengisian Alamat:</b></p>
          <ul>
            <li>
              <p>Pada field/kolom pertama, anda pilih alamat Ayah <span class="{actor}"></span> yang mencakup desa/kelurahan sampai dengan provinsi.</p>
              <p> <b>Format: kelurahan/desa, kecamatan, kabupaten/kota, provinsi, negara</b> </p>
              <p> <b>Contoh: Canggu, Kuta Utara, Kabupaten Manggarai Barat, Nusa Tenggara Timur, Indonesia</b> </p>
            </li>
            <li>
              <p>Pada kolom kedua, anda isikan detail alamat Ayah <span class="{actor}"></span>. </p>
              <p><b>Contoh: Komplek Perumahan SIL, Blok B1 No 14, RT 06 RW 12</b></p>
            </li>
          </ul>
          <p><b>Petunjuk Pencarian Alamat:</b></p>
          <p>Untuk Mencari alamat pada kolom pertama, anda dapat mengetikan nama kelurahan/desa atau kecamatan atau kabupaten/kota atau provinsi, tetapi anda hanya bisa mencari berdasarkan satu, misalnya hanya mencari berdasarkan nama desa anda</p>
          <p>Anda tidak bisa mencari dengan mengetikan nama desa sekaligus nama kecamatan</p>
        </article>
        <div class="questions-form" style="margin : 20px 0;">
          <p><select class="js-example-basic-single wiz-form" name="alamat_ayah" style="width: 100%; height : 30px;" placeholder="Pilih Alamat">
            </select></p>
          <p><input type="text" class="wiz-form" placeholder="Masukan detail alamat..." oninput="this.classList.remove('invalid')" name="alamat_ayah_detail" maxlength="156" minlength="2"></p>
        </div>
      </div>

      <div class="tab" id="xform-telp-ayah">
        <input type="hidden" class="tab-title" value="No.Telp Ayah">
        <article>
          <p>Masukan nomor telepon Ayah <span class="{actor}"></span></p>
        </article>
        <div class="questions-form" style="margin : 20px 0;">
          <p><input type="text" class="wiz-form" placeholder="Masukan no telp..." oninput="this.classList.remove('invalid')" name="telp_ayah" maxlength="15" minlength="7"></p>
        </div>
      </div>

      <div class="tab" id="xform-pekerjaan-ayah">
        <input type="hidden" class="tab-title" value="Pekerjaan Ayah">
        <article>
          <p>Apa pekerjaan Ayah <span class="{actor}"></span>?</p>
        </article>
        <div class="tab" id="xform-pekerjaan">
          <input type="hidden" class="tab-title" value="Pekerjaan Anda">
          <article>
            <p>Apa pekerjaan anda?</p>
            <p>Jika pekerjaan anda <b>tidak ada di daftar</b> berikut, pilihlah <b>opsi "Pegawai Swasta" atau "Pegawai BUMN".</b></p>
            <p>Atau pilih opsi "pelajar" jika anda adalah seorang peserta didik yang mau daftar.</p>
          </article>
          <div class="questions-form pd-checkbox-container" style="margin : 20px 0;">
            <label>
              <input type="radio" value="pelajar/mahasiswa" class="wiz-form" oninput="" name="pekerjaan_ayah">
              <span>Pelajar/Mahasiswa</span>
            </label>
            <label>
              <input type="radio" value="pns" class="wiz-form" oninput="" name="pekerjaan_ayah">
              <span>PNS</span>
            </label>
            <label>
              <input type="radio" value="Guru" class="wiz-form" oninput="" name="pekerjaan_ayah">
              <span>Guru</span>
            </label>
            <label>
              <input type="radio" value="tenaga kependidikan" class="wiz-form" oninput="" name="pekerjaan_ayah">
              <span>Tenaga Kependidikan</span>
            </label>
            <label>
              <input type="radio" value="polisi" class="wiz-form" oninput="" name="pekerjaan_ayah">
              <span>Polisi</span>
            </label>
            <label>
              <input type="radio" value="tni" class="wiz-form" oninput="" name="pekerjaan_ayah">
              <span>TNI</span>
            </label>
            <label>
              <input type="radio" value="pemadam kebakaran" class="wiz-form" oninput="" name="pekerjaan_ayah">
              <span>Pemadam Kebakaran</span>
            </label>
            <label>
              <input type="radio" value="dokter" class="wiz-form" oninput="" name="pekerjaan_ayah">
              <span>Dokter</span>
            </label>
            <label>
              <input type="radio" value="staff kesehatan" class="wiz-form" oninput="" name="pekerjaan_ayah">
              <span>Staff Kesehatan</span>
            </label>
            <label>
              <input type="radio" value="satpol pp" class="wiz-form" oninput="" name="pekerjaan_ayah">
              <span>Satpol PP</span>
            </label>
            <label>
              <input type="radio" value="petani" class="wiz-form" oninput="" name="pekerjaan_ayah">
              <span>Petani</span>
            </label>
            <label>
              <input type="radio" value="buruh" class="wiz-form" oninput="" name="pekerjaan_ayah">
              <span>Buruh</span>
            </label>
            <label>
              <input type="radio" value="rumah tangga" class="wiz-form" oninput="" name="pekerjaan_ayah">
              <span>Rumah Tangga</span>
            </label>
            <label>
              <input type="radio" value="pegawai bumn" class="wiz-form" oninput="" name="pekerjaan_ayah">
              <span>Pegawai BUMN</span>
            </label>
            <label>
              <input type="radio" value="pegawai swasta" class="wiz-form" oninput="" name="pekerjaan_ayah">
              <span>Pegawai Swasta</span>
            </label>
          </div>
        </div>
      </div>

      <div class="tab" id="xform-kewarganegaraan-ayah">
        <input type="hidden" class="tab-title" value="Kewarganegaraan Ayah">
        <article>
          <p>Apakah Ayah <span class="{actor}"></span> orang indonesia?</p>
        </article>
        <div class="questions-form pd-checkbox-container" style="margin : 20px 0;">
          <label>
            <input type="radio" value=true class="wiz-form" oninput="" name="kewarganegaraan_ayah">
            <span>Ya</span>
          </label>
          <label>
            <input type="radio" value=false class="wiz-form" oninput="" name="kewarganegaraan_ayah">
            <span>Bukan</span>
          </label>
        </div>
      </div>
    </div>

    <div id="branch-ibu">
      <div class="tab" id="xform-pemberitahuan-ibu">
        <input type="hidden" class="tab-title" value="Seputar ibu">
        <article>
          <p>Sekarang kita akan masuk ke pertanyaan seputar ibu <span class="{actor}"></span></p>
        </article>
        <div class="questions-form" style="margin : 20px 0;">
        </div>
      </div>
      <div class="tab" id="xform-nama-ibu">
        <input type="hidden" class="tab-title" value="Nama ibu">
        <article>Siapakah ibu <span class="{actor}"></span>?</article>
        <div class="questions-form">
          <p><input type="text" class="wiz-form" placeholder="Nama lengkap..." oninput="this.classList.remove('invalid')" name="nama_ibu" maxlength="255" minlength="2"></p>
        </div>
      </div>

      <div class="tab" id="xform-alamat-ibu">
        <input type="hidden" class="tab-title" value="Alamat Ibu">
        <article>
          <p>Masukan alamat tinggal Ibu <span class="{actor}"></span> saat ini!</p>
          <p><b>Petunjuk Pengisian Alamat:</b></p>
          <ul>
            <li>
              <p>Pada field/kolom pertama, anda pilih alamat Ibu <span class="{actor}"></span> yang mencakup desa/kelurahan sampai dengan provinsi.</p>
              <p> <b>Format: kelurahan/desa, kecamatan, kabupaten/kota, provinsi, negara</b> </p>
              <p> <b>Contoh: Canggu, Kuta Utara, Kabupaten Manggarai Barat, Nusa Tenggara Timur, Indonesia</b> </p>
            </li>
            <li>
              <p>Pada kolom kedua, anda isikan detail alamat Ibu <span class="{actor}"></span>. </p>
              <p><b>Contoh: Komplek Perumahan SIL, Blok B1 No 14, RT 06 RW 12</b></p>
            </li>
          </ul>
          <p><b>Petunjuk Pencarian Alamat:</b></p>
          <p>Untuk Mencari alamat pada kolom pertama, anda dapat mengetikan nama kelurahan/desa atau kecamatan atau kabupaten/kota atau provinsi, tetapi anda hanya bisa mencari berdasarkan satu, misalnya hanya mencari berdasarkan nama desa anda</p>
          <p>Anda tidak bisa mencari dengan mengetikan nama desa sekaligus nama kecamatan</p>
        </article>
        <div class="questions-form" style="margin : 20px 0;">
          <p><select class="js-example-basic-single wiz-form" name="alamat_ibu" style="width: 100%; height : 30px;" placeholder="Pilih Alamat">
            </select></p>
          <p><input type="text" class="wiz-form" placeholder="Masukan detail alamat..." oninput="this.classList.remove('invalid')" name="alamat_ibu_detail" maxlength="156" minlength="2"></p>
        </div>
      </div>

      <div class="tab" id="xform-telp-ibu">
        <input type="hidden" class="tab-title" value="No.Telp ibu">
        <article>
          <p>Masukan nomor telepon ibu <span class="{actor}"></span></p>
        </article>
        <div class="questions-form" style="margin : 20px 0;">
          <p><input type="text" class="wiz-form" placeholder="Masukan no telp..." oninput="this.classList.remove('invalid')" name="telp_ibu" maxlength="15" minlength="7"></p>
        </div>
      </div>

      <div class="tab" id="xform-pekerjaan-ibu">
        <input type="hidden" class="tab-title" value="Pekerjaan ibu">
        <article>
          <p>Apa pekerjaan ibu <span class="{actor}"></span>?</p>
        </article>
        <div class="tab" id="xform-pekerjaan">
          <input type="hidden" class="tab-title" value="Pekerjaan Anda">
          <article>
            <p>Apa pekerjaan anda?</p>
            <p>Jika pekerjaan anda <b>tidak ada di daftar</b> berikut, pilihlah <b>opsi "Pegawai Swasta" atau "Pegawai BUMN".</b></p>
            <p>Atau pilih opsi "pelajar" jika anda adalah seorang peserta didik yang mau daftar.</p>
          </article>
          <div class="questions-form pd-checkbox-container" style="margin : 20px 0;">
            <label>
              <input type="radio" value="pelajar/mahasiswa" class="wiz-form" oninput="" name="pekerjaan_ibu">
              <span>Pelajar/Mahasiswa</span>
            </label>
            <label>
              <input type="radio" value="pns" class="wiz-form" oninput="" name="pekerjaan_ibu">
              <span>PNS</span>
            </label>
            <label>
              <input type="radio" value="Guru" class="wiz-form" oninput="" name="pekerjaan_ibu">
              <span>Guru</span>
            </label>
            <label>
              <input type="radio" value="tenaga kependidikan" class="wiz-form" oninput="" name="pekerjaan_ibu">
              <span>Tenaga Kependidikan</span>
            </label>
            <label>
              <input type="radio" value="polisi" class="wiz-form" oninput="" name="pekerjaan_ibu">
              <span>Polisi</span>
            </label>
            <label>
              <input type="radio" value="tni" class="wiz-form" oninput="" name="pekerjaan_ibu">
              <span>TNI</span>
            </label>
            <label>
              <input type="radio" value="pemadam kebakaran" class="wiz-form" oninput="" name="pekerjaan_ibu">
              <span>Pemadam Kebakaran</span>
            </label>
            <label>
              <input type="radio" value="dokter" class="wiz-form" oninput="" name="pekerjaan_ibu">
              <span>Dokter</span>
            </label>
            <label>
              <input type="radio" value="staff kesehatan" class="wiz-form" oninput="" name="pekerjaan_ibu">
              <span>Staff Kesehatan</span>
            </label>
            <label>
              <input type="radio" value="satpol pp" class="wiz-form" oninput="" name="pekerjaan_ibu">
              <span>Satpol PP</span>
            </label>
            <label>
              <input type="radio" value="petani" class="wiz-form" oninput="" name="pekerjaan_ibu">
              <span>Petani</span>
            </label>
            <label>
              <input type="radio" value="buruh" class="wiz-form" oninput="" name="pekerjaan_ibu">
              <span>Buruh</span>
            </label>
            <label>
              <input type="radio" value="rumah tangga" class="wiz-form" oninput="" name="pekerjaan_ibu">
              <span>Rumah Tangga</span>
            </label>
            <label>
              <input type="radio" value="pegawai bumn" class="wiz-form" oninput="" name="pekerjaan_ibu">
              <span>Pegawai BUMN</span>
            </label>
            <label>
              <input type="radio" value="pegawai swasta" class="wiz-form" oninput="" name="pekerjaan_ibu">
              <span>Pegawai Swasta</span>
            </label>
          </div>
        </div>
      </div>

      <div class="tab" id="xform-kewarganegaraan-ibu">
        <input type="hidden" class="tab-title" value="Kewarganegaraan ibu">
        <article>
          <p>Apakah ibu <span class="{actor}"></span> orang indonesia?</p>
        </article>
        <div class="questions-form pd-checkbox-container" style="margin : 20px 0;">
          <label>
            <input type="radio" value=true class="wiz-form" oninput="" name="kewarganegaraan_ibu">
            <span>Ya</span>
          </label>
          <label>
            <input type="radio" value=false class="wiz-form" oninput="" name="kewarganegaraan_ibu">
            <span>Bukan</span>
          </label>
        </div>
      </div>
    </div>

    <div id="branch-wali">
      <div class="tab" id="xform-pemberitahuan-wali">
        <input type="hidden" class="tab-title" value="Seputar wali">
        <article>
          <p>Sekarang kita akan masuk ke pertanyaan seputar wali <span class="{actor}"></span></p>
        </article>
        <div class="questions-form" style="margin : 20px 0;">
        </div>
      </div>

      <div class="tab" id="xform-nama-wali">
        <input type="hidden" class="tab-title" value="Nama wali">
        <article>Siapakah wali <span class="{actor}"></span>?</article>
        <div class="questions-form">
          <p><input type="text" class="wiz-form" placeholder="Nama lengkap anda..." oninput="this.classList.remove('invalid')" name="nama_wali" maxlength="255" minlength="2"></p>
        </div>
      </div>

      <div class="tab" id="xform-alamat-wali">
        <input type="hidden" class="tab-title" value="Alamat wali">
        <article>
          <p>Masukan alamat tinggal Wali <span class="{actor}"></span> saat ini!</p>
          <p><b>Petunjuk Pengisian Alamat:</b></p>
          <ul>
            <li>
              <p>Pada field/kolom pertama, anda pilih alamat Wali <span class="{actor}"></span> yang mencakup desa/kelurahan sampai dengan provinsi.</p>
              <p> <b>Format: kelurahan/desa, kecamatan, kabupaten/kota, provinsi, negara</b> </p>
              <p> <b>Contoh: Canggu, Kuta Utara, Kabupaten Manggarai Barat, Nusa Tenggara Timur, Indonesia</b> </p>
            </li>
            <li>
              <p>Pada kolom kedua, anda isikan detail alamat Wali <span class="{actor}"></span>. </p>
              <p><b>Contoh: Komplek Perumahan SIL, Blok B1 No 14, RT 06 RW 12</b></p>
            </li>
          </ul>
          <p><b>Petunjuk Pencarian Alamat:</b></p>
          <p>Untuk Mencari alamat pada kolom pertama, anda dapat mengetikan nama kelurahan/desa atau kecamatan atau kabupaten/kota atau provinsi, tetapi anda hanya bisa mencari berdasarkan satu, misalnya hanya mencari berdasarkan nama desa anda</p>
          <p>Anda tidak bisa mencari dengan mengetikan nama desa sekaligus nama kecamatan</p>
        </article>
        <div class="questions-form" style="margin : 20px 0;">
          <p><select class="js-example-basic-single wiz-form" name="alamat_wali" style="width: 100%; height : 30px;" placeholder="Pilih Alamat">
            </select></p>
          <p><input type="text" class="wiz-form" placeholder="Masukan detail alamat..." oninput="this.classList.remove('invalid')" name="alamat_wali_detail" maxlength="156" minlength="2"></p>
        </div>
      </div>

      <div class="tab" id="xform-telp-wali">
        <input type="hidden" class="tab-title" value="No.Telp wali">
        <article>
          <p>Masukan nomor telepon wali <span class="{actor}"></span></p>
        </article>
        <div class="questions-form" style="margin : 20px 0;">
          <p><input type="text" class="wiz-form" placeholder="Masukan no telp..." oninput="this.classList.remove('invalid')" name="telp_wali" maxlength="15" minlength="7"></p>
        </div>
      </div>

      <div class="tab" id="xform-pekerjaan-wali">
        <input type="hidden" class="tab-title" value="Pekerjaan wali">
        <article>
          <p>Apa pekerjaan wali <span class="{actor}"></span>?</p>
        </article>
        <div class="tab" id="xform-pekerjaan">
          <input type="hidden" class="tab-title" value="Pekerjaan Anda">
          <article>
            <p>Apa pekerjaan anda?</p>
            <p>Jika pekerjaan anda <b>tidak ada di daftar</b> berikut, pilihlah <b>opsi "Pegawai Swasta" atau "Pegawai BUMN".</b></p>
            <p>Atau pilih opsi "pelajar" jika anda adalah seorang peserta didik yang mau daftar.</p>
          </article>
          <div class="questions-form pd-checkbox-container" style="margin : 20px 0;">
            <label>
              <input type="radio" value="pelajar/mahasiswa" class="wiz-form" oninput="" name="pekerjaan_wali">
              <span>Pelajar/Mahasiswa</span>
            </label>
            <label>
              <input type="radio" value="pns" class="wiz-form" oninput="" name="pekerjaan_wali">
              <span>PNS</span>
            </label>
            <label>
              <input type="radio" value="Guru" class="wiz-form" oninput="" name="pekerjaan_wali">
              <span>Guru</span>
            </label>
            <label>
              <input type="radio" value="tenaga kependidikan" class="wiz-form" oninput="" name="pekerjaan_wali">
              <span>Tenaga Kependidikan</span>
            </label>
            <label>
              <input type="radio" value="polisi" class="wiz-form" oninput="" name="pekerjaan_wali">
              <span>Polisi</span>
            </label>
            <label>
              <input type="radio" value="tni" class="wiz-form" oninput="" name="pekerjaan_wali">
              <span>TNI</span>
            </label>
            <label>
              <input type="radio" value="pemadam kebakaran" class="wiz-form" oninput="" name="pekerjaan_wali">
              <span>Pemadam Kebakaran</span>
            </label>
            <label>
              <input type="radio" value="dokter" class="wiz-form" oninput="" name="pekerjaan_wali">
              <span>Dokter</span>
            </label>
            <label>
              <input type="radio" value="staff kesehatan" class="wiz-form" oninput="" name="pekerjaan_wali">
              <span>Staff Kesehatan</span>
            </label>
            <label>
              <input type="radio" value="satpol pp" class="wiz-form" oninput="" name="pekerjaan_wali">
              <span>Satpol PP</span>
            </label>
            <label>
              <input type="radio" value="petani" class="wiz-form" oninput="" name="pekerjaan_wali">
              <span>Petani</span>
            </label>
            <label>
              <input type="radio" value="buruh" class="wiz-form" oninput="" name="pekerjaan_wali">
              <span>Buruh</span>
            </label>
            <label>
              <input type="radio" value="rumah tangga" class="wiz-form" oninput="" name="pekerjaan_wali">
              <span>Rumah Tangga</span>
            </label>
            <label>
              <input type="radio" value="pegawai bumn" class="wiz-form" oninput="" name="pekerjaan_wali">
              <span>Pegawai BUMN</span>
            </label>
            <label>
              <input type="radio" value="pegawai swasta" class="wiz-form" oninput="" name="pekerjaan_wali">
              <span>Pegawai Swasta</span>
            </label>
          </div>
        </div>
      </div>

      <div class="tab" id="xform-kewarganegaraan-wali">
        <input type="hidden" class="tab-title" value="Kewarganegaraan wali">
        <article>
          <p>Apakah wali <span class="{actor}"></span> orang indonesia?</p>
        </article>
        <div class="questions-form pd-checkbox-container" style="margin : 20px 0;">
          <label>
            <input type="radio" value=true class="wiz-form" oninput="" name="kewarganegaraan_wali">
            <span>Ya</span>
          </label>
          <label>
            <input type="radio" value=false class="wiz-form" oninput="" name="kewarganegaraan_wali">
            <span>Bukan</span>
          </label>
        </div>
      </div>
    </div>

    <div id="branch-ortu-sebagai">

      <div class="tab" id="xform-ayah-or-ibu">
        <input type="hidden" class="tab-title" value="Sebagai siapa?">
        <article>
          <p>Sebagai siapa anda mendaftarkan anak anda?</p>
          <p>Apakah sebagai ayahnya, atau ibunya?</p>
        </article>
        <div class="questions-form pd-checkbox-container" style="margin : 20px 0;">
          <label>
            <input type="radio" value="ayah" class="wiz-form" oninput="" name="select_ortu">
            <span>Ayah</span>
          </label>
          <label>
            <input type="radio" value="ibu" class="wiz-form" oninput="" name="select_ortu">
            <span>Ibu</span>
          </label>
        </div>
      </div>

      <div class="tab" id="xform-ortu-keterangan">
        <input type="hidden" class="tab-title" value="Informasi">
        <article>
          <p>Anda adalah <span class="{ortu}"></span> dari anak anda</p>
          <p>Data seputar anda yang sebelumnya anda masukan akan tercatat sebagai informasi mengenai <span class="{ortu}"></span> peserta didik</p>
        </article>
        <div class="questions-form" style="margin : 20px 0;">
        </div>
      </div>

      <div class="tab" id="xform-menikah">
        <input type="hidden" class="tab-title" value="Sudah Menikah?">
        <article>
          <p>Apakah anda sudah menikah?</b></p>
        </article>
        <div class="questions-form pd-checkbox-container" style="margin : 20px 0;">
          <label>
            <input type="radio" value=true class="wiz-form" oninput="" name="menikah_confirm">
            <span>Ya, sudah</span>
          </label>
          <label>
            <input type="radio" value=false class="wiz-form" oninput="" name="menikah_confirm">
            <span>Belum, saya belum menikah</span>
          </label>
        </div>
      </div>

    </div>

    <div id="branch-konfirmasi-masukan-data-pasangan">
      <div class="tab" id="xform-masukan-informasi-pasangan">
        <input type="hidden" class="tab-title" value="Informasi pasangan?">
        <article>
          <p>Anda belum menikah</p>
          <p>Mungkin saja anda memiliki anak anda dengan cara adopsi atau cara lainnya</p>
          <p>Apakah anda ingin memasukan informasi seputar <span class="{pasangan}"></span> dari anak anda?</p>
          <p>Mungkin <span class="{pasangan}"></span> asli anak anda atau siapapun yang berpotensi untuk disebut sebagai <span class="{pasangan}"></span> dari anak anda</p>
          <p>Jadi, apakah anda ingin mengisi informasi mengenai <span class="{pasangan}"></span> dari anak anda</p>
        </article>
        <div class="questions-form pd-checkbox-container" style="margin : 20px 0;">
          <label>
            <input type="radio" value=true class="wiz-form" oninput="" name="masukan_pasangan">
            <span>Ya</span>
          </label>
          <label>
            <input type="radio" value=false class="wiz-form" oninput="" name="masukan_pasangan">
            <span>Tidak</span>
          </label>
        </div>
      </div>
    </div>

    <div id="branch-punya-wali">
      <div class="tab" id="xform-punya-wali">
        <input type="hidden" class="tab-title" value="Ingin isi info Wali?">
        <article>
          <p>Apakah anda ingin mengisi informasi tentang wali <span class="{actor}"></span>?</p>
          <p>Jika <span class="{actor}"></span> <b>tidak punya wali</b>, pilih opsi <b>Tidak</b></p>
        </article>
        <div class="questions-form pd-checkbox-container" style="margin : 20px 0;">
          <label>
            <input type="radio" value=true class="wiz-form" oninput="" name="has_wali">
            <span>Ya</span>
          </label>
          <label>
            <input type="radio" value=false class="wiz-form" oninput="" name="has_wali">
            <span>Tidak</span>
          </label>
        </div>
      </div>
    </div>

    <div id="branch-lanjutkan">
      <div class="tab" id="xform-lanjutkan">
        <input type="hidden" class="tab-title" value="Perubahan tersimpan">
        <article>
          <p>Sepertinya anda telah mengisi aplikasi ini sebelumnya di perangkat ini.</p>
          <p>Apakah anda ingin melanjutkan mengisi aplikasi?</p>
        </article>
        <div class="questions-form pd-checkbox-container" style="margin : 20px 0;">
          <label>
            <input type="radio" value=true class="wiz-form" oninput="" name="lanjutkan_confirm">
            <span>Ya, lanjutkan</span>
          </label>
          <label>
            <input type="radio" value=false class="wiz-form" oninput="" name="lanjutkan_confirm">
            <span>Tidak, saya ingin memulai dari awal</span>
          </label>
        </div>
      </div>
    </div>

    <div id="branch-terimakasih">
      <div class="tab" id="xform-terimakasih">
        <input type="hidden" class="tab-title" value="Terimakasih">
        <article></article>
        <div class="questions-form" style="margin : 20px 0;">
          <p>Terimakasih sudah mau menjawab pertanyaan-pertanyaan dari kami.</p>
          <p>Dalam 5 detik anda akan diarahkan ke halaman pembayaran pendaftaran.</p>
        </div>
      </div>
    </div>

    <div style="overflow:auto;" style="width : 100%;">
      <div style="width : 100%;">
        <button style="float:right;" type="button" id="nextBtn" onclick="nextPrev(1)">Lanjut</button>
      </div>
    </div>
    <!-- Circles which indicates the steps of the form: -->
    <!--     <div style="text-align:center;margin-top:40px;">
      <span class="step"></span>
      <span class="step"></span>
    </div> -->
  </form>