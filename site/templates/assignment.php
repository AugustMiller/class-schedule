<? snippet('header') ?>

<section class="assignment">

  <div class="wrapper">
    <div class="column col-12 tablet-full greedy title">
      <h2>
        <?= $assignment->title() ?>
      </h2>
    </div>
    <div class="column col-3 tablet-full title">
      <div class="date">
        Due: <?= $assignment->date() ?>
      </div>
    </div>
    <div class="column col-8 tablet-full">
      <?= $assignment->text()->kirbytext() ?>
    </div>
  </div>

</section>

<? snippet('footer') ?>