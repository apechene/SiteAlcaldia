<?php global $user; ?>
<div class="pi-header">
  <div class="pi-section-w pi-section-dark">
    <div class="pi-section pi-row-sm">

      <!-- Address -->
      <?php if(theme_get_setting('menu_address')): ?>
        <div class="pi-row-block pi-row-block-txt pi-hidden-xs">
          <i class="pi-row-block-icon icon-location pi-text-base"></i><?php print theme_get_setting('menu_address'); ?>
        </div>
      <?php endif; ?>
      <!-- End address -->
      
      <!-- Phone -->
      <?php if(theme_get_setting('menu_phone')): ?>
        <div class="pi-row-block pi-row-block-txt">
          <i class="pi-row-block-icon icon-phone pi-text-base"></i><strong><?php print theme_get_setting('menu_phone'); ?></strong>
        </div>
      <?php endif; ?>
      <!-- End phone -->

      <?php if(theme_get_setting('menu_social')): ?>
        <!-- Social icons -->
        <div class="pi-row-block pi-pull-right pi-hidden-2xs">
          <ul class="pi-social-icons-simple pi-small">
            <?php foreach(explode("\n", theme_get_setting('menu_social')) as $item): list($icon, $link) = explode("|", $item);  ?>
              <li>
                <a href="<?php print trim($link); ?>" class="pi-social-<?php print $icon; ?>"><i class="<?php print $icon; ?>"></i></a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>

        <div class="pi-row-block pi-row-block-txt pi-hidden-2xs pi-pull-right"><?php print t('Follow Us:'); ?></div>
      <?php endif; ?>

    </div>
  </div>

  <div class="pi-header-sticky">
    <!-- Header row -->
    <div class="pi-section-w pi-row-reducible <?php print $menu_color; ?>">
      <div class="pi-section pi-row-lg">

        <!-- Logo -->
        <div class="pi-row-block pi-row-block-logo">
          <a href="<?php print url('<front>'); ?>"><img src="<?php print $logo; ?>" alt=""></a>
        </div><!-- End logo -->

        <!-- Text -->
        <div class="pi-row-block pi-row-block-txt pi-italic <?php print $text_color; ?> pi-hidden-2xs"><?php print variable_get('site_slogan', ''); ?></div>

        <!-- Mobile menu button -->
        <div class="pi-row-block pi-pull-right pi-hidden-lg-only pi-hidden-md-only">
          <button class="btn pi-btn pi-mobile-menu-toggler" data-target="#pi-main-mobile-menu">
            <i class="icon-menu pi-text-center"></i>
          </button>
        </div><!-- End mobile menu button -->

        <div class="pi-row-block pi-pull-right pi-hidden-xs">
          <a href = "<?php print url('contact'); ?>" class="btn pi-btn pi-btn-base<?php print $color == 'white' ? '' : '-2'; ?>" style="margin-right: 1px"><?php print t('Contact us'); ?></a>
          <a href = "<?php print url('user'); ?>" class="btn pi-btn pi-btn-no-border pi-shadow <?php print $color == 'dark' ? 'pi-btn-dark' : ''; ?>"><?php print $user->uid ? t('Account') : t('Login'); ?></a>
        </div>

        <!-- Menu -->
        <div class="pi-row-block pi-pull-right">
          <ul class="pi-simple-menu pi-has-hover-border pi-full-height pi-hidden-sm">
            <?php if(module_exists('tb_megamenu')) {
                print theme('tb_megamenu', array('menu_name' => 'main-menu'));
              }
              else {
                $main_menu_tree = module_exists('i18n_menu') ? i18n_menu_translated_tree(variable_get('menu_main_links_source', 'main-menu')) : menu_tree(variable_get('menu_main_links_source', 'main-menu'));
                print drupal_render($main_menu_tree);
              }
            ?>
          </ul>
        </div>
        <!-- End menu -->

        <!-- Mobile menu -->
        <div id="pi-main-mobile-menu" class="pi-section-menu-mobile-w pi-section-dark">
          <div class="pi-section-menu-mobile">
            <?php
              if(module_exists('search')) {
                $search_form_box = module_invoke('search', 'block_view');
                $search_form_box['content']['search_block_form']['#attributes']['class'][] = 'pi-input-wide';
                unset($search_form_box['content']['actions']);
                $search_form_box['content']['#attributes']['class'] = array('form-inline', 'pi-search-form-wide', 'ng-pristine', 'ng-valid');
                print render($search_form_box);
              }
            ?>
            <ul class = "pi-menu-mobile pi-items-have-borders pi-menu-mobile-dark">
              <?php
                $tree = menu_build_tree(variable_get('menu_main_links_source', 'main-menu'));
                print aurum_mobile_menu($tree);
              ?>
            </ul>
          </div>
        </div><!-- End mobile menu -->

      </div><!-- End header row -->
    </div>
  </div><!-- End header -->
</div>