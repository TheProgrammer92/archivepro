<?php

    use App\model\VideoPlay;
    use Illuminate\Database\Seeder;

    class DatabaseSeeder extends Seeder
    {




        public function run()
        {

            $this->call([
                UsersSeeder::class,
                CategorieSeeder::class,
                ServiceSeeder::class,
                RoleSeeder::class,



            ]);


        }
    }
