<ol class="breadcrumb">
  <?php
  if(isset($this->breadcrumbs)){
    echo '<li class="home"> <a href="'.base_url().'" title="Kembali ke beranda">Beranda</a></li>';
    $max = count($this->breadcrumbs);
    $i=0;
    foreach($this->breadcrumbs as $bc){
      //print_r($bc);
      //die();
      $i++;
      if($i == $max){
        echo  '<li class="active"> <strong>'.$bc->name.'</strong> </li>';
      }else{
        echo '<li> <a href="'.$bc->url.'" title="'.$bc->title.'">'.$bc->name.'</a></li>';
      }
    }
  }
  ?>
</ol>
