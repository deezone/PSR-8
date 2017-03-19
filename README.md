PSR-8 - Mutually Assured Hug
=============

An implimentation of the [PSR-8 specification](https://github.com/php-fig/fig-standards/blob/master/proposed/psr-8-hug/psr-8-hug.md)
as a coding exercise to make the world a better place through mutually assured hugs logic.

### Test Coverage
#### PHP CodeSniffer (Lint)
- `$ npm run-script lint`
- `$ node ./node_modules/gulp/bin/gulp lint`

or listing of all coding volations by file.

- `$ php ./vendor/bin/phpcs --standard=./phpunit.xml.dest --colors -s index.php src tests`

or automate processing of files that will be adjusted to meet coding standards.

- `$ php ./vendor/bin/phpcbf --standard=./phpunit.xml.dest --colors index.php src tests`

#### Unit Tests
##### Confirm PHPUnit installation works
- `$ ./vendor/bin/phpcbf -h`
- `$ ./vendor/bin/phpcbf -h`

##### Run Test in `/tests` Directory
- `$ ./vendor/bin/phpunit --verbose tests`
- `$ npm test`
- `$ node ./node_modules/gulp/bin/gulp test`

### References:
- [Annotated ruleset.xml](https://github.com/squizlabs/PHP_CodeSniffer/wiki/Advanced-Usage)
- [Watch Files](https://pear.php.net/manual/en/package.php.php-codesniffer.annotated-ruleset.php)


### Runs PHPUnit tests and basic PHP Lint in a watchful state.

``
...
``