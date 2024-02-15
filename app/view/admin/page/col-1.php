<!DOCTYPE html>
<html lang="en">

<?php $this->getThemeElement('page/html/head', $__forward) ?>

<body class="sb-nav-fixed">
    <?php $this->getThemeElement('page/html/topbar', $__forward) ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php $this->getThemeElement('page/html/sidebar', $__forward) ?>
        </div>
        <div id="layoutSidenav_content">
            <main><?php $this->getThemeContent() ?></main>
            <footer class="py-4 bg-light mt-auto">
                <?php $this->getThemeElement('page/html/footer', $__forward) ?>
            </footer>
        </div>
    </div>
    <!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
    <?php $this->getJsFooter(); ?>
    <?php $this->getJsReady(); ?>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script> -->
</body>

</html>