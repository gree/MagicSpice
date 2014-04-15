# What is MagicSpice
MagicSpice is a class utility similar to [Lombok](http://projectlombok.org/).
It provides simple definitions for common constructor/getters/setters.
It also integrates well with many existing IDEs.

## usage
### define

```php
class Employee
{
    use MagicSpice\ClassHelper, MagicSpice\ClassHelper\Accessor\Set {
        getInt         as public getId;
        getString      as public getFirstName;
        getString      as public getLastName;
        getFloatOrNull as public getYearsOfService;
        setFloatOrNull as public setYearsOfService;
    }
}
```

### instantiate and get/set

```php
$john = new Employee([
    'id'         => 100,
    'first_name' => 'John',
    'last_name'  => 'Doe',
]);

print $john->getFirstName() . $john->getLastName();
$john->setYearsOfService(2.5);
print $john->getYearsOfService();
```

## IDE-friendly
### supported
* IDEA
* PhpStorm
* Eclipse PDT

### not supported
* NetBeans

## known problems
* incompatible with APC
* incompatible with phpDocumentor2 and ApiGen
