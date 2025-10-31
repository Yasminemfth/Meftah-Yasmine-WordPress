<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Sécurité : empêche l’accès direct au fichier


/* CHARGER STYLES */
add_action( 'wp_enqueue_scripts', function () {
    // Charge le CSS du thème enfant après celui du thème parent Astra
    wp_enqueue_style(
        'astra-child-style',
        get_stylesheet_uri(),
        [ 'astra-theme-css' ],
        wp_get_theme()->get( 'Version' )
    );
}, 20);


/* HEADER */

// Supprime le lien “Home” du menu principal
add_filter( 'wp_nav_menu_objects', function ( $items, $args ) {
    if ( isset( $args->theme_location ) && $args->theme_location === 'primary' ) {
        foreach ( $items as $key => $item ) {
            if ( trim( $item->title ) === 'Home' ) {
                unset( $items[$key] );
            }
        }
    }
    return $items;
}, 10, 2);

// Renomme les éléments du menu principal
add_filter( 'wp_nav_menu_primary_items', function( $items ) {
    $items = str_replace('Services', 'Expériences Professionnelles', $items);
    $items = str_replace('About', 'Formations', $items);
    $items = str_replace('Reviews', 'Compétences', $items);
    $items = str_replace('Why Us', 'Centres d’intérêts', $items);
    $items = str_replace('Contact', 'Projets', $items);
    return $items;
});


// Supprime la section “Social” du header Astra
add_action( 'init', function () {
    if ( function_exists( 'astra_remove_header_section' ) ) {
        astra_remove_header_section( 'social' );
    }
});

/* FOOTER */
// Supprime le footer d’origine d’Astra et ajoute le mien
add_action( 'wp', function () {
    remove_all_actions( 'astra_footer' );
    add_action( 'astra_footer', 'astra_child_footer_markup' );
});

// Structure du footer personnalisé
function astra_child_footer_markup() { ?>
    <footer class="site-footer" role="contentinfo">
        <div class="ast-container footer-inner">

            <!-- Icônes R-S -->
            <div class="footer-social" aria-label="<?php esc_attr_e('Réseaux sociaux', 'astra-child'); ?>">
                <a href="https://instagram.com" target="_blank" rel="noopener" aria-label="Instagram">
                    <img src="<?php echo esc_url( get_stylesheet_directory_uri().'/images/instagram.png' ); ?>" alt="Instagram">
                </a>
                <a href="https://twitter.com" target="_blank" rel="noopener" aria-label="Twitter">
                    <img src="<?php echo esc_url( get_stylesheet_directory_uri().'/images/twitter.png' ); ?>" alt="Twitter">
                </a>
            </div>

            <!-- Menu footer -->
            <nav class="footer-menu" aria-label="<?php esc_attr_e('Menu pied de page', 'astra-child'); ?>">
                <ul class="menu">
                    <li><a href="<?php echo esc_url( home_url('/') ); ?>">Accueil</a></li>
                    <li><a href="#Expériences Professionnelles">Expériences Professionnelles</a></li>
                    <li><a href="#Formations">Formations</a></li>
                    <li><a href="#contact">Compétences</a></li>
                    <li><a href="#team">Projets</a></li>
                    <li><a href="#team">Mes centres d’intérêts</a></li>
                </ul>
            </nav>
        </div>

        <!-- Partie Copyright -->
        <div class="footer-bottom">
            <div class="ast-container">
                <p class="copy">Copyright ©<?php echo esc_html( date('Y') ); ?> — Designed by <strong>Yasmine</strong></p>
            </div>
        </div>
    </footer>
<?php }
