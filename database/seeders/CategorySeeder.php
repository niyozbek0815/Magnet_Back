<?php

namespace Database\Seeders;

use App\Models\Admins;
use App\Models\Atributes;
use App\Models\Stores;
use App\Models\Sellers;
use App\Models\Category;
use App\Models\Products;
use App\Models\SizeProducts;
use App\Models\SubProducts;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i < 10; $i++) {
            Category::create([
                'name_uz' => 'Category_' . $i . "_D1",
                'name_kr' => 'Category_' . $i . "_D1",
                'name_ru' => 'Category_' . $i . "_D1",
                'name_en' => 'Category_' . $i . "_D1",
                'slug' => 'Category_' . $i . "_D1",
                'index' => $i,
            ]);
        }

        for ($i = 1; $i < 10; $i++) {

            for ($j = 1; $j < 10; $j++) {
                Category::create([
                    'name_uz' => 'Category_' . $i . '.' . $j . "_D2",
                    'name_kr' => 'Category_' . $i . '.' . $j . "_D2",
                    'name_ru' => 'Category_' . $i . '.' . $j . "_D2",
                    'name_en' => 'Category_' . $i . '.' . $j . "_D2",
                    'slug' => 'Category_' . $i . '.' . $j . "_D2",
                    'parent_id' => $i,
                    'index' => $j
                ]);
            }


        }
        for ($i = 1; $i < 10; $i++) {

            for ($j = 1; $j < 2; $j++) {

                for ($k = 1; $k < 12; $k++) {
                    Category::create([
                        'name_uz' => 'Category_' . $i . '.' . $j . '.' . $k . "_D3",
                        'name_kr' => 'Category_' . $i . '.' . $j . '.' . $k . "_D3",
                        'name_ru' => 'Category_' . $i . '.' . $j . '.' . $k . "_D3",
                        'name_en' => 'Category_' . $i . '.' . $j . '.' . $k . "_D3",
                        'slug' => 'Category_' . $i . '.' . $j . '.' . $k . "_D3",
                        'parent_id' => $i * 10 + $j,
                        'index' => $k,
                    ]);
                }
            }
        }
        for ($j = 1; $j < 50; $j++) {
            Sellers::create([
                'name' => 'Seller-' . $j,
                'email' => "Sellers" . $j . "@seller.com",
                'phone' => "+99890019102" . $j,
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ]);
            Stores::create([
                'sellers_id' => $j,
                'name' => 'Stores-' . $j,
                'viloyat' => "Viloyat" . $j,
                'tuman' => "Tuman" . $j,
                'maxalla' => "maxalla" . $j,
                'contact1' => '+998900191099',
                'contact2' => '+998900191099',
                'rating' => rand(0, 6),
                'padpiska' => rand(20, 5000),
                'description' => $j . "description text description textdescription text description text description text  ",
                'logo' => "logo_stores.png",
                'image' => "image_stores.png"
            ]);
        }
        $category = 0;
        $shop = 0;
        for ($j = 1; $j < 2000; $j++) {
            $category++;
            $shop++;
            Products::create([
                'categories_id' => $category,
                'stores_id' => $shop,
                'name' => 'Product-' . $j,
                'description' => $j . "description text description textdescription text description text description text  ",
                'price' => rand(10000, 10000000),
                'sale' => rand(0, 25),
                'count' => rand(0, 5000),
                'count_review' => rand(0, 1000),
                'stars' => rand(0, 6),
            ]);
            if ($category == 189) {
                $category = 0;
            }
            if ($shop == 49) {
                $shop = 0;
            }
            for ($i = 1; $i < 4; $i++) {
                SubProducts::create([
                    'products_id' => $j,
                    'name' => 'SubProduct-' . $j,
                    'price' => rand(10000, 10000000)
                ]);
                SizeProducts::create([
                    'products_id' => $j,
                    'size' => 'Size-' . $j,
                    'price' => rand(10000, 10000000)
                ]);


            }


        }



        $count = 0;
        $j=1;
        for ($i = 1; $i < 5998; $i++) {
            $count++;
                if ($count == 1) {
                    Atributes::create([
                        'products_id' => $j,
                        'sub_products_id' => $i,
                        'size_products_id' => $i,
                        'price' => rand(10000, 1000000)
                    ]);
                    Atributes::create([
                        'products_id' => $j,
                        'sub_products_id' => $i,
                        'size_products_id' => ($i + 1),
                        'price' => rand(1000, 1000000)
                    ]);
                    Atributes::create([
                        'products_id' => $j,
                        'sub_products_id' => $i,
                        'size_products_id' => ($i + 2),
                        'price' => rand(1000, 1000000)
                    ]);
                }
                if ($count == 2) {
                    Atributes::create([
                        'products_id' => $j,
                        'sub_products_id' => $i,
                        'size_products_id' => $i,
                        'price' => rand(1000, 1000000)
                    ]);
                    Atributes::create([
                        'products_id' => $j,
                        'sub_products_id' => $i,
                        'size_products_id' => ($i - 1),
                        'price' => rand(1000, 1000000)
                    ]);
                    Atributes::create([
                        'products_id' => $j,
                        'sub_products_id' => $i,
                        'size_products_id' => ($i + 1),
                        'price' => rand(1000, 1000000)
                    ]);
                }

                if ($count == 3) {

                        Atributes::create([
                            'products_id' => $j,
                            'sub_products_id' => $i,
                            'size_products_id' => $i,
                            'price' => rand(1000, 1000000)
                        ]);
                        Atributes::create([
                            'products_id' => $j,
                            'sub_products_id' => $i,
                            'size_products_id' => ($i -1),
                            'price' => rand(1000, 1000000)
                        ]);
                        Atributes::create([
                            'products_id' => $j,
                            'sub_products_id' => $i,
                            'size_products_id' => ($i - 2),
                            'price' => rand(1000, 1000000)
                        ]);
                    $j++;

                    $count = 0;
                }

                if($j=1999){
                    $j=1;
                }



        }
    }
}
