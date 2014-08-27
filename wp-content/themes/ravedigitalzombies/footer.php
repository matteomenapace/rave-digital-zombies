			<footer role="contentinfo">
			
				<div id="inner-footer" class="clearfix">
		          <!-- <hr /> -->
		          <div id="widget-footer" class="clearfix row">
		            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer1') ) : ?>
		            <?php endif; ?>
		            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer2') ) : ?>
		            <?php endif; ?>
		            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer3') ) : ?>
		            <?php endif; ?>
		          </div>
					
					<nav class="clearfix">
						<?php wp_bootstrap_footer_links(); // Adjust using Menus in Wordpress Admin ?>
					</nav>
					
					<!-- <p class="pull-right">Developed by <a href="http://www.ravensbourne.ac.uk/courses/undergraduate-2014-2015/web-media/ba-%28hons%29-web-media/" target="_blank">Web Media Students</a> at Ravensbourne.</p> -->
			
					<!-- <p class="attribution">&copy; <?php bloginfo('name'); ?></p> -->
				
				</div> <!-- end #inner-footer -->
				
			</footer> <!-- end footer -->
		
		</div> <!-- end #container -->

		<a href="http://www.ravensbourne.ac.uk/" class="logo">Ravensbourne</a>
		<a href="<?php echo(get_home_url()); ?>" class="logo-brain">Ravensbourne Induction Trail 2014</a>
				
		<!--[if lt IE 7 ]>
  			<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
  			<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
		<![endif]-->
		
		<?php wp_footer(); // js scripts are inserted using this function ?>

	</body>

</html>