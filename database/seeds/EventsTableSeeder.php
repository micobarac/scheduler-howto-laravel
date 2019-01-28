<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            ['id'=>1, 'text'=>'Event #1', 'start_date'=>'2019-01-26 08:00:00',
                 'end_date'=>'2019-01-26 12:00:00', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['id'=>2, 'text'=>'Event #2', 'start_date'=>'2019-01-26 15:00:00',
                 'end_date'=>'2019-01-28 16:30:00', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['id'=>3, 'text'=>'Event #3', 'start_date'=>'2019-01-27 00:00:00',
                 'end_date'=>'2019-01-27 01:00:00', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['id'=>4, 'text'=>'Event #4', 'start_date'=>'2019-01-27 08:00:00',
                 'end_date'=>'2019-01-27 12:00:00', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['id'=>5, 'text'=>'Event #5', 'start_date'=>'2019-01-28 08:00:00',
                 'end_date'=>'2019-01-28 09:30:00', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['id'=>6, 'text'=>'Event #6', 'start_date'=>'2019-01-28 10:00:00',
                 'end_date'=>'2019-01-28 12:00:00', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()]
        ]);
    }
}
