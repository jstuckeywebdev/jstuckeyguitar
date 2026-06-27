<?php
$args = array(
    'post_type'      => 'testimonial',
    'posts_per_page' => -1, 
    'orderby'        => 'rand',
);
$testimonial_query = new WP_Query ( $args );
?>
<section id="testimonials-section" class="full-width-row bg-dark-wood">
    <div class="container">
        <h2 class="testimonial-title">What People Are Saying</h2>
        <div class="swiper testimonial-slider">
            <div class="swiper-wrapper">
                <?php while ( $testimonial_query->have_posts() ) : $testimonial_query->the_post(); 
                    $body = get_field('testimonial_body'); ?>
                    
                    <div class="swiper-slide">
                        <div class="testimonial-card card bg-parchment">
                            <p><?php echo wp_kses_post($body); ?></p>
                            <p class="h6" style="text-align: center;"><?php the_title(); ?></p>
                        </div>
                    </div>

                <?php endwhile; wp_reset_postdata(); ?>

            </div>
            
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>
