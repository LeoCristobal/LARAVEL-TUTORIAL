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
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);
    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);

    return redirect('/jobs');
});

Route::get('/jobs/create', function() {
    return view('jobs.create-job');
});


Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);
    return view('jobs.show', ['job' => $job]);
});

Route::get('/jobs/{id}/edit', function ($id) {
    $job = Job::find($id);
    return view('jobs.edit', ['job' => $job]);
});

Route::patch('/jobs/{id}', function ($id) {
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);

    Job::findOrFail($id)->update([
        'title' => request('title'),
        'salary' => request('salary')
    ]);


    return redirect('/jobs');
});

Route::delete('/jobs/{id}', function ($id) {

    Job::findOrFail($id)->delete();
    return redirect('/jobs');
});

Route::get('/contact', function () {
    return view('contact');
});
