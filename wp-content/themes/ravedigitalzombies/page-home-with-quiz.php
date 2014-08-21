<?php
/*
Template Name: Home with Quiz
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

        <a class="twitter-timeline" href="https://twitter.com/hashtag/ravedz" data-widget-id="502097294963904515" data-theme="light" data-link-color="#AA9C8F" data-related="twitterapi,twitter" data-aria-polite="assertive" width="300" height="300">#ravedz Tweets</a>
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
        
        <?php wp_bootstrap_main_nav(); // Adjust using Menus in Wordpress Admin ?>
    </div>

</div> <!-- end #content -->


<?php if(empty($_POST)) : ?>

<!-- loads welcome modal on page load -->
<script type="text/javascript">

    // disable until development is finished  
    jQuery(document).ready(function($)
	{
        var $modal = $('#welcome');
        
        // launch the modal
        $modal.modal(
        {
            backdrop: 'static',
            keyboard: false
        });
        // .. and shows the modal by default
        
        // let's add an event listener to the "Enter" button inside the modal
        // and to the form submit
        $("#welcome-form").submit(onSubmit)
        $("#welcome-submit-btn").click(onSubmit) 
        
        function onSubmit(event)
        {
            // don't refresh the page, or submit the form...
            event.preventDefault();
            
            // alert('you clicked me!');
                
            // let's see what they typed in the input...
            var input = $("#welcome-input").val()
            
            if (input == "a") // TODO change password later
            {
                // hey little hacker, you found the password :)
                // cool, you're in
                $modal.modal('hide');
            }
            else
            {
                // no mate, try again
                // TODO shake the password input
               // alert('no mate, try again');
                var animationType = 'wobble'//'shake';
                $modal.addClass(animationType).one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
                    $modal.removeClass(animationType)
                });

            }
        }
    })
    
</script>



<div class="modal fade animated" id="welcome" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <h1>Welcome</h1>
                <p>Please enter the code you were given below to get started.</p>

                <form id="welcome-form" class="form-inline form-welcome" role="form">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span>
                            </div>
                            <input id="welcome-input" class="form-control" type="text" placeholder="Enter the code">
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button id="welcome-submit-btn" type="button" class="btn btn-primary">Enter site</button>
            </div>
        </div>
    </div>
</div>
<!-- end welcome modal -->

<?php endif; ?>


<?php get_footer(); ?>