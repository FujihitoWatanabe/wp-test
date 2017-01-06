<?php get_header(); ?>

<div class="wrapper">

	<main class="main">

		<?php if(get_field('item_value')): ?>
			<p>商品価格：<?php the_field('item_value'); ?></p>
		<?php endif; ?>
		<?php if(get_field('item_name')): ?>
			<p>商品名：<?php the_field('item_name'); ?></p>
		<?php endif; ?>

		<!-- ループ -->
		<?php while ( have_posts() ) : the_post(); ?>
			<!-- カスタムフィールドのTELの値があれば出力 -->
			<?php if ( $post->TEL ) : ?>
				<dl>
					<dt>TEL</dt>
					<dd><?php echo esc_html( $post->TEL ); ?></dd>
				</dl>
			<?php endif; ?>
		<?php endwhile; ?>
		<!-- /ループ -->

		<?php
		if (have_posts()) : while (have_posts()) : the_post();
		 
		global $wpdb;
		$query = "SELECT meta_id,post_id,meta_key,meta_value FROM $wpdb->postmeta WHERE post_id = $post->ID ORDER BY meta_id ASC";
		$cf = $wpdb->get_results($query, ARRAY_A);
		 
		$kataban = array();
		$syurui = array();
		$tantou = array();
		$zaiko = array();
		$setsumei = array();
		$gazou = array();
		$pdf = array();
		 
		foreach( $cf as $row ){
		    if( $row['meta_key'] == "kataban" ){
		        array_push( $kataban, $row['meta_value'] );
		    }
		    if( $row['meta_key'] == "syurui" ){
		        array_push( $syurui, $row['meta_value'] );
		    }
		    if( $row['meta_key'] == "tantou" ){
		        array_push( $tantou, $row['meta_value'] );
		    }
		    if( $row['meta_key'] == "zaiko" ){
		        array_push( $zaiko, $row['meta_value'] );
		    }
		    if( $row['meta_key'] == "setsumei" ){
		        array_push( $setsumei, $row['meta_value'] );
		    }
		    if( $row['meta_key'] == "gazou" ){
		        array_push( $gazou, $row['meta_value'] );
		    }
		    if( $row['meta_key'] == "pdf" ){
		        array_push( $pdf, $row['meta_value'] );
		    }
		}

		$length = count( $kataban );
		 		for( $i = 0; $i < $length; $i ++ ){
		//画像取得
		$gazou_sp = wp_get_attachment_image_src($gazou[$i],'full' );
		//PDF取得
		$file = wp_get_attachment_url($pdf[$i]);

		 ?>
		<?php if($kataban[$i] !='') { ?>

		<div>型番：<?php echo $kataban[$i]; ?></div>
		<div>担当：<?php echo $tantou[$i]; ?></div>
		<div>在庫：<?php echo $zaiko[$i]; ?></div>
		<div>商品説明：<?php echo wpautop($setsumei[$i]); ?></div>
		<div>商品画像：<img src="<?php echo $gazou_sp[0]; ?>" alt="<?php the_title(); ?>" /></div>
		<div>PDF：<a href="<?php echo $file; ?>" target="_blank">PDF</a></div>
		<?php }}
		endwhile; endif;
		?>

        <?php
            $args = array(
                 'post_type' => 'info',
                 'paged' => $paged,
        ); ?>
        <?php query_posts( $args ); ?>
        <?php if (have_posts()) : ?>
        	<?php while (have_posts()) : the_post(); ?>
            <div class="post">
            	<h2><?php the_title(); ?></h2>
            	<p class="post-date"><?php the_time("Y") ?></p>
            	<?php the_content(); ?>
            </div>
        	<?php endwhile; ?>
        <?php else : ?>
            <div class="post">
        		<h2>存在しません。</h2>
        		<p>存在しません。</p>
            </div>
        <?php endif; ?>

	</main>

    <?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>