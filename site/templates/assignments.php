<? snippet('header') ?>

<section class="assignments-intro">

  <div class="wrapper">
    <div class="column col-6 tablet-full">
      <h2>Assignments</h2>
      <div class="introduction">
        <?= $page->text()->kirbytext() ?>
      </div>
    </div>
  </div>

</section>

<section class="assignments">

  <div class="wrapper">
    <? foreach ( $page->children()->visible() as $assignment ) { ?>
      <div class="column col-6 mobile-full assignment">
        <h4>
          <?= html::a($assignment->url(), $assignment->title()) ?>
        </h4>
        <?= $assignment->description()->kirbytext() ?>
      </div>
    <? } ?>
  </div>

</section>

<? snippet('footer') ?>