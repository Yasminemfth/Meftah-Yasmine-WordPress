# Meftah-Yasmine-WordPress
Ajout d’un titre personnalisé sous le header (via hook astra_header_markup_after) : Yasmine Portfolio.

Suppression de la section Social du Header Builder d’Astra :

if ( function_exists( 'astra_remove_header_section' ) ) {
    astra_remove_header_section( 'social' );
}
