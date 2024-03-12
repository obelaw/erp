<?php

$files = [
    'warehouse.php',
];

foreach ($files as $file) {
    require_once __DIR__ . "/{$file}";
}
