<? snippet('header') ?>

<section class="files-intro">

  <div class="wrapper">
    <div class="column col-6 tablet-full">
      <h2>Files</h2>
      <div class="introduction">
        <?= $page->text()->kirbytext() ?>
      </div>
    </div>
  </div>

</section>

<section class="files">

  <div class="wrapper files">
    <? $documents = $page->children()->visible(); ?>
    <? foreach ( $documents as $document ) { ?>
      <? $file = $document->files()->first() ?>
      <div class="column col-4 tablet-half mobile-full file">
        <h4>
          <a href="<?= $file->url() ?>" title="<?= $document->name() ?>" download><?= $document->title() ?></a>
          <span class="file-type"><?= strtoupper( $file->extension() ) ?></span>
        </h4>
        <?= $document->description()->kirbytext() ?>
      </div>
    <? } ?>
  </div>

</section>

<? snippet('footer') ?>