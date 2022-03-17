<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>
    <style>       
        <?php 
        include(dirname(__FILE__).'/assets/css/404.css');
        ?>
    </style>
	<section id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="error-404 not-found">
				<div class="page-content">
                    <p>
                        We’re sorry, but the page you are looking for isn’t here.
                    </p>
				</div><!-- .page-content -->
			</div><!-- .error-404 -->
		</main><!-- #main -->
	</section><!-- #primary -->
<?php
get_footer();
