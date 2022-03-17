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
    
    $main_image = get_the_post_thumbnail();
    $hover_image = get_field("additional_image");
    $main_image = returnURL($main_image);
    $hover_image = returnURL($hover_image);

    $project_class = $item . $i; 
    $i++;

?>

<div class="<?php echo get_post_type() ?>_content single">
    <div class="back_link">
       <a href="/projects" aria-label="Return to All Projects">
           < All PROJECTS
       </a>
    </div>
	<div class="intro">
        <?php the_title('<h1 class="entry-title">','</h1>' ); ?>
    </div>
    <div class="content">
        <div class="project_images">
            <picture class="hover_image project_image">
                <source media="(max-width: 650px)" srcset="<?php echo $hover_image . "?tr=w-500,h-290";?>">
                <img src="<?php echo $hover_image . "?tr=w-800,h-464";?>" alt="<?php echo (the_title() . " Image")?>">
            </picture> 
            <picture class="main_image project_image">
                <source media="(max-width: 650px)" srcset="<?php echo $main_image . "?tr=w-500,h-290";?>">
                <img src="<?php echo $main_image . "?tr=w-800,h-464";?>" alt="<?php echo (the_title() . " Image")?>">
            </picture> 
        </div>
        <div class="project_description">
            <div class="description">
                <?php 
                    $my_postid = get_the_ID();
                    $content = get_post_field('post_content', $my_postid);
                    echo $content;
                ?>
            </div>
            <div class="technologies">
                <ul>
                    <?php
                    $tags = get_the_tags();
                    if ( $tags ) :
                        foreach($tags as $tag): ?>
                            <li><?php echo esc_html( $tag->name ); ?></li>
                        <?php endforeach ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
	</div>
</div>


<?php get_footer(); ?>