<style>
  .icon-youtube {
    color: red;
    display: inline-flex;
    background-color: white;
    justify-content: space-around;
    align-items: center;
    font-size: 30px;
    width: 28px;
    height: 10px;
    border-radius: 100%;
  }

  .icon-instagram {
    color: white;
    display: inline-flex;
    background-color: #BC2A8D;
    font-size: 30px;
    width: 28px;
    height: 30px;
    border-radius: 30%;
    margin-left: 5px;
  }

  .icon-facebook {
    color: #1A77F2;
    display: inline-flex;
    background-color: white;
    justify-content: space-around;
    align-items: center;
    font-size: 30px;
    width: 28px;
    height: 30px;
    border-radius: 50%;
    margin-left: 5px;
  }
</style>
<div class="footer-menu">
  <div class="container">
    <div class="row">
      <div class="col-md-1">
        <div class="logo-container">
          <img src="<?= $this->cdn_url($this->config->semevar->site_logo); ?>" width="80" height="80" class="img-responsive" />
        </div>
      </div>
      <div class="col-md-5" style="color: #ffffff;">
        <br>
        Menghubungkan ilmu dan nilai-nilai agama,
        Kemajuan pesantren dalam genggamanmu
        <br>
        <font class="judul"><?= ($this->show_sub_judul(isset($sess->user->id) ? $sess->user : (new stdClass()))) ?></font>
      </div>
      <div class="col-md-6">
        <br>
        <br>
        <a target="_blank" href="https://www.youtube.com/">
          <i class="bi bi-youtube icon-youtube"></i>
        </a>
        <a target="_blank" href="https://www.instagram.com/">
          <i class="bi bi-instagram icon-instagram"></i>
        </a>
        <a target="_blank" href="https://www.facebook.com/">
          <i class="bi bi-facebook icon-facebook"></i>
        </a>
      </div>
    </div>
  </div>
</div>
<footer class="footer-copyright">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <p class="copyright"><?= $this->config->semevar->site_name ?> v<?= $this->config->semevar->site_version ?> &copy; <?= date("Y") ?>. <a href="<?= $this->config->semevar->company_url ?>" target="_blank"><?= $this->config->semevar->company_name ?></a></p>
      </div>
    </div>
  </div>
</footer>