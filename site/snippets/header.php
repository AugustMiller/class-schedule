<!DOCTYPE html>
<html lang="en">
  <head>
    
    <title><?= html($site->title()) ?> - <?= html($page->title()) ?></title>
    <meta charset="utf-8" />
    <meta name="description" content="<?= html($site->description()) ?>" />
    <meta name="keywords" content="<?= html($site->keywords()) ?>" />
    <meta name="robots" content="index, follow" />

    <?= css('assets/css/schedule.css') ?>

  </head>

  <body class="<?= bodyClass($page) ?>">

    <section class="header">
      <div class="wrapper">
        <div class="column col-2 tablet-third mobile-full">
          <h1><a href="<?= url() ?>"><?= $site->title() ?></a></h1>
        </div>
        <div class="column col-6 tablet-third mobile-full">
          <? snippet('menu') ?>
        </div>
        <div class="column col-4 tablet-third mobile-hide">
          <?= $site->term() ?>
        </div>
      </div>
    </section>