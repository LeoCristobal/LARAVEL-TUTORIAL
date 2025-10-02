<h2>Job Posted: {{ $job->title }}</h2>

<p>Contrats! You just added a job</p>

<p>
    <a href="{{ url('/jobs/'. $job->id) }}"> View your added job</a>
</p>
