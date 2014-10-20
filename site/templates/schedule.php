<? snippet('header') ?>

<section class="schedule-intro">

  <div class="wrapper">
    <div class="column col-8 tablet-full">
      <h2>Schedule</h2>
      <div class="introduction">
        <?= kirbytext($page->text()) ?>
      </div>
    </div>
  </div>

</section>

<? foreach ( $page->children()->visible()->flip() as $week ) { ?>

  <section class="week">

    <div class="week-title">
      <div class="wrapper">
        <div class="column col-12">
          <h3>
            <?= $week->title() ?>:
            <span class="subject"><?= $week->subject() ?></span>
          </h3>
        </div>
      </div>
    </div>

    <div class="week-days">

      <? if ( $week->children()->count() ) { ?>

        <? foreach ( $week->children() as $day ) { ?>

          <div id="<?= sluggify($day->title()) ?>" class="wrapper <?= getDayClasses( $day->date() ); ?>">

            <div class="column col-2 tablet-full date">
              <? $date = $day->date() ?>
              <h4 class="date-weekday">
                <a href="#<?= sluggify($day->title()) ?>"><?= date('l', $date) ?></a>
              </h4>
              <h5 class="date-expanded">
                <?= date('F j, Y', $date) ?>
              </h5>
            </div>

            <div class="column col-5 tablet-two-thirds mobile-full day-content">

              <? if ( strlen( $day->agenda() ) ) { ?>
                <div class="agenda">
                  <?= kirbytext( $day->agenda() ) ?>
                </div>
              <? } ?>

            </div>

            <div class="column col-4 push-1 tablet-third mobile-full">

              <div class="checklist">
                <h4>Checklist</h4>
                <? $checklist = $day->checklist() ?>
                <? if ( strlen( $checklist ) ) { ?>
                  <?= kirbytext( $checklist ) ?>
                <? } else { ?>
                  <p class="fade">Nothing to worry about today!</p>
                <? } ?>
              </div>

              <? if ( strlen( $day->concepts() ) ) { ?>
                <div class="concepts">
                  <h4>Core Principles</h4>
                  <? $concepts = $day->concepts() ?>
                  <?= kirbytext($concepts) ?>
                </div>
              <? } ?>
            </div>

          </div>

        <? } ?>

      <? } else { ?>
        <div class="empty-week wrapper">
          <div class="column col-12 tablet-full">
            <?= kirbytext('This week\'s schedule has not been announced yet. Check back soon!') ?>
          </div>
        </div>
      <? } ?>
    </div>

  </section>

<? } ?>

<? snippet('footer') ?>