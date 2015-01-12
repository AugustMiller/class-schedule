<? snippet('header') ?>

<section class="resources-intro">

  <div class="wrapper">
    <div class="column col-6 tablet-full">
      <h2>Resources</h2>
      <div class="introduction">
        <?= kirbytext( $page->text() ) ?>
      </div>
    </div>
  </div>

</section>

<section class="resources">

  <? foreach ( $page->children()->sortBy('title', 'ASC') as $resource ) { ?>

    <div class="wrapper resource">
      <div class="column col-2 tablet-quarter mobile-full resource-name">
        <h4>
          <a href="<?= $resource->link() ?>" target="_blank"><?= $resource->title() ?></a>
        </h4>
      </div>
      <div class="column col-6 tablet-three-quarters mobile-full description">
        <?= $resource->description()->kirbytext() ?>
      </div>
      <div class="column col-3 metadata">
        <?#= "Hello" ?>
      </div>
    </div>

  <? } ?>

</section>

<? snippet('footer') ?>