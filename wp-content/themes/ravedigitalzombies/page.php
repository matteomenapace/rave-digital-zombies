<?php
/*
Template Name: Default
*/
?>

<?php get_header(); ?>

<div id="content" class="clearfix row">

    <div id="main" class="col-sm-9" role="main">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        
        <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
						
            <!-- <section class=" post_content"> --> <!-- row -->

                <!-- <div class="col-sm-12 main-content"> -->


                    <!-- questions -->
                    <div class="main-container"> <!-- col-sm-10  -->
                       
                       <span class="page-title"><h1><?php echo get_the_title(); ?></h1></span>

                        <?php the_content(); ?>

                    </div> 
               
                <!-- </div> -->

            <!-- </section>  -->
											
        </article> <!-- end article -->
					
			<?php 
				// No comments on homepage
				//comments_template();
			?>
					
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

    
    <div class="col-sm-3 sidebar">
        <?php wp_bootstrap_main_nav(); // Adjust using Menus in Wordpress Admin ?>
    </div>

</div> <!-- end #content -->


<?php if(empty($_POST)) : ?>


<!-- end welcome modal -->

<?php endif; ?>


<?php get_footer(); ?>