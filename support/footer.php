<section class="footerSection">
	<div class="container mt-5">
	    <div class="row">
		    <?php 
		        if (!isset($_COOKIE['newCookieBanner'])):
		        
		    ?>
	      	<div class="cookie-consent-banner">
		        <div class="cookie-consent-banner__inner">
		          	<div class="cookie-consent-banner__copy">
		            	<div class="cookie-consent-banner__header">THIS WEBSITE USES COOKIES</div>
		            	<div class="cookie-consent-banner__description">We use cookies to personalise content, to provide many media features and to analyse our traffic. We also use the cookie information to help you navigate amonng the apps on this software for your good use of our site, cookies maybe used for analytics purposes to know which pages you have visited You consent to our cookies if you continue to use our website.</div>
		          	</div>

		          	<div class="cookie-consent-banner__actions">
		            	<a href="" class="cookie-consent-banner__cta cookiesAgree">
		              		OK
		            	</a>
		            
		            	<a href="" class="cookie-consent-banner__cta cookie-consent-banner__cta--secondary cookiesAgree">
		              		Decline
		            	</a>
		          	</div>
		        </div>
	      	</div>
	    	<?php endif;?>

	    </div>
		<div class="row">
			<div class="col-sm-3">
				<!-- <h4>Checklistr</h4> -->
			</div>
			<div class="col-sm-9"></div>
		</div>
		<div class="row text-dark">
			<div class="col-sm-4">
				<div class="footer-widget">
					<p class="fs-5">Part of Osabox Limited Company</p>
				</div>
		      	<div class="d-flex justify-content-between mb-4">
		          	<a href="https://web.facebook.com/Weblister" target="_blank" title="facebook" class="text-decoration-none text-dark"><i class="bi bi-facebook fs-3" ></i></a>
		          	<a href="https://www.linkedin.com/company/weblister-co" target="_blank" title="linkedin" class="text-decoration-none text-dark"><i class="bi bi-linkedin fs-3"></i></a>
		          	<a href="https://twitter.com/mutamuls" target="_blank" title="twitter" class="text-decoration-none text-dark fs-3"><i class="bi bi-twitter" alt="twitter fs-3"></i></a>
		      	</div>
			</div>
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<div class="footer-widget">
					<h4>Useful Links</h4>
            		<ul>
                		<li><a href="policy/privacy" title="privacy" class="text-decoration-none text-dark">Privacy</a></li>
              			<li><a href="policy/cookies" title="cookies" class="text-decoration-none text-dark">Cookies</a></li>
            	 		<li><a href="policy/terms-of-use" title="faq" class="text-decoration-none text-dark">Terms of Use</a></li>
            		</ul>
        		</div>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
 //   (function(){
	// var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
	// s1.async=true;
	// s1.src='https://weblister.co/js/js.js';
	// s1.charset='UTF-8';
	// s1.setAttribute('crossorigin','*');
	// s0.parentNode.insertBefore(s1,s0);
	// })();
</script>

<script>
    $(document).ready(function(){
        $(".hamburger").click(function(){
            $(this).toggleClass("is-active");
        });
    });
  	$(document).on("click", ".cookiesAgree", function(e){
      e.preventDefault();
      var cvalue = "newCookieBanner";
      var cname = "newCookieBanner";
        newCookieBannerSet(cname, cvalue);
        setTimeout(function(){
          $(".cookie-consent-banner").hide("slow");
          window.location = "./";
        }, 500);
      })
      function newCookieBannerSet(cname, cvalue) {
        event.preventDefault();    
        const d = new Date();
        d.setTime(d.getTime() + (30*24*60*60*1000));
        let expires = "expires="+ d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
      }
    
</script>