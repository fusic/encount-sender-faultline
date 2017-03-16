# Encount sender for faultline

[Encount](https://github.com/fusic/encount) sender for faultline

## Requirement

- [Encount](https://github.com/fusic/encount): ~2.0

## Usage

[Set Faultline\Instance::set($notifier)](https://github.com/k1LoW/faultline-php#usage) add `EncountSenderFaultline\Sender\Faultline` to `Error.encount.sender`

```php
// config/app.php
<?php

return [

-snip-

    'Error' => [

        -snip-

        # Encount config
        'encount' => [
            'force' => false,
            'sender' => ['EncountSenderFaultline\Sender\Faultline'],
        ],
    ],

-snip-

];
```
