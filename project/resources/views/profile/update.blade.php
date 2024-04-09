<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Contact') }}
        </h2>
    </x-slot>
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{route('profile-contact-edit-submit', $data->id)}}" class="max-w-7x1 mx-auto sm:px-6 1g:px-8"
                method="post">
                @csrf
                <div class="form-group mt-2">
                    <label for="name">Введите имя</label>
                    <input value="{{$data->name}}" type="text" name="name" placeholder="Bвeдите имя" id="name"
                        class="form-control">
                </div>
                <div class="form-group mt-2">
                    <label for="email">Email</label>
                    <input value="{{$data->email}}" type="text" name="email" placeholder="BBедите email" id="email"
                        class="form-control">
                </div>
                <div class="form-group mt-2">
                    <label for="subject">Tema сообшения</label>
                    <input value="{{$data->subject}}" type="text" name="subject" placeholder="Тeма coобшения"
                        id="subject" class="form-control">
                </div>
                <div class="form-group mt-2">
                    <label for="message">Сooбшение</label>
                    <textarea name="message" id="message" class="form-control" placeholder="Bвeдите сообшение">
{{$data->message}}
                    </textarea>
                </div>
                <button type="submit" class="btn btn-success мt-2">0тправить</button>
            </form>
        </div>
    </div>


</x-app-layout>