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
    - Limiter aux administrateurs ou au créateur le droit de modifier et de supprimer des films, des genres et des
      acteurs.
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
php artisan migrate:fresh --seed
```

```bash
php artisan serve
```

## API Authentication

Pour utiliser l'API, vous devez vous authentifier avec un compte utilisateur.
L'authentification se fait avec une clé API, stoké en base de donnée.
Dans une requête HTTP, vous devez ajouter un header `Authorization` avec la valeur de votre `api_key`.

## API Endpoints

Tous les endpoints de listes sont paginés avec 20 résultats par page.
Vous pouvez changer le nombre de résultats par page en ajoutant le paramètre `limit` dans l'URL et ajouter le numéro de
page avec le paramètre `page`.

Tous les endpoints de listes renvoient une réponse suivant cet exemple :
    
```json
{
  "items": [
    {
      "id": 1,
      "created_at": "2021-09-26T14:00:00.000000Z",
      "updated_at": "2021-09-26T14:00:00.000000Z"
    }
  ],
  "total": 10,
  "limit": 2,
  "page": 3,
  "has_more": true
}
```

### Acteurs

| Method | URI             | Controller                                         | Description               |
|--------|-----------------|----------------------------------------------------|---------------------------|
| GET    | api/actors      | App\Http\Controllers\Actors\ListActorsController   | Récupère tous les acteurs |
| POST   | api/actors      | App\Http\Controllers\Actors\CreateActorsController | Créer un nouvel acteur    |
| GET    | api/actors/{id} | App\Http\Controllers\Actors\ShowActorsController   | Récupère un acteur        |
| PUT    | api/actors/{id} | App\Http\Controllers\Actors\UpdateActorsController | Met à jour un acteur      |
| DELETE | api/actors/{id} | App\Http\Controllers\Actors\DeleteActorsController | Supprime un acteur        |

### Films

| Method | URI             | Controller                                         | Description             |
|--------|-----------------|----------------------------------------------------|-------------------------|
| GET    | api/movies      | App\Http\Controllers\Movies\ListMoviesController   | Récupère tous les films |
| POST   | api/movies      | App\Http\Controllers\Movies\CreateMoviesController | Créer un nouveau film   |
| GET    | api/movies/{id} | App\Http\Controllers\Movies\ShowMoviesController   | Récupère un film        |
| PUT    | api/movies/{id} | App\Http\Controllers\Movies\UpdateMoviesController | Met à jour un film      |
| DELETE | api/movies/{id} | App\Http\Controllers\Movies\DeleteMoviesController | Supprime un film        |

### Genres

| Method | URI              | Controller                                           | Description              |
|--------|------------------|------------------------------------------------------|--------------------------|
| GET    | api/genders      | App\Http\Controllers\Genders\ListGendersController   | Récupère tous les genres |
| POST   | api/genders      | App\Http\Controllers\Genders\CreateGendersController | Créer un nouveau genre   |
| GET    | api/genders/{id} | App\Http\Controllers\Genders\ShowGendersController   | Récupère un genre        |
| PUT    | api/genders/{id} | App\Http\Controllers\Genders\UpdateGendersController | Met à jour un genre      |
| DELETE | api/genders/{id} | App\Http\Controllers\Genders\DeleteGendersController | Supprime un genre        |

## API Schema

### Acteurs

```json
{
    "id": 1,
    "first_name": "John",
    "last_name": "Doe",
    "created_at": "2021-09-26T14:00:00.000000Z",
    "updated_at": "2021-09-26T14:00:00.000000Z"
}
```

### Films

```json
{
    "id": 1,
    "title": "Film 1",
    "synopsis": "Description du film 1",
    "release_year": 2021,
    "duration": 120,
    "created_at": "2021-09-26T14:00:00.000000Z",
    "updated_at": "2021-09-26T14:00:00.000000Z",
    "genres": [
        {
            "id": 1,
            "name": "Genre 1",
            "created_at": "2021-09-26T14:00:00.000000Z",
            "updated_at": "2021-09-26T14:00:00.000000Z"
        }
    ],
    "actors": [
        {
            "id": 1,
            "first_name": "John",
            "last_name": "Doe",
            "created_at": "2021-09-26T14:00:00.000000Z",
            "updated_at": "2021-09-26T14:00:00.000000Z"
        }
    ]
}
```

### Genres

```json
{
    "id": 1,
    "name": "Genre 1",
    "created_at": "2021-09-26T14:00:00.000000Z",
    "updated_at": "2021-09-26T14:00:00.000000Z"
}
```

## License

MIT License

Copyright (c) 2023 Damien HEBERT
