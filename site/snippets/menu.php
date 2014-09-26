<nav class="menu">
  <ul>
    <? foreach( $pages->visible() as $p ) { ?>
      <li>
        <? $menu_item_classes = array('menu-item'); ?>
        <? ( $p->isOpen() ? array_push($menu_item_classes, 'active') : false ) ?>
        <a class="<?= join(' ', $menu_item_classes) ?>" href="<?= $p->url() ?>">
          <?= html( $p->title() ) ?>
        </a>
      </li>
    <? } ?>
  </ul>
</nav>