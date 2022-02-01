<?php global $user_form_inline; if(arg(0) != 'user' || $user_form_inline) { print drupal_render_children($form); return; } ?>
<div class="pi-section-w pi-section-white piICheck piStylishSelect full-width-adjust" style="background: #f4f6f6;">
  <div class="pi-section pi-padding-bottom-60">
    
    <div class="pi-text-center pi-margin-bottom-50">
      <h1 class="pi-uppercase pi-weight-700 pi-has-border pi-has-tall-border pi-has-short-border">
        <?php print t('Sign In'); ?>
      </h1>
    </div>
    
    <!-- Row -->
    <div class="pi-row">
      
      <!-- Col 4 -->
      <div class="pi-col-md-4 pi-col-md-offset-4 pi-col-sm-6 pi-col-sm-offset-3 pi-col-xs-8 pi-col-xs-offset-2">
      
        <!-- Box -->
        <div class="pi-box pi-round pi-shadow-15">
          
          <?php print drupal_render_children($form); ?>
          
        </div>
        <!-- End box -->
        
        <p class="pi-text-center">
          <?php // print t("Don't have Account?"); ?> <?php // print l(t('Sign Up'), 'user/register', array('attributes' => array('class' => array('pi-weight-600')))); ?>
        </p>
        
      </div>
      <!-- End col 4 -->
      
    </div>
    <!-- End row -->
    
  </div>
</div>