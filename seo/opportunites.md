# 🔍 Opportunités SEO — bmi-raknare.se

> Dernière mise à jour : 2026-07-15 | Source : GSC 90 jours

## ⚡ CRITIQUE — Déploiement bloqué

| # | Opportunité | Impact estimé | Priorité | Statut |
|---|------------|--------------|----------|--------|
| 1 | **Déployer le fix titre homepage** (commit `89a5224`) | +50-100 clics/mois | 🔴 CRITICAL | ❌ Non déployé |
| 2 | **Vider le cache Twig** du serveur Hostinger | Corrige titres/meta obsolètes | 🔴 CRITICAL | ❌ Cache stale confirmé |

### Détail #1 — Titre homepage multi-lignes en production
- **Symptôme** : CTR homepage = 0.2% (4 clics / 2 642 impr, position 24.7)
- **Requête phare** : « bmi räknare » — 984 impr, 0.1% CTR, position 13.8
- **Fix** : Commit `89a5224` met le `<title>` sur une seule ligne dans `base.twig`
- **Blocage** : Le FTP n'a pas été fait, le cache Twig est stale
- **Action** : FTP deploy + purge cache Twig sur Hostinger

## 🟡 Pages sans meta description valide (HTML cassé)

| Page | Problème | Fix |
|------|---------|-----|
| `/bmi-aldre/` | Description multi-lignes → `<meta name="description">` absent du HTML | ✅ Fixé 2026-07-15 (repo) |
| `/bmi-gravid/` | Description multi-lignes → balise HTML tronquée | ✅ Fixé 2026-07-15 (repo) |
| `/bmi-ozempic-krav/` | `<meta name="description">` absent (cache stale ?) | À vérifier après déploiement |

## 🆕 Nouvelles pages à créer

| Requête | Impr. 90j | CTR | Position | Opportunité |
|---------|----------|-----|----------|------------|
| **bmi-räknare 1177** | 1 142 | 0.3% | 9.4 | Page de comparaison vs 1177.se → potentiel ~40 clics/mois |
| **bmi ungdom** | 122 | 0.8% | 6.8 | Contenu dédié ados 13-19 ans (distinct de barn 2-12) |

## 📈 Pages à optimiser (fort volume, CTR faible)

| Page | Impr. 30j | Clics | CTR | Pos | Action |
|------|----------|-------|-----|-----|--------|
| `/` (homepage) | 2 642 | 4 | 0.2% | 24.7 | ⚡ Déployer fix titre + vider cache |
| `/bmi-ozempic-krav/` | 1 688 | 12 | 0.7% | 8.7 | Titre 71 chars → réduire ≤60 + déployer |
| `/bmi-man/` | 700 | 12 | 1.7% | 20.1 | Position page 3 → backlinks + contenu enrichi |
| `/idealvikt/` | 322 | 3 | 0.9% | 10.9 | Titre 68 chars → réduire ≤60 |
| `/bmi-tabell/` | 415 | 3 | 0.7% | 32.5 | Position page 4 → quasiment invisible |

## 🔗 Technique — Trailing slash redirect

| Problème | Impact | Fix |
|----------|--------|-----|
| `/bmi-kvinna` (sans `/`) → 404 | Liens cassés, perte link juice | ✅ Ajouté au `.htaccess` 2026-07-15 |

## 📊 Tendances

| Mois | Clics | Impr | CTR | Projeté |
|------|-------|------|-----|---------|
| Mai 2026 | 997 | 28 268 | 3.5% | 997 |
| Juin 2026 | 763 | 25 030 | 3.0% | 763 |
| Juillet 2026 | 387 (12j) | 14 702 | 2.6% | ~999 |

> Juillet projeté à 999 clics (+31% vs juin). La baisse de CTR (2.6%) est principalement due au titre homepage non corrigé.

## ⚠️ Alerte desktop

Desktop : CTR 1.3%, position 21.9 (page 3) — le site est quasi invisible sur desktop.
Mobile : CTR 3.6%, position 8.8 — 83% du trafic.

→ Vérifier le rendu responsive desktop et les Core Web Vitals.

## 📋 Checklist post-déploiement FTP

1. [ ] FTP deploy : `templates/` → Hostinger
2. [ ] Purger le cache Twig sur le serveur
3. [ ] Vérifier `curl -sL https://bmi-raknare.se/ | sed -n '/<title>/,/<\/title>/p'` → doit être sur 1 ligne
4. [ ] Vérifier meta description `/bmi-aldre/` → doit apparaître
5. [ ] Vérifier `.htaccess` déployé → trailing slash redirect fonctionnel
6. [ ] Attendre J+7 → vérifier CTR homepage dans GSC (tendance, pas zéro)
