<!DOCTYPE html>
<html lang="en">
  <head>
    
    <title><?= html($site->title()) ?> - <?= html($page->title()) ?></title>
    <meta charset="utf-8" />
    <meta name="description" content="<?= html($site->description()) ?>" />
    <meta name="keywords" content="<?= html($site->keywords()) ?>" />
    <meta name="robots" content="index, follow" />
    <meta name="viewport" content="width=device-width, user-scaleable=no, initial-scale=1, maximum-scale=1" />

    <?#= js('//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js') ?>
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