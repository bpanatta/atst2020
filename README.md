# Install LAMP
# Install composer

Enter on the new created project folder and update composer.
```
$ cd atst2020
$ composer update
```

# Running from console

You can run the code direct from console, executing php on index.php. Just make sure you have the running privilege on the file.
```
$ chmod u+x index.php
$ php index.php
```
* Be aware that you may need the php full path for it to run.

# Running tests

Use Codeception to run tests.
```
$ php vendor/bin/codecept run
```
