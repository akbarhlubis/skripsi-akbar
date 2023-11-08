@extends('admin.layout.main')
@section('container')
    <div class="">
        <div class="flex gap-2 overflow-hidden rounded-md">
            @if ($event->image)
                <img class="w-full p-4 bg-white bg-contain lg:w-1/2" src="{{ asset('storage/' . $event->image) }}"
                    alt="#">
            @else
                <img class="w-full p-4 bg-white bg-contain lg:w-1/2" src="{{ asset('default-image.jpg') }}"
                    alt="{{ $event->description }}">
            @endif
            <div class="w-1/2 p-4 bg-white">
                <form class="gap-2 form-control">
                    <input disabled type="text" name="name" value="{{ $event->name }}">
                    <input disabled type="text" name="description" value="{{ $event->description }}">
                    <input disabled type="text" name="published_at" value="{{ $event->slug }}">
                    
                    <p class="p-2 rounded-md text-center font-bold {{$event->is_published ? 'text-green-500 bg-green-100' : 'text-red-500 bg-red-100'}}">{{ $event->is_published ? 'Published' : 'Draft' }}</p>
                    {{-- Start date and End date inside div --}}
                    <div class="flex gap-2">
                        <div class="flex flex-col w-full gap-2">
                            <label for="start_date">Start Date</label>
                            <input disabled type="datetime-local" name="start_date" id="start_date" value="{{ $event->start_date }}">
                        </div>
                        <div class="flex flex-col w-full gap-2">
                            <label for="end_date">End Date</label>
                            <input disabled type="datetime-local" name="end_date" id="end_date" value="{{ $event->end_date }}">
                        </div>
                    </div>
                    <a class="px-2 py-2 text-center text-white rounded-md bg-slate-900"
                        href="{{ route('event.edit', $event) }}">Edit Data</a>
                    </form>
                    <div class="grid grid-flow-col mx-auto mt-4">
                        <div class="w-full text-sm font-bold">Total Peserta: {{app\Models\Registration::where('event_id',$event->id)->count()}}</div>
                        <div class="w-full text-sm font-bold">Peserta Hadir: {{app\Models\Registration::where('event_id',$event->id)->where('is_attended',true)->count()}}</div>
                        <div class="w-full text-sm font-bold">Peserta Belum Hadir: {{app\Models\Registration::where('event_id',$event->id)->where('is_attended',false)->count()}}</div>
                    </div>
                </div>
            </div>
        {{-- if link is not null then show below --}}
        @empty($event->link)
            <div class="mt-2 overflow-x-scroll bg-white rounded-md" x-data="{ activeTab: 'regisform' }">
                <div class="space-y-2">
                    <ul class="flex gap-2">
                        <li>
                            <a @click.prevent="activeTab = 'regisform'"
                                :class="{ 'text-white underline bg-slate-800': activeTab === 'regisform' }" class="px-2 py-2"
                                href="#regisform">
                                Attending Form
                            </a>
                        </li>

                        <li>
                            <a @click.prevent="activeTab = 'embedform'"
                                :class="{ 'text-white underline bg-slate-800': activeTab === 'embedform' }" class="px-2 py-2"
                                href="#embedform">
                                Embedding Form
                            </a>
                        </li>
                    </ul>

                    <div>
                        <div x-cloak x-show="activeTab === 'regisform'">
                            <div class="p-2 ">
                                <div class="dropdown dropdown-right">
                                    <label tabindex="0" class="m-1 btn bg-slate-500">Export</label>
                                    <ul tabindex="0"
                                        class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
                                        <li><a href="{{route('event.export.excel',$event)}}">Export EXCEL</a></li>
                                        {{-- <li><a href="#">Export PDF</a></li> --}}
                                    </ul>
                                </div>
                            </div>
                            @include('components.table-users')
                        </div>
                        <div x-cloak x-show="activeTab === 'embedform'">
                            @if ($event->embed)
                                <iframe class="w-full min-h-screen" src="{{ $event->embed }} " frameborder="0"></iframe>
                            @else
                                <div class="text-lg text-center">
                                    Tidak ada data
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endempty
    </div>
    <script>
        const name = document.querySelector('#name');
        const slug = document.querySelector('#slug');

        name.addEventListener("keyup", function() {
            let preslug = name.value;
            preslug = preslug.replace(/ /g, "-");
            slug.value = preslug.toLowerCase();
        });
    </script>
@endsection
