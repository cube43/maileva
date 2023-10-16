<?php

declare(strict_types=1);

$composer = json_decode(file_get_contents('composer.json'), true);

unset($composer['autoload-dev']);
$composer['autoload']['psr-4'] = [];
$composer['autoload']['psr-4']['Cube43\\Component\\MailEva\\'] = 'src/';

file_put_contents('composer.json', json_encode($composer, JSON_PRETTY_PRINT));