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

    <a href="#menu"><button class="navicon"><i class="fa fa-bars fa-lg"></i></button></a>
                   
                    <!-- questions -->
                    <div class="main-container"> <!-- col-sm-10  -->
                       
                        <?php the_content(); ?>

                    </div> 
											
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

    <div id="menu" class="col-sm-3 sidebar">
        <div class="twitter-gradient">
            <!-- twitter start -->
        
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
        

<!--
            <a class="twitter-timeline" href="https://twitter.com/hashtag/hello" data-widget-id="502764290206494720">#hello Tweets</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
-->

       
       
        <!-- twitter end -->
        </div>

        <?php wp_bootstrap_main_nav(); // Adjust using Menus in Wordpress Admin ?>
    </div>        

</div> <!-- end #content -->


<?php if(empty($_POST)) : ?>

<script type="text/javascript">

    jQuery(document).ready(function($)
	{
        // every time a modal is shown, if it has an autofocus element, focus on it
        $('.modal').on('shown.bs.modal', function() 
        {
            $(this).find('[autofocus]').focus();
        })

        // listen to radio inputs, text inputs and options
        // when they get changed (someone clicks on them or enter text)
        // fade the question's box out a bit
        $('.modal input:radio, .modal input:checkbox, .modal input:text').change(function()
        {
            var $input = $(this),
                $slide = $input.parent().parent().parent().parent().parent()

            // console.log($input)
            // console.log($slide)

            $slide.addClass('done') 
        })

        // prevent the quiz form to submit on "Enter"
        // eg: when people type in their group name and then press enter..
        $('form[name=quizForm]').keypress(function(event) 
        {
            // console.log(event)
            
            //Enter key
            if (event.which == 13) 
            {
                event.preventDefault()
                // return false;
            }
        })
        
        /*$('form[name=quizForm]').submit(function(event){
            //event.preventDefault()
        })*/
        // WELCOME MODAL
        
            // loads welcome modal on page load
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
                    
                    /*focus on group input field when modal is hidden*/
                    $("#mlwUserName").focus(); 
                    
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



<div class="modal fade animated" id="welcome" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content welcome-modal">
            <h1>Welcome</h1>
            <div class="modal-body">
                <form id="welcome-form" class="form-inline form-welcome" role="form">
                    <div class="form-group">
                        <div class="input-group">
                            <p>Type in the</p>
                            <input id="welcome-input" type="text" placeholder="password" autofocus autocomplete="off">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="welcome-submit-btn" type="button" class="btn btn-primary">Enter site</button>
            </div>
        </div>
    </div>
</div>
<!-- end welcome modal -->


<div class="modal fade animated" id="error-modal" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content welcome-modal">
            <h1>Wait!</h1><br><br><br>
            <div class="modal-body">
                <form id="welcome-form" class="form-inline form-welcome" role="form">
                    <div class="form-group">
                        <div class="input-group">
                            <p>You forgot to enter your name</p>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Okay</button>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>


<?php get_footer(); ?>