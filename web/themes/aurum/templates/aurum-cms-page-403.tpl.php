<?php global $user; ?>
<div class="pi-section-w pi-section-white">
  <div class="pi-section pi-text-center pi-padding-top-70 pi-padding-bottom-100">
  
    <p class="pi-weight-700 pi-text-dark pi-404">
      403
    </p>
    <p class="lead-30 pi-weight-700 pi-uppercase pi-text-dark pi-margin-bottom-10">
      <?php print theme_get_setting('403_title'); ?>
    </p>
    <p>
      <?php print theme_get_setting('403_text'); ?>
    </p>
    <p>
      <?php if(!$user->uid): ?>
        <?php print l(t('Login'), 'user/login', array('attributes' => array('class' => array('btn', 'pi-btn', 'pi-btn-base', 'pi-btn-big-paddings', 'pi-btn-big')))); ?>
      <?php else: ?>
        <?php print l(t('Homepage'), '<front>', array('attributes' => array('class' => array('btn', 'pi-btn', 'pi-btn-base', 'pi-btn-big-paddings', 'pi-btn-big')))); ?>
      <?php endif; ?>
    </p>
    
  </div>
</div>