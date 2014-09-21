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

			<a href="#menu"><button class="navicon"><i class="fa fa-bars fa-lg"></i></button></a>
				   
			<!-- questions -->
			<div class="main-container">
			   
				<?php the_content(); ?>

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

<!-- if there's no POST, then we're on the quiz page -->
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
			// eg: when people type in their name and then press enter..
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

			// WELCOME MODAL
			
				// store welcome modal on page load
				var $modal = $('#welcome'),
					$welcomeForm = $("#welcome-form"),
					$welcomeFormSubmit = $("#welcome-submit-btn")
				
				// launch the modal
				$modal.modal(
				{
					// backdrop: 'static',
					// keyboard: false
				});
				// .. and shows the modal by default
				
				// let's add an event listener to the "Enter" button inside the modal
				// and to the form submit
				$welcomeForm.submit(onSubmit)
				$welcomeFormSubmit.click(onSubmit) 
				
				function onSubmit(event)
				{
					// don't refresh the page, or submit the form...
					event.preventDefault();
					
					// alert('you clicked me!');
						
					// let's see what they typed in the input...
					var input = $("#welcome-input").val()

					// the official passwords are D1G174L and Z0MB135 
					// we can use the shortcut "$" for testing
					var passwords = ['D1G174L', 'Z0MB135', '$']

					var gotRightPassword = false
					for (var i = 0; i < passwords.length; i++) 
					{
						if (passwords[i] === input) gotRightPassword = true
					}

					if (gotRightPassword)    
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
						// alert('no mate, try again');
						var animationType = 'wobble'//'shake';
						$modal.addClass(animationType).one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
							$modal.removeClass(animationType)
						})
					}
				}
		})    
	</script>

	<div id="welcome" class="modal fade animated" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog modal-lg">
			<div class="modal-content welcome-modal">
				<h1>Hello human!</h1>
				<div class="modal-body">
					<form id="welcome-form" class="form-inline form-welcome" role="form">
						<p>By now you should have learned a thing or two about Ravensbourne.</p>
						<p>Good, <b>take this quiz</b>!</p>
						<p>It's just 10 questions, you'll be done in no time :)</p>
								
						<div class="form-group">
							<div class="input-group">
								<input id="welcome-input" type="text" placeholder="Type in the password" autofocus autocomplete="off">
								<p><small>Point the Aurasma app at the completed brain puzzle to reveal <b>the password</b>!</small></p>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button id="welcome-submit-btn" type="button" class="btn btn-primary">Submit</button>
				</div>
			</div>
		</div>
	</div> 
	<!-- <div class="modal fade animated" id="welcome" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog modal-lg">
			<div class="modal-content welcome-modal">
				<h1>Hello human!</h1>
				<div class="modal-body">
					<form id="welcome-form" class="form-inline form-welcome" role="form">
						<div class="form-group">
							<div class="input-group">
								<p>By now you should have rescued a <i>digital zombie</i> and learned a thing or two about Ravensbourne.</p>
								<p>Good, <b>take this quiz</b>!</p>
								<p>It's just 10 questions, you'll be done in no time :)</p>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button id="welcome-submit-btn" type="button" class="btn btn-primary" data-dismiss="modal">Okay</button>
				</div>
			</div>
		</div>
	</div>  -->
	<!-- end welcome modal -->

	<div id="error-modal" class="modal fade animated" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog modal-lg">
			<div class="modal-content welcome-modal">
				<h1>Wait!</h1><br><br><br>
				<div class="modal-body">
					<form class="form-inline form-welcome" role="form">
						<div class="form-group">
							<div class="input-group">
								<p>Make sure you type your name before you submit</p>
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
	<!-- end error modal -->

<!-- else we're on the quiz RESULTS page -->
<?php else : ?>

	<script type='text/javascript'>
		jQuery(document).ready(function($)
		{
			var delay = 7000, // 7 seconds
				$modal = $('#survey')

			setTimeout(function() 
			{
				$modal.modal(
				{
					backdrop: 'static',
					keyboard: false 
				})
			}, delay)

			$('.survey-btn').click(function()
			{
				$modal.modal('hide')
			})
		})
		
	</script>

	<div class='modal fade animated' id='survey' tabindex='-1' role='dialog' aria-labelledby='myLargeModalLabel' aria-hidden='true'>
		<div class='modal-dialog modal-lg'>
			<div class='modal-content welcome-modal'>
				<h1>Great!</h1>
				<div class='modal-body'>
				   <p>Quiz done. Now complete <a class='survey-btn' href='https://www.surveymonkey.com/s/digitalzombie' target='_blank'>this survey</a> to help us improve the Induction day!</p>
				</div>
				<div class='modal-footer'>
					<a class='survey-btn' href='https://www.surveymonkey.com/s/digitalzombie' target='_blank'><button id='survey-submit-btn' type='button' class='btn btn-primary'>Okay</button></a>
				</div>
			</div>
		</div>
	</div>

<?php endif; ?>

<?php get_footer(); ?>