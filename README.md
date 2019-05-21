# TechmeetupsPH Backend

An API for techmeetups.ph, a registration portal for upcoming tech meetups and events here in the [Philippines](https://en.wikipedia.org/wiki/Philippines).

## Technology

Built with <p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

## Built with the Pinoy in mind

Pinoys in general like to click Attend and then at the last moment, cannot come. A reminder notice feature and notice of warning of non-attendance will be a feature of techmeetups. 

More features to come!

### References
- [database schema](https://gitlab.com/techmeetupsph/api)
- [frontend](https://gitlab.com/techmeetupsph/website)

### Development Setup

- Additional configuration you can do that is not included in [local setup repository](https://gitlab.com/techmeetupsph/local_setup) is to populate the database:

```
php artisan migrate:refresh
php artisan db:seed
```

## Contributing Guide

Interested in contributing? Just file a PR with your name and we'll contact you.
