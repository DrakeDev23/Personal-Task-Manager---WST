<?php

require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

/** @var \Illuminate\Database\DatabaseManager $db */
$db = $app->make('db');

$tasks = $db->table('tasks')->get();

echo "Tasks:\n";
foreach ($tasks as $t) {
    echo json_encode((array)$t, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "\n";
}

if (count($tasks) === 0) {
    echo "(no rows)\n";
}
