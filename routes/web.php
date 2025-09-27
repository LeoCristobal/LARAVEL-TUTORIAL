<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {

    // $jobs = Job::all();
    // dd($jobs);
    return view('home');
});

Route::get('/jobs', function () {
    $job = Job::with('employer')->latest()->simplePaginate(10);
    return view('jobs.index', [
        'jobs' => $job
    ]);
});

Route::post('/jobs', function () {

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);

    return redirect('/jobs');
});
Route::get('/create-job', function() {
    return view('jobs.create-job');
});


Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);
    return view('jobs.show', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});
