<?php
/*
Template Name: info
*/
?>

<?php get_header(); ?>

<div class="wrapper">
 
	<main class="main">
	
		<?php
		$args = array(
		     'post_type' => 'info', /* ���e�^�C�v���w�� */
		     'paged' => $paged,
		); ?>
		<?php query_posts( $args ); ?>
		<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); 
			/* ���[�v�J�n */ ?>
		    <div class="post">
		    	<h3><?php the_title(); ?></h3>
		    	<p class="post-date"><?php the_time("Y�Nm��j��") ?></p>
		    	<?php the_content(); ?>
		    </div>
			<?php endwhile; ?>     
		<?php else : ?>
		    <div class="post">
				<h3>�L��������܂���</h3>
				<p>�\������L���͂���܂���ł����B</p>
		    </div>
		<?php endif; ?>

	</main>
 
    <?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>