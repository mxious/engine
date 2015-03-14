<br>
  <div class="row">
  <form class="col s12" action="<?=base_url('search')?>" method="POST">
    <div class="row">
      <div class="input-field col s12">
        <input id="search_query" type="text" name="search_query">
        <label for="search_query">Search for something</label>
      </div>
    <div class="right-align">
    <button class="btn btn-mini waves-effect waves-light yellow darken-4 right-align" type="submit" name="action">Search
      <i class="mdi-content-send right"></i>
    </button>
    </div>      
    </div>

  </form>
</div>

<br><br>
<div class="row"> 

<? if (!empty($artist_results)): ?>
 <? foreach($artist_results as $a): ?>

    <div class="col s4">
      <div class="card">
        <div class="card-image">
          <img src="<?php echo $api_obj->cover_img($a['name']);?>">
          <span class="card-title"><?=$a['name']?></span>
        </div>
        <div class="card-content">
          <p><?=$a['description']?></p>
        </div>
        <div class="card-action">
          <a href="#">Learn more</a>
          <a href='#'>Listen</a>
        </div>
      </div>
    </div>

    <? endforeach; ?>
<? endif; ?>

<? if (!empty($album_results)): ?>
 <? foreach($album_results as $a): ?>

    <div class="col s4">
      <div class="card">
        <div class="card-image">
          <img src="<?php echo $api_obj->cover_img($a['name'], $a['artist']);?>">
          <span class="card-title"><?=$a['name']?></span>
        </div>
        <div class="card-content">
          <p><?=$a['description']?></p>
        </div>
        <div class="card-action">
          <a href="#">Learn more</a>
          <a href='#'>Listen</a>
        </div>
      </div>
    </div>

    <? endforeach; ?>
<? endif; ?>

<? if (!empty($song_results)): ?>
 <? foreach($song_results as $s): ?>

    <div class="col s4">
      <div class="card">
        <div class="card-image">
          <img src="<?php echo $api_obj->cover_img($s['name']);?>">
          <span class="card-title"><?=$s['name']?></span>
        </div>
        <div class="card-content">
          <p><?=$s['description']?></p>
        </div>
        <div class="card-action">
          <a href="#">Learn more</a>
          <a href='#'>Listen</a>
        </div>
      </div>
    </div>

    <? endforeach; ?>
<? endif; ?>


</div>
