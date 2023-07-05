<?php

function custom_theme_assets() {
    wp_enqueue_style( 'style', get_stylesheet_uri() );
    wp_enqueue_style( 'body-home', get_template_directory_uri() . '/css/body-home.css' );
    wp_enqueue_style( 'body-single', get_template_directory_uri() . '/css/body-single.css' );
    wp_enqueue_style( 'header', get_template_directory_uri() . '/css/header.css' );
    wp_enqueue_style( 'footer', get_template_directory_uri() . '/css/footer.css' );
}

add_action( 'wp_enqueue_scripts', 'custom_theme_assets' );
add_theme_support( 'post-thumbnails');

$post_date = get_the_date('d M Y'); // Obtém a data no formato 'dia mês ano' (exemplo: 01 Jan 2023)
$post_date_formatted = date('d M Y', strtotime($post_date));

function get_current_page_number() {
    return (get_query_var('page')) ? get_query_var('page') : 1;
}

function custom_pagination($query, $currentPage) {
    $args = array(
        'total' => $query->max_num_pages,
        'current' => max(1, $currentPage),
        'prev_next' => true,
        'prev_text' => '«',
        'next_text' => '»',
    );

    echo '<div class="pagination">';
    echo paginate_links($args);
    echo '</div>';
}

function get_and_show_posts() {
    $currentPage = get_current_page_number();
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 4,
        'paged' => $currentPage,
    );

    $query = new WP_Query($args);

    $total_posts = $query->found_posts;

    if ($query->have_posts()) {
        echo '<div class="post-card-wrapper">';

        while ($query->have_posts()) {
            $query->the_post();

            $title = get_the_title();
            $custom_title = wp_trim_words($title, 10, '...');
            $post_date = get_the_time('Y-m-d H:i:s');
            $post_link = get_permalink();

            echo '<article class="post-card">';
            if (has_post_thumbnail()) {
                the_post_thumbnail();
            }
            echo '<p class="post-date">' . date('d M Y', strtotime($post_date)) . '</p>';
            echo '<h4><a href="' . $post_link . '">' . $custom_title . '</a></h4>';
            echo '<button class="post-link"><a href="' . $post_link . '">Ver o post</a></button>';
            echo '</article>';
        }

        echo '</div>';
    }
    wp_reset_postdata();

    custom_pagination($query, $currentPage);
}

add_shortcode('shortcode-show-posts', 'get_and_show_posts');

?>
