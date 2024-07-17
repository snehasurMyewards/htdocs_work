<!-- resources/views/home.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Attendance Report</h1>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Username</th>
                            @for ($day = 1; $day <= $daysInMonth; $day++)
                                <th>{{ $day }}</th>
                            @endfor
                            <th>Total</th>
                            <th>Full Day</th>
                            <th>Half Day</th>
                            <th>Late</th>
                            <th>Early</th>
                            <th>Absent</th>
                            <th>Deduction</th>
                            <th>Weekoff</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($attendanceData as $attendance)
                            <tr>
                                <td>{{ $attendance['name'] }}</td>
                                @for ($day = 1; $day <= $daysInMonth; $day++)
                                    @php
                                        $dayData = $attendance['days'][$day] ?? [];
                                    @endphp
                                    <td style="background-color: {{ $dayData['color'] ?? '' }}">
                                        @if (!empty($dayData))
                                            @if (isset($dayData['status']))
                                                @if ($dayData['status'] == 'holiday')
                                                    Holiday
                                                @elseif ($dayData['status'] == 'absent')
                                                   {{ isset($dayData['in_time']) ? $dayData['in_time']."-": '' }}{{ (isset($dayData['out_time'])) ? $dayData['out_time']: '' }}

                                                    Absent
                                                @else
                                                        {{ $dayData['in_time'] }}-{{ $dayData['out_time'] }}
                                                @endif
                                            @endif
                                        @endif
                                    </td>
                                @endfor
                                <td>{{ $attendance['total'] }}</td>
                                <td>{{ $attendance['full_day'] }}</td>
                                <td>{{ $attendance['half_day'] }}</td>
                                <td>{{ $attendance['late'] }}</td>
                                <td>{{ $attendance['early'] }}</td>
                                <td>{{ $attendance['absent'] }}</td>
                                <td>{{ $attendance['deduction'] }}</td>
                                <td>{{ $attendance['weekend_count'] }}</td> <!-- Display fixed off count -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
