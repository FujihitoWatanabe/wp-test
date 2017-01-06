<?php get_header(); ?>

<div class="wrapper">
 
	<main class="main">
	
		<h2><?php the_search_query(); ?>�̌������� : <?php echo $wp_query->found_posts; ?>��</h2>
		<!-- ���e��� loop -->
		<?php if(have_posts()) : ?>
		    <?php while(have_posts()):the_post() ?> 
		        <h3><?php the_title(); ?></h3>
		        <div class="post"> 
		            <?php if (has_post_thumbnail()) : ?>
		                <p class="postThumbnail"><?php the_post_thumbnail(); ?></p>
		            <?php endif; ?>
		            <p><?php the_content('�ڍׂ͂�����'); ?></p>
		        </div><!-- /post -->
		    <?php endwhile; ?>
		<?php else: ?>
		    <div class="post">
		        <p>�\���󂲂����܂���B<br />�Y������L�����������܂���B</p>
		    </div>
		<?php endif; ?>

	</main>
 
    <?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>