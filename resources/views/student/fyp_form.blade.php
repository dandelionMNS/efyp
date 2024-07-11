<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            FYP Submission Form
        </h2>
    </x-slot>

    <style>
        form {
            div {
                display: flex;
                flex-direction: column;
                padding: 20px 0;
            }
        }

        input,
        textarea,
        select {
            padding: 10px !important;
            border-radius: 10px !important;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white flex items-center flex-col p-5 shadow-sm sm:rounded-lg">


                <div class="w-full relative " style="min-height:50px">
                    <a class="btn red absolute left"
                        href="{{ route('student.fyp.index', ['u_id' => auth()->user()->id]) }}"><img
                            src="{{ asset('./icons/ic_left.svg') }}"></a>
                </div>

                <div class="steps flex">
                    <div class="flex relative flex-col justify-center items-center">
                        <div class="text-[#2a67a0] bg-[#4ea6f363] font-bold text-lg py-3 px-5 rounded-full"
                            style="border: #01529e solid 5px">
                            <p>1</p>
                        </div>
                        <p class="absolute" style="transform: translate(0%,200%)">Form</p>
                    </div>

                    <div
                        style='width:100px; border-top: #01529e solid 5px; min-height:1px; transform: translate(0%,50%)'>
                    </div>

                    <div class="flex relative flex-col justify-center items-center">
                        <div class="text-[#2a67a0] font-bold text-lg py-3 px-5 rounded-full"
                            style="border: #01529e solid 5px">
                            <p>2</p>
                        </div>
                        <p class="absolute text-nowrap" style="transform: translate(0%,200%)">Upload Files</p>
                    </div>
                </div>

                <form class="user-form w-full lg:w-1/2 flex flex-col p-5" method="POST"
                    action="{{ route('student.fyp.submit', ['u_id' => auth()->user()->id]) }}">
                    @csrf

                    <div>
                        <label for="title">
                            Title:
                        </label>
                        <input type="text" id="title" name="title" placeholder="Title" required>
                    </div>

                    <div>
                        <label for="description">
                            Description:
                        </label>
                        <textarea type="text" id="description" name="description" placeholder="Description"></textarea>
                    </div>

                    <input type=hidden name='user_id' value='{{ auth()->user()->id }}'>
                    <div>
                        <label for="examiner_id">
                            Examiner:
                        </label>
                        <select class="input" id="role" name="examiner_id" required>
                            @foreach ($examiners as $examiner)
                                <option value="{{ $examiner->id }}">{{ $examiner->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex justify-center w-full pt-3" style="flex-direction: row">
                        <input class="btn red" style="padding: 10px 20px !important;" type="submit" value="Next">
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
