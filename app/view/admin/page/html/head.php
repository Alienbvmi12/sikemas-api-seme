<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title><?= $this->getTitle() ?></title>
    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="<?= $this->getIcon() ?>">
    <!-- END Icons -->

    <meta name="msapplication-TileColor" content="#353769">
    <meta name="theme-color" content="#353769">
    <?php $this->getAdditionalBefore() ?>
    <?php $this->getAdditional() ?>
    <?php $this->getAdditionalAfter() ?>

    <style>
        #nprogress-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 9999;
            /* Set a high z-index to move it to the front */
        }
    </style>
</head>