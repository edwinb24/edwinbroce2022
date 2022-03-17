<?php get_header(); ?>

<?php
	function returnURL($img_url) {
		$j = strpos($img_url, "wp-content");
		$img_url = substr($img_url, $j, strlen($img_url));

		$k = strpos($img_url, '" class');
		if($k > -1)
			$img_url = substr($img_url, 0, $k);
		else
			$img_url = substr($img_url, 0, strlen($img_url));
		$img_url = "https://ik.imagekit.io/edwinb24/". $img_url;
		return $img_url;
	}
?>


<div class="<?php echo get_post_type() ?>_content">
	<div class="intro">
		<h1>Web Developer Portfolio</h1>
		<p>My career in web development has taken me to small and large companies using back-end and front-end technologies.</p>
	</div>
	<div class="content">
		<?php 
		$args = array( 'post_type' => 'projects', 'posts_per_page' => 10 );
		$the_query = new WP_Query( $args ); 
		?>
		<?php 
		$i = 1;
		$item = "project_";
		if( $the_query->have_posts() ):
			while( $the_query->have_posts() ): $the_query->the_post();
				$main_image = get_the_post_thumbnail();
				$hover_image = get_field("additional_image");
				$main_image = returnURL($main_image);
				$hover_image = returnURL($hover_image);

				$project_class = $item . $i; 
				$i++; ?>
				<a href="<?php the_permalink() ?>"><article id="page-<?php print(strtolower(str_replace(' ', '-', get_the_title()))); ?>" <?php post_class($project_class); ?>>
					<?php the_title('<h1 class="entry-title">','</h1>' ); ?>
					<div class="main-content">
						<ul>
							<?php
							$tags = get_the_tags();
							if ( $tags ) :
								$y = count($tags) > 7 ? 7 : count($tags);
								for ($x=0; $x < $y; $x++) { ?>
									<li><?php echo esc_html( $tags[$x]->name ); ?></li>
								<?php } ?>
									<li class="more">More...</li>
							<?php endif; ?>
						</ul>
						<picture class="hover_image project_image">
							<img src="<?php echo $hover_image . "?tr=w-500,h-290";?>" alt="<?php echo (the_title() . " Image")?>">
						</picture> 
						<picture class="main_image project_image">
							<img src="<?php echo $main_image . "?tr=w-500,h-290";?>" alt="<?php echo (the_title() . " Image")?>">
						</picture> 
					</div>
				</article></a>
			<?php endwhile;	
		endif;		
		?>
	</div>
</div>


<?php get_footer(); ?>