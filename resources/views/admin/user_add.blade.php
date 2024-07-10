<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @isset($add)
                Add New User
            @else
                User Details
            @endisset
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


                <div class="w-full relative ">
                    <a class="btn red absolute left" href="{{ route('admin.user.index') }}"><img
                            src="{{ asset('./icons/ic_left.svg') }}"></a>
                </div>

                <form class="user-form w-full lg:w-1/2 flex flex-col p-5" method="POST"
                    action="{{ route('admin.user.add')}}">
                    @csrf


                    <div>
                        <label for="name">
                            Name:
                        </label>
                        <input type="text" id="name" name="name" required>
                    </div>

                    <div>
                        <label for="role">
                            Position:
                        </label>
                        <select class="input" id="role" name="role" required>
                            <option value="student">Student
                            </option>
                            <option value="lecturer">
                                Lecturer
                            </option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>

                    <div>
                        <label for="email">
                            Email:
                        </label>
                        <input type="email" id="email" name="email" required>
                    </div>



                    <div>
                        <label for="password">
                            Password:
                        </label>
                        <input type="password" id="password" name="password" required>
                    </div>

                    <div>
                        <label for="phone_no">
                            Phone No:
                        </label>
                        <input type="text" id="phone_no" name="phone_no" required>
                    </div>

                    <div>
                        <label for="faculty">
                            Faculty:
                        </label>
                        <input type="text" id="faculty" name="faculty" required>
                    </div>


                    <div class="flex justify-center w-full pt-3" style="flex-direction: row">
                        <input class="btn red" style="padding: 10px 20px !important;" type="submit" value="Add">
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
