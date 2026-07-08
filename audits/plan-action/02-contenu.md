# 🔴 P2: Enrichir le Contenu (Ratio Texte/HTML)

> **Priorité:** HAUTE  
> **Impact:** Rankings SEO, temps sur page  
> **Échecs:** 12/12 pages (100%)

---

## 📍 Problème

Toutes les pages ont un **ratio texte/HTML trop faible**. Cela signifie que le contenu textuel est insuffisant par rapport au code HTML.

**Ratio recommandé:** 25-70%  
**Ratio actuel estimé:** < 15%

---

## 🔧 Actions par Page

### Homepage (`/`)

Ajouter :
- [ ] Introduction (150-200 mots) sur le BMI
- [ ] Section "Comment utiliser notre calculateur"
- [ ] FAQ (5-8 questions)
- [ ] Tableau récapitulatif des catégories BMI

### BMI Äldre (`/bmi-aldre/`)

Ajouter :
- [ ] Explication des spécificités BMI pour seniors
- [ ] Tableau BMI adapté aux +65 ans
- [ ] Conseils santé pour personnes âgées
- [ ] FAQ spécifique

### BMI Barn (`/bmi-barn/`)

Ajouter :
- [ ] Explication des percentiles
- [ ] Graphique de croissance
- [ ] Conseils nutrition enfants
- [ ] FAQ parents

### BMI Gravid (`/bmi-gravid/`)

Ajouter :
- [ ] Tableau prise de poids recommandée
- [ ] Explication IMC pré-grossesse
- [ ] Conseils par trimestre
- [ ] FAQ grossesse

### BMI Kvinna (`/bmi-kvinna/`)

Ajouter :
- [ ] Spécificités féminines du BMI
- [ ] Impact des hormones
- [ ] Conseils adaptés
- [ ] FAQ femmes

### BMI Man (`/bmi-man/`)

Ajouter :
- [ ] Différences homme/femme
- [ ] Masse musculaire et BMI
- [ ] Conseils adaptés
- [ ] FAQ hommes

### BMI Formel (`/bmi-formel/`)

Ajouter :
- [ ] Explication détaillée de la formule
- [ ] Historique (Quetelet)
- [ ] Exemples de calculs
- [ ] Limites du BMI

### BMI Tabell (`/bmi-tabell/`)

Ajouter :
- [ ] Tableau complet et interactif
- [ ] Explication des catégories OMS
- [ ] Conseils par catégorie
- [ ] FAQ tableau

### Idealvikt (`/idealvikt/`)

Ajouter :
- [ ] Différentes formules (Devine, Robinson, Miller)
- [ ] Comparaison des méthodes
- [ ] Conseils réalistes
- [ ] FAQ poids idéal

### Kalorier (`/kalorier/`)

Ajouter :
- [ ] Explication métabolisme basal
- [ ] Facteurs d'activité (PAL)
- [ ] Conseils nutrition
- [ ] FAQ calories

### Widget (`/widget/`)

Ajouter :
- [ ] Instructions d'intégration détaillées
- [ ] Exemples de code
- [ ] Personnalisation
- [ ] FAQ développeurs

---

## 📝 Template de Contenu

Pour chaque page, structurer ainsi :

```html
<!-- Introduction (150-200 mots) -->
<section class="intro">
  <h2>Vad är [sujet] ?</h2>
  <p>...</p>
</section>

<!-- Contenu principal (300-500 mots) -->
<section class="content">
  <h2>Hur fungerar det?</h2>
  <p>...</p>
</section>

<!-- FAQ (5-8 questions) -->
<section class="faq">
  <h2>Vanliga frågor</h2>
  <details>
    <summary>Question 1?</summary>
    <p>Réponse...</p>
  </details>
</section>
```

---

## ✅ Checklist Globale

- [ ] Rédiger contenu pour homepage
- [ ] Rédiger contenu pour bmi-aldre
- [ ] Rédiger contenu pour bmi-barn
- [ ] Rédiger contenu pour bmi-gravid
- [ ] Rédiger contenu pour bmi-kvinna
- [ ] Rédiger contenu pour bmi-man
- [ ] Rédiger contenu pour bmi-formel
- [ ] Rédiger contenu pour bmi-tabell
- [ ] Rédiger contenu pour idealvikt
- [ ] Rédiger contenu pour kalorier
- [ ] Rédiger contenu pour widget
- [ ] Vérifier ratio texte/HTML > 25%
