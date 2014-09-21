<?php
/*
Template Name: Leaderboard
*/
?>

<?php get_header(); ?>

<div id="content" class="clearfix row">

	<div id="main" class="col-sm-9" role="main">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

			<a href="#menu"><button class="navicon"><i class="fa fa-bars fa-lg"></i></button></a>
				   
			<!-- questions -->
			<div class="main-container">

				<h1>Leaderboard</h1>
			   
				<?php the_content(); ?>

				<div id="leaderboard">
					<section>
						<div class="head">
							<span class="team">Team</span>
							<span class="points">Points</span>
						</div>	
						<ol class="teams"></ol>
					</section>
				</div>

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
				<footer>
				</footer>
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

		<?php wp_bootstrap_main_nav(); // Adjust using Menus in Wordpress Admin ?>
	</div>        

</div> <!-- end #content -->

<!-- LEADERBOARD SCRIPTS -->

	<script type="text/template" id="team-template">
		<li class="team" id="<%= name %>">
			<a href="https://twitter.com/search?q=%23ravedz+%23<%= name.substring(1) %>&src=typd" target="_blank"><%= name %></a>
			<span class="points"><%= score %></span>
		</li>
	</script>

	<script src="<?php echo(WP_THEME_URL); ?>/library/js/libs/underscore.js"></script>
	<script src="<?php echo(WP_THEME_URL); ?>/library/js/leaderboard.js"></script>

	<?php 
		$sheet_number = get_post_meta( get_the_ID(), 'sheet_number', true );
		if( empty( $key_1_value ) ) $sheet_number = 1;
	?>

	<script src="http://spreadsheets.google.com/feeds/list/13syiGKLkEd7j6irGyuTCRnc77ggYSX7zRTkm3RUu8xs/<?= $sheet_number ?>/public/values?alt=json-in-script&callback=buildLeaderboard"></script>
	<!-- 
		to get a JSON feed from a publich Google Spreadsheet we need to ask it this way
		1. http://spreadsheets.google.com/feeds/list/
		2. SPREADSHEET_PUBLIC_KEY (eg: 13syiGKLkEd7j6irGyuTCRnc77ggYSX7zRTkm3RUu8xs )
		3. SHEET_NUMBER (eg: 2)
		4. public/values?alt=json-in-script
		5. callback=CALLBACK_NAME (eg: buildLeaderboard)
		
		the whole URL would look like this
		http://spreadsheets.google.com/feeds/list/13syiGKLkEd7j6irGyuTCRnc77ggYSX7zRTkm3RUu8xs/2/public/values?alt=json-in-script&callback=buildLeaderboard
	-->


<?php get_footer(); ?>