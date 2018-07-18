<div id="fh5co-services" class="fh5co-bg-section">
	<div class="container">
		<div class="row">
			<?php
				$args = array(
					'post_type'   => 'introduction',
					'post_status' => 'publish',
				);
				$introduction = new WP_Query( $args );
			?>
			<?php
				if( $introduction->have_posts() ) :
			?>
				<ul>
				<?php
					while( $introduction->have_posts() ) :
					$introduction->the_post();
				?>
					<div class="col-md-4 text-center animate-box">
						<div class="services">
							<span><?php printf(the_post_thumbnail(array(60, 60))); ?></span>
							<h3><?php printf(get_the_title()); ?></h3>
							<p><?php printf(get_the_content()); ?></p>
							<p><a href="<?php printf(get_permalink()); ?>" class="btn btn-primary btn-outline btn-sm">More <i class="icon-arrow-right"></i></a></p>
						</div>
					</div>
				<?php
					endwhile;
					wp_reset_postdata();
				?>
				</ul>
			<?php
				else :
					esc_html_e( 'No testimonials in the diving taxonomy!', 'text-domain' );
				endif;
			?>
		</div>
	</div>
</div>

<div id="fh5co-trainer">
	<div class="container">
		<div class="row animate-box">
			<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
				<h2>Fitness Expert</h2>
				<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
			</div>
		</div>
		<div class="row">
			<?php
				$args = array(
					'post_type'   => 'experts',
					'post_status' => 'publish',
					'posts_per_page' => 3,
				);
				$introduction = new WP_Query( $args );
			?>
			<?php
				if( $introduction->have_posts() ) :
			?>
				<ul>
					<?php
						while( $introduction->have_posts() ) :
							$introduction->the_post();
					
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
						wp_reset_postdata();
					?>
				</ul>
			<?php
			else :
				esc_html_e( 'No testimonials in the diving taxonomy!', 'text-domain' );
			endif;
			?>
		</div>
	</div>
</div>

