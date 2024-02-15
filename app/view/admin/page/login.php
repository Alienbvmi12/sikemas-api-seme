<!DOCTYPE html>
<html lang="en">
<?php $this->getThemeElement('page/html/head', $__forward) ?>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <?php $this->getThemeContent() ?>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
    <?php $this->getJsFooter(); ?>
    <?php $this->getJsReady(); ?>
</body>

</html>