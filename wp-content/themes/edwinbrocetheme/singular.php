<?php get_header(); ?>
<span class="separating_line"></span>
<div class="main_content_wrapper singular_page">
	<?php 
	if( have_posts() ):
		while( have_posts() ): the_post(); ?>
			<article id="page-<?php print(strtolower(str_replace(' ', '-', get_the_title()))); ?>" <?php post_class(); ?>>
				<?php the_title('<h1 class="entry-title">','</h1>' ); ?>
				<?php the_content(); ?>
			</article>
		<?php endwhile;	
	endif;		
	?>
</div>

<?php get_footer(); ?>