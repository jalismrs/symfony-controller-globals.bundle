# symfony.bundle.globals

Adds an API route to retrieve some container parameters

## Test

`phpunit` or `vendor/bin/phpunit`

coverage reports will be available in `var/coverage`

## Configuration
```yaml
jalismrs_globals:
    parameters:
        - 'parameter1'
        - 'parameter2'
```
```yaml
# config/routes.yaml

_globals:
    resource: '@JalismrsGlobalsBundle/Resources/config/routes.yaml'
    trailing_slash_on_root: false
```
