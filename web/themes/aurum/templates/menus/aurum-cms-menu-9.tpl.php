<div class="pi-header">
  <div class="pi-header-sticky">
    <!-- Header row -->
    <div class="pi-section-w pi-row-reducible <?php print $menu_color; ?>">
      <div class="pi-section pi-row-lg">

        <!-- Logo -->
        <div class="pi-row-block pi-row-block-logo">
          <a href="<?php print url('<front>'); ?>"><img src="<?php print $logo; ?>" alt=""></a>
        </div><!-- End logo -->

        <div class="pi-row-block">
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

        <!-- Mobile menu button -->
        <div class="pi-row-block pi-pull-right pi-hidden-lg-only pi-hidden-md-only">
          <button class="btn pi-btn pi-mobile-menu-toggler" data-target="#pi-main-mobile-menu">
            <i class="icon-menu pi-text-center"></i>
          </button>
        </div><!-- End mobile menu button -->

        <?php if(theme_get_setting('menu_email')): ?>
          <div class="pi-row-block pi-pull-right pi-row-block-txt pi-hidden-2xs">
            <img src="<?php print base_path() . path_to_theme() . '/img/mail-icon.png'; ?>" class="pi-row-block-icon" alt=""><a href="mailto:<?php print theme_get_setting('menu_email'); ?>"><?php print theme_get_setting('menu_email'); ?></a>
          </div>
        <?php endif; ?>

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