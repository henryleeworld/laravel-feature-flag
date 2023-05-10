<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @foreach ($tasks as $task)
                        <span style="padding-top: 0.1em; padding-bottom: 0.1rem" class="w-24 text-xs px-3 bg-indigo-50 rounded-full">{{ \Laravel\Pennant\Feature::value('team-label') }}</span>{{ $task->name }}
                        <br />
                    @endforeach
                    @feature('initialization')
                        <br />
                        <div>{{ __('All rights reserved.') }}</div>
                    @endfeature
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
