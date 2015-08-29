<?php 
/**
 * File Template for Greystone Health Glossary Page
 *
 * @category N/A
 * @package  Wordpress
 * @author   Darnell Brown <darnell.brown@greystoneit.com> 
 * @license  https://wordpress.org/about/gpl/ GPLv2
 * @link     N/A
 *
 */
 get_header(); 
 ?>
<div id="banner" class="hidden-xs hidden-sm">
    <div class="midcontent">
        <?php if (get_field("glossary_content_banner_image_url_path") and get_field("glossary_content_banner_image_url_upload")): ?>
            <!-- 1st, If both values exist, use the uploaded file path-->
            <img src="<?php the_field('glossary_content_banner_image_url_upload'); ?>" width="1224" height="447" alt="" />    
        <?php else: ?>      
            <?php if (get_field("glossary_content_banner_image_url_upload")): ?>
                <!-- 2nd, both values don't exist, so if the upload value exists, use this-->
                <img src="<?php the_field('glossary_content_banner_image_url_upload'); ?>" width="1224" height="447" alt="" />    
            <?php elseif (get_field("glossary_content_banner_image_url_path")): ?>
                <!-- 3rd, both values don't exist, so if the text path value exists, use this-->
                <img src="<?php echo do_shortcode('[ghcmThemeImg]'); ?><?php the_field('glossary_content_banner_image_url_path'); ?>" width="1224" height="447" alt="" /> 
            <?php else: ?>
                <!--4th, if no banner image is specified either by text or file upload(image gallery image), then use default image fallback -->
                <img src="<?php echo do_shortcode('[ghcmThemeImg]'); ?>services/healthcare-mgmt/banner.jpg" width="1224" height="447" alt="" />        
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
            <?php if (get_field("glossary_content_banner_image_url_path") and get_field("glossary_content_banner_image_url_upload")): ?>
                <!-- 1st, If both values exist, use the uploaded file path-->
                <img src="<?php the_field('glossary_content_banner_image_url_upload'); ?>" alt="" />    
            <?php else: ?>      
                <?php if (get_field("glossary_content_banner_image_url_upload")): ?>
                    <!-- 2nd, both values don't exist, so if the upload value exists, use this-->
                    <img src="<?php the_field('glossary_content_banner_image_url_upload'); ?>" alt="" />    
                <?php elseif (get_field("glossary_content_banner_image_url_path")): ?>
                    <!-- 3rd, both values don't exist, so if the text path value exists, use this-->
                    <img src="<?php echo do_shortcode('[ghcmThemeImg]'); ?><?php the_field('glossary_content_banner_image_url_path'); ?>"  alt="" /> 
                <?php else: ?>
                    <!--4th, if no banner image is specified either by text or file upload(image gallery image), then use default image fallback -->
                    <img src="<?php echo do_shortcode('[ghcmThemeImg]'); ?>services/healthcare-mgmt/banner.jpg" alt="" />        
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
    alignBannerImage();
</script>

<?php
$page_header = get_field('glossary_page_header_title');

if (have_rows('glossary_page_breadcrumb')) {
    $bread_crumb_html = '<div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><div class="clear full breadcrumbs">';
    $bread_crumb_html .= '<ul class="ghn breadcrumbs">';
    // loop through the rows of data
    $index_of_loop = 0;
    $number_of_rows = count(get_field('glossary_page_breadcrumb'));
    while (have_rows('glossary_page_breadcrumb')) : the_row();
        //determine if the row is the last row (set "last" class for removing breadcrumb carrot)
        if ($index_of_loop == ($number_of_rows - 1)) {
            $bread_crumb_html .= '<li class="last">' . get_sub_field('glossary_repeater_level') . '</li>';
        } else {
            $bread_crumb_html .= '<li>' . get_sub_field('glossary_repeater_level') . '</li>';
        }
        $index_of_loop++;
    endwhile;
    $bread_crumb_html .= '</ul>';
    $bread_crumb_html .= '</div></div></div>';
}

$glossary_content_AE = "";
$glossary_content_FJ = "";
$glossary_content_KO = "";
$glossary_content_PT = "";
$glossary_content_UZ = "";
$glossary_content_num = "";

$args_glossary_items = array(
    'posts_per_page' => -1,
    'post_type' => 'glossary',
    'orderby' => 'title',
    'order' => 'ASC',
    'post_status' => 'publish',
);

$posts_glossary = get_posts($args_glossary_items);

