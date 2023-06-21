
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @foreach ($notifications as $notification)
    <div class="alert alert-info alert-dismissible notification" data-notification-id="{{ $notification->id }}">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <h4 class="alert-heading">{{ $notification->data['message'] }}</h4>
        <p>Time: {{ $notification->data['time'] }}</p>
        <button class="remove-notification btn btn-danger">Remove</button>
    </div>
@endforeach


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
