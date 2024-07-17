<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Attendance;
use Carbon\Carbon;

class AttendanceSeeder extends Seeder
{
    public function run()
    {
        
        // Add 10 users if they don't exist
        $this->addUsers();
        $users = User::all();
        $daysInMonth = 31; // Assuming a month with 31 days, adjust for specific months

        for ($day = 1; $day <= $daysInMonth; $day++) {
            foreach ($users as $user) {
                $intime = null;
                $outtime = null;

                // Randomly determine attendance scenarios
                $scenario = rand(1, 12);

                switch ($scenario) {
                    case 1:
                        // Some in time before 9:30 AM and out time after 6 PM
                        $intime = $this->randomDateTime("09:00:00", "09:29:59", $day);
                        $outtime = $this->randomDateTime("18:00:00", "21:59:59", $day);
                        break;
                    case 2:
                        // In time between 9:30 AM - 10:30 AM and out time after 6 PM
                        $intime = $this->randomDateTime("09:30:00", "10:30:00", $day);
                        $outtime = $this->randomDateTime("18:00:00", "21:59:59", $day);
                        break;
                    case 3:
                        // Out time between 4 PM - 5 PM
                        $intime = $this->randomDateTime("09:00:00", "09:29:59", $day);
                        $outtime = $this->randomDateTime("16:00:00", "17:00:00", $day);
                        break;
                    case 4:
                        // Absent (no data or less than 3 hours between in and out time)
                        continue 2; // Skip this user for this day
                    case 5:
                        // In time out time with total minimum 4 hours
                        $intime = $this->randomDateTime("09:00:00", "09:59:59", $day);
                        $outtime = $this->randomDateTime("13:00:00", "13:59:59", $day);
                        break;
                    case 6:
                        // In time out time with total minimum 4 hours
                        $intime = $this->randomDateTime("10:00:00", "10:59:59", $day);
                        $outtime = $this->randomDateTime("14:00:00", "14:59:59", $day);
                        break;                    
                    case 7:
                        // In time out time with total minimum 4 hours
                        $intime = $this->randomDateTime("11:00:00", "11:59:59", $day);
                        $outtime = $this->randomDateTime("15:00:00", "15:59:59", $day);
                        break;                    
                    case 8:
                        // In time out time with total minimum 4 hours
                        $intime = $this->randomDateTime("12:00:00", "12:59:59", $day);
                        $outtime = $this->randomDateTime("16:00:00", "16:59:59", $day);
                        break;
                    case 9:
                        // In time out time with total minimum 4 hours
                        $intime = $this->randomDateTime("13:00:00", "13:59:59", $day);
                        $outtime = $this->randomDateTime("17:00:00", "17:59:59", $day);
                        break;                    
                    
                    case 10:
                        // In time out time with total minimum 7 hours
                        $intime = $this->randomDateTime("09:00:00", "09:59:59", $day);
                        $outtime = $this->randomDateTime("16:00:00", "16:59:59", $day); 
                        break;
                    case 11:
                        // In time out time with total minimum 7 hours
                        $intime = $this->randomDateTime("10:00:00", "10:59:59", $day);
                        $outtime = $this->randomDateTime("17:00:00", "17:59:59", $day);
                        break;                  
                   
                    case 12:
                    // Saturday or Sunday (fixed holiday)
                    $weekday = Carbon::createFromDate(2024, 7, $day)->dayOfWeek;
                    if ($weekday == Carbon::SATURDAY || $weekday == Carbon::SUNDAY) {
                        continue 2; // Skip this user for this day
                    }
                    break;
                    default:
                        break;
                }

                // Create attendance record
                Attendance::create([
                    'user_id' => $user->id,
                    'in_time' => $intime,
                    'out_time' => $outtime,
                ]);
            }
        }
    }

    private function randomDateTime($startTime, $endTime, $day)
    {
        $start = Carbon::createFromFormat('Y-m-d H:i:s', "2024-07-$day $startTime");
        $end = Carbon::createFromFormat('Y-m-d H:i:s', "2024-07-$day $endTime");
        return $start->addSeconds(mt_rand(0, $end->diffInSeconds($start)))->format('Y-m-d H:i:s');
    }

    private function addUsers()
    {
        $usersCount = User::count();

        if ($usersCount < 10) {
            for ($i = $usersCount + 1; $i <= 10; $i++) {
                User::create([
                    'name' => 'User ' . $i,
                    'email' => 'user' . $i . '@example.com',
                    'password' => bcrypt('password'),
                ]);
            }
        }
    }

}
