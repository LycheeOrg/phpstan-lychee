# phpstan-lychee

[PHPStan](https://phpstan.org/) focuses on finding bugs in your code. But in PHP there's a lot of leeway in how stuff can be written.
This repository contains a set of rules that are applied on each LycheeOrg PHP repository.

This includes:

- phpstan/phpstan &mdash; obviously...
- phpstan/phpstan-deprecation-rules &mdash; avoiding any deprecation
- phpstan/phpstan-strict-rules &mdash; strict and opinionated rules
- thecodingmachine/phpstan-safe-rule &mdash; Ensure the use of `Safe` code
- nunomaduro/larastan &mdash; stubs for Laravel
- slam/phpstan-extensions &mdash; No unused variables
- symplify/phpstan-rules &mdash; A lot of stricter rules with regard to coding standards.

## Installation

To use this extension, require it in [Composer](https://getcomposer.org/):

```
composer require --dev lychee-org/phpstan-lychee
```
