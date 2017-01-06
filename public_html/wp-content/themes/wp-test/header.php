<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="description" content="WPテストサイトです。" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title(' | ', true, 'right'); ?><?php bloginfo('name'); ?></title>
<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>" media="all" />
<?php wp_head(); ?>
</head>
<body>

	<div class="conatiner">

		<header class="header">
			<h1><a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/logo.png" width="400" height="339" alt="WPテスト" /></a></h1>
		</header>
		<nav>
			<?php wp_nav_menu( array('menu' => 'main-navi' )); ?>
		</nav>
