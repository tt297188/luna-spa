<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SpaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('admins')->updateOrInsert(
            ['email' => 'admin@lunaspa.com'],
            [
                'name' => 'Quản trị viên',
                'password' => Hash::make('12345678'),
                'is_active' => 1,
                'updated_at' => now(),
                'created_at' => now(),
            ]
        );

        $categories = [
            [
                'name' => 'Gội đầu dưỡng sinh',
                'slug' => 'goi-dau-duong-sinh',
                'description' => 'Thư giãn và chăm sóc tóc',
            ],
            [
                'name' => 'Massage body',
                'slug' => 'massage-body',
                'description' => 'Massage thư giãn toàn thân',
            ],
            [
                'name' => 'Chăm sóc da mặt',
                'slug' => 'cham-soc-da-mat',
                'description' => 'Chăm sóc và làm sạch da mặt',
            ],
        ];

        foreach ($categories as $category) {
            DB::table('categories')->updateOrInsert(
                ['slug' => $category['slug']],
                [
                    'name' => $category['name'],
                    'description' => $category['description'],
                    'is_active' => 1,
                    'updated_at' => now(),
                    'created_at' => now(),
                ]
            );
        }
        $services = [
            [
                'category' => 'goi-dau-duong-sinh',
                'name' => 'Gội đầu dưỡng sinh cơ bản',
                'slug' => 'goi-dau-co-ban',
                'description' => 'Gội đầu kết hợp massage thư giãn',
                'price' => 99000,
                'duration' => 45,
            ],
            [
                'category' => 'massage-body',
                'name' => 'Massage body 60 phút',
                'slug' => 'massage-body-60-phut',
                'description' => 'Massage thư giãn toàn thân trong 60 phút',
                'price' => 400000,
                'duration' => 60,
            ],
            [
                'category' => 'cham-soc-da-mat',
                'name' => 'Chăm sóc da mặt cơ bản',
                'slug' => 'cham-soc-da-co-ban',
                'description' => 'Làm sạch và chăm sóc da mặt',
                'price' => 199000,
                'duration' => 60,
            ],
        ];

        foreach ($services as $service) {
            $categoryId = DB::table('categories')
                ->where('slug', $service['category'])
                ->value('id');

            DB::table('services')->updateOrInsert(
                ['slug' => $service['slug']],
                [
                    'category_id' => $categoryId,
                    'name' => $service['name'],
                    'description' => $service['description'],
                    'price' => $service['price'],
                    'duration' => $service['duration'],
                    'is_active' => 1,
                    'updated_at' => now(),
                    'created_at' => now(),
                ]
            );
        }
    }
}