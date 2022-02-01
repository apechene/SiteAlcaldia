<?php if($menu_name != 'main-menu'): ?>
  <ul class = "pi-menu pi-has-hover-border pi-items-have-borders pi-full-height pi-hidden-xs">
<?php endif;?>
    <?php print $content;?>
<?php if($menu_name != 'main-menu'): ?>
  </ul>
<?php endif;?>