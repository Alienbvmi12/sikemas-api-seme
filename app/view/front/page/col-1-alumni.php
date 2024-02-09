<?php
//Example 1 column layout
?>
<!DOCTYPE html>
<html lang="id">
<?php $this->getThemeElement("page/html/head",$__forward); ?>
<?php $this->getBodyBefore(); ?>
<body class="">
  <div class="container-fluid">
    <div class="row container_utama">
      <!-- main content-->
      <div class="col-md-12">
        <?php $this->getThemeContent(); ?>
      </div>
      <!-- main content-->
    </div>
  </div>

  <!-- load JS in footer-->
  <?php $this->getJsFooter(); ?>
  <!-- End load JS in footer-->

  <!-- default JS Script-->
  <script>
  $(document).ready(function(e){
    <?php $this->getJsReady(); ?>
    <?php $this->getJsContent(); ?>
  });
  </script>
  <!-- default JS Script-->
</body>
</html>
