<?php 

get_header();


?>
<script src='https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js'></script>
<style>
@font-face {
  font-family: 'Poppins';
  src: url("./font/Poppins.ttf");
}

body{
  font-family: 'Poppins';
}
</style>
  <body>
	  <section class="banner">
		  <div class="banner_row">
			  <div class="banner-col-6 left">
				  <div class="banner-heading">
					  <h3>
						  <?php 
						  echo get_the_title();
						  ?>
					  </h3>
				  </div>
				  <div class="banner-description">
					  <p>
						  <?php 
						  $short_description = get_field('short_description'); echo $short_description;  
						  ?>
					  </p>
				  </div>
				  <div class="banner-buttons">
					  <div class="banner-button-left">
						  <?php $brochure_url = get_field('add_brochure'); ?>
						  <a href="<?php echo $brochure_url; ?>" target="_blank"><button type="button" name="button">Download Brochure
							  <?php
							  $community_brochure = get_field('community_brochure'); echo $community_brochure;
							  ?>
							  </button>
						  </a>
					  </div>
					  <div class="banner-button-right">

						  <a href=""><button type="button" name="button">Register your Interest</button>
						  </a>
					  </div>
				  </div>
			  </div>
			  <div class="col-6 right">
        <?php 
               $re_image = get_field('re_image'); 
              ?>
                <img src="<?php echo $re_image; ?>" alt="">
			  </div>
		  </div>
	  </section>
<section class="slider-bt-dev-nw">
<div id="pagee">
  <div class="row">
  <div class="slider slider-single">
    <?php
    $slider_img = get_field('slider');
    foreach($slider_img as $slider)
    {
    ?>
        <div class="web-pic upr-slid">
        
            <img src="<?php echo $slider; ?>" alt="" srcset="">
            
        </div>
   <?php 
    }
   ?>


</div>

    <div class="slider slider-nav">
      
    <?php
     $slider_img = get_field('slider');
     foreach($slider_img as $slider)
     {
     ?>
        <div class="web-pic btm-slid">
            <img src="<?php echo $slider; ?>" alt="" srcset="">
        </div>
   <?php } ?>
</div>
    </div>

  </div>

</section>

<?php $bg_pic = get_field('bg_pic');  ?>
<style>
  .services{
  width:100%;
  margin:auto;
  background-image:url('<?php echo $bg_pic; ?>');
  margin-top: 115px;
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
	background-color: rgb(0 0 0 / 50%);
    background-blend-mode: soft-light;

}
</style>

  <section class="services">
    <div class="services_row">

    <?php

// check if the repeater field has rows of data
if( have_rows('multiple') ):

    while ( have_rows('multiple') ) : the_row();
?>
<div class="services_container">
            <div class="service_logo">
            <?php $act_img = get_sub_field('image'); ?>
                <img src="<?php echo $act_img['url']; ?>" alt="">
            </div>
            <div class="service_head">
            <?php echo get_sub_field('name'); ?>
            </div>
            <div class="service_des">
            <?php echo get_sub_field('shot_description'); ?>
            </div>
        </div>
<?php
    endwhile;

else :

endif;

?>
</div>
  </section>
  <section class="about">
    <div class="about_row">
        <div class="about-col-6 left">
        <?php $community_image = get_field('community_image');  ?>
          <img src="<?php echo $community_image['url'];  ?>" alt="">
        </div>
        <div class="about-col-6 about-right">
          <div class="about-heading">
            <h3>
            About The Community
            </h3>
            <h2>
            <?php $community_title = get_field('community_title'); echo $community_title;  ?>
            </h2>
          </div>
          <div class="about-description">
            <p class="p1">
            <?php $community_description = get_field('community_description'); echo $community_description;  ?>

            </p>
            
          </div>
          <div class="about-buttons">
              <div class="about-button-left">
				   <?php $brochure_url = get_field('add_brochure'); ?>
						  <a href="<?php echo $brochure_url; ?>" target="_blank">
              <button type="button" name="button">Download Brochure
                <?php
                //  $community_brochure = get_field('community_brochure'); echo $community_brochure;
                ?>
              </button>
				  </a>
              </div>
              <div class="about-button-right">
                  <button type="button" name="button">Register your Interest</button>
              </div>
          </div>
        </div>

    </div>
  </section>
  <section class="nearby">
    <h2 class="nearby-title">What's Nearby</h2>
      <div class="nearby-row">
          <div class="nearby-left">
          <?php
