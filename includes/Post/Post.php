<?php

namespace Dynahub\Post;

if (!defined('ABSPATH')) {
    exit;
}

class Post
{
    private $post;

    public function __construct($post_id = 0)
    {
        if (!empty($post_id)) {
            $this->post = get_post($post_id);

            return;
        }

        $current_id = get_the_ID();

        if (!empty($current_id)) {
            $this->post = get_post($current_id);
        } else {
            $this->post = null;
        }
    }

    public function get_id()
    {
        return $this->post->ID;
    }

    public function get_title()
    {
        return $this->post->post_title;
    }

    public function get_content($strip_tags = false)
    {
        if ($strip_tags) {
            return wp_strip_all_tags($this->post->post_content);
        }

        return $this->post->post_content;
    }

    public function get_permalink()
    {
        return get_permalink($this->post->ID);
    }

    public function get_date($format = 'd F, Y')
    {
        return get_the_date($format, $this->post->ID);
    }

    public function get_author_id()
    {
        return get_post_field('post_author', $this->post->ID);
    }

    public function get_author_name($field = 'display_name')
    {
        $author_id = $this->get_author_id();

        return get_the_author_meta($field, $author_id);
    }

    public function get_featured_image_url($size = 'full')
    {
        return get_the_post_thumbnail_url($this->post->ID, $size);
    }

    public function get_featured_image_alt()
    {
        return get_the_post_thumbnail_caption($this->post->ID);
    }

    public function get_categories()
    {
        return get_the_category($this->post->ID);
    }

    public function get_first_category_name()
    {
        $categories = $this->get_categories();

        if (empty($categories)) {
            return;
        }

        return $categories[0]->name;
    }

    public function get_reading_time()
    {
        $content = $this->get_content(true);

        $words = str_word_count(strip_tags($content));

        $reading_time = ceil($words / 200);

        return sprintf('%d MINS', $reading_time);
    }
}
