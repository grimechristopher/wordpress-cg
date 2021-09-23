<?php
/**
 * Template part for displaying my main card
 *
 *
 * @package wp_cg_main
 */

?>

<div class="card-display">
    <div class="swiper">
        <!-- Additional required wrapper for Swiper -->
        <div class="swiper-wrapper">
            <!-- Start of Slides -->
            <div id="swiper-front" class="swiper-slide">
                <div id="card-front" class="card">
                    <div class="card-content"> 
                        <div id="cg-icon"><img src="<?php echo get_site_icon_url()?>" ></div>
                        <div class="my-name">
                            <h1><?php bloginfo('name'); ?></h1>
                            <h2><?=bloginfo('description')?></h2>
                        </div>
                        <div class="container-icons">
                            <a href="<?php linkedin_link() ?>" title="<?php linkedin_link() ?>"><i class="fab fa-linkedin"></i></a>
                            <a href="mailto:<?php email_link() ?>" title="<?php email_link() ?>"><i class="fas fa-envelope-square"></i></a>
                            <a href="<?php github_link() ?>" title="<?php github_link() ?>"><i class="fab fa-github-square"></i></a>
                        </div>
                    </div>
                    <div class="card-footer"></div>
                </div>

            </div> <!-- End of swiper-front -->
            <div id="swiper-back" class="swiper-slide">
                <div id="card-back" class="card">
                    <div class="card-content-back">
                        <p><?php  about_me_field() ?></p>
                    </div>
                    <div class="card-footer-back">
                        <img src="mountain.png">
                    </div>
                    </div>
            </div><!-- End of swiper-back -->
            <!-- Last of Slides -->
        </div> <!-- End of swiper-wrapper -->
        <!-- pagination -->
        <div class="swiper-pagination"></div>
    </div> <!-- End of swiper -->
    <div class="down-arrow">
        <a id="scroll-link"><i class="fas fa-chevron-down"></i></a>
    </div> <!-- End of down-arrow-->
</div> <!--  End of card-display -->