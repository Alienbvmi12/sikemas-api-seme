<style>
  .bg-color-gold {
    background-color: #f0ad4e;
  }

  .bg-color-green {
    background-color: #5cb85c;
  }

  .bg-color-red {
    background-color: #d9534f;
  }

  .bg-color-blue {
    background-color: #5bc0de;
  }

  .bg-color-orange {
    background-color: #f39c12;
  }

  .bg-color-pink {
    background-color: #e671b8;
  }

  .bg-color-purple {
    background-color: #7b4f9d;
  }

  .bg-color-lime {
    background-color: #8cbf26;
  }

  .bg-color-magenta {
    background-color: #ff0097;
  }

  .bg-color-teal {
    background-color: #00aba9;
  }

  .bg-color-turquoise {
    background-color: #1abc9c;
  }

  .bg-color-emerald {
    background-color: #2ecc71;
  }

  .bg-color-amethyst {
    background-color: #9b59b6;
  }

  .bg-color-wet-asphalt {
    background-color: #34495e;
  }

  .bg-color-midnight-blue {
    background-color: #2c3e50;
  }

  .bg-color-sun-flower {
    background-color: #f1c40f;
  }

  .bg-color-pomegranate {
    background-color: #c0392b;
  }

  .bg-color-silver {
    background-color: #bdc3c7;
  }

  .bg-color-asbestos {
    background-color: #7f8c8d;
  }

  .tiles {
    margin: 0 15px 15px 15px;
  }

  .tiles .tile {
    padding: 12px 20px;
    background-color: #f8f8f8;
    border-right: 1px solid #ccc;
  }

  .tiles .tile a {
    text-decoration: none;
  }

  .tile .icon {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 48px;
    line-height: 1;
    color: #ccc;
  }

  .tile .stat {
    margin-top: 20px;
    font-size: 40px;
    line-height: 1;
  }

  .tile .title {
    font-weight: 700;
    color: #888;
    text-transform: uppercase;
    font-size: 12px;
    min-height: 40px;
  }

  .tiles .tile .highlight {
    margin-top: 4px;
    height: 2px;
    border-radius: 2px;
  }

  .tiles h4 {
    color: #737373;
    margin-bottom: 0;
    margin-top: 0.5em;
  }

  .tiles hr {
    margin-top: 0.25em;
    margin-bottom: 0.9em;
  }

  img.img-proses {
    max-height: 80vh;
  }

  .syarat li {
    font-size: 1.4em;
  }

  .breadcrumb {
    display: none;
  }

  .bg {
    height: 200px;
    background-repeat: no-repeat;
    background-size: cover;
    opacity: 100%;
  }

  .font,
  .font1,
  .font2 {
    font-size: 36px;
    font-weight: bold;
    font-family: 'M PLUS Rounded 1c', sans-serif;
  }

  .font1 {
    color: #E04532;
  }

  .font2 {
    color: #06345B;
  }

  .icon {
    color: #06345B;
    font-size: 90px;
    width: 90px;
    height: 90px;
  }

  hr {
    border-color: #E04532;
    width: 200px;
  }

  .bg-link {
    background-repeat: no-repeat;
    background-size: cover;
    width: auto;
    height: 280px;
    color: white;
  }

  .bg-link:visited {
    color: white;
  }

  strong {
    text-shadow: 1px 1px 1px black, 0 0 1em black, 0 0 0.2em black;
    top: 10px;
    position: relative;
    padding-left: 10px;
  }

  .description {
    position: relative;
    top: 70%;
    text-shadow: 1px 1px 1px black, 0 0 1em black, 0 0 0.2em black;
    padding-left: 10px;
  }

  .set-bg {
    height: 400px;
    width: auto;
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
    color: white;
    text-align: center;
  }

  .shadow {
    text-shadow: 1px 1px 1px black, 0 0 1em black, 0 0 0.2em black;
  }

  .zoom {
    transition: 0.5s ease;
  }

  .zoom:hover {
    transform: scale(1.1);
    z-index: 9;
  }