<div id="fh5co-schedule" class="fh5co-bg" style="background-image: url(<?php echo get_bloginfo('template_directory'); ?>/images/img_bg_1.jpg);">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
				<h2>Class Schedule</h2>
			</div>
		</div>

		<div class="row animate-box">

			<div class="fh5co-tabs">
				<ul class="fh5co-tab-nav">
					<li class="active"><a href="#" data-tab="1"><span class="visible-xs">S</span><span class="hidden-xs">Sunday</span></a></li>
					<li><a href="#" data-tab="2"><span class="visible-xs">M</span><span class="hidden-xs">Monday</span></a></li>
					<li><a href="#" data-tab="3"><span class="visible-xs">T</span><span class="hidden-xs">Tuesday</span></a></li>
					<li><a href="#" data-tab="4"><span class="visible-xs">W</span><span class="hidden-xs">Wednesday</span></a></li>

					<li><a href="#" data-tab="5"><span class="visible-xs">Th</span><span class="hidden-xs">Thursday</span></a></li>
					<li><a href="#" data-tab="6"><span class="visible-xs">F</span><span class="hidden-xs">Friday</span></a></li>
					<li><a href="#" data-tab="7"><span class="visible-xs">S</span><span class="hidden-xs">Saturday</span></a></li>
				</ul>

				<!-- Tabs -->
				<div class="fh5co-tab-content-wrap">
					<div class="fh5co-tab-content tab-content active" data-tab-content="1">
						<ul class="class-schedule">
							<li class="text-center">
								<span><img src="images/exercise.svg" class="img-responsive" alt=""></span>
								<span class="time">7:00 AM - 8AM</span>
								<h4>Cardio</h4>
								<small>Angel Adams</small>
							</li>
							<li class="text-center">
								<span><img src="images/dumbbell.svg" class="img-responsive" alt=""></span>
								<span class="time">9:00 AM - 11AM</span>
								<h4>Body Building</h4>
								<small>Angel Adams</small>
							</li>
							<li class="text-center">
								<span><img src="images/yoga-carpet.svg" class="img-responsive" alt=""></span>
								<span class="time">6:00 AM - 7AM</span>
								<h4>Yoga</h4>
								<small>Angel Adams</small>
							</li>
							<li class="text-center">
								<span><img src="images/two-boxing-gloves.svg" class="img-responsive" alt=""></span>
								<span class="time">7:00 AM - 8AM</span>
								<h4>Boxing</h4>
								<small>Angel Adams</small>
							</li>
							<li class="text-center">
								<span><img src="images/ballet.svg" class="img-responsive" alt=""></span>
								<span class="time">7:00 AM - 8AM</span>
								<h4>Ballet Dance</h4>
								<small>Angel Adams</small>
							</li>
							<li class="text-center">
								<span><img src="images/dumbbell.svg" class="img-responsive" alt=""></span>
								<span class="time">9:00 AM - 11AM</span>
								<h4>Body Building</h4>
								<small>Angel Adams</small>
							</li>
							<li class="text-center">
								<span><img src="images/yoga-carpet.svg" class="img-responsive" alt=""></span>
								<span class="time">6:00 AM - 7AM</span>
								<h4>Yoga</h4>
								<small>Angel Adams</small>
							</li>
							<li class="text-center">
								<span><img src="images/exercise.svg" class="img-responsive" alt=""></span>
								<span class="time">7:00 AM - 8AM</span>
								<h4>Cardio</h4>
								<small>Angel Adams</small>
							</li>
						</ul>
					</div>

					<div class="fh5co-tab-content tab-content active" data-tab-content="2">
						<ul class="class-schedule">
							<li class="text-center">
								<span><img src="images/exercise.svg" class="img-responsive" alt=""></span>
								<span class="time">7:00 AM - 8AM</span>
								<h4>Cardio</h4>
								<small>Angel Adams</small>
							</li>
							<li class="text-center">
								<span><img src="images/dumbbell.svg" class="img-responsive" alt=""></span>
								<span class="time">9:00 AM - 11AM</span>
								<h4>Body Building</h4>
								<small>Angel Adams</small>
							</li>
							<li class="text-center">
								<span><img src="images/yoga-carpet.svg" class="img-responsive" alt=""></span>
								<span class="time">6:00 AM - 7AM</span>
								<h4>Yoga</h4>
								<small>Angel Adams</small>
							</li>
							<li class="text-center">
								<span><img src="images/two-boxing-gloves.svg" class="img-responsive" alt=""></span>
								<span class="time">7:00 AM - 8AM</span>
								<h4>Boxing</h4>
								<small>Angel Adams</small>
							</li>
							<li class="text-center">
								<span><img src="images/ballet.svg" class="img-responsive" alt=""></span>
								<span class="time">7:00 AM - 8AM</span>
								<h4>Ballet Dance</h4>
								<small>Angel Adams</small>
							</li>
							<li class="text-center">
								<span><img src="images/dumbbell.svg" class="img-responsive" alt=""></span>
								<span class="time">9:00 AM - 11AM</span>
								<h4>Body Building</h4>
								<small>Angel Adams</small>
							</li>
							<li class="text-center">
								<span><img src="images/yoga-carpet.svg" class="img-responsive" alt=""></span>
								<span class="time">6:00 AM - 7AM</span>
								<h4>Yoga</h4>
								<small>Angel Adams</small>
							</li>
							<li class="text-center">
								<span><img src="images/exercise.svg" class="img-responsive" alt=""></span>
								<span class="time">7:00 AM - 8AM</span>
								<h4>Cardio</h4>
								<small>Angel Adams</small>
							</li>
						</ul>
					</div>

					<div class="fh5co-tab-content tab-content active" data-tab-content="3">
						<ul class="class-schedule">
							<li class="text-center">
								<span><img src="images/exercise.svg" class="img-responsive" alt=""></span>
								<span class="time">7:00 AM - 8AM</span>
								<h4>Cardio</h4>
								<small>Angel Adams</small>
							</li>
							<li class="text-center">
								<span><img src="images/dumbbell.svg" class="img-responsive" alt=""></span>
								<span class="time">9:00 AM - 11AM</span>
								<h4>Body Building</h4>
								<small>Angel Adams</small>
							</li>
							<li class="text-center">
								<span><img src="images/yoga-carpet.svg" class="img-responsive" alt=""></span>
								<span class="time">6:00 AM - 7AM</span>
								<h4>Yoga</h4>
								<small>Angel Adams</small>
							</li>
							<li class="text-center">
								<span><img src="images/two-boxing-gloves.svg" class="img-responsive" alt=""></span>
								<span class="time">7:00 AM - 8AM</span>
								<h4>Boxing</h4>
								<small>Angel Adams</small>
							</li>
							<li class="text-center">
								<span><img src="images/ballet.svg" class="img-responsive" alt=""></span>
								<span class="time">7:00 AM - 8AM</span>
								<h4>Ballet Dance</h4>
								<small>Angel Adams</small>
							</li>
							<li class="text-center">
								<span><img src="images/dumbbell.svg" class="img-responsive" alt=""></span>
								<span class="time">9:00 AM - 11AM</span>
								<h4>Body Building</h4>
								<small>Angel Adams</small>
							</li>
							<li class="text-center">
								<span><img src="images/yoga-carpet.svg" class="img-responsive" alt=""></span>
								<span class="time">6:00 AM - 7AM</span>
								<h4>Yoga</h4>
								<small>Angel Adams</small>
							</li>
							<li class="text-center">
								<span><img src="images/exercise.svg" class="img-responsive" alt=""></span>
								<span class="time">7:00 AM - 8AM</span>
								<h4>Cardio</h4>
								<small>Angel Adams</small>
							</li>
						</ul>
					</div>

					<div class="fh5co-tab-content tab-content active" data-tab-content="4">
						<ul class="class-schedule">
							<li class="text-center">
								<span><img src="images/exercise.svg" class="img-responsive" alt=""></span>
								<span class="time">7:00 AM - 8AM</span>
								<h4>Cardio</h4>
								<small>Angel Adams</small>
							</li>
							<li class="text-center">
								<span><img src="images/dumbbell.svg" class="img-responsive" alt=""></span>
								<span class="time">9:00 AM - 11AM</span>
								<h4>Body Building</h4>
								<small>Angel Adams</small>
							</li>
							<li class="text-center">
								<span><img src="images/yoga-carpet.svg" class="img-responsive" alt=""></span>
								<span class="time">6:00 AM - 7AM</span>
								<h4>Yoga</h4>
								<small>Angel Adams</small>
							</li>
							<li class="text-center">
								<span><img src="images/two-boxing-gloves.svg" class="img-responsive" alt=""></span>
								<span class="time">7:00 AM - 8AM</span>
								<h4>Boxing</h4>
								<small>Angel Adams</small>
							</li>
							<li class="text-center">
								<span><img src="images/ballet.svg" class="img-responsive" alt=""></span>
								<span class="time">7:00 AM - 8AM</span>
								<h4>Ballet Dance</h4>
								<small>Angel Adams</small>
							</li>
							<li class="text-center">
								<span><img src="images/dumbbell.svg" class="img-responsive" alt=""></span>
								<span class="time">9:00 AM - 11AM</span>
								<h4>Body Building</h4>
								<small>Angel Adams</small>
							</li>
							<li class="text-center">
								<span><img src="images/yoga-carpet.svg" class="img-responsive" alt=""></span>
								<span class="time">6:00 AM - 7AM</span>
								<h4>Yoga</h4>
								<small>Angel Adams</small>
							</li>
							<li class="text-center">
								<span><img src="images/exercise.svg" class="img-responsive" alt=""></span>
								<span class="time">7:00 AM - 8AM</span>
								<h4>Cardio</h4>
								<small>Angel Adams</small>
							</li>
						</ul>
					</div>

					<div class="fh5co-tab-content tab-content active" data-tab-content="5">
						<ul class="class-schedule">
							<li class="text-center">
								<span><img src="images/exercise.svg" class="img-responsive" alt=""></span>
								<span class="time">7:00 AM - 8AM</span>
								<h4>Cardio</h4>
								<small>Angel Adams</small>
							</li>
							<li class="text-center">
								<span><img src="images/dumbbell.svg" class="img-responsive" alt=""></span>
								<span class="time">9:00 AM - 11AM</span>
								<h4>Body Building</h4>
								<small>Angel Adams</small>
							</li>
							<li class="text-center">
								<span><img src="images/yoga-carpet.svg" class="img-responsive" alt=""></span>
								<span class="time">6:00 AM - 7AM</span>
								<h4>Yoga</h4>
								<small>Angel Adams</small>
							</li>
							<li class="text-center">
								<span><img src="images/two-boxing-gloves.svg" class="img-responsive" alt=""></span>
								<span class="time">7:00 AM - 8AM</span>
								<h4>Boxing</h4>
								<small>Angel Adams</small>
							</li>
							<li class="text-center">
								<span><img src="images/ballet.svg" class="img-responsive" alt=""></span>
								<span class="time">7:00 AM - 8AM</span>
								<h4>Ballet Dance</h4>
								<small>Angel Adams</small>
							</li>
							<li class="text-center">
								<span><img src="images/dumbbell.svg" class="img-responsive" alt=""></span>
								<span class="time">9:00 AM - 11AM</span>
								<h4>Body Building</h4>
								<small>Angel Adams</small>
							</li>
							<li class="text-center">
								<span><img src="images/yoga-carpet.svg" class="img-responsive" alt=""></span>
								<span class="time">6:00 AM - 7AM</span>
								<h4>Yoga</h4>
								<small>Angel Adams</small>
							</li>
							<li class="text-center">
								<span><img src="images/exercise.svg" class="img-responsive" alt=""></span>
								<span class="time">7:00 AM - 8AM</span>
								<h4>Cardio</h4>
								<small>Angel Adams</small>
							</li>
						</ul>
					</div>

					<div class="fh5co-tab-content tab-content active" data-tab-content="6">
						<ul class="class-schedule">
							<li class="text-center">
								<span><img src="images/exercise.svg" class="img-responsive" alt=""></span>
								<span class="time">7:00 AM - 8AM</span>
								<h4>Cardio</h4>
								<small>Angel Adams</small>
							</li>
							<li class="text-center">
								<span><img src="images/dumbbell.svg" class="img-responsive" alt=""></span>
								<span class="time">9:00 AM - 11AM</span>
								<h4>Body Building</h4>
								<small>Angel Adams</small>
							</li>
							<li class="text-center">
								<span><img src="images/yoga-carpet.svg" class="img-responsive" alt=""></span>
								<span class="time">6:00 AM - 7AM</span>
								<h4>Yoga</h4>
								<small>Angel Adams</small>
							</li>
							<li class="text-center">
								<span><img src="images/two-boxing-gloves.svg" class="img-responsive" alt=""></span>
								<span class="time">7:00 AM - 8AM</span>
								<h4>Boxing</h4>
								<small>Angel Adams</small>
							</li>
							<li class="text-center">
								<span><img src="images/ballet.svg" class="img-responsive" alt=""></span>
								<span class="time">7:00 AM - 8AM</span>
								<h4>Ballet Dance</h4>
								<small>Angel Adams</small>
							</li>
							<li class="text-center">
								<span><img src="images/dumbbell.svg" class="img-responsive" alt=""></span>
								<span class="time">9:00 AM - 11AM</span>
								<h4>Body Building</h4>
								<small>Angel Adams</small>
							</li>
							<li class="text-center">
								<span><img src="images/yoga-carpet.svg" class="img-responsive" alt=""></span>
								<span class="time">6:00 AM - 7AM</span>
								<h4>Yoga</h4>
								<small>Angel Adams</small>
							</li>
							<li class="text-center">
								<span><img src="images/exercise.svg" class="img-responsive" alt=""></span>
								<span class="time">7:00 AM - 8AM</span>
								<h4>Cardio</h4>
								<small>Angel Adams</small>
							</li>
						</ul>
					</div>

					<div class="fh5co-tab-content tab-content active" data-tab-content="7">
						<ul class="class-schedule">
							<li class="text-center">
								<span><img src="images/exercise.svg" class="img-responsive" alt=""></span>
								<span class="time">7:00 AM - 8AM</span>
								<h4>Cardio</h4>
								<small>Angel Adams</small>
							</li>
							<li class="text-center">
								<span><img src="images/dumbbell.svg" class="img-responsive" alt=""></span>
								<span class="time">9:00 AM - 11AM</span>
								<h4>Body Building</h4>
								<small>Angel Adams</small>
							</li>
							<li class="text-center">
								<span><img src="images/yoga-carpet.svg" class="img-responsive" alt=""></span>
								<span class="time">6:00 AM - 7AM</span>
								<h4>Yoga</h4>
								<small>Angel Adams</small>
							</li>
							<li class="text-center">
								<span><img src="images/two-boxing-gloves.svg" class="img-responsive" alt=""></span>
								<span class="time">7:00 AM - 8AM</span>
								<h4>Boxing</h4>
								<small>Angel Adams</small>
							</li>
							<li class="text-center">
								<span><img src="images/ballet.svg" class="img-responsive" alt=""></span>
								<span class="time">7:00 AM - 8AM</span>
								<h4>Ballet Dance</h4>
								<small>Angel Adams</small>
							</li>
							<li class="text-center">
								<span><img src="images/dumbbell.svg" class="img-responsive" alt=""></span>
								<span class="time">9:00 AM - 11AM</span>
								<h4>Body Building</h4>
								<small>Angel Adams</small>
							</li>
							<li class="text-center">
								<span><img src="images/yoga-carpet.svg" class="img-responsive" alt=""></span>
								<span class="time">6:00 AM - 7AM</span>
								<h4>Yoga</h4>
								<small>Angel Adams</small>
							</li>
							<li class="text-center">
								<span><img src="images/exercise.svg" class="img-responsive" alt=""></span>
								<span class="time">7:00 AM - 8AM</span>
								<h4>Cardio</h4>
								<small>Angel Adams</small>
							</li>
						</ul>
					</div>

				</div>

			</div>
		</div>
	</div>
