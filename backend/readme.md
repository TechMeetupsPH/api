# TechmeetupsPH

A techmeetups listing of upcoming tech events in the Philippines.

## Technology

Built with <p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

## Built with the Pinoy in mind

Pinoys in general like to click Attend and then at the last moment, cannot come. A reminder notice feature and notice of warning of non-attendance will be a feature of techmeetups. 

More features to come!

### References
- [development setup](https://gitlab.com/techmeetupsph/local_setup)
- [database schema](https://gitlab.com/techmeetupsph/database)
- [frontend](https://gitlab.com/techmeetupsph/frontend)
- [REST API](https://gitlab.com/techmeetupsph/techmeetupsph/wikis/REST-API)

### Development Setup

- [local setup repository](https://gitlab.com/techmeetupsph/local_setup) handles the configuration.
- Additional configuration you can do that is not included in [local setup repository](https://gitlab.com/techmeetupsph/local_setup) is to populate the database:
```
php artisan migrate:refresh
php artisan db:seed
```