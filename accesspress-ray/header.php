<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package AccessPress Ray
 */
?><!DOCTYPE html> 
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalabe=no">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
global $accesspress_ray_options;
$accesspress_ray_settings = get_option( 'accesspress_ray_options', $accesspress_ray_options );
?>
<div id="page" class="site">
<header id="masthead" class="site-header">
    <div id="top-header" >
    	<div class="wrapper" style="width:100%">
		
			<div class="header-row row" id="header-row-1">
				<div class="header-wrap col-xs-12"<?php do_action( 'accesspress_ray_logo_alignment' ); ?>">
					<!--  -->
					<div class="site-branding main-logo col-xs-8">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>">

							<?php if ( get_header_image() ) { ?>
								<img id="main-logo-img" src="<?php header_image(); ?>" alt="<?php bloginfo('name') ?>">
							<?php }else{ ?>
								<h1 class="site-title"><?php echo bloginfo('title'); ?></h1>
								<div class="tagline site-description"><?php echo bloginfo('description'); ?></div>
							<?php } ?>		
						</a>		
					</div><!-- .site-branding -->        		
				
					<div class="navbar-header col-xs-3">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>                        
							</button>
						</div>
						
				</div>
			</div><!-- .header-wrap -->
			  <div id="header-row-2" class="header-row row" >
				<div id="site-navigation" class="navbar main-navigation col-xs-12" style=" width:100%" >
					<nav  class="" >
				
						
						<div class="collapse navbar-collapse" id="myNavbar">
							
							<?php 
								wp_nav_menu( array( 
								'theme_location' => 'primary' , 
								'container_class' => 'menu',
								'items_wrap'      => '<ul class="d-flex justify-content-center" id="%1$s">%3$s</ul>',
                				'walker'         => new Add_button_of_Sublevel_Walker
								) ); 

								if($accesspress_ray_settings['show_search'] == 1){ ?>
								<div class="search-icon">
								<i class="fa fa-search"></i>
								<div class="ak-search">
									<?php get_search_form(); ?>
								</div>
								</div>
							<?php } ?>
				    	</div>
					</nav>
				</div>
		</div>  <!-- .ak-container  --> 

  </div><!-- #top-header -->
</div>
</header><!-- #masthead -->

<section id="slider-banner">	
	<div class="slider-wrap">
		<?php 
		if(is_home() || is_front_page() ){
			do_action( 'accesspress_ray_bxslider' ); 
		} ?>
	</div>
</section><!-- #slider-banner -->
<script type="text/javascript">
	
		jQuery(".navbar-toggle" ).click(function() {
 	if(jQuery(this).attr('aria-expanded')!="true" ){
 		jQuery("#site-navigation").removeClass("hides");
 		jQuery("#site-navigation").addClass("expanded");


 	}
 	else{
 		 // jQuery(this).stop().animate({ margin-top:'-5px!important';
    // position: 'relative';},{duration:5000});
 				jQuery("#site-navigation").removeClass("expanded");
 				jQuery("#site-navigation").addClass("hides");
 					// jQuery("#site-navigation").removeClass('expanded', 5500);
 				 // jQuery("#site-navigation").addClass('hides', 5500);
 	}

});
		jQuery(".sub-toggle" ).click(function() {
			if(jQuery(this).parent().find("ul").is(":visible")){
				jQuery(this).parent().find("ul:first").hide();
			}else{

			jQuery(this).parent().find("ul:first").show();
			}
			
			
		//  $(this).stop(true,false).removeAttr('style').addClass('red', {duration:500});
  // })
  // .mouseout(function(){
  //   $(this).stop(true,false).removeAttr('style').removeClass('red', {duration:500});
   });
jQuery(window).resize(function() { 
    $screenWidthCheck = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
    if ($screenWidthCheck > 768) {
        jQuery(".menu").find("ul").css("display","");
    }
});
</script>
	
<?php
if((is_home() || is_front_page()) && 'page' == get_option( 'show_on_front' )){	
	$accesspress_ray_content_id = "content";	
}elseif(is_home() || is_front_page() ){
	$accesspress_ray_content_id = "home-content";
}else{
	$accesspress_ray_content_id ="content";
} ?>

<div id="<?php echo esc_attr($accesspress_ray_content_id); ?>" class="site-content">