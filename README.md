## Requirement

- PHP >=7.1

## Installation
__1. Install Git, Composer__

Install [Git](https://git-scm.com/downloads) and [Composer](https://getcomposer.org/download/) into your local system. Then simply clone this project.

__2. Clone this Repository__
```console
  git clone https://github.com/demokennguyen/test.git
```
__3. Copy .env File__
```console
  cp .env.example .env
```

__4. Install Composer Project__
```console
  composer install
```

__5. Run__
```
$ php -S 127.0.0.1:8000 -t public
```

__6. Unit Test__
Create a new tab on your console, and run this command
```console
  ./vendor/bin/phpunit
```

## Thank You