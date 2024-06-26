<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Classroom;
use App\Models\Timetable;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $classroomA = Classroom::create(['name' => 'Classroom A', 'capacity' => 10]);
        $classroomB = Classroom::create(['name' => 'Classroom B', 'capacity' => 15]);
        $classroomC = Classroom::create(['name' => 'Classroom C', 'capacity' => 7]);

        Timetable::create(['classroom_id' => $classroomA->id, 'day_of_week' => 'Monday', 'start_time' => '09:00:00', 'end_time' => '18:00:00', 'interval_minutes' => 60]);
        Timetable::create(['classroom_id' => $classroomA->id, 'day_of_week' => 'Wednesday', 'start_time' => '09:00:00', 'end_time' => '18:00:00', 'interval_minutes' => 60]);

        Timetable::create(['classroom_id' => $classroomB->id, 'day_of_week' => 'Monday', 'start_time' => '08:00:00', 'end_time' => '18:00:00', 'interval_minutes' => 120]);
        Timetable::create(['classroom_id' => $classroomB->id, 'day_of_week' => 'Thursday', 'start_time' => '08:00:00', 'end_time' => '18:00:00', 'interval_minutes' => 120]);
        Timetable::create(['classroom_id' => $classroomB->id, 'day_of_week' => 'Saturday', 'start_time' => '08:00:00', 'end_time' => '18:00:00', 'interval_minutes' => 120]);

        Timetable::create(['classroom_id' => $classroomC->id, 'day_of_week' => 'Tuesday', 'start_time' => '15:00:00', 'end_time' => '22:00:00', 'interval_minutes' => 60]);
        Timetable::create(['classroom_id' => $classroomC->id, 'day_of_week' => 'Friday', 'start_time' => '15:00:00', 'end_time' => '22:00:00', 'interval_minutes' => 60]);
        Timetable::create(['classroom_id' => $classroomC->id, 'day_of_week' => 'Saturday', 'start_time' => '15:00:00', 'end_time' => '22:00:00', 'interval_minutes' => 60]);
    }
}
