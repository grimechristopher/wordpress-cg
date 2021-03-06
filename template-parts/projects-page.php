<?php /* Template Name: Projects Template */ ?>

<div id="main-content" class="projects-container">
    <h2 class="section-title">University and Personal Projects</h2>
    <?php
    $loop = new WP_Query( array( 'post_type' => 'project', 'posts_per_page' => -1 ) );
    while ( $loop->have_posts() ) : $loop->the_post();
    ?>
        <div class="project-container">
            <div class="project-image">
                <img src="<?php echo get_the_post_thumbnail_url(); ?>">
            </div>
            <div class="project-about">
                <h2><?php print get_the_title(); ?></h2>
                <?php if (get_post_meta($post->ID, 'meta-box-link-github', true)): ?>
                <div>
                    <a href="<?= get_post_meta($post->ID, 'meta-box-link-github', true)?>">View on GitHub</a>
                </div>
                <?php endif; ?>
                <?php if (get_post_meta($post->ID, 'meta-box-link-live-project', true)): ?>
                <div>
                    <a href="<?= get_post_meta($post->ID, 'meta-box-link-live-project', true)?>">View Live Demo</a>
                </div>
                <?php endif?>
				<?php if (get_post_meta($post->ID, 'meta-box-link-live', true)): ?>
                <div>
                    <a href="<?= get_post_meta($post->ID, 'meta-box-link-live', true)?>">View Live Project</a>
                </div>
                <?php endif?>
                <p><?php print get_the_excerpt(); ?></p>
                <?php if ($post->post_content): ?>
                <a href="<?php echo esc_url( get_permalink() ) ?>">Read more... </a>
                <?php endif; ?>
            </div>
        </div>                     
    <?php endwhile; ?>
</div>
