# XML @FernandoEbert
###### A simple class for working with XML in PHP

Uma simples classe para trabalhar com XML no PHP

## Installation

xml-tools is available via Composer:

```bash
"fernandoebert/xml-tools": "1.0.*"
```

or run

```bash
composer require fernandoebert/xml-tools
```

## Documentation

###### For more details on how to use it, see the example folder with details in the component directory.

Para mais detalhes sobre como usar, veja a pasta de exemplo com detalhes no diretório do componente.

##### xml_encode

```php
<?php

include __DIR__ . "/../vendor/autoload.php";

use Fernandoebert\XmlTools\xml;

$example = [
  "root" => [
     "key01" => "value01",
     "key02" => "value02",
     "key03" => [
       "subkey01" => [
         "item01",
         "item02",
         "item03",
         "item04"
       ]
     ]
  ]
];

$xml = xml::xml_encode($example);
echo $xml;
```

##### Result
```xml
<?xml version="1.0" encoding="UTF-8"?>
<root>
	<key01>value01</key01>
	<key02>value02</key02>
	<key03>
		<subkey01>item01</subkey01>
		<subkey01>item02</subkey01>
		<subkey01>item03</subkey01>
		<subkey01>item04</subkey01>
	</key03>
</root>
```

##### xml_decode in OBJ STDCLASS

```php
<?php

include __DIR__ . "/../vendor/autoload.php";

use Fernandoebert\XmlTools\xml;

$xml = '<?xml version=\"1.0\" encoding=\"UTF-8\"?><root>...</root>';

echo "<pre>";
print_r(xml::xml_decode($xml));
echo "</pre>";
```

##### Result
```PHP
stdClass Object
(
  [key01] => value01
  [key02] => value02
  [key03] => stdClass Object
    (
      [subkey01] => Array
        (
            [0] => item01
            [1] => item02
            [2] => item03
            [3] => item04
        )

    )
)
```

##### xml_decode in ARRAY

```php
<?php

include __DIR__ . "/../vendor/autoload.php";

use Fernandoebert\XmlTools\xml;

$xml = '<?xml version=\"1.0\" encoding=\"UTF-8\"?><root>...</root>';

echo "<pre>";
print_r(xml::xml_decode($xml, true));
echo "</pre>";
```

##### Result
```PHP
Array
(
  [key01] => value01
  [key02] => value02
  [key03] => Array
    (
      [subkey01] => Array
        (
            [0] => item01
            [1] => item02
            [2] => item03
            [3] => item04
        )
    )
)
```

## Support

###### If you discover a security issue, send an email to fernandoebert@ebertsystem.com

Se você descobrir algum problema relacionado à segurança, envie um e-mail para fernandoebert@ebertsystem.com

Thank you

## Credits

- [Fernando Ebert](https://github.com/fernandoebert) (Developer)

## License

The MIT License (MIT). Please see [License File](https://github.com/FernandoEbert/xml-tools/blob/main/LICENSE) for more information.
