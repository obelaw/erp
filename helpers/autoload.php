<?php

$files = [
    'addons.php',
    'warehouse.php',
    'calculate.php'
];

foreach ($files as $file) {
    require_once __DIR__ . "/{$file}";
}
