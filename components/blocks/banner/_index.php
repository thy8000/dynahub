<?php

if (!defined('ABSPATH')) {
    exit;
}

$block_banner_url   = get_field('block_banner_url');
$block_banner_image = get_field('block_banner_image');

$image_url = wp_get_attachment_image_url($block_banner_image, 'large', false, [
    'class' => '!w-full !h-auto !object-cover',
]);

?>
<div class="dynahub-block-banner container">
    <?php

    if (!empty($block_banner_url)) {
        echo "<a href=" . esc_attr($block_banner_url) . ">";
    }

    ?>
    <picture class="!block !overflow-hidden">
        <?php

        if (!empty($block_banner_image)) {
            echo "<img width='100%' height='auto' src='" . $image_url . "'>";
        }

        ?>
    </picture>
    <?php

    if (!empty($block_banner_url)) {
        echo '</a>';
    }

    ?>
</div>