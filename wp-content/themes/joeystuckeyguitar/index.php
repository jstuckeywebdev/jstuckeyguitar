<?php get_header(); ?>

<?php
if (is_front_page()):
    $hero_title = get_field('hero_title');
    $hero_text = get_field('hero_text');
    $hero_cta_text = get_field('hero_cta_text');
    $hero_cta_url = get_field('cta_url');
    $hero_cta_2_text = get_field('hero_cta_2_text');
    $hero_cta_2_url = get_field('cta_2_url');
    $yt_url = get_field('hero_youtube_embed_url');
    $yt_id  = get_youtube_id($yt_url);
    $yt_thumb = "https://img.youtube.com/vi/{$yt_id}/maxresdefault.jpg";
    

echo '<div id="home-hero">
        <div id="home-hero-content" class="container">
            <div class="video-preview">
                <a href="' . $yt_url . '" class="glightbox video-play-link">    
                    <img src=' . $yt_thumb . '>
                    <div class="play-button-overlay">
                        <svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="32" cy="32" r="30" fill="none" stroke="currentColor" stroke-width="2" />
                            <path d="M25 20 L45 32 L25 44 Z" fill="currentColor" />
                        </svg>
                    </div>
                </a>
            </div>
            <div class="hero-info-section">
                <h1>' . $hero_title . '</h1>
                <p>' . $hero_text . '</p>
                <div class="hero-btns"><a class="btn btn-primary bg-sepia-wood" href="' . $hero_cta_url . '">' . $hero_cta_text . '</a><a class="btn btn-secondary" href="' . $hero_cta_2_url . '">' . $hero_cta_2_text . '</a></div>
            </div>
        </div>
</div>';
elseif (!is_front_page()):
    $hero_title = get_field('title');
    $hero_text = get_field('text');
?>

    <div class="sub-page-hero full-width-row bg-dark-wood">
        <div class="container">
            <?php if ($hero_title): ?>
                <h1><?php echo $hero_title ?></h1>
            <?php else: ?> 
                <h1><?php the_title(); ?></h1>
            <?php endif ?>
                <p><?php echo $hero_text ?></p>
        </div>
    </div>

<?php endif ?>


<div class="container">
    <?php the_content(); ?>
</div>

<?php get_footer(); ?>
