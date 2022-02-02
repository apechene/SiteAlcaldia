<?php global $user; ?>
<div class="pi-header">
  <div class="pi-section-w pi-section-dark">
    <div class="pi-section pi-row-sm">

      <?php if(theme_get_setting('menu_social')): ?>
        <div class="pi-row-block pi-row-block-txt pi-hidden-2xs"><?php print t('Follow us:'); ?></div>

        <!-- Social icons -->
        <div class="pi-row-block pi-hidden-2xs">
          <ul class="pi-social-icons pi-small pi-round pi-jump pi-jump-bg pi-colored-bg">
            <?php foreach(explode("\n", theme_get_setting('menu_social')) as $item): list($icon, $link) = explode("|", $item);  ?>
              <li>
                <a href="<?php print trim($link); ?>" class="pi-social-<?php print $icon; ?>"><i class="<?php print $icon; ?>"></i></a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
        
      <?php endif; ?>
    
      <?php if(!$user->uid): ?>
        <!-- Social icons -->
        <div class="pi-row-block pi-pull-right pi-hidden-xs" style="margin-right: 6px;">
          <?php
            global $user_form_inline;
            $user_form_inline = 1;
            $form = drupal_get_form('user_login');
            $form['name']['#title_display'] = 'none';
            $form['pass']['#title_display'] = 'none';
            $form['name']['#nd_icon'] = 'icon-user';
            $form['pass']['#nd_icon'] = 'icon-lock';
            $form['name']['#attributes']['class'][] = 'pi-input-wide';
            $form['pass']['#attributes']['class'][] = 'pi-input-wide';
            $form['name']['#attributes']['placeholder'] = t('Name');
            $form['pass']['#attributes']['placeholder'] = t('Password');
            $form['actions']['submit']['#attributes']['class'][] = 'pi-btn-base pi-btn-no-border';
            $form['#attributes']['class'][] = 'form-inline-elements';
            unset($form['name']['#description'], $form['pass']['#description']);
            print drupal_render($form);
            $user_form_inline = 0;
          ?>
        </div>
        <!-- End social icons -->
      <?php endif; ?>

    </div>
  </div>

  <div class="pi-header-sticky">
    <!-- Header row -->
    <div class="pi-section-w pi-row-reducible <?php print $menu_color; ?>">
      <div class="pi-section pi-row-lg">

        <!-- Logo -->
        <div class="pi-row-block pi-row-block-logo" style="margin-right: 25px">
          <a href="<?php print url('<front>'); ?>"><img src="<?php print $logo; ?>" alt=""></a>
        </div><!-- End logo -->

        <?php if(theme_get_setting('menu_phone')): ?>
          <div class="pi-row-block pi-row-block-txt pi-big-font pi-weight-600 pi-text-<?php print $color == "base" ? 'white' : 'base'?> pi-hidden-2xs">
            <i class="pi-row-block-icon icon-mobile pi-text-dark"></i><?php print theme_get_setting('menu_phone'); ?>
          </div>
        <?php endif; ?>

        <div class="pi-row-block pi-pull-right pi-hidden-md">
          <?php
            if(module_exists('search')) {
              $search_form_box = module_invoke('search', 'block_view');
              unset($search_form_box['content']['actions']);
              $search_form_box['content']['#attributes']['class'] = array('form-inline', 'pi-form-short');
              print render($search_form_box);
            }
          ?>
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