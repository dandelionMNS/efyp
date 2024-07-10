<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex flex-col gap-2 text-center">
                        <h1 class="text-4xl py-4 font-semibold">Welcome to e-FYP Website</h1>
                    </div>
                    <div class="flex flex-col gap-5 items-center">
                        <img src='{{ asset('./assets/images/welcome.jpg') }}' style="max-height: 400px" alt='welcome'>
                        @if(auth()->user()->role == 'user')
                        <a class="btn m-5 "> Submit Your FYP Now </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>



    <footer class="py-6 text-center text-lg text-black">
        E-FYP | University Technology Petronas
    </footer>

</x-app-layout>
