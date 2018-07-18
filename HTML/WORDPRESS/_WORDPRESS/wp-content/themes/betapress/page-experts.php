<?php /* Template Name: Expert Page */ ?>


<?php get_header(); ?>

<div id="fh5co-trainer">
	<div class="container">
		<div class="row animate-box">
			<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
				<?php
					$id = $post->ID; // add the ID of the page where the zero is
					$p = get_page($id);
					$t = $p->post_title;
					
				?>
			
				<h2><?php echo apply_filters('post_title', $t); ?></h2>
				<p><?php echo apply_filters('the_content', $p->post_content); ?></p>
			</div>
		</div>
		<?php
			$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			$args = array(
				'post_type'   => 'experts',
				'post_status' => 'publish',
				'posts_per_page' => 3,
				'paged' => $paged
			);
			$query = new WP_Query( $args );
		?>
		<?php
			if( $query->have_posts() ) :
		?>
		<div class="row">
		<?php
			while( $query->have_posts() ) :
			$query->the_post();

			/* get custom field - expertise */
			$custom_fields = get_post_custom(get_the_ID());
			$my_custom_field = $custom_fields['expertise'];
				?>
				<div class="col-md-4 col-sm-4 animate-box">
					<div class="trainer">
						<a href="<?php printf(get_permalink()); ?>"><?php printf(the_post_thumbnail(array(291, 600))); ?></a>
						<div class="title">
							<h3><a href="<?php printf(get_permalink()); ?>"><?php printf(get_the_title()); ?></a></h3>
							<span><?php printf($my_custom_field[0]); ?></span>
						</div>
						<div class="desc text-center">
							<ul class="fh5co-social-icons">
								<li><a href="#"><i class="icon-twitter"></i></a></li>
								<li><a href="#"><i class="icon-facebook"></i></a></li>
								<li><a href="#"><i class="icon-linkedin"></i></a></li>
								<li><a href="#"><i class="icon-dribbble"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
		<?php
			endwhile;
			
		?>
		</div>
		<?php
		
			/* DEFAULT NEXT AND PREVIOUS PAGE */
			/*previous_post_link();
			next_post_link();*/
		
			/* SINGLE POST NEXT PREV */
			/*previous_post_link('%link', '&lt; Older entry');
			next_post_link('%link', 'Newer entry &gt;');*/
		
		
			/* PAGINATION */
			$total_pages = $query->max_num_pages;
			if ($total_pages > 1){

				$current_page = max(1, get_query_var('paged'));

				echo paginate_links(array(
					'base' => get_pagenum_link(1) . '%_%',
					'format' => '/page/%#%',
					'current' => $current_page,
					'total' => $total_pages,
					'prev_text'    => __('« prev'),
					'next_text'    => __('next »'),
				));
			}
		?>
		
		<?php
			wp_reset_postdata();
			else :
				esc_html_e( 'No testimonials in the diving taxonomy!', 'text-domain' );
			endif;
		?>
		
	</div>
</div>
<div id="fh5co-started" class="fh5co-bg" style="background-image: url(images/img_bg_3.jpg);">
	<div class="overlay"></div>
	<div class="container">
		<div class="row animate-box">
			<div class="col-md-8 col-md-offset-2 text-center">
				<h2>Fitness Classes this Summer <br> <span> Pay Now and <br> Get <span class="percent">35%</span> Discount</span></h2>
			</div>
		</div>
		<div class="row animate-box">
			<div class="col-md-8 col-md-offset-2 text-center">
				<p><a href="#" class="btn btn-default btn-lg">Become a Member</a></p>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>