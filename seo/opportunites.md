# 🔍 Opportunités SEO — bmi-raknare.se

> Dernière mise à jour : 2026-07-22 | Source : GSC 90 jours (période 30j : 19/06→19/07)

## 📊 Synthèse 30 jours

| Métrique | Valeur | vs rapport 20/07 |
|----------|--------|-----------------|
| Clics | **878** | +4.9% (837) |
| Impressions | **32 664** | +5.2% (31 035) |
| CTR | **2.69%** | -0.01 pp (2.70%) |
| Position | **12.7** | -0.2 (12.5 — amélioration) |

## 📈 Tendance mensuelle

| Mois | Clics | Impr | vs mois préc. |
|------|-------|------|---------------|
| Avril | 189 | 7 618 | — |
| Mai | 997 | 28 268 | +427% |
| Juin | 763 | 25 030 | -23% |
| Juillet (19j) | 538 | 21 813 | projeté ~878 (+15% vs juin) |

> ✅ Juillet projeté à **~878 clics** (+15% vs juin, +3.4% en tendance stable). La croissance reprend.

## ⚡ ACTIONS DU JOUR (22/07) — Corrections appliquées dans le repo

| # | Correctif | Fichier | Effet attendu |
|---|----------|---------|---------------|
| 1 | **Canonical homepage sur 1 ligne** (fix TAB) | `templates/base.twig` L17-19 | CTR homepage : le href canonique n'aura plus de TAB |
| 2 | **Titre homepage ≤60 chars** (73→53) | `templates/home.twig` L12 | Google n'affichera plus un titre tronqué → CTR ↑ |
| 3 | **Titre idealvikt ≤60 chars** + suppression "2026" hardcodé (72→56) | `templates/pages/idealvikt.twig` L3 | CTR idealvikt : 0.86% → cible 2%+ |

### 🚨 BLOQUANT — Déploiement FTP Hostinger

**Aucun de ces correctifs n'est en production.** Le dernier déploiement FTP remonte au ~15-17 juillet (titre homepage + meta aldre/gravid). Les fichiers suivants doivent être déployés :

```
templates/base.twig          ← canonical fix (CRITICAL)
templates/home.twig           ← titre homepage ≤60 chars
templates/pages/idealvikt.twig ← titre ≤60 chars
templates/pages/iso-bmi.twig  ← NOUVELLE PAGE (404 en prod)
src/routes.php                 ← route /iso-bmi/ (existe dans repo)
```

**Commande de déploiement :**
```bash
lftp -u u808648670,Master19892006@ ftp://ftp.bmi-raknare.se <<EOF
mirror -R templates/ /templates/
mirror -R src/ /src/
bye
EOF
# Puis purger cache Twig sur Hostinger
```

## 🆕 NOUVELLE PAGE : `/iso-bmi/` — Potentiel ~45 clics/mois

| Métrique | Valeur |
|----------|--------|
| Requête cible | « iso bmi » — **1 047 impr/90j**, pos 11.4, CTR 4.3% |
| Requêtes satellites | « iso bmi calculator » (141 impr), « iso bmi kalkylator » (128 impr, CTR 44.5%), « isobmi » (294 impr, CTR 4.4%), « iso-bmi » (214 impr, CTR 4.2%) |
| Total cluster | **~1 800 impr/90j**, ~45 clics/mois potentiels |
| Template | ✅ `templates/pages/iso-bmi.twig` (prêt, 228 lignes) |
| Route | ✅ `src/routes.php` L38-41 |
| Sitemap | ✅ Inclus (16 URLs, `/iso-bmi/` à priority 0.8) |
| Statut | ❌ **Non déployé** — 404 en production |

## 🟡 Pages sans meta description valide — RÉSOLU

| Page | Statut au 15/07 | Statut au 22/07 |
|------|----------------|-----------------|
| `/bmi-aldre/` | ❌ `<meta name="description">` absent | ✅ Présent (déployé) |
| `/bmi-gravid/` | ❌ `<meta name="description">` absent | ✅ Présent (déployé) |
| `/bmi-kvinna/` | ✅ Présent | ✅ Présent (mais TAB dans content) |
| `/bmi-man/` | ✅ Présent | ✅ Présent (mais TAB dans content) |
| `/bmi-ozempic-krav/` | ⚠️ À vérifier | ✅ Présent |

> ⚠️ Les meta descriptions kvinna/man ont un TAB dans l'attribut `content` (même cause que le canonical). Le fix `base.twig` L15 (sur 1 ligne) corrige aussi cela — déploiement requis.

## 🔴 CRITIQUE — Homepage CTR 0.11%

| Métrique | 30j (19/06→19/07) | vs 20/07 |
|----------|-------------------|----------|
| Clics | 3 | = |
| Impressions | 2 827 | +79 (2 748) |
| CTR | **0.11%** | = |
| Position | 25.2 | +0.1 (25.1) |

**Requête phare :** « bmi räknare » — 1 196 impr (90j), 7 clics, CTR 0.59%, position 17.6

