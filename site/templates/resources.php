<? snippet('header') ?>

<section class="resources-intro">

  <div class="wrapper">
    <div class="column col-6 tablet-full">
      <h2>Resources</h2>
      <div class="introduction">
        <?= kirbytext( $page->resource_intro() ) ?>
      </div>
    </div>
  </div>

</section>

<section class="resources">

  <? foreach ( $page->children() as $resource ) { ?>

    <div class="wrapper resource">
      <div class="column col-2 tablet-quarter mobile-full resource-name">
        <h4>
          <a href="<?= $resource->link() ?>" target="_blank"><?= $resource->title() ?></a>
        </h4>
      </div>
      <div class="column col-6 tablet-three-quarters mobile-full description">
        <?= kirbytext($resource->description()) ?>
      </div>
      <div class="column col-3 metadata">
        <?#= "Hello" ?>
      </div>
    </div>

  <? } ?>

</section>

<? if ( $page->hasDocuments() ) { ?>

  <section class="files-intro">

    <div class="wrapper">
      <div class="column col-6 tablet-full">
        <h2>Files</h2>
        <div class="introduction">
          <?= kirbytext( $page->files_intro() ) ?>
        </div>
      </div>
    </div>

  </section>

  <section class="files">

    <div class="wrapper files">
      <? foreach ( $page->documents() as $file ) { ?>

          <div class="column col-4 tablet-half mobile-full file">
            <h4>
              <a href="<?= $file->url() ?>" title="<?= $file->name() ?>" download><?= $file->title() ?></a>
              <span class="file-type"><?= strtoupper( $file->extension() ) ?></span>
            </h4>
            <?= kirbytext( $file->description() ) ?>
          </div>

      <? } ?>
    </div>

  </section>

<? } ?>

<? snippet('footer') ?>