</div>
<div id="fh5co-pricing">
	<div class="container">
		<div class="row animate-box">
			<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
				<h2>Pricing Plan</h2>
				<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
			</div>
		</div>
		<div class="row">
			<div class="pricing">
				<div class="col-md-3 animate-box">
					<div class="price-box">
						<h2 class="pricing-plan">Starter</h2>
						<div class="price"><sup class="currency">$</sup>9<small>/month</small></div>
						<ul class="classes">
							<li>15 Cardio Classes</li>
							<li class="color">10 Swimming Lesson</li>
							<li>10 Yoga Classes</li>
							<li class="color">20 Aerobics</li>
							<li>10 Zumba Classes</li>
							<li class="color">5 Massage</li>
							<li>10 Body Building</li>
						</ul>
						<a href="#" class="btn btn-select-plan btn-sm">Select Plan</a>
					</div>
				</div>

				<div class="col-md-3 animate-box">
					<div class="price-box">
						<h2 class="pricing-plan">Basic</h2>
						<div class="price"><sup class="currency">$</sup>27<small>/month</small></div>
						<ul class="classes">
							<li>15 Cardio Classes</li>
							<li class="color">10 Swimming Lesson</li>
							<li>10 Yoga Classes</li>
							<li class="color">20 Aerobics</li>
							<li>10 Zumba Classes</li>
							<li class="color">5 Massage</li>
							<li>10 Body Building</li>
						</ul>
						<a href="#" class="btn btn-select-plan btn-sm">Select Plan</a>
					</div>
				</div>

				<div class="col-md-3 animate-box">
					<div class="price-box popular">
						<h2 class="pricing-plan pricing-plan-offer">Pro <span>Best Offer</span></h2>
						<div class="price"><sup class="currency">$</sup>74<small>/month</small></div>
						<ul class="classes">
							<li>15 Cardio Classes</li>
							<li class="color">10 Swimming Lesson</li>
							<li>10 Yoga Classes</li>
							<li class="color">20 Aerobics</li>
							<li>10 Zumba Classes</li>
							<li class="color">5 Massage</li>
							<li>10 Body Building</li>
						</ul>
						<a href="#" class="btn btn-select-plan btn-sm">Select Plan</a>
					</div>
				</div>

				<div class="col-md-3 animate-box">
					<div class="price-box">
						<h2 class="pricing-plan">Unlimited</h2>
						<div class="price"><sup class="currency">$</sup>140<small>/month</small></div>
						<ul class="classes">
							<li>15 Cardio Classes</li>
							<li class="color">10 Swimming Lesson</li>
							<li>10 Yoga Classes</li>
							<li class="color">20 Aerobics</li>
							<li>10 Zumba Classes</li>
							<li class="color">5 Massage</li>
							<li>10 Body Building</li>
						</ul>
						<a href="#" class="btn btn-select-plan btn-sm">Select Plan</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="fh5co-gallery">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
				<h2>Gym gallery</h2>
				<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row row-bottom-padded-md">
			<div class="col-md-12">
				<ul id="fh5co-portfolio-list">

					<li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url(images/gallery-1.jpg); ">
						<a href="#">
							<div class="case-studies-summary">
								<span>Illustration</span>
								<h2>Useful baskets</h2>
							</div>
						</a>
					</li>
					<li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url(images/gallery-2.jpg); ">
						<a href="#">
							<div class="case-studies-summary">
								<span>Web Design</span>
								<h2>Skater man in the road</h2>
							</div>
						</a>
					</li>

					<li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url(images/gallery-3.jpg); ">
						<a href="#">
							<div class="case-studies-summary">
								<span>Web Design</span>
								<h2>Two Glas of Juice</h2>
							</div>
						</a>
					</li>

					<li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url(images/gallery-4.jpg); "> 
						<a href="#">
							<div class="case-studies-summary">
								<span>Web Design</span>
								<h2>Timer starts now!</h2>
							</div>
						</a>
					</li>
					<li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url(images/gallery-3.jpg); ">
						<a href="#">
							<div class="case-studies-summary">
								<span>Web Design</span>
								<h2>Two Glas of Juice</h2>
							</div>
						</a>
					</li>
					<li class="two-third animate-box" data-animate-effect="fadeIn" style="background-image: url(images/gallery-5.jpg); ">
						<a href="#">
							<div class="case-studies-summary">
								<span>Illustration</span>
								<h2>Beautiful sunset</h2>
							</div>
						</a>
					</li>
					<li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url(images/gallery-3.jpg); ">
						<a href="#">
							<div class="case-studies-summary">
								<span>Web Design</span>
								<h2>Two Glas of Juice</h2>
							</div>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>

