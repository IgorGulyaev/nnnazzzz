<?php
/**
 * @file
 * Default theme implementation to display the basic html structure of a single
 * Drupal page.
 *
 * Variables:
 * - $css: An array of CSS files for the current page.
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or
 *   'rtl'.
 * - $rdf_namespaces: All the RDF namespace prefixes used in the HTML document.
 * - $grddl_profile: A GRDDL profile allowing agents to extract the RDF data.
 * - $head_title: A modified version of the page title, for use in the TITLE
 *   tag.
 * - $head_title_array: (array) An associative array containing the string parts
 *   that were used to generate the $head_title variable, already prepared to be
 *   output as TITLE tag. The key/value pairs may contain one or more of the
 *   following, depending on conditions:
 *   - title: The title of the current page, if any.
 *   - name: The name of the site.
 *   - slogan: The slogan of the site, if any, and if there is no title.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $page_top: Initial markup from any modules that have altered the
 *   page. This variable should always be output first, before all other dynamic
 *   content.
 * - $page: The rendered page content.
 * - $page_bottom: Final closing markup from any modules that have altered the
 *   page. This variable should always be output last, after all other dynamic
 *   content.
 * - $classes String of classes that can be used to style contextually through
 *   CSS.
 *
 * @see bootstrap_preprocess_html()
 * @see template_preprocess()
 * @see template_preprocess_html()
 * @see template_process()
 *
 * @ingroup themeable
 */

?>
<!DOCTYPE html>
<html lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>" 
      <?php print $rdf_namespaces;?>
      <?php /*print $html_background_style; */?>
      >
<head profile="<?php print $grddl_profile; ?>">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Zen Studio. We know your benefits.">
  <meta name="keywords" content="US web design, Canada web design, USA, Canada, website in Canada, website in US, United States, Canada, clean design, web development, web developer, modern web design, html5, html5 developer, html5 designer, freelance html5, html5 designer, html5 website design, css3, front end, front-end, front end developer, front end development, wordpress, wordpress developer, wordpress design, typography, developer, programmer, web solution, e-commerce, content management systems, web design, multimedia design, internet site design, создание сайтов, продвижение сайтов, разработка сайтов, заказать создание, заказать продвижение, интернет магазин, разработка сайтов, сайты, zen, дзен, создание web сайтов, разработка сайта цена, разработка интернет сайта, создание и разработка сайтов, создать web сайт, разработка корпоративного сайта, разработка сайтов под ключ, разработка и продвижение сайтов, сайт визитка, web дизайн сайта, заказать создание сайта, заказать сайт, изготовление сайтов, интернет магазин, интернет портал, корпоративный сайт, создать блог, создать сайт, веб студия, веб-студия, web студия, web-студия, сделать сайт">
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,600,700" rel="stylesheet" type="text/css">
  <?php print $styles; ?>
  <!-- HTML5 element support for IE6-8 -->
  <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <?php print $scripts; ?>
</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>
  <div id="skip-link">
    <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
  </div>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
</body>
</html>
