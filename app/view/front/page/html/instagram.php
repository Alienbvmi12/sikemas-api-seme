<section class="instagram">
  <div class="row">
    <div class="col-md-12">
      <h2>Travtou di Instagram</h2>
    </div>
    <?php if(isset($ig_list)){ foreach($ig_list as $ig){ ?>
      <div class="col-md-3">
        <a href="<?=$ig->ig_link?>" target="_blank" title="">
          <img src="<?=$ig->ig_media?>" class="img-responsive" alt="" />
        </a>
      </div>
    <?php }} ?>
  </div>
</section>
