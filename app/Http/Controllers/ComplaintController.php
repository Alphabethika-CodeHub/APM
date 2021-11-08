<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Response;
use App\Models\Complaint;
use App\Models\ResponseShow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ComplaintController extends Controller
{    
    public function createUser(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:8'],
            'phone' => ['required', 'max:14'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);        

        $image = request()->file('image') ? request()->file('image')->store("images/user") : null;

        User::create([
            'name' => request('name'),
            'username' => request('username'),
            'phone' => request('phone'),
            'email' => request('email'),
            'image' => $image,
            'password' => Hash::make($request->password),
            'level' => "Employee"
        ]);

        session()->flash('success', 'User Berhasil Di Simpan');
        return redirect('/home');
    }

    public function index()
    {
        $complaints = Complaint::latest()->where('username', '=', auth()->user()->username)->paginate(6);
        return view('auth.public.complaint.index', compact('complaints'));
    }

    public function show($id)
    {
        $complaint = Complaint::find($id);
        $response = ResponseShow::find($id);

        return view('auth.public.complaint.show', compact('complaint', 'response'));
    }

    public function updateStatus($id)
    {
        $fields = request('status');
        
        if($fields == 'pending'){
            $complaint_id = Complaint::find($id);
            $complaint_id->update([
                'status' => "Pending"
            ]);
        } else {
            $complaint_id = Complaint::find($id);
            $complaint_id->update([
                'status' => "Completed"
            ]);
        }

        session()->flash('success_status', 'Tanggapan Anda Sudah Di Tayangkan');
        return redirect('/home');
    }

    public function store(Request $request)
    {
        $request->validate([            
            'title' => 'required',
            'subject' => 'required',
            'location' => 'required',
            'date' => 'required',
            'image' => 'image',
        ]);

        $image = request()->file('image') ? request()->file('image')->store("images/complaint") : null;

        Complaint::create([
            'title' => request('title'),
            'subject' => request('subject'),
            'location' => request('location'),
            'date' => request('date'),
            'email' => auth()->user()->email,
            'username' => auth()->user()->username,
            'image' => $image,
            'status' => "Process",
            'user_id' => auth()->user()->id
        ]);

        session()->flash('success', 'Laporan Anda Berhasil Di Simpan');
        return back();
    }

    // ANONIM
    public function storeAnonim(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'subject' => 'required',
            'location' => 'required',
            'date' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|required',
        ]);

        $image = request()->file('image') ? request()->file('image')->store("images/complaint") : null;

        Complaint::create([
            'title' => request('title'),
            'subject' => request('subject'),
            'location' => request('location'),
            'date' => request('date'),
            'email' => request('email'),
            'username' => request('username'),
            'image' => $image,
            'status' => "Process"
        ]);

        session()->flash('success', 'Laporan Anda Berhasil Di Simpan');
        return back();
    }

    public function destroy(Complaint $complaint)
    {
            Storage::delete($complaint->image);
            $complaint->delete();
            session()->flash('deleted', 'Laporan Anda Sudah Di Hapus');
            return redirect('/home');
    }
}
