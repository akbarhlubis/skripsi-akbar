{{-- table list of user --}}
<table class="min-w-full border divide-y divide-gray-200">
    <thead>
        <tr>
            <th class="px-6 py-3 text-left bg-gray-50">
                <span class="text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase">Nama
                    Lengkap</span>
            </th>
            <th class="px-6 py-3 text-left bg-gray-50">
                <span class="text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase">Alamat
                    Email</span>
            </th>
            <th class="px-6 py-3 text-left bg-gray-50">
                <span class="text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase">
                    Kode Barcode</span>
            </th>
            <th class="px-6 py-3 text-left bg-gray-50">
                <span class="text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase">Tombol
                    Aksi</span>
            </th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200 divide-solid">
        @forelse ($registrations as $regis)
            <tr class="bg-white hover:bg-slate-50">
                <td class="px-6 py-3 text-left">
                    <span class="text-xs font-medium leading-4 tracking-wider">
                        {{ $regis->user->name }}
                    </span>
                </td>
                <td class="px-6 py-3 text-left">
                    <span class="text-xs font-medium leading-4 tracking-wider">
                        {{ $regis->user->email }}
                    </span>
                </td>
                <td class="px-6 py-3 text-left">
                    <span class="text-xs font-medium leading-4 tracking-wider">
                        <img class="w-20"
                            src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ $regis->barcode }}"
                            alt="" srcset="">
                    </span>
                </td>
                <td class="px-6 py-3 text-left">
                    <a href="{{route('event.is-attend',['event' => $event->id, 'user_id' => $regis->user->id])}}" class="text-xs font-medium leading-4 tracking-wider">
                        {{ $regis->is_attended ? 'Menghadiri' : 'Tandai Hadir' }}
                    </a>
                    | 
                    <a href="{{route('event.del-attend', ['event' => $event, 'user_id' => $regis->user->id])}}" class="text-xs font-medium leading-4 tracking-wider text-red-500">
                        Hapus
                    </a>
                </td>
            @empty
                <td class="px-6 py-4 text-sm leading-5 text-gray-900 truncate whitespace-no-wrap">
                    <div class="text-lg text-center">
                        Kosong
                    </div>
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
