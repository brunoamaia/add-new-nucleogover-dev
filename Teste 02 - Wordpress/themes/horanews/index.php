<?php
get_header();
?>
<body>
    <main class="site-main">
        <section class="container-page-width">
            <div class="container-index">
                <header class="index-title">
                    <h3>Últimas Notícias</h3>
                    <a href="#" class="link-last-news">
                        <p>Ver todas as notícias</p>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/auto_awesome_motion.svg" alt="Últimas Notícias">
                    </a>
                </header>
                <div class="container-post-card">
                    <?php apply_shortcodes('[shortcode-show-posts]'); ?>
                </div>
            </div>
        </section>
    </main>
</body>
<?php
get_footer();
?>
