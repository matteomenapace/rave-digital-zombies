<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>

<div id="content" class="clearfix row">

	<div id="main" class="col-sm-9 sidebar" role="main">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

			<a href="#menu"><button class="navicon"><i class="fa fa-bars fa-lg"></i></button></a>

			<div class="main-container">

				<?php the_content(); ?>
			   
				<?php wp_bootstrap_main_nav(); // Adjust using Menus in Wordpress Admin ?>

			</div> 
									
		</article> 
					
		<?php endwhile; ?>	
		
		<?php else : ?>
					
			<article id="post-not-found">
				<header>
					<h1><?php _e("Not Found", "wpbootstrap"); ?></h1>
				</header>
				<section class="post_content">
					<p><?php _e("Sorry, but the requested resource was not found on this site.", "wpbootstrap"); ?></p>
				</section>
			</article>
			
		<?php endif; ?>

	</div> <!-- end #main -->

	<div id="menu" class="col-sm-3 sidebar">
		<div class="twitter-gradient">

			<a class="twitter-timeline" href="https://twitter.com/hashtag/ravedz" data-widget-id="502097294963904515" data-theme="light" data-link-color="#AA9C8F" data-related="twitterapi,twitter" data-aria-polite="assertive" width="300" height="300">#ravedz</a>
			<script>
				! function (d, s, id) {
					var js, fjs = d.getElementsByTagName(s)[0],
						p = /^http:/.test(d.location) ? 'http' : 'https';
					if (!d.getElementById(id)) {
						js = d.createElement(s);
						js.id = id;
						js.src = p + "://platform.twitter.com/widgets.js";
						fjs.parentNode.insertBefore(js, fjs);
					}
				}(document, "script", "twitter-wjs");
			</script>
		</div>

	</div>        

</div> <!-- end #content -->

<script type="text/javascript">

	jQuery(document).ready(function($)
	{
		$('#menu-main-menu a').each(function()
		{
			$(this).attr('target', '_blank')
		})
	})

</script>		

<?php get_footer(); ?>