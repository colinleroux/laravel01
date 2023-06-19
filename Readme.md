# About ICT50220 Library

This application is employed for learning and assessing the development of:

- APIs
- Integration of Databases and the Web
- Cloud Application Development (SaaS)

## Features

- Books: title, subtitle, authors, genres, isbn, ...
- Authors: given names, family names, country, date of birth, date of death, ...
- Items: item, condition, purchase date, purchase cost,...
- Genres: name, description
- Users: given names, family names, preferred name/alias, email, password, ...
- Members: given names, family names, preferred name/alias, email, password, ...
- Condition: name, description
- ... more to come

## Developers

- Adrian Gould <adrian.gould@nmtafe.wa.edu.au> (Lead Developer)
- Colin le Roux <20201520@tafe.wa.edu.au> (Developer)

## Requirements

- Docker (or Docker Desktop)
- PHP 8.2+
- Composer
- NodeJS 16+
- NPM
- MailPit
- Meilisearch
- Redis
- MySQL 8+
- ...

The application uses Laravel Sail to start and stop the development environment.

### Initial Application
Base Application created using:
```bash
curl https://laravel.build/ICT50220-Library | bash
```

### Version Control

- Will be used for each feature being implemented

### Documentation

Contained in the [_docs](_docs) folder.

API documentation can be viewed here : http://laravel01/docs
