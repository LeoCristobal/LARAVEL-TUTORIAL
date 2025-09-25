<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {

    // $jobs = Job::all();
    // dd($jobs);
    return view('home');
});

Route::get('/jobs', function () {
    return view('jobs', [
        $job = Job::with('employer')->get(),
        'jobs' => $job
    ]);
});

Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);
    return view('job', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});
