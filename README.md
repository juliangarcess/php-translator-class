# PHP translator class

Clase para gestionar varios idiomas en PHP


## Métodos

#### Inicializar la clase

```php
  $texts = ["test_text" => ["es" => "Hola, esto es una prueba", "en" => "Hello, this is a test"]];
  $acceptedLanguages = ["es", "en"];
  $defaultLanguage = "en";
  $translator = new translator($texts, $acceptedLanguages, $defaultLanguage);
```

#### Definir un lenguaje manualmente

```php
  $translator->setLanguage($lang)
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `lang` | `string` | **Required**. Código del lenguaje deseado en formato ISO 639-1 |

#### Obtener el lenguaje actual

```php
  $translator->getLanguage()
```
#### Resetear el lenguaje (poner el lenguaje del navegador o, en su defecto, el default)

```php
  $translator->resetLanguage()
```

#### Obtener textos

```php
  $translator->translate($text)
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `text` | `string` | **Required**. referencia de los textos |

#### Definir lenguaje en funcion del parametro lang en la url

```php
  if(isset($_REQUEST['lang']) && $_REQUEST['lang'] != NULL){
        $translator->setLanguage($_REQUEST['lang']);
    }
```
