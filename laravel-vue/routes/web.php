<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});
Route::get('/login', function () {
    if (!Auth::user()){
        return view('login');
    }
    else{
        return redirect('/report_dashboard');
    }
})->name('login');

Route::POST('/logintoreportdashboard', [App\Http\Controllers\ReportLoginController::class, 'logintoreportdashboard'])->name('logintoreportdashboard');

use Illuminate\Support\Facades\DB;

Route::get('/db-test', function () {
    try {
        // Attempt to establish a database connection
        DB::connection()->getPdo();

        // If the connection is successful, you can perform a simple query
        $results = DB::select('SELECT DATABASE() as database_name');

        return response()->json([
            'status' => 'success',
            'message' => 'Connected successfully',
            'database' => $results[0]->database_name
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'Connection failed: ' . $e->getMessage()
        ], 500);
    }
});
