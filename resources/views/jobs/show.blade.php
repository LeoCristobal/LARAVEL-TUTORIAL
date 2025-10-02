<x-layout>
    <x-slot:heading>
        Job
    </x-slot:heading>

    <h2 class="font-bold text-l"> {{ $job['title'] }} </h2>
    <p>
        This job pays {{ $job['salary'] }} per year
    </p>

    <p class="mt-6">
        @can('edit', $job)
            <x-button href="/jobs/{{ $job->id }}/edit">
                Edit
            </x-button>
        @endcan

    </p>

</x-layout>
