<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page while offline.
 *
 * All the available variables are mirrored in html.tpl.php and page.tpl.php.
 * Some may be blank but they are provided for consistency.
 *
 * @see template_preprocess()
 * @see template_preprocess_maintenance_page()
 *
 * @ingroup themeable
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">

<head>
  <title><?php print $head_title; ?></title>
  <?php print $head; ?>
  <!-- HTML5 element support for IE6-8 -->
  <!--[if lt IE 9]>
  <script src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv-printshiv.min.js"></script>
  <![endif]-->
  <style type="text/css">
    html{
      height: 100%;
      padding: 0;
      margin: 0;
    }
    body{
      height: 100%;
      padding: 0;
      margin: 0;
      background: #f0f0f0 url(/sites/all/themes/aurum/img/sitio_en_mantenimiento.jpg) center;
      background-size: cover;
    }
    a{
      display: block;
      opacity: 0;
      position: fixed;
      left: 0px;
      top: 0px;
      right: 0px;
      bottom: 0px;

    }
    @media all and (orientation: portrait){ 

      body{
        background-position: 38% center;
      }
     }
  </style>
</head>
<body class="<?php print $classes; ?>">
  <a href="https://www.cartagena.gov.co">Ir al sitio de la alcaldía</a>
</body>
</html>
