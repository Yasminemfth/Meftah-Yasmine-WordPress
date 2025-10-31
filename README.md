 📘 Les 2 types de Hooks

| Type   | Fonction              | Exemple d’usage                        | Exemple de code |
|--------|------------------------|----------------------------------------|-----------------|
| **Action** | Ajouter du code          | Afficher un texte dans le footer        | `add_action()`  |
| **Filter** | Modifier une donnée      | Changer un titre d’article avant affichage | `add_filter()`  |

---

## ⚡ Exemple de Hook **ACTION**

### Ajouter du texte dans le footer :
```php
add_action('wp_footer', function () {
    echo '<p>Merci de votre visite 🌟</p>';
});
