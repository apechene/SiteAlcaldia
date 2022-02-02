<!DOCTYPE html>
<html  lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"<?php print $rdf_namespaces; ?>>
<head>
  <?php print $head; ?>

  <title><?php print $head_title; ?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>

  <?php print $styles; ?>
  
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700;900&display=swap" rel="stylesheet">


</head>
<body class="fixed-header <?php print $classes; ?>"<?php print $attributes; ?>>

  <?php print $page_top; ?>
  <?php print $page; ?>
  <script src="//maps.googleapis.com/maps/api/js?key=<?php print theme_get_setting('gmap_key'); ?>" type="text/javascript"></script>
  <?php print $scripts; ?>
  <?php print $page_bottom; ?>

  <?php if(strpos($_SERVER['HTTP_HOST'], 'nikadevs') !== FALSE): ?>
    <div class="pi-settings-panel">
      <ul class="pi-settings-width">
        <li>Boxed</li>
        <li class="pi-active">Wide</li>
      </ul>
      <h5>Background</h5>
      <ul class="pi-settings-bg">
        <li class="pi-settings-btn-bg-wood" data-class="pi-bg-main-wood"></li>
        <li class="pi-settings-btn-bg-wood-dark" data-class="pi-bg-main-wood-dark"></li>
        <li class="pi-settings-btn-bg-wood-light" data-class="pi-bg-main-wood-light"></li>
        <li class="pi-settings-btn-bg-embossed-dark" data-class="pi-bg-main-embossed-dark"></li>
      </ul>
      <h5>Color Scheme</h5>
      <ul class="pi-settings-scheme">
        <li class="pi-settings-btn-scheme-base pi-active" data-color="base"></li>
        <li class="pi-settings-btn-scheme-blue" data-color="blue"></li>
        <li class="pi-settings-btn-scheme-green" data-color="green"></li>
        <li class="pi-settings-btn-scheme-lime" data-color="lime"></li>
        <li class="pi-settings-btn-scheme-orange" data-color="orange"></li>
        <li class="pi-settings-btn-scheme-red" data-color="red"></li>
        <li class="pi-settings-btn-scheme-brown" data-color="brown"></li>
        <li class="pi-settings-btn-scheme-purple" data-color="purple"></li>
      </ul>
      <div class="pi-btn-settings"></div>
    </div>

    <link rel="stylesheet" type="text/css" href="<?php print base_path() . path_to_theme(); ?>/css/settings-panel.css">
    <script src="<?php print base_path() . path_to_theme(); ?>/js/settings.js"></script>
  <?php endif; ?>

</body>
</html>