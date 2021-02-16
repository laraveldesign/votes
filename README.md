# Laravel Voting System

[![Latest Version on Packagist](https://img.shields.io/packagist/v/laraveldesign/votes.svg?style=flat-square)](https://packagist.org/packages/laraveldesign/votes)
[![Quality Score](https://img.shields.io/scrutinizer/g/laraveldesign/votes.svg?style=flat-square)](https://scrutinizer-ci.com/g/laraveldesign/votes)
[![Total Downloads](https://img.shields.io/packagist/dt/laraveldesign/votes.svg?style=flat-square)](https://packagist.org/packages/laraveldesign/votes)

Provides a voting mechanism for Laravel projects.  

## Screenshot
![](http://laraveldesign.test/img/packages/votes.png)
## Demo
Visit https://laraveldesign.com/packages for a demo.
## Installation

You can install the package via composer:

```bash
composer require laraveldesign/votes
```

## Usage
Note:: the :key should be set to a unique value.  In most cases the code below will work.
You may need to adjust the :key value to make this work in your situation.
If you have problems, you can contact me at https://laraveldesign.com/contact.

``` php
<livewire:star-votes :key="time().$loop->index" :model="$package"></livewire:star-votes>
```

### Testing

This package does not contain a test suite at this time.


### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email cshanebarron@gmail.com instead of using the issue tracker.

## Credits

- [Shane Barron](https://github.com/laraveldesign)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

