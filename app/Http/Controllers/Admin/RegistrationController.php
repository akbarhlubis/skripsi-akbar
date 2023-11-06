<?php

namespace App\Http\Controllers\Admin;

use App\Exports\RegistrationExport;
use App\Http\Controllers\Controller;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class RegistrationController extends Controller
{
    public function export(Request $request)
    {
        // dd($request->event_id);
        // return Excel::download(new RegistrationExport,'registration-'.Carbon::now()->timestamp.'.xlsx');
        return (new RegistrationExport($request->event_id))->download('registration-'.Carbon::now()->timestamp.'.xlsx');
    }

    public function delete_attend (Request $request)
    {
        // $event = $request->event;
        $event_id = $request->event;
        $user_id = $request->user_id;
        // dd( $event_id,$user_id);
        $event = Event::findorFail($event_id);
        $attending = $event->registrations()->where('user_id', $user_id);
        $attending->delete();
        return back()->with('success', 'User no longer attending ' . $event->title);
    }

    public function attend_status (Request $request){
        $event_id = $request->event;
        $user_id = $request->user_id;
        // dd( $event_id,$user_id);
        // mengecek kondisi apakah peserta sudah attend atau belum melalui variabel is_attended yang true dan false, jika belum maka ubah jadi true
        $event = Event::findorFail($event_id);
        $attending = $event->registrations()->where('user_id', $user_id)->first();
        $is_attended = $attending->is_attended;
        if ($is_attended == false) {
            $attending->is_attended = true;
            $attending->save();
            return back()->with('success', 'User attending ' . $event->title);
        } else {
            $attending->is_attended = false;
            $attending->save();
            return back()->with('success', 'User no longer attending ' . $event->title);
        }
    }
}
