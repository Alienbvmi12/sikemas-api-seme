<?php
//Example 1 column layout
?>
<!DOCTYPE html>
<html lang="id">
<?php $this->getThemeElement("page/html/head",$__forward); ?>
<?php $this->getBodyBefore(); ?>
<body class="" style="background-image: url('media/backgroundcolor.jpg');">
  <div class="col-1-login-cfg" style="">
    <div class="container">
    	<div class="row">
    		<div class="col-lg-6 col-lg-offset-3 col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8 ">
          <?php $this->getThemeContent(); ?>
        </div>
      </div>
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
