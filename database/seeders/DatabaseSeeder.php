<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        $this->call(AdminSeeder::class);

        // Insert Categories
        $cat1 = DB::table('categories')->insertGetId([
            'name' => 'Antacids & Laxatives',
            'slug' => 'antacids-laxatives',
            'description' => 'High quality antacids and laxatives for pharmaceutical use.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $cat2 = DB::table('categories')->insertGetId([
            'name' => 'Electrolytes',
            'slug' => 'electrolytes',
            'description' => 'Essential electrolytes for rehydration and medical applications.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Insert Products
        DB::table('products')->insert([
            [
                'category_id' => $cat1,
                'name' => 'Dried Aluminium Hydroxide',
                'slug' => 'dried-aluminium-hydroxide',
                'description' => 'Used as an antacid to treat heartburn, upset stomach, sour stomach, or acid indigestion.',
                'chemical_formula' => 'Al(OH)3',
                'cas_number' => '21645-51-2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $cat1,
                'name' => 'Magnesium Hydroxide',
                'slug' => 'magnesium-hydroxide',
                'description' => 'A common component of antacids and laxatives.',
                'chemical_formula' => 'Mg(OH)2',
                'cas_number' => '1309-42-8',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $cat2,
                'name' => 'Potassium Chloride',
                'slug' => 'potassium-chloride',
                'description' => 'Used to prevent or treat low blood levels of potassium (hypokalemia).',
                'chemical_formula' => 'KCl',
                'cas_number' => '7447-40-7',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $cat2,
                'name' => 'Sodium Citrate',
                'slug' => 'sodium-citrate',
                'description' => 'Used as an alkalinizing agent.',
                'chemical_formula' => 'Na3C6H5O7',
                'cas_number' => '68-04-2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
