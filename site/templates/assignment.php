<? snippet('header') ?>

<section class="assignment-header">
  <div class="wrapper">
    <div class="column col-12 tablet-full title">
      <h2>
        <?= html::a($page->parent()->url(), "Assignment") ?>: <span class="assignment-name"><?= $page->title() ?></span>
      </h2>
      <?= $page->description()->markdown() ?>
    </div>
  </div>
</section>

<section class="assignment">
  <div class="wrapper">
    <div class="column col-2 tablet-quarter mobile-full metadata">
      <div class="date">
        <strong>Due:</strong> <?= date('j F Y', $page->date()) ?>
      </div>
      <? /*
      <? if ( $page->hasFiles() ) { ?>
        <div class="attachments">
          <ul>
            <? foreach ( $page->files() as $file ) { ?>
             <li><a href="<?= $file->url() ?>" title="<?= $file->name() ?>" download><?= $file->title() ?></a></li>
            <? } ?>
        </div>
      <? } ?>
      */ ?>
    </div>
    <div class="column col-7 tablet-three-quarters mobile-full">
      <?= $page->text()->kirbytext() ?>
    </div>
  </div>
</section>

<? snippet('footer') ?>