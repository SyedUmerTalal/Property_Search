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

function property_search( ) { 
    
    $html = "<h1>PROPERTY SEARCH</h1>";
    $html = '<div id="protected">
        <form action="" method="POST">
        
          <div class="row">
          
                    <div class="col-lg-6 col-sm-12 col-xs-12 col-12">
                      <input class="inputfirst" type="text" placeholder="Enter City name">
                    </div>
                    
                
                    <div class="col-lg-3 col-sm-6 col-xs-6 col-6">
                      <select name="min_price">
                        <option value="">Min Price</option>
                        <option value="20000">20000 AED</option>
                        <option value="30000">30000 AED</option>
                        <option value="40000">40000 AED</option>
                      </select>
                    </div>
            
                   <div class="col-lg-3 col-sm-6 col-xs-6 col-6">
                        <select name="max_price">
                            <option value="">Max Price</option>
                            <option value="20000">20000 AED</option>
                            <option value="30000">30000 AED</option>
                            <option value="40000">40000 AED</option>
                        </select>
                   </div>
                   
                   </div>
                
                   <div class="row">
            
                   <div class="col-lg-3 col-sm-6 col-xs-6 col-6">
                        <select name="property_bedrooms_min">
                            <option value="">Min Bedrooms</option>
                            <option value="1">1 Bed</option>
                            <option value="2">2 Bed</option>
                            <option value="3">3 Bed</option>
                        </select>
                   </div>
                   <div class="col-lg-3 col-sm-6 col-xs-6 col-6">
                        <select name="property_bedrooms_max">
                            <option value="">Max Bedrooms</option>
                            <option value="1">1 Bed</option>
                            <option value="2">2 Bed</option>
                            <option value="3">3 Bed</option>
                        </select>
                   </div>
           
                   <div class="col-lg-3 col-sm-6 col-xs-6 col-6">
                        <select name="property_toilet_min">
                            <option value="">Min toilet </option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                   </div>
                   <div class="col-lg-3 col-sm-6 col-xs-6 col-6">
                        <select name="property_toilet_max">
                            <option value="">Max toilet</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                   </div>
                    <div class="col-lg-3 col-sm-6 col-xs-6 col-6">
                        <select name="amneties">
                            <option value="">Amneties</option>
                            <option value="">Balcony</option>
                            <option value="">Garage</option>
                            <option value="">Open Spaces</option>
                            <option value="">GYM</option>
                            <option value="">Tennis Court</option>
                            <option value="">SPA</option>
                            <option value="">Pool</option>
                        </select>
                   </div>
                    <div class="col-lg-3 col-sm-6 col-xs-6 col-6">
                        <select name="land_area">
                            <option value="">Min Area</option>
                            <option value="">400</option>
                            <option value="">240</option>
                            <option value="">120</option>

                        </select>
                   </div>
                   <div class="col-lg-3 col-sm-6 col-xs-6 col-6">
                        <select name="land_area">
                            <option value="">Max Area</option>
                            <option value="">400</option>
                            <option value="">240</option>
                            <option value="">120</option>
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
        $min_toilet = $_POST['min_toilet'];
        $max_toilet = $_POST['max_toilet'];
        $min_bathrooms = $_POST['min_bathrooms'];
        $max_bathrooms = $_POST['max_bathrooms'];
        $rooms_min = $_POST['property_rooms_min'];
        $rooms_max = $_POST['property_rooms_max'];
        $amneties = $_POST['amneties'];
        $max_area = $_POST['min_area'];
        $min_area = $_POST['max_area'];
        $args = array(
        'posts_per_page'   => 10,
        'orderby'          => 'post_date',
        'order'            => 'DESC',
        'post_type'        => 'property',
        'meta_query' => array(
                'relation' => 'OR',
                    array(
                        'key'     => 'property_price',
                        'value'   => $_POST['max_price'],
                        'compare' => '<=',
                        'type' => 'DECIMAL',

                    ),
                array(
                    'key'     => 'property_bedrooms',
                    'value'   => array($_POST['property_bedrooms_max'], $_POST['property_bedrooms_min']),
                    'compare' => 'BETWEEN',
                )
                ,
                array(
                    'key'     => 'property_toilet',
                    'value'   => array($_POST['max_toilet'], $_POST['min_toilet']),
                    'compare' => 'BETWEEN',
                ),
                array(
                    'key'     => 'property_bathrooms',
                    'value'   => array($_POST['max_bathrooms'], $_POST['min_bathrooms']),
                    'compare' => 'BETWEEN',
                ),
                array(
                    'key'     => 'property_rooms',
                    'value'   => array($_POST['max_rooms'], $_POST['min_rooms']),
                    'compare' => 'BETWEEN',
                ),
                array(
                    'key'     => 'property_pool',
                    'value'   => array($_POST['amneties']),
                ),
                array(
                    'key'     => 'property_garage',
                    'value'   => array($_POST['amneties']),
                ),
                array(
                    'key'     => 'property_open_spaces',
                    'value'   => array($_POST['amneties']),
                ),
                array(
                    'key'     => 'property_gym',
                    'value'   => array($_POST['amneties']),
                ),
                array(
                    'key'     => 'property_tennis_court',
                    'value'   => array($_POST['amneties']),
                ),
                array(
                    'key'     => 'property_spa',
                    'value'   => array($_POST['amneties']),
                ),
                array(
                    'key'     => 'property_balcony',
                    'value'   => array($_POST['amneties']),
                ),
                array(
                    'key'     => 'property_secure_parking',
                    'value'   => array($_POST['amneties']),
                ),
                array(
                    'key'     => 'property_air_conditioning',
                    'value'   => array($_POST['amneties']),
                ),
                array(
                    'key'     => 'property_study',
                    'value'   => array($_POST['amneties']),
                ),
                array(
                    'key'     => 'property_land_area',
                    'value'   => array($_POST['max_area'], $_POST['min_area']),
                    'compare' => 'BETWEEN',
                ),
                
            ),
        );
        $enterprise_posts = get_posts( $args );
 
        foreach($enterprise_posts as $row):
            $d = get_post_meta($row->ID);
            if (has_post_thumbnail($row->ID)):
                $image = wp_get_attachment_image_src( get_post_thumbnail_id($row->ID), 'single-post-thumbnail' );
            endif;
            $dataArr[$row->ID] = array(
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
        $html = '<div id="protected">';
        foreach ($dataArr as $dataArrs):
        $html .=' <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <span>'.$dataArrs['thumb_nail'].'</span>
                <img width="100%" src="'.$dataArrs['thumb_nail'].'">
            </div>
            <div class="col-lg-8">
                <div class="list-apartments">
                    <h2>'.$dataArrs['price'].'</h2>
                    <span>'.$dataArrs['post_title'].'</span>|
                    <span>Park Facing</span>|
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
                            <i class="fa fa-bed fa-fw"></i>'.$dataArrs['bathrooms'].'
                        </span>
                    </p>
                </div>
                
            </div>
        </div>
        
    </div>
    ';
        endforeach;
        $html .= '<div>';
            endif;
            return $html;
        endif;
}

/*Footer*/

function your_function() {

    ?>

     <script> //

    jQuery(document).ready(function($){      	
    });
    </script>
        
    <?php
}

add_action( 'wp_footer', 'your_function' );