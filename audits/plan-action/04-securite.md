# 🟡 P4: Ajouter le Header HSTS

> **Priorité:** MOYENNE  
> **Impact:** Sécurité, Confiance Google  
> **Échecs:** 2/2 domaines sans HSTS

---

## 📍 Problème

Le site n'envoie pas le header **HTTP Strict Transport Security (HSTS)**.

HSTS force les navigateurs à utiliser exclusivement HTTPS, empêchant les attaques man-in-the-middle.

---

## 🔧 Solution

### Option 1: Via .htaccess (Apache)

Ajouter dans `.htaccess` :

```apache
# HSTS - Force HTTPS for 1 year
<IfModule mod_headers.c>
    Header always set Strict-Transport-Security "max-age=31536000; includeSubDomains; preload"
</IfModule>
```

### Option 2: Via PHP

Ajouter en haut du fichier d'entrée (index.php) :

```php
<?php
header('Strict-Transport-Security: max-age=31536000; includeSubDomains; preload');
```

### Option 3: Via configuration serveur (Nginx)

```nginx
add_header Strict-Transport-Security "max-age=31536000; includeSubDomains; preload" always;
```

---

## ⚙️ Paramètres HSTS

| Paramètre           | Valeur   | Description                                              |
| ------------------- | -------- | -------------------------------------------------------- |
| `max-age`           | 31536000 | Durée en secondes (1 an)                                 |
| `includeSubDomains` | -        | Applique à tous les sous-domaines                        |
| `preload`           | -        | Permet l'inclusion dans la liste preload des navigateurs |

---

## ⚠️ Précautions

> [!WARNING]
> Avant d'activer HSTS, assure-toi que :
> - Le certificat SSL est valide
> - Toutes les pages fonctionnent en HTTPS
> - Aucune ressource n'est chargée en HTTP (mixed content)

---

## ✅ Checklist

- [ ] Vérifier que le SSL fonctionne parfaitement
- [ ] Ajouter le header HSTS dans .htaccess
- [ ] Tester avec `curl -I https://bmi-raknare.se/`
- [ ] Vérifier avec [securityheaders.com](https://securityheaders.com/)
- [ ] (Optionnel) Soumettre au [HSTS Preload](https://hstspreload.org/)

---

## 🔗 Outils de Test

- [Security Headers](https://securityheaders.com/)
- [SSL Labs](https://www.ssllabs.com/ssltest/)
- [HSTS Preload Submission](https://hstspreload.org/)
