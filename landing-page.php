<?php
/*
Template Name: landing-page
*/
?>

<head>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
    <body>
        <div class="edges">
            <div class="header-div">
                <img src="images/logo.png" class="logo">
                    <div class="nav-links-div">
                        <a href="home" class="nav-links">HOME</a>
                        <a href="Shop" class="nav-links">SHOP</a>
                        <a href="Contact" class="nav-links">CONTACT</a>
                    </div>
                     <div class="social-link-div">
						
            <?php
				if ( class_exists( 'woocommerce' ) ) {
					echo '<ul class="nav wc-nav">';
					woocommerce_cart_link();
					echo '<li class="checkout"><a href="'.esc_url($woocommerce->cart->get_checkout_url()).'">'.__('Checkout','woothemes').'</a></li>';
					echo '</ul>';
				}
			?>
                        <img src="images/facebook.png" class="facebook-icon">
                        <img src="images/instagram.png">
                    </div>
                    <div class="float:right;">
                        <a href="myaccount" class="nav-links">MY ACCOUNT</a>
                    </div>
                </div>  
            </div>
        </div>
        <div class="free-shipping-div">
            <h3 class="free-shipping-text">FREE SHIPPING ON ALL ORDERS - ENDS OCT 31</h3>
        </div>
        <a href="http://catcode.com/linkguide/clickimage.html">
            <div class="hero-image"></div>
        </a>
        <div class="height:3px;"></div>
        <a href="http://catcode.com/linkguide/clickimage.html">
            <div class="secondary-hero-a">
                 <div class="gray-transparent-bg">
                <h1 class="secondary-hero-a-headline">WOMEN</h1>
                 </div>
                
            </div>
        </a>    
        <a href="http://catcode.com/linkguide/clickimage.html">
            <div class="secondary-hero-b">
                <div class="gray-transparent-bg">
					<h1 class="secondary-hero-b-headline">MEN</h1>
                </div>
            </div>
        </a>
        <div class="width:100%; height: 100px; float:left; padding-top:20px; margin-bottom:25px;">
            <h2 class="font-size:30px; font-weight:100; text-align:center;">TOP PRODUCTS</h2>
            <div class="height:1px; width:20%; margin:auto; background:black;"></div>
        </div>
        <div class="edges">
                <div class="top-product-div">
                    <div class= "top-product-img-a"> 
                    </div>    
                        <p class="top-product-title">Womens Powered Heated 3 Zone Wyvern Jacket Crimson</p>
                        <div class="stars-div">
                            <img src="images/star.png" class="star-img">
                            <img src="images/star.png" class="star-img">
							<img src="images/star.png" class="star-img">
							<img src="images/star.png" class="star-img">
							<img src="images/star.png" class="star-img">
                        </div>
                        <p class="top-product-price">169.99</p>
                        <div class="top-product-cta-div">
                            <p class="top-product-cta-text">SHOP NOW</p>
                        </div>
                    </div>
                </div>
                <div class="top-product-separator"></div>
                <div class="top-product-div">
                    <div class= "top-product-image-b"> 
                    </div>    
                        <p class="top-product-title">Womens Powered Heated 3 Zone Wyvern Jacket Crimson</p>
                        <div class="stars-div">
                            <img src="images/star.png" class="star-img">
                            <img src="images/star.png" class="star-img">
							<img src="images/star.png" class="star-img">
							<img src="images/star.png" class="star-img">
							<img src="images/star.png" class="star-img">
                        </div>
                        <p class="top-product-price">169.99</p>
                        <div class="top-product-cta-div">
                            <p class="top-product-cta-text">SHOP NOW</p>
                        </div>
                    </div>
                </div>
                <div class="top-product-separator"></div>
                <div class="top-product-div">
                    <div class= "top-product-image-c"> 
                    </div>    
                        <p class="top-product-title">Womens Powered Heated 3 Zone Wyvern Jacket Crimson</p>
                        <div class="stars-div">
                            <img src="images/star.png" class="star-img">
                            <img src="images/star.png" class="star-img">
							<img src="images/star.png" class="star-img">
							<img src="images/star.png" class="star-img">
							<img src="images/star.png" class="star-img">
                        </div>
                        <p class="top-product-price">169.99</p>
                        <div class="top-product-cta-div">
                            <p class="top-product-cta-text">SHOP NOW</p>
                        </div>
                    </div>
                </div> 
        </div>
        <div class="clear"></div>
        
        <div class="horizontal-decor-line"></div>
        <div class="edges">
            <div class="footer-div">
                <ul class="footer-links-ul">
                    <li href="" class="footer-links-li">HOME</li>
                    <li href="" class="footer-links-li">SHOP</li>
                    <li href="" class="footer-links-li">CONTACT</li>
                </ul>
                <span class="footer-vertical-decor-line"></span>
                <div class="footer-social-links-div">
                    <p class="footer-social-links-title">FOLLOW DRAGON HEATWEAR</p>
                    <div class="footer-social-icons-div">
                        <img src="images/facebook.png" class="footer-social-icon">
                        <img src="images/instagram.png" class="footer-social-icon">
                    </div>
                </div>
            </div>
        </div><span class="clear"></span>
        <div class="copyright-div">
            <p class="copyright-text">COPYRIGHT 2016 DRAGON HEATWEAR</p>
        </div>
		
		
    </body>
