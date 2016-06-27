<?php
/**
 * The custom template for the one-page style front page. Kicks in automatically. Booya!
 */
get_header(); ?>

	<div id="primary" class="content-area lander-page">
		<main id="main" class="site-main" role="main">

			<section id="about">
				<div class="container about-text">
					<?php
						$query = new WP_Query( 'pagename=about' );
						// The Loop
						if ( $query->have_posts() ) {
							while ( $query->have_posts() ) {
								$query->the_post();
								echo '<h2 class="about-title">' . get_the_title() . '</h2>';
								echo '<div class="entry-content">';
								the_content();
								echo '</div>';
							}
						}
						/* Restore original Post Data */
						wp_reset_postdata();
					?>
				</div>
			</section>

			<section id="skills">
				<div class="container">

					<?php
            $icon_1 = get_field('icon_1');
						$icon_2 = get_field('icon_2');
						$icon_3 = get_field('icon_3');
						//echo get_post_field( 'post_content', $frontpage_id );

          ?>

					<?php $args = array (
						'post_type' => 'skills',
						'posts_per_page' => 3,
						'order' => "ASC"
					);
					$skills = new WP_Query($args);?>

					<ul class="skills-front">
					<?php while ( $skills->have_posts() ) : $skills->the_post();
						$icon = get_field('icon');
						$title = get_field('title');
						$text = get_field('icon_text');
					?>
							<li class="individual-skill">
							    <?php the_post_thumbnail('skills-image'); ?>
							    <figure class="skills-image">
                    <i class="fa <?php echo $icon; ?> fa-5x"></i>
							    </figure>
							    </a>
							    <aside class="skills-text">
  							    <!-- <a href="<?php //get_permalink(); ?>" title="Learn more about <?php //echo $title; ?>"> -->
    				           <h3 class="skills-title"><?php echo $title; ?></h3>
										<!-- </a> -->
  							    <div class="skills-text">
  							     <?php echo $text; ?>
  					       </div>
							    </aside>
							</li>
						<?php endwhile; ?>
          </ul>
				</div>
			</section>

			<section id="contact">
				<div class="container">
					<?php
					$query = new WP_Query('pagename=contact');
					// The Loop
					if ( $query->have_posts() ) {
						while ( $query->have_posts() ) {
							$query->the_post();
							$image = get_field('image');
							$size = "full";
							$cta = get_field('call_to_action');
							$cta_sub = get_field('cta_sub-title');
							$social_title = get_field('social_icons_title');
					?>
          <div class="one-half contact-form alignleft">
						<figure class="contact-image">
							<?php echo wp_get_attachment_image( $image, $size ); ?>
						</figure>
          </div>
          <div class="one-half alignright">
							<div class="entry-content">
								<h1 class="cta"><?php echo $cta; ?></h1>
								<p class="cta_sub"><?php echo $cta_sub; ?></p>
								<h2 class="social-title"><?php echo $social_title; ?></h2>
              <ul class="social-icons">
                  <li><a href=""><i class="fa fa-twitter fa-2x"></i></a></li>
                  <li><a href=""><i class="fa fa-tumblr fa-2x"></i></a></li>
                  <li><a href=""><i class="fa fa-instagram fa-2x"></i></a></li>
                  <li><a href=""><i class="fa fa-linkedin fa-2x"></i></a></li>
                  <li><a href=""><i class="fa fa-github fa-2x"></i></a></li>
              </ul>
							</div>
						<?php }
					  }
					wp_reset_postdata();
					?>
          </div>
				</div>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->



<?php get_footer(); ?>
