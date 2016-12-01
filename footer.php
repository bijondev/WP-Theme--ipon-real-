<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
global $IponReal_;
?>

		</div><!-- .site-content -->

		<footer id="colophon" class="site-footer" role="contentinfo">
		<h4 class="project-title" >Naše další projekty </h4>
			<div class="container">
				<div class="project-carosol" id="project-carosol" >
			      <?php
            $params = array('posts_per_page' => -1, 'post_type' => 'project');
            $wc_query = new WP_Query($params);
            ?>
			<?php if ($wc_query->have_posts()) : ?>
			<?php while ($wc_query->have_posts()) :
			$wc_query->the_post(); 
			$thumb_id = get_post_thumbnail_id();
            $thumb_url = wp_get_attachment_image_src($thumb_id,'medium', true);
            $thumb_url_large = wp_get_attachment_image_src($thumb_id,'larger', true);
            ?>
				  <div class="item"><img src="<?php echo $thumb_url[0]; ?>" alt="<?php the_title(); ?>"></div>
			      <?php endwhile; ?>
		     <?php wp_reset_postdata(); ?>
		     <?php else:  ?>
		      <li>
		          <?php _e( 'No Products' ); ?>
		     </li>
		      <?php endif; ?>

			</div>
			</div>
		</footer><!-- .site-footer -->
	</div><!-- .site-inner -->
</div><!-- .site -->

<?php wp_footer(); ?>
    

</body>
</html>
