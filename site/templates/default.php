<?php snippet('header') ?>

<section class="content">
  <div class="wrapper">
    <div class="column col-8 tablet-full">
      <h1><?php echo html($page->title()) ?></h1>
      <?php echo kirbytext($page->text()) ?>
    </div>
  </div>
</section>

<?php snippet('footer') ?>