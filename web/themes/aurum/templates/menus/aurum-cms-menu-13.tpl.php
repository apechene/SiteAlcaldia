<div class="pi-header">
  <div class="pi-section-w pi-section-base">
    <div class="pi-section pi-row-sm">

      <!-- Phone -->
      <?php if(theme_get_setting('menu_phone')): ?>
        <div class="pi-row-block pi-row-block-txt">
          <i class="pi-row-block-icon icon-phone pi-icon-white pi-icon-square"></i><?php print t('Call Us:'); ?> <strong><?php print theme_get_setting('menu_phone'); ?></strong>
        </div>
      <?php endif; ?>
      <!-- End phone -->

      <!-- Email -->
      <?php if(theme_get_setting('menu_email')): ?>
        <div class="pi-row-block pi-row-block-txt pi-hidden-xs">
          <i class="pi-row-block-icon icon-mail pi-icon-white pi-icon-square"></i><?php print t('Email:'); ?> <a href="mailto:<?php print theme_get_setting('menu_email'); ?>"><?php print theme_get_setting('menu_email'); ?></a>
        </div>
      <?php endif; ?>
      <!-- End email -->

      <?php if(theme_get_setting('menu_social')): ?>
        <!-- Social icons -->
        <div class="pi-row-block pi-pull-right pi-hidden-2xs">
          <ul class="pi-social-icons pi-stacked pi-jump pi-full-height pi-bordered">
            <?php foreach(explode("\n", theme_get_setting('menu_social')) as $item): list($icon, $link) = explode("|", $item);  ?>
              <li>
                <a href="<?php print trim($link); ?>" class="pi-social-<?php print $icon; ?>"><i class="<?php print $icon; ?>"></i></a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
        
        <div class="pi-row-block pi-row-block-txt pi-pull-right pi-hidden-xs"><?php print t('Follow Us:'); ?></div>
      <?php endif; ?>

    </div>
  </div>

  <div class="pi-header-sticky">

    <!-- Header row -->
    <div class="pi-section-w pi-row-reducible pi-border-top-light <?php print $menu_color; ?>">
      <div class="pi-section pi-row-lg">

        <!-- Logo -->
        <div class="pi-row-block pi-row-block-logo">
          <a href="<?php print url('<front>'); ?>"><img src="<?php print $logo; ?>" alt=""></a>
        </div><!-- End logo -->

        <div class="pi-row-block">
          <ul class="pi-menu pi-has-hover-border pi-items-have-borders pi-full-height pi-hidden-xs">
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

        <div class="pi-row-block pi-pull-right pi-hidden-sm">
          <?php
            if(module_exists('search')) {
              $search_form_box = module_invoke('search', 'block_view');
              $search_form_box['content']['search_block_form']['#field_prefix'] = '<div class = "pi-input-with-icon pi-input-inline" style = "margin-right:1px;">';
              $search_form_box['content']['search_block_form']['#field_suffix'] = '</div><button type="submit" class="btn pi-btn pi-btn-base">' . t('Search') . '</button>';
              $search_form_box['content']['search_block_form']['#attributes']['class'][] = 'pi-input-wide';

              unset($search_form_box['content']['actions']);
              $search_form_box['content']['#attributes']['class'] = array('form-inline', 'pi-search-form-wide');
              print render($search_form_box);
            }
          ?>
        </div>   

        <!-- Mobile menu button -->
        <div class="pi-row-block pi-pull-right pi-hidden-lg-only pi-hidden-md-only pi-hidden-sm-only">
          <button class="btn pi-btn pi-mobile-menu-toggler" data-target="#pi-main-mobile-menu">
            <i class="icon-menu pi-text-center"></i>
          </button>
        </div><!-- End mobile menu button -->

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

      </div>
    </div>
  </div><!-- End header -->
</div>