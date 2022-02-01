<?php $classes .= $submenu ? ' pi-has-dropdown' : '';?>
<li class="<?php print $classes;?>">
  <a href="<?php print in_array($item['link']['href'], array('<nolink>')) ? "#" : url($item['link']['href'], $item['link']['options']);?>" <?php echo drupal_attributes($item['link']['#attributes']); ?> >
    <?php if(!empty($item_config['xicon'])) : ?>
      <i class="fa <?php print $item_config['xicon'];?>"></i>
    <?php endif;?>    
    <span><?php print t($item['link']['title']);?></span>
    <?php if(!empty($item_config['caption'])) : ?>
      <?php print t($item_config['caption']);?>
    <?php endif;?>
  </a>
  <?php print $submenu ? $submenu : "";?>
</li>
