<div class="flex flex-col w-11/12 gap-2 mx-auto mt-5 bg-white rounded-lg shadow-lg dark:bg-gray-800 min-h-fit lg:flex-row">
    {{-- <img class="w-full bg-contain lg:w-1/2" src="https://pbs.twimg.com/media/FuegVVGaAAAyLGM?format=jpg&name=large" alt="#"> --}}
    @if ($event->image)
        <img class="w-full bg-contain lg:w-1/2" src="{{ asset('storage/' . $event->image) }}" alt="#">
    @else
        <img class="w-full bg-contain lg:w-1/2" src="{{ asset('default-image.jpg') }}" alt="#">
    @endif
    <div class="flex flex-col justify-between w-full px-4 py-5 lg:w-1/2">
        <div class="mt-3 h-fit">
            <span
                class="p-2 text-sm rounded-sm shadow-sm outline outline-1 outline-gray-500">{{ $event->category->name }}</span>
            <span class="p-2 text-sm rounded-sm shadow-sm outline outline-1 outline-gray-500">Online</span>
        </div>
        <div class="flex flex-col mt-5">
            <h1 class="text-3xl font-bold">{{ $event->name }}</h1>
            <h1>{{ $event->published_at }}</h1>
            @if ($event->quota > 0)
                <h1>Kuota: {{ $event->quota }} Peserta</h1>
            @endif
            <span class="pt-2 font-semibold">
                <h1>Mulai: {{ $event->start_date }}</h1>
                <h1>Berakhir: {{ $event->end_date }}</h1>
            </span>
            @if ($event->link)
                <a class="w-full btn btn-primary" href="{{ $event->link }}" target="_blank" class="text-blue-500">Link
                    Pendaftaran Event</a>
            @else
                {{-- <a class="w-full btn btn-primary" href="#" class="text-blue-500">RSVP Event</a> --}}
                <a class="w-full btn btn-primary" href="{{ route('rsvp', $event) }}"
                    class="p-2 rounded-md {{ $event->is_published ? 'text-green-500 bg-green-100' : 'text-red-500 bg-red-100' }}">
                    {{ $event->registrations()->where('user_id', auth()->id())->first()? 'Batalkan Kehadiran': 'Hadiri Event' }}
                </a>
            @endif
            {{-- <button class="w-full btn btn-primary" onclick="my_modal_1.showModal()">RSVP Event</button>
        <dialog id="my_modal_1" class="modal modal-bottom sm:modal-middle">
            @if ($event->link)
                <div class="modal-box h-4/5">
                    <iframe src="{{ $event->link }}" class="w-full h-[85%] rounded-md" marginheight="0"
                        marginwidth="0">Loading…</iframe>
                    <div class="modal-action">
                        <form method="dialog" class="w-full">
                            <!-- if there is a button in form, it will close the modal -->
                            <button class="w-full btn btn-warning">Tutup</button>
                        </form>
                    </div>
                </div>
            @else
                <div class="modal-box">
                    <h1 class="text-lg font-bold">Hello!</h1>
                    <p class="py-4">Press ESC key or click the button below to close</p>
                    <div class="modal-action">
                        <form method="dialog">
                            <!-- if there is a button in form, it will close the modal -->
                            <button class="btn">Close</button>
                        </form>
                    </div>
                </div>
            @endif
        </dialog> --}}
        </div>
        <div class="flex flex-col gap-3 mt-2 md:grid-cols-3" x-data="{ url: window.location.href }">
            {{-- <div class="flex flex-row w-full">
                <input class="w-full" type="text" x-model="url" readonly disabled placeholder="Current URL" class="w-full p-2 border rounded">
                <button @click="copyToClipboard" class="p-2 ml-2 text-white bg-blue-500 rounded">Copy</button>
            </div> --}}
            <add-to-calendar-button name="{{ $event->name }}" description="{{ $event->description }}"
                startDate="2023-10-07" startTime="10:15" endTime="17:45" timeZone="Asia/Jakarta"
                location="World Wide Web" options="'Google','iCal'"></add-to-calendar-button>
        </div>
    </div>
</div>
