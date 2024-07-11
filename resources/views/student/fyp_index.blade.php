<x-app-layout>
    <style>
        .dlt {
            color: red;
            text-decoration: underline;

            &:hover {
                cursor: pointer;
            }
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

                @if ($fyps->isEmpty())
                    <div class="flex flex-col gap-3 p-10">
                        <h2 class="text-2xl font-regular text-center">Your FYP Project is nowhere to be found.</h2>
                        <p class='text-base p-2 text-center'>Please update your FYP at submission form below</p>
                    </div>
                    <a class='btn' href='{{ route('student.fyp.form', ['u_id' => auth()->user()->id]) }}'>FYP
                        Submission Form</a>
                @else
                    <a class='btn' href='{{ route('student.fyp.form', ['u_id' => auth()->user()->id]) }}'>FYP
                        Submission Form</a>
                    @foreach ($fyps as $fyp)
                        <div class="flex flex-col gap-3 p-10">
                            <h2 class="text-3xl font-bold text-center">{{ $fyp->title }}</h2>
                            <p>{{ $fyp->description }}</p>
                            <p>Examiner: <strong> {{ $fyp->examiner->name }}</strong></p>
                            <p>Status: <strong> {{ $fyp->status }}</strong></p>
                            <p>Grade: <strong> {{ $fyp->grade == null ? $fyp->status : $fyp->grade }}</strong></p>
                            <p class="flex">Remarks:
                                <textarea class="mx-3" cols="40" disabled> {{ $fyp->grade }}</textarea>
                            </p>

                            @if (isset($fypFiles[$fyp->id]) && !$fypFiles[$fyp->id]->isEmpty())
                                <div class="p-2 m-2 rounded-lg" style='border: 1px solid #2a67a0'>
                                    <h3 class="text-lg font-bold text-center">Files</h3>
                                    <ol>
                                        @foreach ($fypFiles[$fyp->id] as $index => $file)
                                            <li class="p-2 flex justify-between">{{ $index + 1 }}. {{ $file->location }}
                                                <div class="flex gap-1">
                                                    <a class="text-blue-400 underline" download
                                                        href='{{ asset($file->location) }}'>
                                                        Download
                                                    </a>
                                                    @if (auth()->user()->role == 'student')
                                                        <form class="w-fit" method="POST"
                                                            action="{{ route('student.file.delete', ['file_id' => $file->id]) }}">

                                                            @csrf
                                                            @method('DELETE')
                                                            <input class="dlt" type="submit" value="Remove">
                                                        </form>
                                                    @endif
                                                </div>

                                            <li>
                                        @endforeach
                                    </ol>
                                </div>
                            @else
                                <p>No files uploaded for this project.</p>
                            @endif

                            <p>Click <a href="{{ route('student.file.attach', ['fyp_id' => $fyp->id]) }}"
                                    class="text-blue-500 underline">here</a> to add more file</p>


                            <form class="w-fit" method="POST"
                                action="{{ route('student.fyp.delete', ['fyp_id' => $fyp->id]) }}">

                                @csrf
                                @method('DELETE')
                                <input class="btn text-red-600" type="submit" value="Remove">
                            </form>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
