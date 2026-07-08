# 🔴 P1: Corriger les Erreurs de Structured Data

> **Priorité:** CRITIQUE  
> **Impact:** Éligibilité aux Rich Snippets Google  
> **Échecs:** 9/23 vérifications

---

## 📍 Problème

SEMrush a détecté **9 erreurs** dans le balisage structured data (JSON-LD/Schema.org) sur les pages du site.

### Pages concernées

| Page       | URL                                  |
| ---------- | ------------------------------------ |
| Homepage   | `https://bmi-raknare.se/`            |
| BMI Äldre  | `https://bmi-raknare.se/bmi-aldre/`  |
| BMI Barn   | `https://bmi-raknare.se/bmi-barn/`   |
| BMI Gravid | `https://bmi-raknare.se/bmi-gravid/` |
| BMI Kvinna | `https://bmi-raknare.se/bmi-kvinna/` |
| BMI Man    | `https://bmi-raknare.se/bmi-man/`    |
| BMI Tabell | `https://bmi-raknare.se/bmi-tabell/` |
| Idealvikt  | `https://bmi-raknare.se/idealvikt/`  |
| Kalorier   | `https://bmi-raknare.se/kalorier/`   |

---

## 🔧 Actions à Effectuer

### 1. Valider le JSON-LD actuel

```bash
# Tester chaque page avec Google Rich Results Test
https://search.google.com/test/rich-results?url=https://bmi-raknare.se/
```

### 2. Structure JSON-LD recommandée pour calculatrices

```json
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "BMI Räknare",
  "url": "https://bmi-raknare.se/",
  "applicationCategory": "HealthApplication",
  "operatingSystem": "All",
  "offers": {
    "@type": "Offer",
    "price": "0",
    "priceCurrency": "SEK"
  },
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "4.8",
    "ratingCount": "150"
  }
}
```

### 3. Ajouter BreadcrumbList

```json
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    {
      "@type": "ListItem",
      "position": 1,
      "name": "Hem",
      "item": "https://bmi-raknare.se/"
    },
    {
      "@type": "ListItem",
      "position": 2,
      "name": "BMI Barn",
      "item": "https://bmi-raknare.se/bmi-barn/"
    }
  ]
}
```

### 4. FAQPage Schema pour les FAQ

```json
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "Vad är BMI?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "BMI (Body Mass Index) är ett mått..."
      }
    }
  ]
}
```

---

## ✅ Checklist

- [ ] Tester toutes les pages avec Rich Results Test
- [ ] Identifier les erreurs spécifiques
- [ ] Corriger le JSON-LD dans chaque template
- [ ] Ajouter BreadcrumbList sur toutes les pages
- [ ] Ajouter FAQPage schema si FAQ présentes
- [ ] Valider avec Schema.org Validator
- [ ] Retester après corrections

---

## 🔗 Outils

- [Google Rich Results Test](https://search.google.com/test/rich-results)
- [Schema.org Validator](https://validator.schema.org/)
- [JSON-LD Playground](https://json-ld.org/playground/)
