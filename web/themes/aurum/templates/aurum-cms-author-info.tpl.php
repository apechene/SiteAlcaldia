<?php $user = user_load($node->uid); $info = _get_node_field($user, 'field_info'); ?>
<div class="pi-shadow-effect7 pi-margin-bottom-50">
  <div class="pi-box pi-border pi-round pi-border-top">
    
    <?php if(isset($user->picture->uri)): ?>
      <div class="pi-img-w pi-img-round pi-img-left" style="width: 90px;">
        <span class="pi-img-shadow-inner">
          <?php print theme('image', array('path' => $user->picture->uri)); ?>
        </span>
      </div>
    <?php endif;?>
    
    <h4 class="pi-weight-600"><?php print $user->name; ?></h4>

    <?php print $info[0]['safe_value']; ?>
    
    <div class="pi-clearfix"></div>
    
  </div>
</div>

<hr class="pi-divider pi-divider-dashed pi-divider-big">