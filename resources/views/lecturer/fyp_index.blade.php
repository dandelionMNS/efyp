<x-app-layout>
    <style>
        td {
            padding: 20px;
            border-top: 1px solid #eee;
        }

        thead td {
            font-size: 1.2rem;
            font-weight: 700;
        }

        .counters {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: 0 0 40px 0;
            width: 100%;
            aspect-ratio: 3/2;


            h1 {
                font-size: 3rem;
                font-weight: 700;
                margin: 15px
            }

            h3 {
                font-size: 1.2rem;
                font-weight: 400;
                height: unset;
            }
        }

        .mid-c {
            border-left: 1px solid #999;
            border-right: 1px solid #999;
        }
    </style>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Application List

        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white text-base overflow-hidden shadow-sm sm:rounded-lg flex flex-col items-center p-10">
                <div class="grid grid-cols-1 w-full md:grid-cols-2" style="max-width:400px">
                    <div class="counters " style='border-left: 1px solid #999;'>
                        <h1>
                            {{ $fyps->where('status', 'Not marking yet')->where('examiner_id', auth()->user()->id)->count() }}
                        </h1>
                        <p>
                            Pending
                        </p>
                    </div>
                    <div class="counters mid-c">
                        <h1>
                            {{ $fyps->where('status', 'Marked')->where('examiner_id', auth()->user()->id)->count() }}
                        </h1>
                        <p>
                            Marked
                        </p>

                    </div>

                </div>

                <table class="w-full">
                    <thead>
                        <td class="w-min">No.</td>
                        <td class="w-fit text-nowrap">Name</td>
                        <td class="w-fit text-nowrap ">Title</td>
                        <td class="w-fit text-nowrap">Status</td>
                        <td class="w-fit text-nowrap">Grade</td>
                        <td class="w-fit text-nowrap">Remarks</td>
                        <td colspan="2">Actions</td>
                    </thead>
                    <tbody>
                        <div class="hidden">
                            <?= $counter = 1 ?>
                        </div>
                        @foreach ($fyps as $fyp)
                            @if (auth()->user()->id == $fyp->examiner_id)
                                <tr>
                                    <td>
                                        <?= $counter++ ?>
                                    </td>
                                    <td>{{ $fyp->user->name }}</td>
                                    <td>{{ $fyp->title }}</td>
                                    <td>{{ $fyp->status }}</td>
                                    <td>{{ $fyp->grade == null ? ' - ' : $fyp->grade }}</td>
                                    <td>{{ $fyp->remarks == null ? ' - ' : $fyp->remarks }}</td>
                                    <td class="p-3">
                                        <a href="{{ route('lecturer.fyp.details', ['fyp_id' => $fyp->id]) }}"
                                            class="btn">
                                            Mark
                                        </a>
                                    </td>

                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function showAlert(event) {
        event.preventDefault();
        alert('Fyp Delete successfully!');
        event.target.submit();
    }
</script>
