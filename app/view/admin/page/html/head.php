<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title><?=$this->getTitle()?></title>

    <meta name="description" content="<?=$this->getDescription()?>">
    <meta name="keyword" content="<?=$this->getKeyword()?>"/>
    <meta name="author" content="<?=$this->getAuthor()?>">
    <meta name="robots" content="<?=$this->getRobots()?>" />

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="<?=$this->cdn_url()?>media/icon/android-chrome-192x192.png">
    <link rel="apple-touch-icon" href="<?=$this->cdn_url()?>media/icon/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" type="image/png" sizes="32x32" href="<?=$this->cdn_url()?>media/icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?=$this->cdn_url()?>media/icon/favicon-16x16.png">
    <link rel="manifest" href="<?=base_url()?>media/icon/site.webmanifest">
    <link rel="mask-icon" href="<?=$this->cdn_url()?>media/icon/safari-pinned-tab.svg" color="#f6efa2">
    <link rel="shortcut icon" href="<?=$this->cdn_url()?>media/icon/favicon.ico">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-config" content="<?=$this->cdn_url()?>media/icon/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- END Stylesheets -->

    <?php $this->getAdditionalBefore()?>
    <?php $this->getAdditional()?>
    <?php $this->getAdditionalAfter()?>

    <!-- Modernizr (browser feature detection library) -->
    <script src="<?=$this->cdn_url()?>skin/admin/js/vendor/modernizr.min.js"></script>

</head>
