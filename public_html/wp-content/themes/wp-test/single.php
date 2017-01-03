<div class="container">

	<?php get_header(); ?>

		<div class="wrapper">

			<?php
			if ( have_posts() ) : while ( have_posts() ) : the_post();
			?>

					<main class="main">
						<h2><?php the_title(); ?></h2>
						<?php the_content(); ?>
						<?php comments_template(); ?>
					</main>

			<?php
			endwhile;
			endif;
			?>

			<?php get_sidebar(); ?>

		</div>

	<?php get_footer(); ?>

</div>