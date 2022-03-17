<?php
//get the last-modified-date of this very file
$lastModified=filemtime(__FILE__);
//get a unique hash of this file (etag)
$etagFile = md5_file(__FILE__);
//get the HTTP_IF_MODIFIED_SINCE header if set
$ifModifiedSince=(isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) ? $_SERVER['HTTP_IF_MODIFIED_SINCE'] : false);
//get the HTTP_IF_NONE_MATCH header if set (etag: unique file hash)
$etagHeader=(isset($_SERVER['HTTP_IF_NONE_MATCH']) ? trim($_SERVER['HTTP_IF_NONE_MATCH']) : false);

//set last-modified header
header("Last-Modified: ".gmdate("D, d M Y H:i:s", $lastModified)." GMT");
//set etag-header
header("Etag: $etagFile");
//make sure caching is turned on
header('Cache-Control: max-age=31536000');

//check if page has changed. If not, send 304 and exit
if (@strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE'])==$lastModified || $etagHeader == $etagFile)
{
       header("HTTP/1.1 304 Not Modified");
       exit;
}

//echo "This page was last modified: ".date("d.m.Y H:i:s",time());

?>



<!doctype html>
<html lang="en">
<head>
 
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php wp_title(); ?></title>
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <?php 
            wp_head();
            /*Including variables for images and any server side rendering */
            include(dirname(__FILE__).'/assets/variables.php');
            include(dirname(__FILE__).'/assets/google_tag_manager_header.html');
        ?>

<!-- Critical Styles -->

        <style>
            <?php 
            include(dirname(__FILE__).'/assets/css/reset.css');
            if(is_front_page()) {
                include(dirname(__FILE__).'/assets/css/home.css');
            } else {
                include(dirname(__FILE__).'/assets/css/content.css');
            }
            if(get_post_type() == 'jobs')
                include(dirname(__FILE__).'/assets/css/3d_styles.css');
            if(get_post_type() == 'projects' || get_post_type() == 'presentations') {
                include(dirname(__FILE__).'/assets/css/projects.css');
                if(!is_post_type_archive())
                    include(dirname(__FILE__).'/assets/css/project_single.css');
            }
            if(get_post_type() == 'projects' || get_post_type() == 'presentations') {
                include(dirname(__FILE__).'/assets/css/presentation_single.css');
            }
            ?>
        </style>

<!-- Lazy Styles -->
<noscript id="render-onload">
    <?php if(is_front_page()) { ?>
            <link rel="stylesheet" href="<?php echo get_bloginfo('template_url');  ?>/assets/css/lazy_home.css">     
        <?php   } else { ?>
            <link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/assets/css/lazy_header.css">
            <link rel="stylesheet" href="<?php echo get_bloginfo('template_url');  ?>/assets/css/lazy_content.css">
            <link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/assets/css/lazy_footer.css">
            <?php if(get_post_type() == 'projects' && is_post_type_archive()) : ?>
                <link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/assets/css/lazy_projects.css">
            <?php elseif(get_post_type() == 'presentations' && is_post_type_archive()) : ?>
                <link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/assets/css/lazy_projects.css">
            <?php endif ?>

    <?php } ?>
</noscript>
        
<!-- Critical JS -->
        <script>
            <?php 
            include(dirname(__FILE__).'/assets/js/header_menu_bar.js');
            include(dirname(__FILE__).'/assets/js/houdini_index.js');
            if(is_front_page()) {
                include(dirname(__FILE__).'/assets/js/houdini_index_home.js');
            } elseif(get_post_type() == 'jobs') {
                include(dirname(__FILE__).'/assets/js/3d_scrolling.js');    
            }
            ?>       
        </script>
    </head>
<body>
<?php 
    include(dirname(__FILE__).'/assets/google_tag_manager_body.html');
?>
<div class="header-wrapper">
    <div class="main-header">
        <div class="logo"><a href="/">Edwin Broce</a></div>
        <div class="header_navigation">
            <input type="checkbox" id="toggle-main-menu" role="button" aria-label="Toggle Menu"/>
            <label class="menu-on" for="toggle-main-menu" onclick="toogleHamburgerIcon()">
                <div class="hamburger-icon">
                    <div class="bar1"></div>
                    <div class="bar2"></div>
                    <div class="bar3"></div>
                </div> 
            </label>
            <label class="menu-off" for="toggle-main-menu" onclick="toogleHamburgerIcon()"></label>
            <div class="header_menu">
                <nav aria-label="Main Navigation" class="menu_main_menu_wrapper">
                <?php wp_nav_menu(array('theme_location'=>'header_menu')); ?>
                </nav>
                <nav class="social_media" aria-label="Social Media Navigation">
                    <a href="https://www.facebook.com/edwin.b24" target="_blank" rel="nofollow noreferrer"><img src="https://ik.imagekit.io/edwinb24/Social_Media_Icons/icons8-facebook-f-50_f5jaI8SnuZ.png" alt="Go to My Facebook"></a>
                    <a href="https://github.com/edwinb24" target="_blank" rel="nofollow noreferrer"><img src="https://ik.imagekit.io/edwinb24/Social_Media_Icons/icons8-github-50_2tvaKuTdI.png" alt="Go to My GitHub"></a>
                    <a href="https://www.instagram.com/edwin_b24" target="_blank" rel="nofollow noreferrer"><img src="https://ik.imagekit.io/edwinb24/Social_Media_Icons/icons8-instagram-50_G9KosLytl.png" alt="Go to My Instagram"></a>
                    <a href="https://www.linkedin.com/in/edwin-broce/" target="_blank" rel="nofollow noreferrer"><img src="https://ik.imagekit.io/edwinb24/Social_Media_Icons/icons8-linkedin-50_TMqTNg4N8w.png" alt="Go to My LinkedIn"></a>
                    <a href="https://www.youtube.com/channel/UC316MzN9QyFvGJisgyjQWzw/" target="_blank" rel="nofollow noreferrer"><img src="https://ik.imagekit.io/edwinb24/Social_Media_Icons/icons8-play-button-50_e4sHdo05n.png" alt="Go to My Youtube"></a>
                    <a href="https://twitter.com/edwin_b24" target="_blank" rel="nofollow noreferrer"><img src="https://ik.imagekit.io/edwinb24/Social_Media_Icons/icons8-twitter-50_4MdNhJlT4.png" alt="Go to My Twitter"></a>
                </nav>
            </div>
        </div>
    </div>
</div>
