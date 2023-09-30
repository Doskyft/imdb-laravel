# Création d'un système de gestion de films

Le candidat devra créer une API pour un système de gestion de films en
utilisant le framework Laravel. Ce système doit permettre de gérer des films, des genres de
films, des acteurs et d'autres détails associés.

## Fonctionnalités requises

1. Gestion des films :
   - Permettre l'ajout, la modification, la suppression et la consultation de détails sur les films, tels que le titre, 
   la description, l'année de sortie, la durée, etc.

2. Genres de films :
   - Permettre l'ajout, la modification, la suppression et la consultation des genres de films.
   - Associer des genres aux films.
3. Acteurs :
   - Permettre l'ajout, la modification, la suppression et la consultation des acteurs.
   - Associer des acteurs aux films.
4. Recherche de films :
   - Permettre la recherche de films par titre, genre ou acteur.
5. Sécurité et droits :
   - Utiliser une authentification pour permettre l’accès à l’api.
   - Limiter aux administrateurs ou au créateur le droit de modifier et de supprimer des films, des genres et des acteurs.
6. Pagination :
   - Paginer la liste des films pour une meilleure gestion des résultats.

## Getting Started

```bash
git clone git@github.com:Doskyft/imdb-laravel.git
```

```bash
cd imdb-laravel
```

```bash
composer install
```

```bash
cp .env.example .env
```

```bash
php artisan serve
```
