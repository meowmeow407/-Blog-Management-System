<?php

// Automate migrations if tables aren't built yet
if (isset($_GET['_migrate'])) {
    require __DIR__ . '/../bootstrap/app.php';
    $kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
    $kernel->call('migrate:fresh', ['--force' => true]);
    echo "Database tables migrated successfully!";
    exit;
}

// Forward Vercel requests directly into Laravel's public entrypoint
require __DIR__ . '/../public/index.php';