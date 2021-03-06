<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold  leading-tight">
            {{ __('Edit Todo') }}
        </h2>
    </x-slot>

    <div class="py-12 min-h-screen w-full bg-gray-900 mx-auto text-white pt-20">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-xl sm:rounded-lg p-5">

                <form method="POST" action="/todo/{{ $todo->id }}">

                    <div class="form-group">
                        <textarea name="title" class="text-center text-black bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white">{{$todo->title }}</textarea>
                        @if ($errors->has('title'))
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                        @endif
                        <textarea name="description" class="text-center text-black bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white">{{$todo->description }}</textarea>
                        @if ($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        @endif
                    </div>

                    <div class="form-group text-center mt-10">
                        <button type="submit" name="update" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">Update Todo</button>
                    </div>
                {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
    </x-app-layout>