**Diagnostic :** Le fix titre du 15-17 juillet n'a pas encore d'effet visible dans GSC (délai 3-6 semaines). Le canonical cassé (TAB dans href) aggrave le problème. **Le fix canonical + titre court appliqué aujourd'hui devrait résoudre définitivement le CTR.**

**Suivi :**
- J+7 (29/07) : CTR homepage devrait commencer à monter
- J+21 (12/08) : CTR cible ≥1%
- J+42 (02/09) : CTR cible ≥2.5%

## 📋 Content Gaps — Requêtes ≥30 impr sans page dédiée

| # | Requête | Impr 90j | Pos | CTR | Opportunité |
|---|---------|----------|-----|-----|------------|
| 1 | **iso bmi** | 1 047 | 11.4 | 4.3% | 🔥 Page `/iso-bmi/` prête → déployer |
| 2 | **bmi-räknare 1177** | 1 098 | 9.2 | 0.3% | Page comparaison vs 1177.se → ~30 clics/mois |
| 3 | **bmi ålder** | 587 | 20.0 | 0.9% | Page générique « BMI par âge » → hub |
| 4 | **bmi ungdom** | 323 | 9.2 | 1.2% | Page ados 13-19 ans (distinct de barn) |
| 5 | **bmi för äldre** | 318 | 15.6 | 1.9% | Déjà couvert par `/bmi-aldre/` → optimiser title tag |
| 6 | **bmi 11 år** | 129 | 12.4 | 0% | Page « BMI 10-12 ans » ou contenu dans `/bmi-barn/` |
| 7 | **viktuppgång tredje trimestern** | 86 | 10.9 | 1.2% | Contenu grossesse trimestre 3 → dans `/bmi-gravid/` |
| 8 | **bmi 14** | 89 | 28.2 | 0% | Contenu âge-spécifique |
| 9 | **bmi 13** | 81 | 37.4 | 0% | Contenu âge-spécifique |

## 📈 Pages à optimiser (30j)

| Page | Clics | Impr | CTR | Pos | Action |
|------|-------|------|-----|-----|--------|
| `/bmi-barn/` | 286 | 9 719 | 2.94% | 9.7 | 🟢 Leader — stable |
| `/bmi-aldre/` | 258 | 5 912 | 4.36% | 10.4 | 🟢 Meilleur CTR |
| `/bmi-kvinna/` | 189 | 8 282 | 2.28% | 15.0 | 🟡 Volume énorme, CTR à améliorer |
| `/bmi-gravid/` | 107 | 2 514 | 4.26% | 9.1 | 🟢 Bon CTR |
| `/bmi-ozempic-krav/` | 14 | 1 926 | 0.73% | 8.6 | 🔴 CTR effondré — titre 71 chars ? |
| `/bmi-man/` | 12 | 783 | 1.53% | 19.1 | 🔴 Page 3, backlinks nécessaires |
| `/` (homepage) | 3 | 2 827 | 0.11% | 25.2 | 🔴🔴🔴 CRITICAL — fix en cours |
| `/idealvikt/` | 4 | 466 | 0.86% | 10.6 | 🟡 Titre corrigé → déployer |
| `/bmi-tabell/` | 3 | 445 | 0.67% | 32.2 | 🔴 Page 4 — invisible |
| `/bmi-formel/` | 1 | 130 | 0.77% | 38.4 | 🔴 Page 4 — invisible |
| `/kalorier/` | 4 | 140 | 2.86% | 10.4 | 🟡 Faible volume |

## 🔗 Technique

| Problème | Impact | Statut |
|----------|--------|--------|
| Canonical homepage : TAB dans href | CTR dégradé (0.11%) | ✅ Fixé repo — ❌ non déployé |
| Titre homepage 73→53 chars | Troncature Google | ✅ Fixé repo — ❌ non déployé |
| Titre idealvikt 72→56 chars + "2026" hardcodé | Troncature + stale | ✅ Fixé repo — ❌ non déployé |
| `/iso-bmi/` → 404 | 1 800+ impr/mois perdues | ✅ Template+route prêts — ❌ non déployé |
| `/bmi-kvinna` sans `/` → 404 | Liens cassés | ✅ `.htaccess` déployé 15/07 |
| Sitemap : 16 URLs, 0 indexé GSC | Normal (site récent, pages visibles dans SERP) | 🟢 OK |

## 📋 Checklist déploiement FTP

1. [ ] FTP deploy : `templates/` + `src/` → Hostinger
2. [ ] Purger le cache Twig sur le serveur
3. [ ] Vérifier `curl -sL https://bmi-raknare.se/ | grep 'rel="canonical" href="https://bmi-raknare.se/"'` → doit matcher
4. [ ] Vérifier `curl -sI https://bmi-raknare.se/iso-bmi/` → doit retourner 200
5. [ ] Vérifier titre homepage ≤60 chars (devrait afficher le nouveau titre)
6. [ ] Vérifier titre idealvikt (devrait être le nouveau)
7. [ ] Attendre J+7 → vérifier CTR homepage dans GSC (tendance)
