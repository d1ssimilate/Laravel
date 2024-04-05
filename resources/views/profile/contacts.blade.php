<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Yours Contacts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach($data as $item)
            <div class="alert alert-info max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h3>{{$item->subject}}</h3>
                <p>{{$item->email}}</p>
                <p><small>{{$item->created_at}}</small></p>
                <a href="{{route('profile-contact', $item->id)}}">Details</a>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>