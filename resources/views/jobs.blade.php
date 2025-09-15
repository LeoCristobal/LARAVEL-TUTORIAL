<x-layout>
    <x-slot:heading>
        Job Listing
    </x-slot:heading>

    <ul>
        @foreach ($jobs as $job)
            <li>
                <a href="/jobs/{{ $job['id'] }}" class="text-blue-600 hover:underline" >
                    <strong>{{ $job['title'] }}:</strong> Pays {{ $job['salary'] }}
                </a>
            </li>
        @endforeach
    </ul>

</x-layout>
