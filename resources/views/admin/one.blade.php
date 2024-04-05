<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $data->subject }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="alert alert-info max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h3>{{$data->message}}</h3>
                <p>{{$data->email}} - {{$data->name}}</p>
                <p><small>{{$data->created_at}}</small></p>
                <a href="{{route('admin-edit', $data->id)}}">Редактировать</a>
                <a href="{{route('admin-delete', $data->id)}}">Удалить</a>
            </div>
        </div>
    </div>
</x-app-layout>