<?php

/**

 * Plugin Name: Music events and blogs

 * Plugin URI: http://myprojectstaging.com/

 * Description: Music events and blogs posts.

 * Version: 1.0

 * Author: Jeff

 * Author URI: http://myprojectstaging.com/

 */

/*

* Creating a function to create our CPT

*/


/*****************Home testimonials**************************/

add_shortcode( 'latest_testimonials_code', 'latest_testimonials_code' );

function latest_testimonials_code( ) {

    $args = array(

        'post_type' => 'our_testimonials',

        'post_status' => 'publish',

    );

    $html = '';

    $html .='<div class="story-main">';

        $the_query = new WP_Query( $args );

        // The Loop

        if ( $the_query->have_posts() ) {

            while ( $the_query->have_posts() ) {

                

                $the_query->the_post();

                $id = get_the_ID();

                $title = get_the_title();

                $excerpt = get_the_excerpt();

                $content = get_the_content();

                $perm = get_the_permalink();

                $thumbnail = get_the_post_thumbnail_url();



                    $html .='<div class="testi-content">

                                <div class="inner">

                                    <p class="content">'.$content.'</p>

                                    <h3>'.$title.'</h3>

                                </div>

                            </div>';

            }

        } else {

            // no posts found

        }

        $html .='</div>';

        /* Restore original Post Data */

        return($html);

        wp_reset_postdata();



}
/********************/

