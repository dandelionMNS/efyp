<x-app-layout>
    <style>
        .dlt {
            color: red;
            text-decoration: underline;

            &:hover {
                cursor: pointer;
            }
        }
        [type=text], textarea{
            padding: 10px;
            border-radius: 15px;
        }
    </style>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight">
            FYP Project
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white text-base overflow-hidden shadow-sm sm:rounded-lg flex flex-col items-center p-10">



                <form class="flex flex-col gap-3 p-10 " method="post" action="{{route('lecturer.fyp.marked',['fyp_id'=>$fyp->id])}}" method="put">
                    @csrf
                    @method('PUT')
                    <h2 class="text-3xl font-bold text-center">{{ $fyp->title }}</h2>
                    <p>{{ $fyp->description }}</p>
                    <p>Examiner: <strong> {{ $fyp->examiner->name }}</strong></p>
                    <p>Status: <strong> {{ $fyp->status }}</strong></p>
                    <p>Grade:
                        <input name="grade" type="text" placeholder="100.00">
                    </p>
                    <p class="flex">Remarks:
                        <textarea class="mx-3" cols="40" name='remarks'> {{ $fyp->grade }}</textarea>
                    </p>

                    @if (isset($fypFiles[$fyp->id]) && !$fypFiles[$fyp->id]->isEmpty())
                        <div class="p-2 m-2 rounded-lg" style='border: 1px solid #2a67a0'>
                            <h3 class="text-lg font-bold text-center">Files</h3>
                            <ol>
                                @foreach ($fypFiles[$fyp->id] as $index => $file)
                                    <li class="p-2 flex justify-between">{{ $index + 1 }}. {{ $file->location }}
                                        <a class="text-blue-400 underline" download href='{{ asset($file->location) }}'>
                                            Download
                                        </a>
                                    <li>
                                @endforeach
                            </ol>
                        </div>
                    @else
                        <p>No files uploaded for this project.</p>
                    @endif

                    <input type="submit" class='btn' value='Submit'>

                </form>
            </div>
        </div>
</x-app-layout>
