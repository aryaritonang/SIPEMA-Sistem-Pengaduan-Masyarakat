<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\User;
use App\Models\Complaint;
use App\Models\ComplaintStatus;

class MainController extends Controller
{
    public function index()
    {
        return view('main');
    }

    public function complaint()
    {
        $complaint = Complaint::all();

        return view('complaint',['complaint' => $complaint]);
    }

    public function checkinput(Request $request)
    {
        $validate = $request->validate([
            'umur'   => ['required','numeric'],
            'nik'  => ['required','numeric','min:3'],
            'kategori'  => ['required','string','min:3'],
            'keluhan'  => ['required','string','min:3'],
        ]);

        if($validate) {
            $data['age'] = $validate['umur'];
            $data['nik'] = $validate['nik'];
            $data['complaint_contents'] = $validate['keluhan'];
            $data['complaint_category'] = $validate['kategori'];

            if(empty(Auth::user())) {
                $data['id_user'] = 0;
                $name = 'Anonymous';
            } else {
                $data['id_user'] = Auth::guard(session('guard_key'))->user()->id;
                $name = Auth::guard(session('guard_key'))->user()->name;
            }

            if(!empty($request['anonim'])) {
                $name = 'Anonymous';
            }

            if(!empty($request->file('lampiran'))) {
                $file = $request->file('lampiran')->store('uploads');
                $data['attachment'] = $file;
            } else {
                $data['attachment'] = '';
            }

            $data = Complaint::create($data);

            $status = [
                'complaint_number' => $data->id,
                'name' => $name,
                'complaint_status' => 0,
                'verified_by' => '',
            ];

            ComplaintStatus::create($status);
            return redirect()->route('main.history');
        } else {
            return back()->with('error', 'Wrong Login Details');
        }

    }

    public function history()
    {
        $history = Complaint::where(['id_user' => Auth::guard(session('guard_key'))->user()->id])->get();

        return view('history',['history' => $history]);
    }

    public function deleteComplaint(Request $request)
    {
        if(session('guard_key') == 'user') {
            $id = Auth::guard(session('guard_key'))->user()->id;
            $route = 'main.history';
        } else {
            $id = $request->user;
            $route = 'main.complaint';
        }

        Complaint::where(['id' => $request->id, 'id_user' => $id])->delete();
        ComplaintStatus::where(['complaint_number' => $request->id])->delete();

        return redirect()->route($route);
    }

    public function aduan()
    {
        return view('aduan');
    }

    public function assignDone(Request $request)
    {
        $complaint = ComplaintStatus::where(['id' => $request->id])->first();
        $complaint->update(['complaint_status' => 1,'verified_by' => Auth::guard(session('guard_key'))->user()->username]);

        return redirect()->route('main.complaint');
    }

    public function assignUndone(Request $request)
    {
        $complaint = ComplaintStatus::where(['id' => $request->id])->first();
        $complaint->update(['complaint_status' => 0,'verified_by' => '']);

        return redirect()->route('main.complaint');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('main');
    }

}
