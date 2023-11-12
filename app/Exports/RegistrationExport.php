<?php

namespace App\Exports;

use App\Models\Registration;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class RegistrationExport implements FromQuery,WithMapping,WithHeadings
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Registration::all();
    // }

    public function __construct($event_id) {
        $this->event_id = $event_id;
    }

    public function query()
    {
        return Registration::query()->where('event_id', $this->event_id);
    }


    public function headings(): array
    {
        return [
            'Timestamp',
            'Name',
            'Email',
            'Nama Event',
            'Kehadiran (Ya/Tidak)',
        ];
    }
    public function map($registration): array
    {
        return [
            $registration->created_at->format('d M Y, H:i:s'),
            $registration->user->name,
            $registration->user->email,
            $registration->event->name,
            $registration->is_attended ? 'Ya' : 'Tidak',
        ];
    }
}
