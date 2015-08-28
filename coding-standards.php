<?php get_header(); ?>
<div id="banner" class="hidden-xs hidden-sm">
	<div class="midcontent">
<?php  if( get_field( "glossary_content_banner_image_url_path" ) and get_field( "glossary_content_banner_image_url_upload" ) ): ?>
        <!-- 1st, If both values exist, use the uploaded file path-->
        <img src="<?php the_field('glossary_content_banner_image_url_upload'); ?>" width="1224" height="447" alt="" />    
    <?php else: ?>      
        <?php if( get_field( "glossary_content_banner_image_url_upload" ) ):  ?>
             <!-- 2nd, both values don't exist, so if the upload value exists, use this-->
                <img src="<?php the_field('glossary_content_banner_image_url_upload'); ?>" width="1224" height="447" alt="" />    
        <?php elseif( get_field( "glossary_content_banner_image_url_path" ) ): ?>
         <!-- 3rd, both values don't exist, so if the text path value exists, use this-->
                <img src="<?php echo do_shortcode( '[ghcmThemeImg]' ); ?><?php the_field('glossary_content_banner_image_url_path'); ?>" width="1224" height="447" alt="" /> 
        <?php else: ?>
                <!--4th, if no banner image is specified either by text or file upload(image gallery image), then use default image fallback -->
                <img src="<?php echo do_shortcode( '[ghcmThemeImg]' ); ?>services/healthcare-mgmt/banner.jpg" width="1224" height="447" alt="" />        
    <?php endif; ?>    
<?php endif; ?>                   
		<span class="edge left"></span>
		<span class="edge right"></span>
	</div>
</div>
<div id="carousel-example-generic" class="carousel slide hidden-md hidden-lg BsBannerMarginTop" data-ride="carousel">
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
                <?php  if( get_field( "glossary_content_banner_image_url_path" ) and get_field( "glossary_content_banner_image_url_upload" ) ): ?>
                        <!-- 1st, If both values exist, use the uploaded file path-->
                        <img src="<?php the_field('glossary_content_banner_image_url_upload'); ?>" alt="" />    
                    <?php else: ?>      
                        <?php if( get_field( "glossary_content_banner_image_url_upload" ) ):  ?>
                             <!-- 2nd, both values don't exist, so if the upload value exists, use this-->
                                <img src="<?php the_field('glossary_content_banner_image_url_upload'); ?>" alt="" />    
                        <?php elseif( get_field( "glossary_content_banner_image_url_path" ) ): ?>
                         <!-- 3rd, both values don't exist, so if the text path value exists, use this-->
                                <img src="<?php echo do_shortcode( '[ghcmThemeImg]' ); ?><?php the_field('glossary_content_banner_image_url_path'); ?>"  alt="" /> 
                        <?php else: ?>
                                <!--4th, if no banner image is specified either by text or file upload(image gallery image), then use default image fallback -->
                                <img src="<?php echo do_shortcode( '[ghcmThemeImg]' ); ?>services/healthcare-mgmt/banner.jpg" alt="" />        
                    <?php endif; ?>    
                <?php endif; ?>    
            <div class="carousel-caption">            
            </div>
        </div>
    </div>
        <span class="contentRespBannerLeftEdge"></span>
        <span class="contentRespBannerRightEdge"></span>
</div>


<script type="text/javascript">
/*
Wordpress Additions:
	*6-16-2015, DLB:
		1. Added Jquery.noConflict variable "j$" to substitute normal "$j()" declaration. WP requires this to be able to instantiate
	a Jquery Object in Wordpress. Ref link: http://www.mkyong.com/jquery/jquery-is-not-working-in-wordpress-solution/
		
	
*/

$j=jQuery.noConflict();

alignBannerImage();
</script>

<!-- Banner end -->

