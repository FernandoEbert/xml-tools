# XML @FernandoEbert
###### A simple class for working with XML in PHP

Uma simples classe para trabalhar com XML no PHP

## Installation

Router is available via Composer:

```bash
"fernandoebert/xml-tools": "1.0.*"
```

or run

```bash
composer require fernandoebert/xml-tools
```

## Documentation

###### For details on how to use the router, see the sample folder with details in the component directory. To use the router you need to redirect your route routing navigation (index.php) where all traffic must be handled. The example below shows how:

Para mais detalhes sobre como usar, veja a pasta de exemplo com detalhes no diretório do componente.



##### xml_encode

```php
<?php

include __DIR__ . "/../vendor/autoload.php";

use Fernandoebert\XmlTools\xml;

$example = [
    "key01" => "value01",
    "key02" => "value02",
    "key03" => [
        'subkey01' => [
            'item01',
            'item02',
            'item03',
            'item04',
        ]
    ]
];

$xml = xml::xml_encode($example);
echo $xml;
```

##### Result
```xml
<?xml version="1.0" encoding="UTF-8"?>
<key01>value01</key01>
<key02>value02</key02>
<key03>
	<subkey01>item01</subkey01>
	<subkey01>item02</subkey01>
	<subkey01>item03</subkey01>
	<subkey01>item04</subkey01>
</key03>
```

## Support

###### If you discover a security issue, send an email to fernandoebert@ebertsystem.com

Se você descobrir algum problema relacionado à segurança, envie um e-mail para fernandoebert@ebertsystem.com

Thank you

## Credits

- [Fernando Ebert](https://github.com/fernandoebert) (Developer)

## License

The MIT License (MIT). Please see [License File](https://github.com/FernandoEbert/xml-tools/blob/main/LICENSE) for more information.
