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
                <form class="gap-2 form-control" action="">
                    <input type="text" name="name" value="{{ $event->name }}">
                    <input type="text" name="description" value="{{ $event->description }}">
                    <input type="text" name="published_at" value="{{ $event->slug }}">
                    <input type="file" name="image" id="image">
                    {{-- Input is published --}}
                    <div class="flex gap-2">
                        <input type="radio" name="is_published" id="published" value="1"
                            {{ $event->is_published ? 'checked' : '' }}>
                        <label for="published">Published</label>
                        <input type="radio" name="is_published" id="draft" value="0"
                            {{ $event->is_published ? '' : 'checked' }}>
                        <label for="draft">Draft</label>
                    </div>

                    {{-- Start date and End date inside div --}}
                    <div class="flex gap-2">
                        <div class="flex flex-col w-full gap-2">
                            <label for="start_date">Start Date</label>
                            <input type="date" name="start_date" id="start_date" value="{{ $event->start_date }}">
                        </div>
                        <div class="flex flex-col w-full gap-2">
                            <label for="end_date">End Date</label>
                            <input type="date" name="end_date" id="end_date" value="{{ $event->end_date }}">
                        </div>
                    </div>
                    <button class="px-2 py-2 text-white rounded-md bg-slate-900" type="button">Update</button>
                </form>
            </div>
        </div>
        <div class="mt-2 overflow-x-scroll bg-white rounded-md" x-data="{ activeTab: 'regisform' }">
            <div class="space-y-2">
                <ul class="flex gap-2">
                    <li>
                        <a @click.prevent="activeTab = 'regisform'" :class="{ 'text-indigo-600': activeTab === 'regisform' }"
                            class="underline" href="#regisform">
                            Registration Form
                        </a>
                    </li>

                    <li>
                        <a @click.prevent="activeTab = 'embedform'" :class="{ 'text-indigo-600': activeTab === 'embedform' }"
                            class="underline" href="#embedform">
                            embedform
                        </a>
                    </li>
                </ul>

                <div>
                    <div x-cloak x-show="activeTab === 'regisform'">
                        @include('components.table-users')
                    </div>
                    <div x-cloak x-show="activeTab === 'embedform'">
                        Kosong
                        <iframe class="w-full min-h-screen" src="{{$event->embed}}" frameborder="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
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
