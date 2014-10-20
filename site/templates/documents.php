<? snippet('header') ?>

<? if ( $page->hasChildren() ) { ?>

  <section class="files-intro">

    <div class="wrapper">
      <div class="column col-6 tablet-full">
        <h2>Files</h2>
        <div class="introduction">
          <?= kirbytext( $page->text() ) ?>
        </div>
      </div>
    </div>

  </section>

  <section class="files">

    <div class="wrapper files">
      <? $documents = $page->children(); ?>
      <? foreach ( $documents as $document ) { ?>
        <? $file = $document->files()->filterBy('extension', '!=', 'txt')->first() ?>
        <div class="column col-4 tablet-half mobile-full file">
          <h4>
            <a href="<?= $file->url() ?>" title="<?= $document->name() ?>" download><?= $document->title() ?></a>
            <span class="file-type"><?= strtoupper( $file->extension() ) ?></span>
          </h4>
          <?= kirbytext( $document->description() ) ?>
        </div>
      <? } ?>
    </div>

  </section>

<? } ?>

<? snippet('footer') ?>