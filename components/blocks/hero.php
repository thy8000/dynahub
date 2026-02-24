<?php

if (!defined('ABSPATH')) {
    exit;
}

$hero_posts = get_field('hero_post');

if (empty($hero_posts)) {
    $hero_posts = get_posts([
        'post_type'      => 'post',
        'posts_per_page' => 1,
        'fields'         => 'ids',
    ]);
}

$posts_count = count($hero_posts);

?>

<div class="dynahub-block-hero">
    <?php

    if ($posts_count === 1) {
        get_template_part('components/blocks/hero/hero-single-post', null, [
            'post' => $hero_posts[0] ?? null,
        ]);
    } else if ($posts_count === 2) {
        get_template_part('components/blocks/hero/hero-double-posts', null, [
            'posts' => $hero_posts,
        ]);
    } else {
        get_template_part('components/blocks/hero/hero-multiple-posts', null, [
            'posts' => $hero_posts,
        ]);
    }

    ?>
</div>