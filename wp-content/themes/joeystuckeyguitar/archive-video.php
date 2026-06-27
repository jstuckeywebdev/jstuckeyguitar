<?php get_header(); ?>

<div class="sub-page-hero full-width-row bg-dark-wood">
    <div class="container">
        <h1>Videos</h1>
        <p>Performance and lesson videos in various styles.</p>
    </div>
</div>


<section class="video-archive bg-sepia-wood full-width-row">
    <div class="container">
        <div class="video-grid">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            
            <div class="video-card card bg-parchment">
                <?php 
                    $yt_url = get_field('embed_url');
                    $yt_id  = get_youtube_id($yt_url);
                    $yt_thumb = "https://img.youtube.com/vi/{$yt_id}/maxresdefault.jpg";
                    $description = get_field('description');
                ?>

                <div class="video-preview">
                    <a href="<?php echo esc_url($yt_url); ?>" class="glightbox video-play-link" data-type="video" data-source="youtube">    
                        <img src="<?php echo $yt_thumb ?>">
                        <div class="play-button-overlay">
                            <svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="32" cy="32" r="30" fill="none" stroke="currentColor" stroke-width="2" />
                                <path d="M25 20 L45 32 L25 44 Z" fill="currentColor" />
                            </svg>
                        </div>
                    </a>
                </div>
                <h3><?php the_title(); ?></h3>
                <div class="description-wrapper">
                    <p><?php echo $description;?></p>
                </div>
                <button class="read-more-btn">Read More</button>
            </div>  
        <?php endwhile; endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>