add_shortcode( 'property_search', 'property_search' );
add_shortcode( 'property_single', 'property_single' );
function sd_add_scripts(){
    $plugin_url = plugin_dir_url(_FILE_);
    wp_enqueue_style( 'fontawesomecss', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css', '', '' );
    
    wp_enqueue_style( 'bootstrapcss', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css', '', '' );
    wp_enqueue_style( 'slickcss', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css', '', '' );

    wp_enqueue_style( 'slickcssd', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css', '', '' );
    
    wp_register_script('sdd2131','https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js','','');

    wp_register_script('twitterboot','https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js','','');

    wp_register_script('slickjs','https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.js','','');
}
add_action( 'wp_enqueue_scripts', 'sd_add_scripts' );


function property_search( ) { 
    
    $html = "<h1>PROPERTY SEARCH</h1>";
    $html .= '<div id="protected">
        <form action="" method="POST">
           <div class="row" style="margin:0;">
          
                         
          <div class="row">
          
                    <div class="col-lg-6 col-sm-12 col-xs-12 col-12 input-res">
                      <input class="inputfirst" type="text" placeholder="Enter City name"
                      name="property_address_sub_number">
                    </div>
                    
                    <div class="col-lg-6 col-sm-12 col-xs-12 col-12 input-res">
                       <select name="property_type" id="property_type">
                        <option value="Rent">Rent</option>
                        <option value="Buy">Buy</option>
                        <option value="Commercialrent">Commercial Rent</option>
                        <option value="Commercialbuy">Commercial Buy</option>
                      </select>
                    </div>
                    
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6 col-6 select-res id="property_category">
                      <select name="property_category" >
                        <option value="">Property Type</option>
                        <option value="Villa">Villa</option>
                        <option value="House">House</option>
                        <option value="OfficeSpace">Office Space</option>
                        <option value="Retail">Retail</option>
                        <option value="Warehouse">Warehouse</option>
                        <option value="Shop">Shop</option>
                        <option value="ShowRoom">Show Room</option>
                        <option value="FullFloor">Full Floor</option>
                        <option value="Wholebuilding">Whole Building</option>
                        <option value="Land">Land</option>
                        <option value="BulkRent">Bulk Rent Unit</option>
                        <option value="Factory">Factory</option>
                        <option value="Farm">Farm</option>
                      </select>
                    </div>
        
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6 col-6 select-res">
                      <select name="min_price">
                        <option value="">Min Price</option>
                        <option value="20000">20000 AED</option>
                        <option value="30000">30000 AED</option>
                        <option value="40000">40000 AED</option>
                      </select>
                    </div>
            
                   <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6 col-6 select-res">
                        <select name="max_price">
                            <option value="">Max Price</option>
                            <option value="20000">20000 AED</option>
                            <option value="30000">30000 AED</option>
                            <option value="40000">40000 AED</option>
                        </select>
                   </div>
                   <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6 col-6 select-res">
                        <select name="property_land_area_min" id="property_land_area_min">
                            <option value="">Min Area</option>
                            <option value="120">120 sq ft</option>
                            <option value="240">240 sq ft </option>
                            <option value="400">400 sq ft</option>

                        </select>
                   </div>
                   <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6 col-6 select-res">
                        <select name="property_land_area_max" id="property_land_area_max">
                            <option value="">Max Area</option>
                            <option value="400">400 sq ft</option>
                            <option value="240">240 sq ft</option>
                            <option value="120">120 sq ft</option>
                        </select>
                   </div>
                   
                   <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6 col-6 select-res">
                      <select name="property_pay" id="property_pay">
                        <option value="">Choose</option>
                        <option value="Yearly">Yearly</option>
                        <option value="Monthly">Monthly</option>

                      </select>
                    </div>
                   <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6 col-6 select-res">
                        <select name="property_bedrooms_min" id="property_bedrooms_min">
                            <option value="">Min Bedrooms</option>
                            <option value="1">1 Bed</option>
                            <option value="2">2 Bed</option>
                            <option value="3">3 Bed</option>
                            <option value="4">4 Bed</option>
                            <option value="5">5 Bed</option>
                            <option value="6">6 Bed</option>
                            <option value="7">7 Bed</option>
                            <option value="8">8 Bed</option>
                        </select>
                   </div>
                   <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6 col-6 select-res">
                        <select name="property_bedrooms_max" id="property_bedrooms_max">
                            <option value="">Max Bedrooms</option>
                            <option value="1">1 Bed</option>
                            <option value="2">2 Bed</option>
                            <option value="3">3 Bed</option>
                            <option value="4">4 Bed</option>
                            <option value="5">5 Bed</option>
                            <option value="6">6 Bed</option>
                            <option value="7">7 Bed</option>
                            <option value="8">8 Bed</option>
                        </select>
                   </div>
           
                   <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6 col-6 select-res">
                        <select name="property_toilet_min" id="property_toilet_min">
                            <option value="">Min toilet </option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                   </div>
                   <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6 col-6 select-res">
                        <select name="property_toilet_max" id="property_toilet_max">
                            <option value="">Max toilet</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                   </div>
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6 col-6 select-res">
                        <select name="amneties" id="amneties">
                           <option value="">Amneties</option>
                            <option value="property_balcony">Balcony</option>
                            <option value="property_garage">Garage</option>
                            <option value="property_gym">GYM</option>
                            <option value="property_tennis_court">Tennis Court</option>
                            <option value="property_spa">SPA</option>
                            <option value="property_study">Study</option>
                            <option value="property_pool">Pool</option>
                            <option value="property_secure_parking">Secure Parking</option>
                        </select>
                   </div>
           </div>
          
           <button class="searchbutton" name="submit_btn" id="submit_btn">
                <span class="fa fa-search"></span>
           </button>
           
        </form>
        </div>';
        return $html;
}

add_shortcode( 'property_list', 'property_list' );
function property_list(){
    if(isset($_POST['submit_btn'])):
        $max_price = $_POST['max_price'];
        $min_price = $_POST['min_price'];
        $bedrooms_min = $_POST['property_bedrooms_min'];
        $bedrooms_max = $_POST['property_bedrooms_max'];
        $min_toilet = $_POST['property_toilet_min'];
        $max_toilet = $_POST['property_toilet_max'];
        $min_bathrooms = $_POST['min_bathrooms'];
        $max_bathrooms = $_POST['max_bathrooms'];
        $amneties = $_POST['amneties'];
        $max_area = $_POST['property_land_area_min'];
        $min_area = $_POST['property_land_area_max'];
        $property_category = $_POST['property_category'];
        
        
        if($_POST['property_land_area_min'] || $_POST['property_land_area_max']){
            $area = array(
                    'key'     => 'property_land_area',
                    'value'   => array($min_area,$max_area),
                    'type' => 'NUMERIC',
                    'compare' => 'BETWEEN'
            );
        }
        
        if($_POST['property_toilet_min'] || $_POST['property_toilet_max']){
            $toil = array(
                    'key'     => 'property_toilet',
                    'value'   => array($min_area,$max_area),
                    'type' => 'NUMERIC',
                    'compare' => 'BETWEEN'
            );
        }
        if($_POST['property_bedrooms_min'] || $_POST['property_bedrooms_max']){
            $bed = array(
                    'key'     => 'property_bedrooms',
                    'value'   => array($bedrooms_min,$bedrooms_max),
                    'type' => 'NUMERIC',
                    'compare' => 'BETWEEN'
            );
        }
        if($_POST['min_price'] || $_POST['max_price']){
            $price = array(
                'key'     => 'property_price',
                'value'   => array($min_price,$max_price),
                'compare' => 'BETWEEN',
                'type' => 'numeric'
            );
        }
        if($_POST['amneties']){
            $amneties1 =    array(
                'key'     => $_POST['amneties'],
                'value'   => 'yes',
                'compare' => 'LIKE',
            );
        }
        if($_POST['property_type']){
            $prop_select =    array(
                'key'     => 'select_category',
                'value'   => $_POST['property_type'],
                'compare' => 'LIKE',
            );
        }
        if($_POST['property_category']){
            $prop_cat =    array(
                'key'     => 'property_category',
                'value'   => $_POST['property_category'],
                'compare' => 'LIKE',
            );
        }
        if($_POST['property_address_sub_number']){
            $prop_city =    array(
                'key'     => 'property_address_sub_number',
                'value'   => $_POST['property_address_sub_number'],
                'compare' => 'LIKE',
            );
        }
        if($_POST['property_pay']){
            $prop_period =    array(
                'key'     => 'property_period',
                'value'   => $_POST['property_pay'],
                'compare' => 'LIKE',
            );
        }


        $args = array(
        'post_type'        => 'property',
        'meta_query' => array(
                'relation' => 'OR',
                $bed,$toil,$price,$amneties1,$prop_cat,$area,
                $prop_city,$prop_select,$prop_period
            ),
        );
        
        $enterprise_posts = new WP_Query( $args );

        foreach($enterprise_posts->posts as $row):
            $d = get_post_meta($row->ID);
             $al=  get_the_permalink($row->ID);
            if (has_post_thumbnail($row->ID)):
                $image = wp_get_attachment_image_src( get_post_thumbnail_id($row->ID), 'single-post-thumbnail' );
            endif;
            $dataArr[$row->ID] = array(
                'id'=>$row->ID,
                'post_title'=>$row->post_title,
                'thumb_nail'=>$image[0],
                'address'=>$d['property_address_sub_number'][0] .''. $d['property_address_street_number'][0],
                'category'=>$d['property_category'],
                'price'=> $d['property_price'][0],
                'bedrooms'=>$d['property_bedrooms'][0],
                'bathrooms'=>$d['property_bathrooms'][0],
                'area'=>$d['property_land_area'][0],
                'air_conditioning'=>$d['property_air_conditioning'][0],
                'property_pool'=>$d['property_pool'][0],
                'property_rooms'=>$d['property_rooms'][0],
                'property_garage'=>$d['property_garage'][0],
                'property_open_spaces'=>$d['property_open_spaces'][0],
                'property_gym'=>$d['property_gym'][0],
                'property_spa'=>$d['property_spa'][0],
                'property_tennis_court'=>$d['property_tennis_court'][0],
                'property_balcony'=>$d['property_balcony'][0],
                'property_secure_parking'=>$d['property_secure_parking'][0],
                'property_study'=>$d['property_study'][0],
                'property_category'=>$d['property_category'][0],
            );
            endforeach;
        // global $wpdb;
        // $pre = $wpdb->prefix;
    
        
        // $tbl1 = $pre."posts";
        // $tbl2 = $pre."postmeta";
        // $args = array(
        //     'post_type' => 'property',
        //     'post_status' => 'publish',
        //     'posts_per_page' => 5,
        // );
        // $dbResult = new WP_Query($args);
        
        // print_r($dbResult);
        // exit;
        // global $wpdb;
        // $value = $wpdb->get_var( $wpdb->prepare("SELECT meta_value FROM $wpdb->postmeta WHERE meta_key = %s AND post_id = 305 LIMIT 1" , 'property_bedrooms') );
        // echo '<pre>';
        // print_r($value);
        // exit;
        // $sql = "SELECT $tbl1.post_title,$tbl2.meta_key, $tbl2.meta_value, $tbl2.post_id 
        // from $tbl1 
        // INNER JOIN $tbl2 ON $tbl2.post_id = $tbl1.id where $tbl1.post_type = 'property'
        //     AND $tbl2.meta_key = 'property_sold_price' AND $tbl2.meta_key = 'property_bedrooms' 
        // GROUP BY 
        //     $tbl2.post_id";
        
        // $getRecords = $wpdb->get_results($sql);
        // print_r($getRecords);
        // foreach($getRecords as $row):
        //     print_r($row);
        // endforeach;
    
        if(!empty($dataArr)):
        $html = '<div id="slick1">';
        foreach ($dataArr as $dataArrs):
        $html .=' <div class="container slide-item item-style">
        <div class="row" id="'.$dataArrs['id'].'">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <img width="100%" style="height: 300px;object-fit: cover;object-position: center;" src="'.$dataArrs['thumb_nail'].'">
            </div>
            <div class="col-lg-8 col-md-6 col-sm-6 pmt">
                <div class="list-apartments">
                    <h2><a href="'.$al.'" >'.$dataArrs['post_title'].'</a></h2>
                    <span>'.$dataArrs['price'].'  AED</span>
                    <span>|</span>
                    <span>Prime Location</span>
                    <p>
                        <i class="fa fa-map-marker fa-fw"></i><span>'.$dataArrs['address'].'</span>
                    </p>
                </div>
                
                <div class="no-of-rooms">
                    <p>
                        TownHouse
                        
                        <span>
                            <i class="fa fa-bed fa-fw"></i>'.$dataArrs['bedrooms'].'
                        </span>
                        
                        <span>
                            <i class="fas fa-wheelchair fa-fw"></i>'.$dataArrs['bathrooms'].'
                        </span>
                    </p>
                </div>
                
                <div class="buttons-items-small">
                    <button><span class="fa fa-phone fa-fw"></span>Call</button>
                    <button><span class="fa fa-envelope fa-fw"></span>Email</button>
                </div>
                
            </div>
        </div>
        
    </div>
    ';
        endforeach;
            endif;
            return $html;
        endif;
}

//
// zeeshan
//


function property_single($atts){
    if(!empty($_GET)){
        $html = '<div class="container-mine">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 p-0 left-image">
                <div>
                     <img width="100%" src="https://www.propertyfinder.ae/property/f5ef7dcab1bb508818b6c0dcf4f79e2e/856/550/MODE/7bac29/8018057-18812o.webp?ctr=ae">
                </div>
            </div>
            <div class="col-lg-4 col-md-8 col-sm-8 right-images">
                <div>
                    <img src="https://www.propertyfinder.ae/property/f5ef7dcab1bb508818b6c0dcf4f79e2e/856/550/MODE/7bac29/8018057-18812o.webp?ctr=ae">
                </div>
                <div>
                    <img src="https://www.propertyfinder.ae/property/f5ef7dcab1bb508818b6c0dcf4f79e2e/856/550/MODE/7bac29/8018057-18812o.webp?ctr=ae">
                </div>
            </div>
        </div>
        </div>';
        return $html;
        
    } else {
        $html = 'No record found';
        return $html;
    }
}






/*Footer*/

function your_function() {

    ?>

    <script>
    
        jQuery(document).ready(function($){   
            $('#slick1').slick({
                vertical: true,
                verticalSwiping: true,
        		dots: false,
        		arrows: true,
        		infinite: false,
        		speed: 300,
        		slidesToShow:4,
        		slidesToScroll: 4,
        		responsive: [
                    {
                      breakpoint: 768,
                      settings: {
                        touchMove:false,
                        swipe:false,
                      }
                    }
                  ]
            });
        
        jQuery('#property_type').on('change',function(){	
		    var categoryText = $('#property_type option:selected').val();
		  //  console.log(categoryText);
		    //alert(categoryText);
		    if (categoryText =='Rent'){
		        $('#property_pay').show('slow');
		        $('#amneties').show('slow');
		        $('#property_bedrooms_min').show('slow');
		        $('#property_bedrooms_min').show('slow');
		        $('#property_toilet_min').show('slow');
		        $('#property_toilet_max').show('slow');
		        $('#property_land_area_min').show('slow');
		        $('#property_land_area_max').show('slow');
		    }else if(categoryText =='Buy'){
		        $('#property_pay').hide('slow');
		        $('#amneties').show('slow');
		        $('#property_bedrooms_min').show('slow');
		        $('#property_bedrooms_max').show('slow');
		        $('#property_toilet_min').show('slow');
		        $('#property_toilet_max').show('slow');
		        $('#property_land_area_min').show('slow');
		        $('#property_land_area_max').show('slow');
		    }else if(categoryText =='Commercialrent'){
		        $('#property_pay').show('slow');
		        $('#amneties').hide('slow');
		        $('#property_bedrooms_min').hide('slow');
		        $('#property_bedrooms_max').hide('slow');
		        $('#property_toilet_min').hide('slow');
		        $('#property_toilet_max').hide('slow');
		        $('#property_land_area_min').show('slow');
		        $('#property_land_area_max').show('slow');
		    }else if(categoryText =='Commercialbuy'){
		        $('#property_pay').hide('slow');
		        $('#amneties').hide('slow');
		        $('#property_bedrooms_min').hide('slow');
		        $('#property_bedrooms_max').hide('slow');
		        $('#property_toilet_min').hide('slow');
		        $('#property_toilet_max').hide('slow');
		    }

    	});
    });	
    </script>
        
    <?php
}

add_action( 'wp_footer', 'your_function' );


function checkoutss( ) { 
    global $product;
    $the_query = new WP_Query(array(
        'post_type'=>'product',
        'posts_per_page' => 5  
    )); 
    while ( $the_query->have_posts() ) : 
    $the_query->the_post();
?>
<div class="sl-slide">
 <?php the_post_thumbnail('large');?>
 <div class="sl-slide-inner">
 <?php the_title();?>
 <?php the_excerpt();?>
</div>
</div>
<?php 
endwhile; 
wp_reset_postdata();

  }
add_shortcode( 'checkoutss', 'checkoutss' );

add_filter( 'woocommerce_single_product_summary', 'checkout_func_two' );

function checkout_func_two() {
// Your code


global $product;
print_r($product);
echo 1;
}
