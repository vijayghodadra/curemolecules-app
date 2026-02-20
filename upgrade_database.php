<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "Checking database schema...\n";

// Update products table
if (Schema::hasTable('products')) {
    Schema::table('products', function (Blueprint $table) {
        if (!Schema::hasColumn('products', 'chemical_formula')) {
            $table->string('chemical_formula')->nullable()->after('description');
            echo "Added 'chemical_formula' to 'products'.\n";
        }
        if (!Schema::hasColumn('products', 'cas_number')) {
            $table->string('cas_number')->nullable()->after('chemical_formula');
            echo "Added 'cas_number' to 'products'.\n";
        }
        if (!Schema::hasColumn('products', 'image')) {
            $table->string('image')->nullable()->after('cas_number');
            echo "Added 'image' to 'products'.\n";
        }
    });
}
else {
    echo "Error: 'products' table does not exist.\n";
}

// Update inquiries table
if (Schema::hasTable('inquiries')) {
    Schema::table('inquiries', function (Blueprint $table) {
        if (!Schema::hasColumn('inquiries', 'phone')) {
            $table->string('phone')->nullable()->after('email');
            echo "Added 'phone' to 'inquiries'.\n";
        }
    });
}
else {
    echo "Error: 'inquiries' table does not exist.\n";
}

echo "Schema update completed.\n";
