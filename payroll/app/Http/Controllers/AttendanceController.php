<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Attendance;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function index()
    {
        $users = User::all();
        $daysInMonth = Carbon::now()->daysInMonth;
        $attendanceData = [];

        foreach ($users as $user) {
            $userAttendance = [
                'name' => $user->name,
                'days' => [],
                'full_day' => 0,
                'half_day' => 0,
                'late' => 0,
                'early' => 0,
                'absent' => 0,
                'deduction' => 0,
                'weekend_count' => 0, // Initialize weekend count
            ];

            for ($day = 1; $day <= $daysInMonth; $day++) {
                $date = Carbon::now()->startOfMonth()->addDays($day - 1);

                // Check if it's a weekend (Saturday or Sunday)
                if ($date->isWeekend()) {
                    $userAttendance['days'][$day] = [
                        'status' => 'holiday',
                        'color' => 'yellow'
                    ];
                    $userAttendance['weekend_count']++; // Increment weekend count
                    continue; // Skip further processing for weekends
                }

                $attendance = Attendance::where('user_id', $user->id)
                                        ->whereDate('in_time', $date->format('Y-m-d'))
                                        ->first();

                if (!$attendance) {
                    $userAttendance['days'][$day] = [
                        'status' => 'absent',
                        'color' => 'red'
                    ];
                    $userAttendance['absent']++;
                } else {
                    $inTime = $attendance->in_time ? Carbon::parse($attendance->in_time)->format('H:i') : '-';
                    $outTime = $attendance->out_time ? Carbon::parse($attendance->out_time)->format('H:i') : '-';
                    $hoursWorked = $inTime !== '-' && $outTime !== '-' ? Carbon::parse($attendance->in_time)->diffInHours(Carbon::parse($attendance->out_time)) : 0;

                    if ($hoursWorked < 4) {
                        $userAttendance['days'][$day] = [
                            'status' => 'absent',
                            'color' => 'red'
                        ];
                        $userAttendance['absent']++;
                    } elseif ($hoursWorked >= 7) {
                        $userAttendance['days'][$day] = [
                            'status' => 'full_day',
                            'color' => 'green'
                        ];
                        $userAttendance['full_day']++;
                    } elseif ($hoursWorked >= 4 && $hoursWorked < 7) {
                        $userAttendance['days'][$day] = [
                            'status' => 'half_day',
                            'color' => 'blue'
                        ];
                        $userAttendance['half_day']++;
                    }

                    if ($inTime !== '-' && Carbon::parse($attendance->in_time)->gt(Carbon::parse('9:30'))) {
                        $userAttendance['late']++;
                    }

                    if ($outTime !== '-' && Carbon::parse($attendance->out_time)->lt(Carbon::parse('17:00'))) {
                        $userAttendance['early']++;
                    }

                    $userAttendance['days'][$day]['in_time'] = $inTime;
                    $userAttendance['days'][$day]['out_time'] = $outTime;
                }
            }

            // Calculate deductions
            $userAttendance['deduction'] = round(($userAttendance['late'] + $userAttendance['early'])/ 5);

            // Calculate total
            $userAttendance['total'] =round($userAttendance['full_day'] + ($userAttendance['half_day'] / 2) - $userAttendance['deduction']);

            $attendanceData[] = $userAttendance;
        }

        return view('home', compact('attendanceData', 'daysInMonth'));
    }
}
