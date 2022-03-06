<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-center text-xl text-black leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden shadow-xl sm:rounded-lg p-5 text-center">
                <a href="/task" class="border-2 border-blue-500 rounded-lg font-bold text-blue-500 px-4 py-3 transition duration-300 ease-in-out hover:bg-blue-500 hover:text-white mr-6">
                    Add new Article
                </a>

            <div class="font-bold mt-5">
                <table class="w-full text-md rounded mb-4">
                    <thead>
                    <tr class="border-b">
                        <th class="text-center p-3 px-5">TITLE</th>
                        <th class="text-center p-3 px-5">DESCRIPTION</th>
                        <th class="text-center p-3 px-5">Actions</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(auth()->user()->tasks as $task)
                        <tr class="border-b hover:bg-orange-100">
                            <td class="p-3 px-5">
                                {{$task->title}}
                            </td>
                            <td class="p-3 px-5">
                                {{$task->description}}
                            </td>
                            <td class="p-3 px-5">

                                <a href="/task/{{$task->id}}" name="edit" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-black mb-2 py-1 px-2 rounded focus:outline-none focus:shadow-outline">Edit</a>

                                <form action="/task/{{$task->id}}" class="inline-block">
                                    <button type="submit" name="delete" formmethod="POST" class="text-sm bg-red-500 hover:bg-red-700 mt-5 text-black py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button>
                                    {{ csrf_field() }}
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
    </x-app-layout>
