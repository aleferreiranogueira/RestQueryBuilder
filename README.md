# RestQueryBuilder
A simple Rest Query Builder for HTTP Rest requests for Laravel 5.4.x

## Install

Via Composer

``` bash
$ composer require aleferreiranogueira/restquerybuilder
```

Add the Service Provider to your config/app.php
```php
AleFerreiraNogueira\RestQueryBuilder\RestQueryBuilderServiceProvider::class
```
Add the Filter Middleware to your app/Htpp/Kernel.php

```php
'filter' => \AleFerreiraNogueira\RestQueryBuilder\Middleware\Filter::class
```

Don't forget to add the *'filter'* middleware to your routes that you want to use the QueryBuilder.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/:vendor/:package_name.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/:vendor/:package_name/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/:vendor/:package_name.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/:vendor/:package_name.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/:vendor/:package_name.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/:vendor/:package_name
[link-travis]: https://travis-ci.org/:vendor/:package_name
[link-scrutinizer]: https://scrutinizer-ci.com/g/:vendor/:package_name/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/:vendor/:package_name
[link-downloads]: https://packagist.org/packages/:vendor/:package_name
[link-author]: https://github.com/:author_username
[link-contributors]: ../../contributors
