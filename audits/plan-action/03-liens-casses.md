# 🟠 P3: Corriger le Lien Externe Cassé

> **Priorité:** MOYENNE  
> **Impact:** UX, Crédibilité  
> **Échecs:** 1 lien

---

## 📍 Problème

Un **lien externe cassé** a été détecté sur la page `/bmi-gravid/`.

---

## 🔧 Actions à Effectuer

### 1. Identifier le lien cassé

```bash
# Chercher tous les liens externes dans le fichier
grep -E "href=\"https?://" bmi-gravid.php
```

### 2. Vérifier les liens suspects

Liens potentiellement problématiques à vérifier :
- Liens vers des études médicales
- Liens vers des organisations de santé
- Liens vers des sources externes

### 3. Options de correction

| Option | Action                                      |
| ------ | ------------------------------------------- |
| **A**  | Mettre à jour l'URL si la page a bougé      |
| **B**  | Remplacer par une source alternative        |
| **C**  | Supprimer le lien si non essentiel          |
| **D**  | Utiliser Internet Archive (Wayback Machine) |

---

## ✅ Checklist

- [ ] Ouvrir `/bmi-gravid/` dans le code
- [ ] Identifier tous les liens externes
- [ ] Tester chaque lien manuellement
- [ ] Corriger ou supprimer le lien cassé
- [ ] Vérifier qu'aucun autre lien n'est cassé
- [ ] Retester avec SEMrush

---

## 🔗 Outils

- [Check My Links (Chrome Extension)](https://chrome.google.com/webstore/detail/check-my-links/)
- [Dead Link Checker](https://www.deadlinkchecker.com/)
