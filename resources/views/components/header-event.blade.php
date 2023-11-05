<div
    class="flex flex-col w-11/12 gap-2 mx-auto mt-5 bg-white rounded-lg shadow-lg dark:bg-gray-800 min-h-fit lg:flex-row">
    {{-- <img class="w-full bg-contain lg:w-1/2" src="https://pbs.twimg.com/media/FuegVVGaAAAyLGM?format=jpg&name=large" alt="#"> --}}
    @if ($event->image)
        <img class="w-full bg-contain lg:w-1/2" src="{{ asset('storage/' . $event->image) }}" alt="{{$event->name}}">
    @else
        <img class="w-full bg-contain lg:w-1/2" src="{{ asset('default-image.jpg') }}" alt="{{$event->name}}">
    @endif
    <div class="flex flex-col justify-between w-full px-4 py-5 lg:w-1/2">
        <div class="mt-3 h-fit">
            <span
                class="p-2 text-sm rounded-sm shadow-sm outline outline-1 outline-gray-500">{{ $event->category->name }}</span>
        </div>
        <div class="flex flex-col mt-5">
            <h1 class="text-3xl font-bold">{{ $event->name }}</h1>
            <h1>{{ $event->published_at }}</h1>
            @if ($event->quota > 0)
                <h1>Kuota: {{ $registrations ?? '' }}/{{ $event->quota }} Peserta</h1>
            @endif
            <span class="pt-2 font-semibold">
                <h1>Mulai: {{ date('d-m-Y | H:i:s', strtotime($event->start_date)) }}</h1>
                <h1>Berakhir: {{ date('d-m-Y | H:i:s', strtotime($event->end_date)) }}</h1>
            </span>
        </div>
        @if ($event->link)
            <a class="w-full btn btn-primary" href="{{ $event->link }}" target="_blank" class="text-blue-500">Link
                Pendaftaran Event
            </a>
        @elseif (
            $event->quota == $registrations &&
                !$event->registrations()->where('user_id', auth()->id())->first())
            <button class="w-full btn btn-primary btn-disabled outline outline-1">
                Kuota Kehadiran Peserta Sudah Penuh
            </button>
        @else
            {{-- <a class="w-full btn btn-primary" href="#" class="text-blue-500">RSVP Event</a> --}}
            <a class="w-full btn btn-primary" href="{{ route('rsvp', $event) }}"
                class="p-2 rounded-md {{ $event->is_published ? 'text-green-500 bg-green-100' : 'text-red-500 bg-red-100' }}">
                {{ $event->registrations()->where('user_id', auth()->id())->first()? 'Batalkan Kehadiran': 'Hadiri Event' }}
            </a>
        @endif
        <div class="flex flex-col gap-3 mt-2 md:grid-cols-3" x-data="{ url: window.location.href }">
            {{-- <div class="flex flex-row w-full">
                <input class="w-full" type="text" x-model="url" readonly disabled placeholder="Current URL" class="w-full p-2 border rounded">
                <button @click="copyToClipboard" class="p-2 ml-2 text-white bg-blue-500 rounded">Copy</button>
            </div> --}}
            <add-to-calendar-button name="{{ $event->name }}" description="{{ $event->description }}"
                startDate="{{ date('Y-m-d', strtotime($event->start_date)) }}" endDate="{{ date('Y-m-d', strtotime($event->end_date)) }}" startTime="{{ date('H:i:s', strtotime($event->start_date)) }}" endTime="{{ date('H:i:s', strtotime($event->end_date)) }}" timeZone="Asia/Jakarta"
                location="World Wide Web" options="'Apple','Google','iCal','Yahoo','Microsoft365'"></add-to-calendar-button>
        </div>
    </div>
</div>