<?php 
	$pageHeader = get_field('glossary_page_header_title');
	
	if (have_rows('glossary_page_breadcrumb')):
	$breadcrumbHTML = '<div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><div class="clear full breadcrumbs">';
	$breadcrumbHTML .= '<ul class="ghn breadcrumbs">';
	// loop through the rows of data
	$indexOfLoop = 0;
	$numberofRows = count(get_field('glossary_page_breadcrumb') );
	while ( have_rows('glossary_page_breadcrumb') ) : the_row();
		//determine if the row is the last row (set "last" class for removing breadcrumb carrot)
		if ($indexOfLoop == ($numberofRows - 1))
		{
			$breadcrumbHTML .= '<li class="last">' . get_sub_field('glossary_repeater_level') . '</li>';
		}
		else
		{
			$breadcrumbHTML .= '<li>' . get_sub_field('glossary_repeater_level') . '</li>';
		}
		
		$indexOfLoop++;
	endwhile;
    $breadcrumbHTML .= '</ul>';
    $breadcrumbHTML .= '</div></div></div>';
    endif;
	
	$glossaryContent_AE = "";
	$glossaryContent_FJ = "";
	$glossaryContent_KO = "";
	$glossaryContent_PT = "";
	$glossaryContent_UZ = "";
	$glossaryContent_Num = "";
		
		$argsGlossaryItems = array(
		'posts_per_page'	=> -1,
		'post_type'			=> 'glossary',
		'orderby'			=> 'title',
		'order'             => 'ASC',
		'post_status' => 'publish',                                                        
		);
	$posts_glossary = get_posts($argsGlossaryItems);
	if( $posts_glossary ):            
		foreach( $posts_glossary as $post ): 
		
		$firstChar = strtolower(substr($post->post_title, 0, 1));
		
		if ($firstChar == 'a' || $firstChar == 'b' ||$firstChar == 'c' || $firstChar == 'd' || $firstChar == 'e')
		{
			$glossaryContent_AE .= '	<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 glossary-item">
										<div class="glossary-item-underline">				
											<a class="ghn" href="' . get_permalink($post->ID, false) . '">
												'. $post->post_title . '
												<span class="glossary-arrow" style="top: 1.5px;"></span>
											</a>
										</div>
									</div>';
		}
		else if($firstChar == 'f' || $firstChar == 'g' ||$firstChar == 'h' || $firstChar == 'i' || $firstChar == 'j')
		{
			$glossaryContent_FJ .= '	<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 glossary-item">
										<div class="glossary-item-underline">				
											<a class="ghn" href="' . get_permalink($post->ID, false) . '">
												'. $post->post_title . '
												<span class="glossary-arrow" style="top: 1.5px;"></span>
											</a>
										</div>
									</div>';
		}
		else if($firstChar == 'k' || $firstChar == 'l' ||$firstChar == 'm' || $firstChar == 'n' || $firstChar == 'o')
		{
			$glossaryContent_KO .= '	<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 glossary-item">
										<div class="glossary-item-underline">				
											<a class="ghn" href="' . get_permalink($post->ID, false) . '">
												'. $post->post_title . '
												<span class="glossary-arrow" style="top: 1.5px;"></span>
											</a>
										</div>
									</div>';
		}
		else if($firstChar == 'p' || $firstChar == 'q' ||$firstChar == 'r' || $firstChar == 's' || $firstChar == 't')
		{
			$glossaryContent_PT .= '	<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 glossary-item">
										<div class="glossary-item-underline">				
											<a class="ghn" href="' . get_permalink($post->ID, false) . '">
												'. $post->post_title . '
												<span class="glossary-arrow" style="top: 1.5px;"></span>
											</a>
										</div>
									</div>';
		}
		else if($firstChar == 'u' || $firstChar == 'v' ||$firstChar == 'w' || $firstChar == 'x' || $firstChar == 'y'|| $firstChar == 'z')
		{
			$glossaryContent_UZ .= '	<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 glossary-item">
										<div class="glossary-item-underline">				
											<a class="ghn" href="' . get_permalink($post->ID, false) . '">
												'. $post->post_title . '
												<span class="glossary-arrow" style="top: 1.5px;"></span>
											</a>
										</div>
									</div>';
		}
		else if($firstChar == '0' || $firstChar == '1' || $firstChar == '2' ||$firstChar == '3' || $firstChar == '4' || $firstChar == '5'|| $firstChar == '6' || $firstChar == '7' || $firstChar == '8' ||$firstChar == '9')
		{
			$glossaryContent_Num .= '	<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 glossary-item">
										<div class="glossary-item-underline">				
											<a class="ghn" href="' . get_permalink($post->ID, false) . '">
												'. $post->post_title . '
												<span class="glossary-arrow" style="top: 1.5px;"></span>
											</a>
										</div>
									</div>';
		}
		
		endforeach;   
	endif;
?> 
	<div class="container">
		<?php echo $breadcrumbHTML; ?>
		<div class="row">
			<div class="col-xs-12 xs col-sm-12 col-md-12 col-lg-12 col-centered hidden-lg hidden-md hidden-sm">                
				<h1 id="hospice1H2" class="ghn cmsEdit"><?php echo $pageHeader; ?></h1>
			</div>
			<div class="col-xs-12 xs col-sm-12 col-md-12 col-lg-12 hidden-xs">
				<h1 id="hospice1H2" class="ghn cmsEdit"><?php echo $pageHeader; ?></h1>
			</div>
			<div class="col-xs-12 xs col-sm-12 col-md-12 col-lg-12"> 
				&nbsp;
			</div>
		</div>
		<div class="row alphabet">
			<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2 alphabet-li">
				<a class="ghn" href="javascript:showTerms('div_A-E_Glossary')">a b c d e</a>
			</div>
			<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2 alphabet-li">
				<a class="ghn" href="javascript:showTerms('div_F-J_Glossary')">f g h i j</a>
			</div>
			<div class="col-xs-4 col-sm-4col-md-2 col-lg-2 alphabet-li">
				<a class="ghn" href="javascript:showTerms('div_K-O_Glossary')">k l m n o</a>
			</div>
			<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2 alphabet-li">
				<a class="ghn" href="javascript:showTerms('div_P-T_Glossary')">p q r s t</a>
			</div>
			<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2 alphabet-li">
				<a class="ghn" href="javascript:showTerms('div_U-Z_Glossary')">u v w x y z</a>
			</div>
			<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2 alphabet-li-last">
				<a class="ghn" href="javascript:showTerms('div_Num_Glossary')">1 2 3</a>
			</div>
		</div>

		<div id="glossary_results" class="row">			
			<div id="div_A-E_Glossary" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<?php echo	$glossaryContent_AE; ?>				
			</div>
			<div id="div_F-J_Glossary" class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="display:none;">
				<?php echo	$glossaryContent_FJ; ?>			
			</div>
			<div id="div_K-O_Glossary" class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="display:none;">
				<?php echo	$glossaryContent_KO; ?>			
			</div>
			<div id="div_P-T_Glossary" class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="display:none;">
				<?php echo	$glossaryContent_PT; ?>			
			</div>
			<div id="div_U-Z_Glossary" class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="display:none;">
				<?php echo	$glossaryContent_UZ; ?>			
			</div>
			<div id="div_Num_Glossary" class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="display:none;">
				<?php echo	$glossaryContent_Num; ?>			
			</div>
		</div>
	</div>

<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/bootstrap/js/knowledge_glossary_new.js"></script> 
<?php get_footer(); ?>