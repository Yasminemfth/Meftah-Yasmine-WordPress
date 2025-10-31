### 1) Header

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
    
### 2) Footer (nouvelle version)

J’ai supprimé le footer d’origine d’Astra et ajouté le mien grâce au hook astra_footer.

Il contient :
 - Des icônes de réseaux sociaux (Instagram et Twitter) avec effet au survol.
 - Un menu fixe en HTML centré.
 - Une mention copyright: © [année] – Designed by Yasmine.

### 3) CSS (exemples)

J’ai modifié les couleurs, les polices et la mise en page pour rendre le site plus chaleureux , personnel et qui me correspond mieu.

- Couleurs : tons beiges et dorés, fond crème.
```php
.site{
    background-color:#FAEBD7;
}
```
- Texte : police Georgia, italique pour le menu, couleur dorée au survol.
- Header : fond beige avec ombre douce.
- Footer : refait avec icônes arrondis, menu centré et effet hover.

### 4) Hooks Utilisés

- wp_enqueue_scripts → *charge le CSS du thème enfant après celui du parent.*
- wp_nav_menu_objects → *supprime l’onglet “Home” du menu principal.*
- wp_nav_menu_primary_items → *renomme les éléments du menu (Services, About, etc.).*
- init → *enlève la partie “Social” du header d’Astra.*
- wp → *supprime le footer d’origine et ajoute le footer personnalisé.*
- astra_footer → *affiche le nouveau footer créé.*

### 5) Avant/Après

#### Header

Avant :

<img width="751" height="79" alt="Header avant" src="https://github.com/user-attachments/assets/429a188a-b622-4ac6-88a0-c7fe52d53e0f" />

Après :
<img width="1897" height="171" alt="Header après" src="https://github.com/user-attachments/assets/aedff01f-10a7-4665-853d-23f1965ed88e" />

#### Footer 

Avant : 
<img width="1537" height="597" alt="image" src="https://github.com/user-attachments/assets/75ba09b6-e47d-4bf0-b16a-5c7b77a5932e" />
Après : 
<img width="1895" height="278" alt="image" src="https://github.com/user-attachments/assets/05ae9ca6-5b3d-4942-8cfc-10daf9930433" />

#### Block Cover 

Avant :
<img width="1497" height="866" alt="image" src="https://github.com/user-attachments/assets/eed83b16-c36e-4d08-b410-21d9d778609a" />

Après : 
<img width="1887" height="850" alt="image" src="https://github.com/user-attachments/assets/f44e4c17-de0a-40c6-adb5-638e2a00e439" />
