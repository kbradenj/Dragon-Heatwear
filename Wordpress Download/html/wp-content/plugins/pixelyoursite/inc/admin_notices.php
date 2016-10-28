<?php
function woofp_admin_notices($return=false){


$activation_time = get_option('pysf_activation_date', '');
$version = get_option('pysf_plugin_version', '');


$current_time = time();

if( empty($activation_time) || version_compare($version, PYS_FREE_VERSION, '<') ){
    $activation_time = $current_time;
    update_option( 'pysf_activation_date', $activation_time);
    update_option( 'pysf_plugin_version', PYS_FREE_VERSION);
    update_option( 'pysf_notice_dismiss', '');
    update_option( 'woo_pysf_notice_dismiss', '');
}


//Expiration time ( 3 days ) = ( number of days * hours * minutes * seconds )
$expiration_days = 3;
$expiration_time = $activation_time + ( $expiration_days * 24 * 60 * 60);

//calculate number of days passed since activation;
$days_passed = woofp_days_passed($current_time, $activation_time);

//date of expiration
$expiration_date = date('l jS \of F Y', $expiration_time);

$link_1 = 'http://www.pixelyoursite.com/limited-offer?utm_source=wadmin&utm_medium=wordpress&utm_campaign=limited-offer';
$link_2 = 'http://www.pixelyoursite.com/facebook-pixel-plugin?utm_source=wadmin&utm_medium=wordpress&utm_campaign=last-message';



//Message for day 1
$day_1_text = '<span class="pysf_note"><b>Upgrade to PixelYourSite PRO </b></span> and optimize your FB ads for clicks on links or buttons with <b>Dynamic Events</b>. Enable <i>time on page</i> event, or improve conversion attribution and retargeting reach by using <b>Advanced Matching</b>. Track <b>Traffic Source</b> and UTM for better retargeting with Custom Audiences. Don’t miss this limited discount:<br> ';
$day_1_text .= '<a href="http://www.pixelyoursite.com/facebook-pixel-plugin?utm_source=wpadmin-update&utm_medium=update&utm_campaign=update" target="_blank"><b>Click to download PixelYourSite Pro for a big discount</b></a>';

//Message for day 2
$day_2_text = '<span class="pysf_note"><b>Use Dynamic Events </b></span> and optimize your ads for <b>on-site actions</b> (trigger events on CLICKS, page scroll, mouse over). Use TimeOnPage for key pages Custom Audiences and track the <b>Traffic Source</b> and UTM for all your events:<br>';
$day_2_text .= '<a href="http://www.pixelyoursite.com/facebook-pixel-plugin?utm_source=wpadmin-update&utm_medium=update&utm_campaign=update" target="_blank"><b>Download PixelYourSite Pro for a limited discount</b></a>';

//Message for day 3
$day_3_text = '<span class="pysf_note"><b>Last chance to get your DISCOUNT:</b></span> With PixelYourSite Pro you can use <b>Dynamic Events</b> (optimize campaigns for actions on your site, like clicks, page scroll or mouse over), track <b>TimeOnPage</b> (create super powerful Custom Audiences for key pages), plus enable <b>Advanced Matching</b> (new FB feature that increases conversion attribution and reach for retargeting campaigns). <b>Traffic Source</b> and UTM are added to all the events, so you can create <i>highly accurate retargeting campaigns</i>: <br>';
$day_3_text .= '<a href="http://www.pixelyoursite.com/facebook-pixel-plugin?utm_source=wpadmin-update&utm_medium=update&utm_campaign=update" target="_blank"><b>Download Now (offer ending soon)</b></a>';

//Message for day 4 to 7;
$day_4_to_7_text = '<span class="pysf_note"><b>Your Facebook Pixel FREE Guide:</b></span> After <i>more than 10 000 users</i> and many hours spent on answering questions, we decided to make a comprehensive guide about the new Facebook Pixel.</br>Have you got it yet? <b>Download it now for free:</b> <a href="http://www.pixelyoursite.com/facebook-pixel-pdf-guide?utm_source=wpadmin-update&utm_medium=update&utm_campaign=update" target="_blank">Click here for your Guide</a>';


//Message for day 7 to 12
$day_7_to_12_text = '<span class="pysf_note"><b>PixelYourSite FREE Guide:</b></span> Get your FREE guide about the new Facebook Pixel, because it will help you to make better ads.</br> Make sure you read it too: <a href="http://www.pixelyoursite.com/facebook-pixel-pdf-guide?utm_source=wpadmin-update&utm_medium=update&utm_campaign=update" target="_blank">Download it now for free</a>';

$options = array(


        //message for day 1
        array(

            'day'             => 1,
            'message'         => $day_1_text,
            'visibility'     => 'visible', /* visible OR hidden */

            ),

        //message for day 2
        array(

            'day'             => 2,
            'message'         => $day_2_text,
            'visibility'     => 'visible', /* visible OR hidden */
 

            ),

        //message for day 3
        array(

            'day'             => 3,
            'message'         => $day_3_text,
            'visibility'     => 'visible', /* visible OR hidden */
 

            ),


        //message for day 4-7
        //This will start on day 4
        //and end on day 7
        array(

            'day'             => '4-7',
            'message'         => $day_4_to_7_text,
            'visibility'     => 'hidden', /* visible OR hidden */
 

        ),

        //message for day 7-12
        //This will start on day 7
        //and end on day 12
        array(

            'day'             => '7-12',
            'message'         => $day_7_to_12_text,
            'visibility'     => 'visible', /* visible OR hidden */


        ),


);


//Messages when WooCommerce is installed and activated

//WooCommerce Message for day 1
$woo_day_1_text = 'WooCommerce Day 1 Message.';
$woo_day_1_text = '<span class="pysf_note"><b>PixelYourSite PRO + Product Catalog Feed Plugin Bundle:</b></span> Track Conversion Value and start with Facebook Dynamic Ads for WooCommerce in minutes. <br>Get <b>PixelYourSite Pro</b> (<i>fine tune Conversion Value</i>, optimize WooCommerce events for Custom Audiences, track tags, product tags and Time on Page, <b>Traffic Source</b> and UTM, enable Advanced Matching and use <i>Dynamic Events</i>)<br>Get <b>Product Catalog Feed Plugin</b> (create WooCommerce Dynamic Ads Product Catalog XML feeds)<br> ';
$woo_day_1_text .= '<a href="http://www.pixelyoursite.com/bundle-offer?utm_source=wpadmin-update&utm_medium=update&utm_campaign=update" target="_blank"><b>Click to DOWNLOAD the bundle now (best deal)</b></a>';



//WooCommerce Message for day 2
$woo_day_2_text = 'WooCommerce Day 2 Message.';
$woo_day_2_text = '<span class="pysf_note"><b>Customize WooCommerce Conversion Value:</b></span>  With PixelYourSite Pro you can <b>fine tune WooCommerce Events Values</b> and improve conversion tracking. Include/Exclude Tax or Shipping, plus define the value for each WooCommerce event as the full product price, price percent or a global value. Turn ON/OFF value tracking for each event according to your needs.<br>';
$woo_day_2_text .= '<a href="http://www.pixelyoursite.com/facebook-pixel-plugin?utm_source=wpadmin-update&utm_medium=update&utm_campaign=update" target="_blank"><b>Click to download PixelYourSite Pro for a serious discount</b></a>';


//WooCommerce Message for day 3
$woo_day_3_text  = 'WooCommerce Day 3 Message.';
$woo_day_3_text = '<span class="pysf_note"><b>WooCommerce Custom Audiences Optimization:</b></span> Build super-powerful Custom Audiences with PixelYourSite PRO. Track product name, category or product tags, plus shipping and payment methods, client city or country, coupon used and coupons names. All the events will have <b>Traffic Source and UTM</B> as parameters and there is a TimeOnPage event. Use them to <b>create highly relevant retargeting campaigns.</b></br>';
$woo_day_3_text .= '<a href="http://www.pixelyoursite.com/facebook-pixel-plugin?utm_source=wpadmin-update&utm_medium=update&utm_campaign=update" target="_blank"><b>Click to download PixelYourSite Pro for a serious discount</b></a>';


//WooCommerce Message for day 4 to 7;
$woo_day_4_to_7_text = 'WooCommerce Day 4 to 7 Message.';
$woo_day_4_to_7_text = '<span class="pysf_note"><b>Track Traffic Source:</b></span> With PixelYourSite Pro you can track <b>Traffic Source</b> and use it to build super-powerful Custom Audiences for your retargeting campaigns. Create Custom Audiences based on <b>where the users are coming from (Google, FB, any other site or URL), including a particular Facebook Ad</b><br> ';
$woo_day_4_to_7_text .= '<a href="http://www.pixelyoursite.com/facebook-pixel-plugin?utm_source=wpadmin-update&utm_medium=update&utm_campaign=update" target="_blank">Click to download PixelYourSite Pro for a serious discount</a>';


//WooCommerce Message for day 7 to 12
$woo_day_7_to_12_text = 'WooCommerce Day 7 to 12 Message.';
$woo_day_7_to_12_text = '<span class="pysf_note"><b>Your Facebook Pixel FREE Guide:</b></span> After <i>more than 10 000 users</i> and many hours spent on answering questions, we decided to make a comprehensive guide about the new Facebook Pixel. <br>Have you got it yet? <a href="http://www.pixelyoursite.com/facebook-pixel-pdf-guide?utm_source=wpadmin-update&utm_medium=update&utm_campaign=update" target="_blank">Click here for your own FREE copy</a>';



$woo_options = array(


        //woocommerce message for day 1
        array(

            'day'             => 1,
            'message'         => $woo_day_1_text,
            'visibility'     => 'visible', /* visible OR hidden */

            ),

        //woocommerce message for day 2
        array(

            'day'             => 2,
            'message'         => $woo_day_2_text,
            'visibility'     => 'visible', /* visible OR hidden */
 

            ),

        //woocommerce message for day 3
        array(

            'day'             => 3,
            'message'         => $woo_day_3_text,
            'visibility'     => 'visible', /* visible OR hidden */
 

            ),


        //woocommerce message for day 4-7
        //This will start on day 4
        //and end on day 7
        array(

            'day'             => '4-7',
            'message'         => $woo_day_4_to_7_text,
            'visibility'     => 'hidden', /* visible OR hidden */
 

        ),

        //woocommerce message for day 7-12
        //This will start on day 7
        //and end on day 12
        array(

            'day'             => '7-12',
            'message'         => $woo_day_7_to_12_text,
            'visibility'     => 'visible', /* visible OR hidden */


        ),


);




    
    //we will store the message of each day
    $notice_message = '';


    if ( class_exists( 'WooCommerce' ) ) {
          //WooCommerce is installed

        //Get dismissed notices
           $dismiss_option = get_option( 'woo_pysf_notice_dismiss', '');
        $options = $woo_options;

    } else {
          //No WooCommerce
      
          //Get dismissed notices
          $dismiss_option = get_option( 'pysf_notice_dismiss', '');
            
    }

    
    //loop through notice settings
    foreach ($options as $key => $option) {
        
        $is_dismissed     = isset( $dismiss_option[$option['day']] ) ? true : false;

        if( is_integer( $option['day']) ){

            //check if there is a message for a day and that it is on
            if( !$is_dismissed && $option['day'] == $days_passed && $option['visibility'] == 'visible' ){
                
                $dismiss_option = $option['day'];
                $notice_message = $option['message'];
                break;
            }

        } else {

            //check range of days

            $pieces = explode('-', $option['day']);
            $start     = $pieces[0];
            $end     = $pieces[1];

            //check if there is a message for a day and that it is on
            if( !$is_dismissed && ( $days_passed >= $start && $days_passed  <= $end) && $option['visibility'] == 'visible' ){
                
                $dismiss_option = $option['day'];
                $notice_message = $option['message'];
                break;
            }


        }
    }


    if( !empty( $notice_message  ) ){

        $notice = '<style type="text/css">
            .pysf_note{ color: #dd4e4e; }
            #pysf_notice {
              border-left-width: 10px;
              display: block;
              margin: 25px 20px 10px 2px;
              padding: 4px 10px;
            }
            #pysf_notice p{ width:98%;}
            .pysf_clear{ clear:both;}
        </style>';
        
        $html_class = '';
        $html_id = 'pysf_notice_tab';
        $button_html = '<button type="button" class="notice-dismiss" title="Dismiss Notice"><span class="screen-reader-text">Dismiss this notice.</span></button>';
        if( !$return){
            $html_class = 'update-nag notice is-dismissible';
            $html_id = 'pysf_notice';
            $button_html = '';
        }

        $notice .=  '<div id="'.$html_id.'" class="'.$html_class.' pysf_clear pysf_notice pysf_notice_day_'.$dismiss_option.'" data-pysf="pysf_notice_day_'.$dismiss_option.'">';
        $notice .= '<p>'.$notice_message.'</p>';
        $notice .= $button_html;
        $notice .= '</div>';

        $notice .= "<script type='text/javascript'>
            jQuery(function($){

                jQuery(document).on( 'click', '.pysf_notice .notice-dismiss', function() {
                    
                    jQuery(this).closest('.notice-dismiss').fadeOut('slow');

                    jQuery.ajax({
                        url: ajaxurl,
                        data: {
                            action: 'pysf_notice_dismiss',
                            option: '".$dismiss_option."'
                        }
                    });

                });

            });
        </script>";
        
    if( !$return)    
        echo $notice;
    else
        return $notice;
    }

}



function woofp_admin_notices_action(){
    woofp_admin_notices();
}
if( isset($_GET['page']) && $_GET['page'] == 'woo-facebookpixel' ){

} else {
    add_action( 'admin_notices', 'woofp_admin_notices_action' );
}

function ajax_pysf_notice_dismiss(){

    if ( class_exists( 'WooCommerce' ) ) {
          $name  = 'woo_pysf_notice_dismiss';
      } else {
          $name = 'pysf_notice_dismiss';
      }

    if( isset($_REQUEST['option'])){
        $dismiss_option = get_option( $name, '');
        $dismiss_option[$_REQUEST['option']] = 1;
        update_option( $name, $dismiss_option);     
    }

    die();
}
add_action('wp_ajax_pysf_notice_dismiss', 'ajax_pysf_notice_dismiss');

//get number of days passed since activation
function woofp_days_passed($current_time, $activation_time){

    $timepassed = $current_time-$activation_time;
    $timepassed = ( ( ( $timepassed/24 )/60 )/60 );
    $dayspassed = floor($timepassed);
    $dayspassed = $dayspassed + 1;

    return $dayspassed;

}


