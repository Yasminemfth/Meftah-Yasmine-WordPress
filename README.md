1) Header

- Suppression de la partie Social du header d’Astra .
```php
astra_remove_header_section('social'))
```
- Suppression de l’onglet Home du menu.
```php
add_filter( 'wp_nav_menu_objects', function ( $items, $args ) {
    // le menu principal Astra supression du lien Home
    if ( isset( $args->theme_location ) && $args->theme_location === 'primary' ) {
        foreach ( $items as $key => $item ) {
            if ( trim( $item->title ) === 'Home' ) {
                unset( $items[$key] ); // Supprime l'élément
            }
        }
    }
    return $items;
}, 10, 2 );
```
- Changement des noms du menu :
  - Services → *Expériences Professionnelles*
  - About → *Formations*
  - Reviews → *Compétences*
  - Why Us → *Centres d’intérêts*
  - Contact → *Projets*