<div id="fh5co-testimonial" class="fh5co-bg-section">
	<div class="container">
		<div class="row animate-box">
			<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
				<h2>Happy Clients</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="row animate-box">
					<div class="owl-carousel owl-carousel-fullwidth">
						<div class="item">
							<div class="testimony-slide active text-center">
								<figure>
									<img src="images/person3.jpg" alt="user">
								</figure>
								<span>Jean Doe, via <a href="#" class="twitter">Twitter</a></span>
								<blockquote>
									<p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
								</blockquote>
							</div>
						</div>
						<div class="item">
							<div class="testimony-slide active text-center">
								<figure>
									<img src="images/person3.jpg" alt="user">
								</figure>
								<span>John Doe, via <a href="#" class="twitter">Twitter</a></span>
								<blockquote>
									<p>&ldquo;Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
								</blockquote>
							</div>
						</div>
						<div class="item">
							<div class="testimony-slide active text-center">
								<figure>
									<img src="images/person3.jpg" alt="user">
								</figure>
								<span>John Doe, via <a href="#" class="twitter">Twitter</a></span>
								<blockquote>
									<p>&ldquo;Far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
								</blockquote>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
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

<div id="fh5co-blog" class="fh5co-bg-section">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
				<h2>Recent Blog</h2>
				<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
			</div>
		</div>
		<div class="row row-bottom-padded-md">
			<div class="col-lg-4 col-md-4">
				<div class="fh5co-blog animate-box">
					<a href="#"><img class="img-responsive" src="images/gallery-4.jpg" alt=""></a>
					<div class="blog-text">
						<h3><a href=""#>45 Minimal Worksspace Rooms for Web Savvys</a></h3>
						<span class="posted_on">Sep. 15th</span>
						<span class="comment"><a href="">21<i class="icon-speech-bubble"></i></a></span>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
						<a href="#" class="btn btn-primary">Read More</a>
					</div> 
				</div>
			</div>
			<div class="col-lg-4 col-md-4">
				<div class="fh5co-blog animate-box">
					<a href="#"><img class="img-responsive" src="images/gallery-2.jpg" alt=""></a>
					<div class="blog-text">
						<h3><a href=""#>45 Minimal Worksspace Rooms for Web Savvys</a></h3>
						<span class="posted_on">Sep. 15th</span>
						<span class="comment"><a href="">21<i class="icon-speech-bubble"></i></a></span>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
						<a href="#" class="btn btn-primary">Read More</a>
					</div> 
				</div>
			</div>
			<div class="col-lg-4 col-md-4">
				<div class="fh5co-blog animate-box">
					<a href="#"><img class="img-responsive" src="images/gallery-3.jpg" alt=""></a>
					<div class="blog-text">
						<h3><a href=""#>45 Minimal Worksspace Rooms for Web Savvys</a></h3>
						<span class="posted_on">Sep. 15th</span>
						<span class="comment"><a href="">21<i class="icon-speech-bubble"></i></a></span>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
						<a href="#" class="btn btn-primary">Read More</a>
					</div> 
				</div>
			</div>
		</div>
	</div>
</div>