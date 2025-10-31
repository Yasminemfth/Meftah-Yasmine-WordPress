1) ### Header

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
    
2) ### Footer (nouvelle version)

J’ai supprimé le footer d’origine d’Astra et ajouté le mien grâce au hook astra_footer.

Il contient :
 - Des icônes de réseaux sociaux (Instagram et Twitter) avec effet au survol.
 - Un menu fixe en HTML centré.
 - Une mention copyright: © [année] – Designed by Yasmine.

3) ### CSS (exemples)

J’ai modifié les couleurs, les polices et la mise en page pour rendre le site plus chaleureux , personnel et qui me correspond mieu.

- Couleurs : tons beiges et dorés, fond crème.
```php
.site{
    background-color:#FAEBD7;
}
```
- Texte : police Georgia, italique pour le menu, couleur dorée au survol.
- Header : fond beige avec ombre douce.
- Footer : refait avec icônes, menu centré et effet hover.