// check if the repeater field has rows of data
if( have_rows('nearby') ):

    // loop through the rows of data
    while ( have_rows('nearby') ) : the_row();
        // display a sub field value  
?>
        <div class="nearby-icon-box">
                <div class="nearby-heading">
                    <h2> <?php echo get_sub_field('nearby_time'); ?></h2>
                    <p>minutes</p>
                </div>
                <div class="nearby-des">
                <h3>
                  <?php echo get_sub_field('nearby_area'); ?>
                </h3>
                </div>
            </div>
<?php
    endwhile;
else :
    // no rows found
endif;
?>
<!--         <div class="nearby-icon-box">
          <button type="button" class="nearby-btn" name="button">Schedule Your Property Viewin</button>
        </div> -->
          </div>
          <div class="nearby-right">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3609.828618251421!2d55.34486437525865!3d25.20900147770344!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f6700974dddef%3A0x2e1ebbcfa968f051!2sCreek%20Waters%202!5e0!3m2!1sen!2s!4v1685745746573!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
      </div>
  </section>
  <section class="payment-plan">
    <div class="payment-heading">
      <h1>Easy Easy 90/10 Payment Plan from Emaar</h1>
    </div>
    <div class="payment-row">
    <?php

// check if the repeater field has rows of data
if( have_rows('plans_information') ):
    // loop through the rows of data
    while ( have_rows('plans_information') ) : the_row();
        // display a sub field value       
?>
<div class="payment-card">
          <div class="payment-heading">
            <h2> <?php echo get_sub_field('percentage'); ?></h2>
          </div>
          <div class="payment-des">
            <p> <?php echo get_sub_field('plan'); ?></p>
          </div>
      </div>
<?php
    endwhile;
else :
    // no rows found
endif;
?>
    </div>
    <button type="button" name="button">Register your Interest</button>
  </section>
  <section class="floor-plan">
  <div class="floor-heading">
    <h1>Floor Plans of Creek Waters 2</h1>
  </div>
  <div class="floor-count-row tab">
    <div class="floor-count">
      <button href="#" class="tablinks" onclick="floor(event, 'tab1')">
        <h1>1</h1>
        <p>BR</p>
      </button>
    </div>
    <div class="floor-count">
      <button href="#" class="tablinks" onclick="floor(event, 'tab2')">
        <h1>2</h1>
        <p>BR</p>
      </button>
    </div>
    <div class="floor-count">
      <button href="#" class="tablinks" onclick="floor(event, 'tab3')">
        <h1>3</h1>
        <p>BR</p>
      </button>
    </div>
    <div class="floor-count">
      <button class="tablinks" onclick="floor(event, 'tab4')">
        <h1>4</h1>
        <p>BR</p>
      </button>
    </div>
  </div>
  <div class="floor-row">
    <div class="floor-types">
      <div class="tabcontent bcs-flx" id="tab1">
        <div class="new-tst">
          <div class="main-flx">
              <h4>1-Bedroom</h4>
            <div class="floor-des">
              <h3><?php echo get_field('type_1'); ?></h3>
              <p>LEVEL 01 , </p>
            </div>
              <div class="floor-des">
                <h3><?php echo get_field('total_area_1'); ?></h3>
                <p>753.04 sq ft sqft</p>
              </div>
              <div class="floor-des">
                <h3><?php echo get_field('starting_price_1'); ?></h3>
                <p>--</p>
              </div>
            </div>
              
              <div class="floor-map">
                <?php 
                $image_1 = get_field('image_1'); 
                ?>
                      <img src="<?php echo $image_1['url']; ?>" alt="">
           </div>
          </div>
      </div>
      <div class="tabcontent bcs-flx" id="tab2">
        <div class="new-tst">
        <div class="main-flx">
            <h4>1-Bedroom</h4>
          <div class="floor-des">
            <h3><?php echo get_field('type_2'); ?></h3>
            <p>LEVEL 01 , </p>
          </div>
            <div class="floor-des">
              <h3><?php echo get_field('total_area_2'); ?></h3>
              <p>753.04 sq ft sqft</p>
            </div>
            <div class="floor-des">
              <h3><?php echo get_field('starting_price_2'); ?></h3>
              <p>--</p>
            </div>
          </div>
            
            <div class="floor-map">
              <?php 
               $image_2 = get_field('image_2'); 
               ?>
                    <img src="<?php echo $image_2['url']; ?>" alt="">
                  </div>
          </div>
      </div>
      <div class="tabcontent bcs-flx" id="tab3">
      <div class="new-tst">
        <div class="main-flx">
            <h4>1-Bedroom</h4>
          <div class="floor-des">
            <h3><?php echo get_field('type_3'); ?></h3>
            <p>LEVEL 01 , </p>
          </div>
            <div class="floor-des">
              <h3><?php echo get_field('total_area_3'); ?></h3>
              <p>753.04 sq ft sqft</p>
            </div>
            <div class="floor-des">
              <h3><?php echo get_field('starting_price_3'); ?></h3>
              <p>--</p>
            </div>
          </div>
            
            <div class="floor-map">
              <?php 
               $image_3 = get_field('image_3'); 
               ?>
                    <img src="<?php echo $image_3['url']; ?>" alt="">
                  </div>
