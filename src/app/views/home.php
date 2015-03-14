<div class="row" id="layout"> 

  <?php foreach ($posts as $p): ?>
    <div class="col item-masonry">
        <div class="card">
          <div class="card-image">
            <img src="<?=$p['img_url']?>">

            <span class="card-title"><?=$p['title']?></span>
          </div>
          <div class="card-content">
            <p><?=$p['content']?></p>
          </div>
          <div class="card-action">
            <a href="#">Learn more</a>
            <a href='#'>Listen</a>
          </div>
        </div>
      </div>
  </div>
  <?php endforeach; ?>

</div>
<br>