<head>
  <!-- Basic page needs -->
  <meta charset="utf-8">
  <!-- Mobile specific metas  -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <![endif]-->
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?php echo $this->getTitle(); ?></title>
  <meta name="language" content="id" />
  <meta name="description" content="<?php echo $this->getDescription(); ?>" />
  <meta name="keyword" content="<?php echo $this->getKeyword(); ?>" />
  <meta name="author" content="<?php echo $this->getAuthor(); ?>">
  <link rel="icon" href="<?php echo $this->getIcon(); ?>" type="image/x-icon" />
  <link rel="shortcut icon" href="<?php echo $this->getShortcutIcon(); ?>" type="image/x-icon" />
  <meta name="robots" content="<?php echo $this->getRobots(); ?>" />

  <!-- icons -->
  <link rel="apple-touch-icon" sizes="180x180" href="<?= $this->cdn_url() ?>skin/front/icon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?= $this->cdn_url() ?>skin/front/icon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?= $this->cdn_url() ?>skin/front/icon/favicon-16x16.png">
  <link rel="manifest" href="<?= $this->cdn_url() ?>skin/front/icon/site.webmanifest">
  <link rel="mask-icon" href="<?= $this->cdn_url() ?>skin/front/icon/safari-pinned-tab.svg" color="#5bbad5">
  <link rel="shortcut icon" href="<?= $this->cdn_url() ?>skin/front/icon/favicon.ico">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="msapplication-config" content="<?= $this->cdn_url() ?>skin/front/icon/browserconfig.xml">
  <meta name="theme-color" content="#ffffff">

  <!-- prefetch -->
  <meta http-equiv="x-dns-prefetch-control" content="on">
  <link rel="dns-prefetch" href="//www.googletagmanager.com" />
  <link rel="dns-prefetch" href="//connect.facebook.net" />
  <link rel="dns-prefetch" href="//www.facebook.com" />
  <link rel="dns-prefetch" href="//fonts.googleapis.com" />

  <!-- geo -->
  <meta name="geo.region" content="" />
  <meta name="geo.placename" content="" />
  <meta name="geo.position" content="" />
  <meta name="ICBM" content="" />


  <!-- other meta -->
  <meta property="fb:app_id" content="" />
  <meta property="og:image" content="" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Salsa" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Sansita" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Unlock&display=swap" rel="stylesheet">

  <?php $this->getAdditionalBefore(); ?>
  <?php $this->getAdditional(); ?>
  <?php $this->getAdditionalAfter(); ?>

  <!-- google meta tag -->
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-61723221-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-61723221-1');
  </script>

  <!-- end google meta tag-->
  <!--facebook analytics-->
  <!--end facebook analytics-->
</head>