</div>
      </div>
      <div class="tabcontent bcs-flx" id="tab4">
        <div class="new-tst">
        <div class="main-flx">
            <h4>1-Bedroom</h4>
          <div class="floor-des">
            <h3><?php echo get_field('type_4'); ?></h3>
            <p>LEVEL 01 , </p>
          </div>
            <div class="floor-des">
              <h3><?php echo get_field('total_area_4'); ?></h3>
              <p>753.04 sq ft sqft</p>
            </div>
            <div class="floor-des">
              <h3><?php echo get_field('starting_price_4'); ?></h3>
              <p>--</p>
            </div>
          </div>
            
            <div class="floor-map">
              <?php 
               $image_4 = get_field('image_4'); 
               ?>
                    <img src="<?php echo $image_4['url']; ?>" alt="">
                  </div>
</div>
      </div>
    </div>
    <div class="floor-buttons">
      <div class="floor-left">
        <button type="button" name="button">Leave A Request</button>
      </div>
      <div class="floor-right">
        <button type="button" name="button">Download Floor Plan</button>
      </div>
    </div>
  </div>
</section>

  <section class="contact-us">
    <div class="contact-row">
      <div class="contact-left">
          <div class="contact-logo">
          <?php 
               $contact_img = get_field('cont_image'); 
               ?>
                <img src="<?php echo $contact_img; ?>" alt="">
          </div>
          <div class="contact-heading">
            <h1><?php echo get_field('cont_title'); ?></h1>
            <h3><?php echo get_field('cont_shot_desc'); ?></h3>
          </div>
          <div class="contact-des">
            <p><?php echo get_field('cont_desc'); ?></p>
          </div>
      </div>
      <div class="contact-right">
        <div class="contact-form-shortcode">
			<?php echo do_shortcode("[gravityform id='2' title='false' description='false' ajax='true']"); ?>
        </div>
        <div class="contact-buttons">
            <div class="contact-button-row">
                <div class="contact-left">
                  <button type="button" name="button"><img src="https://modcasa.ae/wp-content/uploads/2023/06/call-192_svgrepo.com_.png" alt="">Call Us</button>
                </div>
                <div class="contact-right">
                  <button type="button" name="button"><img src="https://modcasa.ae/wp-content/uploads/2023/06/whatsapp_svgrepo.com_.png" alt="">Whatsapp</button>
                </div>
            </div>
            <p>Please note that if the details you enter are incorrect you will not be able to
              receive full details of this offer </p>
        </div>
      </div>
      </div>
	
  </section>
  </body>
  <?php 
get_footer();
?>
<script>
  $(".slider-single").slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: true,
  fade: true,
  useTransform: true,
  asNavFor: ".slider-nav"
});
$(".slider-nav").slick({
  slidesToShow: 4,
  slidesToScroll: 1,
  asNavFor: ".slider-single",
  dots: true,
  focusOnSelect: true
});

</script>
<script>
  function floor(evt, floorName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].classList.remove("active");
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].classList.remove("active");
    }
    document.getElementById(floorName).classList.add("active");
    evt.currentTarget.classList.add("active");
  }

  // Show the first tab content by default
  document.getElementById("tab1").classList.add("active");
  document.getElementsByClassName("tablinks")[0].classList.add("active");


</script>