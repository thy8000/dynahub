<?php

if (!defined('ABSPATH')) {
    exit;
}

get_header();

?>

<div class="flex flex-col gap-10">
    <?php the_content(); ?>
</div>

<?php

get_footer();
