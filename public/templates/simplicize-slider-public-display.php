<?php
/**
 * Front-end view of Simplicize-Slider Plugin
 *
 * @package 	Simplicize-slider
 * @subpackage 	Simplicize-slider/public/templates
 * @author 		Ardel John S. Biscaro
 *
 */

?>
<?php 
    $query = new WP_Query( array(
        'post_type' => 'simplicize_slider'
    ) );

	if ( $query->have_posts() ) { ?>			
		<div id="banner-slide">
			<ul class="bjqs">
<?php		while ( $query->have_posts() ) : $query->the_post(); ?>
				<li>
					<?php the_post_thumbnail('simplicize_slider-img-size',array( 'title' => get_the_title() ) ); ?>
				</li>
		<?php 
		endwhile; ?>
			</ul>
		</div>
<?php		wp_reset_postdata();  
	}
	
	//set height value if null
	$slider_height = get_option('simplicize_slider_container_height'); 
	if ($slider_height==null){
		$slider_height = 238;
	}
	
	//set width value if null
	$slider_width = get_option('simplicize_slider_container_width'); 
	if ($slider_width==null){
		$slider_width = 544;
	}
	
		//set width value if null
	$set_responsive = get_option('simplicize_slider_responsive'); 
	if ($set_responsive==null){
		$set_responsive = 1;
	}
	
		//set width value if null
	$set_randomstart = get_option('simplicize_slider_randomstart'); 
	if ($set_randomstart==null){
		$set_randomstart = 1;
	}
	
	
?>

<script type="text/javascript">
 jQuery(document).ready(function(){
	 //alert(<?php echo $slider_height; ?>);
	 $('#banner-slide').bjqs({
		animtype      : 'slide',
		height        : <?php echo $slider_height; ?>,
		width         : <?php echo $slider_width; ?>,
		responsive    : <?php echo $set_responsive; ?>,
		randomstart   : <?php echo $set_randomstart; ?>
	  });
	
});
</script>