if ($posts_glossary) {
    foreach ($posts_glossary as $post) {
        $first_char = strtolower(substr($post->post_title, 0, 1));
        if ($first_char == 'a' || $first_char == 'b' || $first_char == 'c' || $first_char == 'd' || $first_char == 'e') {
                $glossary_content_AE .= '<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 glossary-item">
                                            <div class="glossary-item-underline">				
                                                <a class="ghn" href="' . get_permalink($post->ID, false) . '">
                                                    ' . $post->post_title . '
                                                    <span class="glossary-arrow" style="top: 1.5px;"></span>
                                                </a>
                                            </div>
                                        </div>';
        } else if ($first_char == 'f' || $first_char == 'g' || $first_char == 'h' || $first_char == 'i' || $first_char == 'j') {
                $glossary_content_FJ .= '<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 glossary-item">
                                            <div class="glossary-item-underline">				
                                                <a class="ghn" href="' . get_permalink($post->ID, false) . '">
                                                    ' . $post->post_title . '
                                                    <span class="glossary-arrow" style="top: 1.5px;"></span>
                                                </a>
                                            </div>
                                        </div>';
        } else if ($first_char == 'k' || $first_char == 'l' || $first_char == 'm' || $first_char == 'n' || $first_char == 'o') {
                $glossary_content_KO .= '<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 glossary-item">
                                            <div class="glossary-item-underline">				
                                                <a class="ghn" href="' . get_permalink($post->ID, false) . '">
                                                    ' . $post->post_title . '
                                                    <span class="glossary-arrow" style="top: 1.5px;"></span>
                                                </a>
                                            </div>
                                        </div>';
        } else if ($first_char == 'p' || $first_char == 'q' || $first_char == 'r' || $first_char == 's' || $first_char == 't') {
                $glossary_content_PT .= '<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 glossary-item">
                                            <div class="glossary-item-underline">				
                                                <a class="ghn" href="' . get_permalink($post->ID, false) . '">
                                                    ' . $post->post_title . '
                                                    <span class="glossary-arrow" style="top: 1.5px;"></span>
                                                </a>
                                            </div>
                                        </div>';
        } else if ($first_char == 'u' || $first_char == 'v' || $first_char == 'w' || $first_char == 'x' || $first_char == 'y' || $first_char == 'z') {
                $glossary_content_UZ .= '<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 glossary-item">
                                            <div class="glossary-item-underline">				
                                                <a class="ghn" href="' . get_permalink($post->ID, false) . '">
                                                    ' . $post->post_title . '
                                                    <span class="glossary-arrow" style="top: 1.5px;"></span>
                                                </a>
                                            </div>
                                        </div>';
        } else if ($first_char == '0' || $first_char == '1' || $first_char == '2' || $first_char == '3' || $first_char == '4' || $first_char == '5' || $first_char == '6' || $first_char == '7' || $first_char == '8' || $first_char == '9') {
                $glossary_content_num .= '<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 glossary-item">
                                            <div class="glossary-item-underline">				
                                                <a class="ghn" href="' . get_permalink($post->ID, false) . '">
                                                    ' . $post->post_title . '
                                                    <span class="glossary-arrow" style="top: 1.5px;"></span>
                                                </a>
                                            </div>
                                        </div>';
        }
    }
}
?> 
<div class="container">
<?php echo $bread_crumb_html; ?>
    <div class="row">
        <div class="col-xs-12 xs col-sm-12 col-md-12 col-lg-12 col-centered hidden-lg hidden-md hidden-sm">                
            <h1 id="hospice1H2" class="ghn cmsEdit"><?php echo $page_header; ?></h1>
        </div>
        <div class="col-xs-12 xs col-sm-12 col-md-12 col-lg-12 hidden-xs">
            <h1 id="hospice1H2" class="ghn cmsEdit"><?php echo $page_header; ?></h1>
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
            <?php echo $glossary_content_AE; ?>				
        </div>
        <div id="div_F-J_Glossary" class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="display:none;">
            <?php echo $glossary_content_FJ; ?>			
        </div>
        <div id="div_K-O_Glossary" class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="display:none;">
            <?php echo $glossary_content_KO; ?>			
        </div>
        <div id="div_P-T_Glossary" class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="display:none;">
            <?php echo $glossary_content_PT; ?>			
        </div>
        <div id="div_U-Z_Glossary" class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="display:none;">
            <?php echo $glossary_content_UZ; ?>			
        </div>
        <div id="div_Num_Glossary" class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="display:none;">
            <?php echo $glossary_content_num; ?>			
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/bootstrap/js/knowledge_glossary_new.js"></script> 
<?php get_footer(); ?>