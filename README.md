PSR-8 - Mutually Assured Hug
=============

An implementation of the [PSR-8 specification](https://github.com/php-fig/fig-standards/blob/master/proposed/psr-8-hug/psr-8-hug.md)
as a coding exercise to make the world a better place through mutually assured hug logic.

`LostSoul` objects exchange `->hug()`s in an effort to meet the PSR-8 specification

Inspired by the song [Imagine - John Lennon](https://genius.com/John-lennon-imagine-lyrics)
- *Imagine all the people sharing all the world* ... *And the world will live as one*

### Sample implementation

- 7 rounds of two random objects will attempt to hug each other.
- The two objects will continue to hug each other back until object conditions (keepHugging()) are no longer met.
- The WarmAndFuzzy property can go up or down after each hug exchange
- The number of times an object is hugged is recorded for the life of the object.
- When the same object tries to hug itself an Exception is thrown that does not halt processing.

Sample output:

```
$ php index.php
Hug Round: 1
lostSoulIndex: 4
- Lost Soul: 00000000251d2b18000000002fd64057 is feeling WarmAndFuzzy: 15 after 0 hugs.
lostSoulIndex: 1
- Lost Soul: 00000000251d2b1c000000002fd64057 is feeling WarmAndFuzzy: 37 after 0 hugs.

Time to try for some hugs...
Lost Soul: 00000000251d2b18000000002fd64057 is feeling WarmAndFuzzy: 15 after 0 hugs.
Other Lost Soul: 00000000251d2b1c000000002fd64057 is feeling WarmAndFuzzy: 37 after 0 hugs.

--------------


Hug Round: 2
lostSoulIndex: 1
- Lost Soul: 00000000251d2b1c000000002fd64057 is feeling WarmAndFuzzy: 37 after 0 hugs.
lostSoulIndex: 5
- Lost Soul: 00000000251d2b19000000002fd64057 is feeling WarmAndFuzzy: 80 after 0 hugs.

Time to try for some hugs...
Lost Soul: 00000000251d2b1c000000002fd64057 is feeling WarmAndFuzzy: 98 after 2 hugs.
Other Lost Soul: 00000000251d2b19000000002fd64057 is feeling WarmAndFuzzy: 141 after 2 hugs.

...

Hug Round: 6
lostSoulIndex: 2
- Lost Soul: 00000000251d2b1a000000002fd64057 is feeling WarmAndFuzzy: 50 after 0 hugs.
lostSoulIndex: 2
- Lost Soul: 00000000251d2b1a000000002fd64057 is feeling WarmAndFuzzy: 50 after 0 hugs.

Time to try for some hugs...

********
WARNING: You should always love yourself but self hugging is not supported in the PSR-8 specification. An attept at an object hugging itself has been made.
********
```


-------

### Test Coverage
#### PHP CodeSniffer (Lint)
- `$ npm run-script lint`
- `$ node ./node_modules/gulp/bin/gulp lint`

or listing of all coding volations by file.

- `$ php ./vendor/bin/phpcs --standard=PSR2 --colors -s index.php src tests`

or automate processing of files that will be adjusted to meet coding standards.

- `$ php ./vendor/bin/phpcbf --standard=./phpunit.xml.dest --colors index.php src tests`

**NOTE**: Optionally set path to `phpunit` and `gulp` by `alias` in the user `.bash_??` file to remove the path 
requirements in the examples listed. 
- `alias phpunit='./vendor/bin/phpunit'`
- `alias gulp='node ./node_modules/gulp/bin/gulp'`

### Unit Tests
##### Confirm PHPUnit installation works
- `$ ./vendor/bin/phpcbf -h`
- `$ ./vendor/bin/phpcbf -h`

##### Run Test in `/tests` Directory
- `$ ./vendor/bin/phpunit --verbose --testdox tests`
- `$ npm test`
- `$ node ./node_modules/gulp/bin/gulp test`

### References:
- [Annotated ruleset.xml](https://github.com/squizlabs/PHP_CodeSniffer/wiki/Advanced-Usage)
- [Watch Files](https://pear.php.net/manual/en/package.php.php-codesniffer.annotated-ruleset.php)


### Runs PHPUnit tests and basic PHP Lint, ending in a watchful state to rerun when files are changed.

- `$ gulp`

Which will trigger the `default` tasks defined in the `gulp.js` file:
- `gulp.task('default', ['phplint', 'phpcs', 'phpunit', 'watch']);`

