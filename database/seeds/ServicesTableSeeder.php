<?php

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Service::class,7)->create()->each(function ($s){

            for($i = 0; $i < 3; $i++){
                DB::table('services_has_exams')->insert([
                    'service_id' => $s->id,
                    'exam_id' => random_int(1,5),
                    'price' => random_int(100,300),
                ]);
            }
        });
    }
}
