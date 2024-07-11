<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Attach File
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

            cursor: pointer;

            &:hover {
                cursor: pointer;
            }
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white flex items-center flex-col p-5 shadow-sm sm:rounded-lg">

                <div class=" step flex">
                    <div class="flex relative flex-col justify-center items-center">
                        <div class="text-[#2a67a0]  font-bold text-lg py-3 px-5 rounded-full"
                            style="border: #01529e solid 5px">
                            <p>1</p>
                        </div>
                        <p class="absolute" style="transform: translate(0%,200%)">Form</p>
                    </div>

                    <div
                        style='width:100px; border-top: #01529e solid 5px; min-height:1px; transform: translate(0%,50%)'>
                    </div>

                    <div class="flex relative flex-col justify-center items-center">
                        <div class="text-[#2a67a0] bg-[#4ea6f363] font-bold text-lg py-3 px-5 rounded-full"
                            style="border: #01529e solid 5px">
                            <p>2</p>
                        </div>
                        <p class="absolute text-nowrap" style="transform: translate(0%,200%)">Upload Files</p>
                    </div>
                </div>

                <form class="user-form w-full lg:w-1/2 flex mt-10 flex-col p-5" style='border: 1px solid #0005'
                    method="POST" enctype="multipart/form-data"
                    action="{{ route('student.file.upload', ['u_id' => auth()->user()->id, 'fyp_id' => $fyp->id]) }}">
                    @csrf

                    <input type='hidden' name='fyp_id' value='{{ $fyp->id }}'>


                    <input type='file' name='file' style='border: 1px solid #000; padding: 0'
                        accept=".zip,.pdf,*/*" required>

                    <div class="flex justify-center w-full pt-3" style="flex-direction: row">
                        <input class="btn red" style="padding: 10px 20px !important;" type="submit" value="Next">
                    </div>
                </form>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</x-app-layout>
