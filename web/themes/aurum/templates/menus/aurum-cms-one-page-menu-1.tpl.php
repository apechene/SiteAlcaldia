<div class="pi-header piScrollTo piFixedHeader">
  <div class="pi-header-sticky">
    <!-- Header row -->
    <div class="pi-section-w pi-section-<?php print theme_get_setting('menu_color'); ?> pi-shadow-bottom pi-row-reducible">
      <div class="pi-section pi-row-lg">

        <!-- Logo -->
        <div class="pi-row-block pi-row-block-logo">
          <a href="<?php print url('<front>'); ?>"><img src="<?php print theme_get_setting('logo'); ?>" alt=""></a>
        </div><!-- End logo -->

        <!-- Text -->
        <div class="pi-row-block pi-row-block-txt pi-hidden-2xs"><?php print variable_get('site_slogan', ''); ?></div>

        <!-- Menu -->
        <div id = "pi-header-menu" class="pi-row-block pi-pull-right">
          <ul class="pi-simple-menu pi-has-hover-border pi-full-height pi-hidden-sm">
            <?php
              $main_menu_tree = module_exists('i18n_menu') ? i18n_menu_translated_tree($menu_name) : menu_tree($menu_name);
              print drupal_render($main_menu_tree);
            ?>
          </ul>
        </div>
        <!-- End menu -->

        <!-- Mobile menu button -->
        <div class="pi-row-block pi-pull-right pi-hidden-lg-only pi-hidden-md-only">
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
                $tree = menu_build_tree(variable_get('menu_main_links_source', $menu_name));
                print aurum_mobile_menu($tree);
              ?>
            </ul>
          </div>
        </div><!-- End mobile menu -->

      </div>
    </div><!-- End header row -->
  </div><!-- End header -->
</div>