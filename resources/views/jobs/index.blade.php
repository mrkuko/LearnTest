<x-layout>
    <x-slot:heading>
        Jobs Listings
    </x-slot:heading>

    @php
        /** @var \App\Models\Job $job */
    @endphp

{{--    <h1>Hello home page!</h1>--}}
    <div class="space-y-4">
        @foreach($jobs as $job)
            <a href="/jobs/{{ $job['id'] }}" class="block px-4 py-6 border dark:border-gray-200 rounded-lg">
{{--                {{ dd(sprintf("%s\n %s", $job, $job->employer)) }}--}}
                <div class="font-bold text-blue-500 text-sm">{{ $job->employer->name }}</div>
                <div>
                    <strong>{{ $job['title'] }}</strong>: Pays {{ $job['salary'] }} per year.
                </div>
            </a>
        @endforeach

        <div>{{ $jobs->links() }}</div>
    </div>
</x-layout>

