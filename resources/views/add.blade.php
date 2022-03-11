<!DOCTYPE html>
<html>
<head>
  <title>FilePond from CDN</title>

  <!-- Filepond stylesheet -->
  <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">

</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold  leading-tight">
                {{ __('Add To Do') }}
            </h2>
        </x-slot>

        <main class="min-h-screen w-full bg-gray-900 mx-auto text-white pt-20">
            <section class="mx-auto max-w-md space-y-10 flex flex-col">
                <p class="text-4xl text-center">Add To Do</p>

                    <form method="POST" action="/todo">

                        <div class="form-group">
                            <textarea name="title" class="text-center text-black bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"  placeholder='Enter your title'></textarea>
                            @if ($errors->has('title'))
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif
                            <textarea name="description" class="text-center text-black bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"  placeholder='Enter your description'></textarea>
                            @if ($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                            <div class="container text-center">
                                <input type="file"
                                class="filepond"
                                name="filepond"
                                multiple
                                data-max-file-size="3MB"
                                data-max-files="3" />
                            </div>
                        <div class="form-group text-center">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">Add Todo</button>
                        </div>
                        {{ csrf_field() }}
                    </form>
            </section>
        </main>

        <script>
                    /*
            We want to preview images, so we need to register the Image Preview plugin
            */
            FilePond.registerPlugin(

                // encodes the file as base64 data
            FilePondPluginFileEncode,

                // validates the size of the file
            FilePondPluginFileValidateSize,

                // corrects mobile image orientation
            FilePondPluginImageExifOrientation,

                // previews dropped images
            FilePondPluginImagePreview
            );

            // Select the file input and use create() to turn it into a pond
            FilePond.create(
                document.querySelector('input')
            );

        </script>

        <script src="https://unpkg.com/filepond/dist/filepond.js"></script>

        <!-- Turn all file input elements into ponds -->
        <script>
            FilePond.parse(document.body);
        </script>

    </x-app-layout>

    

</body>
</html>





