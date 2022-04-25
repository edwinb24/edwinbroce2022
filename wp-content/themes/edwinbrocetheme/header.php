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
                include(dirname(__FILE__).'/assets/css/header.css');
                include(dirname(__FILE__).'/assets/css/3d_styles.css');
            ?>
        </style>

<!-- Lazy Styles -->
<noscript id="render-onload">
             <link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/assets/css/lazy_hamburgerIconStyles.css">
             <link rel="stylesheet" href="<?php echo get_bloginfo('template_url');  ?>/assets/css/lazy_header.css">
             <link rel="stylesheet" href="<?php echo get_bloginfo('template_url');  ?>/assets/css/lazy_content.css">
            <link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/assets/css/lazy_footer.css">
</noscript>
        
<!-- Critical JS -->
        <script>
            <?php 
            include(dirname(__FILE__).'/assets/js/hamburgerIconAnimation.js');
            include(dirname(__FILE__).'/assets/js/scrolling3D.js');    
            ?>       
        </script>
    </head>
<body>
<?php 
    include(dirname(__FILE__).'/assets/google_tag_manager_body.html');
?>
<div class="header-wrapper">
    <div class="main-header">
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
                <h1 class="main_menu_logo">Edwin Broce</h1>
                <nav class="menu_main_menu_wrapper" aria-label="Main Navigation">
                    <ul id="menu-main-menu" class="menu">
                        <li id="menu-item-7" class="menu-item menu-item-type-post_type_archive menu-item-object-floating_element current-menu-item menu-item-7"><a href="#" aria-current="page">About</a></li>
                        <li id="menu-item-61" class="menu-item menu-item-type-post_type_archive menu-item-object-projects menu-item-61"><a href="#">Projects</a></li>
                        <li id="menu-item-9" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-9"><a href="#">Contact</a></li>
                    </ul>
                </nav>
                <nav class="e_mail_section" aria-label="Sned me an E-mail">
                    <h2>
                        Start a conversation
                    </h2>
                    <a href="mailto:broceedwin@gmail.com">broceedwin@gmail.com</a>
                </nav>
                <nav class="social_media" aria-label="Social Media Navigation">
                    <a href="https://github.com/edwinb24" target="_blank" rel="nofollow noreferrer"><img class="github_image" src="https://ik.imagekit.io/edwinb24/Social_Media_Icons/icons8-github-50_2tvaKuTdI.png" alt="Go to My GitHub"></a>
                    <a href="https://www.linkedin.com/in/edwin-broce/" target="_blank" rel="nofollow noreferrer"><img class="linkedin_image" src="https://ik.imagekit.io/edwinb24/Social_Media_Icons/icons8-linkedin-50_TMqTNg4N8w.png" alt="Go to My LinkedIn"></a>
                    <a href="https://www.youtube.com/channel/UC316MzN9QyFvGJisgyjQWzw/" target="_blank" rel="nofollow noreferrer"><img class="youtube_image" src="https://ik.imagekit.io/edwinb24/Social_Media_Icons/icons8-play-button-50_e4sHdo05n.png" alt="Go to My Youtube"></a>
                </nav>
            </div>
        </div>
    </div>
</div>
