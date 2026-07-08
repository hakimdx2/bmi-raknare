# 🟢 P5: Améliorer le Maillage Interne

> **Priorité:** MOYENNE  
> **Impact:** Crawlabilité, Distribution du PageRank  
> **Échecs:** 2 pages orphelines

---

## 📍 Problème

SEMrush a détecté **2 pages orphelines** dans le sitemap. Ces pages sont dans le sitemap.xml mais n'ont pas (ou peu) de liens internes pointant vers elles.

---

## 🔧 Actions à Effectuer

### 1. Identifier les pages orphelines

Les pages potentiellement orphelines :
- `/bmi-ozempic-krav/`
- `/llms.txt`
- Ou autres pages récemment ajoutées

### 2. Stratégie de maillage

```
                    ┌─────────────┐
                    │  Homepage   │
                    └──────┬──────┘
                           │
        ┌──────────────────┼──────────────────┐
        │                  │                  │
   ┌────▼────┐       ┌─────▼─────┐      ┌─────▼─────┐
   │BMI Barn │       │BMI Kvinna │      │BMI Man    │
   └────┬────┘       └─────┬─────┘      └─────┬─────┘
        │                  │                  │
        └──────────────────┼──────────────────┘
                           │
                    ┌──────▼──────┐
                    │  BMI Tabell │
                    └─────────────┘
```

### 3. Liens à ajouter

#### Dans le Footer
```html
<nav class="footer-links">
  <a href="/bmi-barn/">BMI Barn</a>
  <a href="/bmi-aldre/">BMI Äldre</a>
  <a href="/bmi-kvinna/">BMI Kvinna</a>
  <a href="/bmi-man/">BMI Man</a>
  <a href="/bmi-gravid/">BMI Gravid</a>
  <a href="/bmi-tabell/">BMI Tabell</a>
  <a href="/idealvikt/">Idealvikt</a>
  <a href="/kalorier/">Kalorier</a>
</nav>
```

#### Liens contextuels dans le contenu
```html
<!-- Sur la page BMI Barn -->
<p>
  Pour les adultes, consultez notre 
  <a href="/bmi-kvinna/">calculateur BMI femme</a> ou 
  <a href="/bmi-man/">calculateur BMI homme</a>.
</p>
```

#### Section "Articles Relatifs"
```html
<section class="related">
  <h3>Relaterade verktyg</h3>
  <ul>
    <li><a href="/bmi-tabell/">Se BMI tabellen</a></li>
    <li><a href="/idealvikt/">Beräkna din idealvikt</a></li>
    <li><a href="/kalorier/">Kaloriräknare</a></li>
  </ul>
</section>
```

---

## 📊 Matrice de Liens Recommandée

| Depuis → Vers | Home  | Barn  | Äldre | Kvinna |  Man  | Gravid | Tabell | Ideal | Kalorier |
| ------------- | :---: | :---: | :---: | :----: | :---: | :----: | :----: | :---: | :------: |
| **Home**      |   -   |   ✓   |   ✓   |   ✓    |   ✓   |   ✓    |   ✓    |   ✓   |    ✓     |
| **Barn**      |   ✓   |   -   |   ✓   |   ✓    |   ✓   |   -    |   ✓    |   ✓   |    -     |
| **Äldre**     |   ✓   |   -   |   -   |   ✓    |   ✓   |   -    |   ✓    |   ✓   |    ✓     |
| **Kvinna**    |   ✓   |   ✓   |   ✓   |   -    |   ✓   |   ✓    |   ✓    |   ✓   |    ✓     |
| **Man**       |   ✓   |   ✓   |   ✓   |   ✓    |   -   |   -    |   ✓    |   ✓   |    ✓     |
| **Gravid**    |   ✓   |   ✓   |   -   |   ✓    |   -   |   -    |   ✓    |   ✓   |    ✓     |

---

## ✅ Checklist

- [ ] Identifier les 2 pages orphelines exactes
- [ ] Ajouter liens dans le footer
- [ ] Ajouter liens contextuels dans chaque page
- [ ] Ajouter section "Articles Relatés"
- [ ] Vérifier la navigation principale
- [ ] Retester avec SEMrush
- [ ] Vérifier avec Screaming Frog (optionnel)

---

## 🔗 Outils

- [Screaming Frog SEO Spider](https://www.screamingfrog.co.uk/seo-spider/)
- [Ahrefs Site Audit](https://ahrefs.com/site-audit)
- [Internal Link Analyzer](https://www.yoursite.com/tools)
