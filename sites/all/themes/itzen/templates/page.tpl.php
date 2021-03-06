<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see bootstrap_preprocess_page()
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see bootstrap_process_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
?>
<header id="<?php echo theme_get_setting('region_anchor-header') ?>" class="region-header-bg">
<nav class="navbar" role="navigation">         
  <div class="container">
		<div class="row">
            <div class="row-height">
                <div class="col-xs-12 col-sm-6 col-sm-height col-middle">
                    <div class="row">
                        <div class="row-height">
                            <?php if ($logo): ?>
                                <a class="logo navbar-btn col-height col-xs-3 col-sm-2 col-middle" href="<?php print $front_page; ?>" title="<?php print t('Zen'); ?>">
                                    <img class="text-left" src="<?php print $logo; ?>" alt="<?php print t('Zen'); ?>" />
                                </a>
                            <?php endif; ?>
                            <div class="header-toll col-height col-xs-9 col-sm-4 col-middle">
                                <div class="inner-block">
                                    <a href="tel:+380994959282" class="toll-tel"><span><i class="icon-zen_contact_phone"></i> +38 099 </span>495 9282</a>
                                    <span>
                                        <span class="toll-country"><?php print t('Kyiv, Ukraine'); ?></span>
                                        <!--<span class="toll-label"><?php /*print t('Toll Free'); */?></span>-->
                                    </span>
                                </div>
                            </div>
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header visible-xs">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar top-bar"></span>
                                    <span class="icon-bar middle-bar"></span>
                                    <span class="icon-bar bottom-bar"></span>
                                </button>
                                <a class="navbar-brand" href="#">Project name</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-sm-height col-middle">
                    <div class="row">
                        <div class="row-height">
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <?php if (!empty($primary_nav) || !empty($secondary_nav) || !empty($page['navigation'])): ?>
                                <div class="collapse navbar-collapse col-sm-height col-xs-12 col-sm-6 col-middle" id="navbar">
                                    <?php if (!empty($primary_nav)): ?>
                                        <?php print render($primary_nav); ?>
                                    <?php endif; ?>
                                    <?php if (!empty($secondary_nav)): ?>
                                        <?php print render($secondary_nav); ?>
                                    <?php endif; ?>
                                    <?php if (!empty($page['navigation'])): ?>
                                        <?php print render($page['navigation']); ?>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
</nav>
<section id="<?php echo theme_get_setting('region_anchor-home') ?>" class="region-home-bg">
    <?php
    if (drupal_is_front_page()) {
        ?><div class="container">
        <div class="row text-center">
            <div class="col-sm-12">
                <?php if (!empty($site_name)): ?>
                    <h1 class="site-name"><?php print $site_name; ?> </h1>
                <?php endif; ?>
                <?php if (!empty($site_slogan)): ?>
                    <p class="text-extra-large"><?php print $site_slogan; ?> </p>
                <?php endif; ?>
                <div class="home-info">
                    <?php print t('web'); ?>
                    <span>•</span>
                    <?php print t('mobile'); ?>
                    <span>•</span>
                    <?php print t('relax'); ?>
                </div>
                <div class="link">
                    <a href="#projects" class="btn"><?php print t('Projects'); ?></a>
                </div>
            </div>
        </div>
        </div> <?php
    } else { ?>
        <div class="container">
            <div class="row text-center">
                <div class="col-sm-12">
                    <p class="text-extra-large"><?php print drupal_get_title(); ?> </p>
                </div>
            </div>
        </div>
    <?php }
    ?>
</section>
<?php 
  if ($page['header']):
    print render($page['header']); 
  endif;
?>
</header>

<?php if($page["highlighted"]): ?>
<section id="services" class="region-highlighted-bg wow zoomIn">
    <div class="container">
        <?php print render($page['highlighted']); ?>
    </div>
</section>
<?php endif;?>

<div id="<?php echo theme_get_setting('region_anchor-help') ?>" class="region-help-bg wow zoomIn">
    <div class="container">
        <?php if (!empty($breadcrumb)): print $breadcrumb; endif;?>
        <a id="main-content"></a>
        <?php print $messages; ?>
        <?php if (!empty($tabs)): ?>
          <?php print render($tabs); ?>
        <?php endif; ?>
        <?php if (!empty($page['help'])): ?>
          <?php print render($page['help']); ?>
        <?php endif; ?>
        <?php if (!empty($action_links)): ?>
          <ul class="action-links"><?php print render($action_links); ?></ul>
        <?php endif; ?>
    </div>
</div>

<?php if($page["prefix"]): ?>
<section id="projects" class="region-prefix-bg wow zoomIn">
    <div class="container">
        <?php print render($page['prefix']); ?>
    </div>
</section>
<?php endif;?>

<?php if($page["content"]): ?>
    <section id="<?php echo theme_get_setting('region_anchor-content') ?>" class="region-content-bg">
        <div class="container">
            <?php print render($page['content']); ?>
        </div>
    </section>
<?php endif;?>

<?php if($page["suffix"]): ?>
<section id="process" class="region-suffix-bg wow zoomIn">
    <div class="container">
        <?php print render($page['suffix']); ?>
    </div>
</section>
<?php endif;?>

<?php if($page["featured"]): ?>
<section id="team" class="region-featured-bg wow zoomIn">
    <div class="container">
        <?php print render($page['featured']); ?>
    </div>
</section>
<?php endif;?>

<?php if($page["footer"]): ?>
<footer id="contacts" class="region-footer-bg wow zoomIn">
  <div class="container text-center">
    <div class="row">
      <?php print render($page['footer']); ?>
    </div>
  </div>
</footer>
<?php endif;?>

