<?php
$user_foto = '';
//if(isset($sess->user->foto)) $user_foto = $sess->user->foto;
if (strlen($user_foto) <= 4) $user_foto = 'media/user-default.png';
$user_foto = $this->cdn_url($user_foto);
?>
<nav class="navbar navbar-default navbar-bat">
  <div class="container-fluid">
    <div class="row">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header" style="padding: 15px;">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <div class="col-md-2" style="width: 110px;">
          <a class="" href="<?= base_url() ?>">
            <?php if (strlen($this->config->semevar->site_logo) > 4) { ?>
              <img alt="<?= $this->config->semevar->site_name ?> logo" width="200px" height="auto" src="<?= $this->cdn_url($this->config->semevar->site_logo) ?>" />
            <?php } else { ?>
              <?= strtoupper($this->config->semevar->site_name) ?>
            <?php } ?>
          </a>
        </div>
        <div style="color: #ffffff;" class="col-md-8">
          Menghubungkan ilmu dan nilai-nilai agama,
          Kemajuan pesantren dalam genggamanmu
          <br>
          <font class="judul"><?=($this->show_sub_judul(isset($sess->user->id) ? $sess->user : (new stdClass())))?></font>
        </div>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="col-md-5">
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="margin-top: 30px;">
          <ul class="nav navbar-nav navbar-right">
            <?php if (isset($menu_main)) {
              foreach ($menu_main as $m1) { ?>
                <?php $url = $m1->url;
                if ($m1->url_type == 'internal') $url = base_url($m1->url); ?>
                <?php if ($m1->url == '#') $url = '#'; ?>
                <?php if (count($m1->childs) > 0) { ?>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                      <i class="<?= $m1->icon_class ?>"></i>
                      <?= $m1->nama ?>
                      <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                      <?php foreach ($m1->childs as $m2) { ?>
                        <?php $url = $m2->url;
                        if ($m2->url_type == 'internal') $url = base_url($m2->url); ?>
                        <?php if ($m2->url == '#') $url = '#'; ?>
                        <?php if (count($m2->childs) > 0) { ?>
                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                              <?= $m2->nama ?> <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu">
                              <?php foreach ($m2->childs as $m3) { ?>
                                <?php $url = $m3->url;
                                if ($m3->url_type == 'internal') $url = base_url($m3->url); ?>
                                <?php if ($m3->url == '#') $url = '#'; ?>
                                <li class=""><a href="<?= $url ?>" title="Menuju <?= $m3->nama ?>"><?= $m3->nama ?></a></li>
                              <?php } ?>
                            </ul>
                          </li>
                        <?php } else { ?>
                          <li class=""><a href="<?= $url ?>" title="Menuju <?= $m2->nama ?>"><?= $m2->nama ?></a></li>
                        <?php } ?>
                      <?php } ?>
                    </ul>
                  </li>
                <?php } else { ?>
                  <li><a href="<?= $url ?>" title="Menuju <?= $m1->nama ?>" class=""><i class="<?= $m1->icon_class ?>" aria-hidden="true"></i> <?= $m1->nama ?></a></li>
                <?php } ?>
            <?php }
            } ?>
            <?php if ($this->user_login) { ?>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  <img src="<?= $user_foto ?>" style="max-width: 30px; max-height: 30px;" />
                </a>
                <ul class="dropdown-menu">
                  <li class="">
                    <a href="<?= base_url('dashboard/') ?>" title="Menuju Dashboard"><i class="fa fa-dashboard"></i> Dashboard</a>
                  </li>
                  <?php if (isset($sess->user->institusi_owner->id)) { ?>
                  <li class="">
                    <a href="<?= base_url('dashboard/institusi/'.$sess->user->institusi_owner->id) ?>" title="Menuju Detail"><i class="fa fa-building"></i> <?=$sess->user->institusi_owner->nama?></a>
                  </li>
                  <?php } ?>
                  <li class="">
                    <a href="<?= base_url('biaya/') ?>" title="Menuju biaya"><i class="fa fa-user"></i> Biaya</a>
                  </li>
                  <li class="">
                    <a href="<?= base_url('front/profil/') ?>" title="Menuju Profil"><i class="fa fa-user"></i> Profil</a>
                  </li>
                  <li class="">
                    <a href="<?= base_url('logout/') ?>" title="Menuju Profil">
                      <i class="fa fa-sign-out"></i> Logout
                    </a>
                  </li>
                </ul>
              </li>
            <?php } else { ?>
              <li><a href="<?= base_url("login") ?>" title="Menuju Login" class=""><i class="fa fa-enter" aria-hidden="true"></i> Beranda</a></li>
              <li><a href="<?= base_url("login") ?>" title="Menuju Login" class=""><i class="fa fa-enter" aria-hidden="true"></i> Tentang Kami</a></li>
              <li><a href="<?= base_url("login") ?>" title="Menuju Login" class=""><i class="fa fa-enter" aria-hidden="true"></i> Login</a></li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>