</style>
<div class="row">
  <div class="container-fluid">
    <div class="col-lg-12">
      <div class="container">
        <div class="set-bg" style="background-image: url('<?= base_url('media/carousel/image1.jpg') ?>');">
          <div class="row">
            <div class="col-lg-6">
              <div class="container">
                <h2 class="shadow">Pesantren Miftahul Huda II</h2>
                <p class="shadow" style="color: #FF9A03;">sekolah Islam di Bandung</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-12">
    <br>
    <div class="bg" style="background-image: url('<?= base_url('media/cove.jpg') ?>'); color:#ffffff; text-align:center;">
      <div class="container">
        <p style="font-family:salsa; margin-top:40px;">Penerimaan Santri Baru 2023 - 2024</p>
        <p style="font-family: sansita;">Klik link berikut ini untuk informasi dan ketentuan pendaftaran santri baru</p>
        <a href="<?= base_url('front/pendaftaran') ?>" class="btn btn-default" style="color:black; font-family: sansita;">Formulir Pendaftaran</a>
      </div>
    </div>
  </div>
  <div class="col-lg-12">
    <div class="container">
      <br>
      <div align="center">
        <p>
          <font class="font1">Falsafah</font>
          <font class="font2">Pondok</font>
        </p>
        <hr>
        <br>
        <div class="col-md-4" style="text-align:center;"><i class="fa fa-sticky-note icon" aria-hidden="true"></i>
          <p style="color: #E04532; font-size: 36px; font-family: 'M PLUS Rounded 1c', sans-serif;">Moto</p>
          <p style="color: #6C6C6C; font-size: 15px; font-family: 'M PLUS Rounded 1c', sans-serif;">Pesantren, tempat belajar yang memupuk semangat keilmuan dan memperkaya jiwa dengan nilai-nilai keagamaan.</p>
        </div>
        <div class="col-md-4" style="text-align:center;"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-book icon" viewBox="0 0 16 16">
            <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z" />
          </svg>
          <p style="color: #E04532; font-size: 36px; font-family: 'M PLUS Rounded 1c', sans-serif;">Moto</p>
          <p style="color: #6C6C6C; font-size: 15px; font-family: 'M PLUS Rounded 1c', sans-serif;">Di pesantren, tradisi dan modernitas berpadu, membentuk insan berkarakter kuat dan berpengetahuan luas.</p>
        </div>
        <div class="col-md-4" style="text-align:center;">
          <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-buildings icon" viewBox="0 0 16 16">
            <path d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022ZM6 8.694 1 10.36V15h5V8.694ZM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15Z" />
            <path d="M2 11h1v1H2v-1Zm2 0h1v1H4v-1Zm-2 2h1v1H2v-1Zm2 0h1v1H4v-1Zm4-4h1v1H8V9Zm2 0h1v1h-1V9Zm-2 2h1v1H8v-1Zm2 0h1v1h-1v-1Zm2-2h1v1h-1V9Zm0 2h1v1h-1v-1ZM8 7h1v1H8V7Zm2 0h1v1h-1V7Zm2 0h1v1h-1V7ZM8 5h1v1H8V5Zm2 0h1v1h-1V5Zm2 0h1v1h-1V5Zm0-2h1v1h-1V3Z" />
          </svg>
          <p style="color: #E04532; font-size: 36px; font-family: 'M PLUS Rounded 1c', sans-serif;">Moto</p>
          <p style="color: #6C6C6C; font-size: 15px; font-family: 'M PLUS Rounded 1c', sans-serif;">Di pesantren, hati dan pikiran terbuka, menggali ilmu dan spiritualitas dalam kebersamaan yang penuh berkah.</p>
        </div>
      </div>
    </div>
    <div class="col-lg-12">
      <br>
      <p align="center">
        <font class="font1">Pusat</font>
        <font class="font2">Informasi</font>
      </p>
      <hr style="width: 350px">
      <div class="col-md-4 zoom">
        <a style="text-decoration: none;" href="<?= base_url() ?>">
          <p class="bg-link" style="background-image: url('<?= base_url('media/landing_page/image1.jpg') ?>')">
            <strong>Pendaftaran Calon Siswa Baru</strong><br>
            <span class="description">Pendaftaran Calon Santri Baru 2023/2024</span>
          </p>
        </a>
      </div>
      <div class="col-md-4 zoom">
        <a style="text-decoration: none;" href=" <?= base_url() ?>">
          <p class="bg-link" style="background-image: url('<?= base_url('media/landing_page/image2.jpg') ?>')">
            <strong>Ujian Kenaikan Kelas</strong><br>
            <span class="description">Informasi Kenaikan Kelas 2023/2024</span>
          </p>
        </a>
      </div>
      <div class="col-md-4 zoom">
        <a style="text-decoration: none;" href=" <?= base_url() ?>">
          <p class="bg-link" style="background-image: url('<?= base_url('media/landing_page/image3.jpg') ?>')">
            <strong>Asrama Baru</strong><br>
            <span class="description">Asrama Untuk Santri Baru</span>
          </p>
        </a>
      </div>
    </div>
    <div class="col-lg-12">
      <br><br>
      <div align="center">
        <p>
          <font class="font1">Testimoni</font>
          <font class="font2">Tokoh</font>
        </p>
        <hr style="width: 300px;">
        <br>
        <div class="col-md-4" style="text-align:center;">
          <div class="row">
            <div class="col-sm-12">
              <img src="<?= base_url('media/user-default.png') ?>" width="50" height="50" alt="">
            </div>
            <div class="col-sm-12">
              <p>Ustad Asep<br>Alumni tahun 2014</p>
            </div>
            <div class="col-sm-12">
              <p style="color: #6C6C6C; font-size: 15px; font-family:serif;">Pesantren, tempat merajut kebersamaan dalam pengembangan diri dan penghayatan agama, tradisi dan modernitas berpadu, membentuk insan berkarakter kuat dan berpengetahuan luas.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4" style="text-align:center;">
          <div class="row">
            <div class="col-sm-12">
              <img src="<?= base_url('media/user-default.png') ?>" width="50" height="50" alt="">
            </div>
            <div class="col-sm-12">
              <p>Ustad Akbar<br>Alumni tahun 2015</p>
            </div>
            <div class="col-sm-12">
              <p style="color: #6C6C6C; font-size: 15px; font-family:serif;">Pesantren, tempat merajut kebersamaan dalam pengembangan diri dan penghayatan agama, tradisi dan modernitas berpadu, membentuk insan berkarakter kuat dan berpengetahuan luas.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4" style="text-align:center;">
          <div class="row">
            <div class="col-sm-12">
              <img src="<?= base_url('media/user-default.png') ?>" width="50" height="50" alt="">
            </div>
            <div class="col-sm-12">
              <p>Ustad Zhongli<br>Alumni tahun 2016</p>
            </div>
            <div class="col-sm-12">
              <p style="color: #6C6C6C; font-size: 15px; font-family:serif;">Pesantren, tempat merajut kebersamaan dalam pengembangan diri dan penghayatan agama, tradisi dan modernitas berpadu, membentuk insan berkarakter kuat dan berpengetahuan luas.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>