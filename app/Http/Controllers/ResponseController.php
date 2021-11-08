<?php   

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Response;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ResponseController extends Controller
{    

    public function createEmployee(Request $request)
    {

        $request->validate([            
            'name' => ['required', 'string'],
            'username' => ['required', 'string', 'max:8'],
            'phone' => ['required', 'max:14'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);        

        $image = request()->file('image') ? request()->file('image')->store("images/user") : null;        

        User::create([
            'image' => $image,
            'name' => request('name'),
            'username' => request('username'),
            'phone' => request('phone'),
            'email' => request('email'),
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'password' => Hash::make($request->password),
            'level' => "Employee"
        ]);

        session()->flash('success', 'Employee Berhasil Di Simpan');
        return redirect('/home');
    }


    public function getComplaint(Request $request)
    {
        
        $columns = array( 
                            0 =>'id', 
                            1 =>'username',
                            2 => 'title',                            
                            3 => 'date',
                            4 => 'status',
                            5 => 'location',
                        );
  
        $totalData = Complaint::count();
            
        $totalFiltered = $totalData; 

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        if(empty($request->input('search.value')))
        {            
            $complaints = Complaint::offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        }
        else {
            $search = $request->input('search.value'); 

            $complaints =  Complaint::where('id','LIKE',"%{$search}%")
                            ->orWhere('username', 'LIKE',"%{$search}%")
                            ->orWhere('title', 'LIKE',"%{$search}%")
                            ->orWhere('date', 'LIKE',"%{$search}%")
                            ->orWhere('status', 'LIKE',"%{$search}%")
                            ->orWhere('location', 'LIKE',"%{$search}%")
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();

            $totalFiltered = Complaint::where('id','LIKE',"%{$search}%")
                            ->orWhere('username', 'LIKE',"%{$search}%")
                            ->orWhere('title', 'LIKE',"%{$search}%")
                            ->orWhere('date', 'LIKE',"%{$search}%")
                            ->orWhere('status', 'LIKE',"%{$search}%")
                            ->orWhere('location', 'LIKE',"%{$search}%")                       
                            ->count();
        }

        $data = array();
        if(!empty($complaints))
        {
            foreach ($complaints as $c)
            {
                $show =  route('complaint.show', $c->id);

                $nestedData['id'] = $c->id;
                $nestedData['username'] = $c->username;
                $nestedData['title'] = $c->title;
                // $nestedData['date'] = $c->date;
                $nestedData['date'] = $c->date ? with(new Carbon($c->date))->format('d/m/Y') : '';
                $nestedData['status'] = $c->status;
                $nestedData['location'] = $c->location;
                $nestedData['options'] = "&emsp;<a href='$show' title='Detail Pengaduan'>Tanggapi</a>";
                $data[] = $nestedData;

            }
        }
          
        $json_data = array(
                    "draw"            => intval($request->input('draw')),  
                    "recordsTotal"    => intval($totalData),  
                    "recordsFiltered" => intval($totalFiltered), 
                    "data"            => $data   
                    );
            
        echo json_encode($json_data); 
        
    }

    // -    -    -    -    -    -    -    -    -    -    -    -    -    -    -    -    -    -

    public function getUserMinified(Request $request)
    {
        
        $columns = array( 
                            0 =>'id', 
                            1 =>'name',
                            2 => 'username',                            
                            3 => 'phone',
                            4 => 'email',
                            5 => 'level',
                        );
  
        $totalData = User::count();
            
        $totalFiltered = $totalData; 

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        if(empty($request->input('search.value')))
        {            
            $users = User::offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        }
        else {
            $search = $request->input('search.value'); 

            $users =  User::where('id','LIKE',"%{$search}%")
                            ->orWhere('name', 'LIKE',"%{$search}%")
                            ->orWhere('username', 'LIKE',"%{$search}%")
                            ->orWhere('email', 'LIKE',"%{$search}%")
                            ->orWhere('phone', 'LIKE',"%{$search}%")
                            ->orWhere('level', 'LIKE',"%{$search}%")
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();

            $totalFiltered = User::where('id','LIKE',"%{$search}%")
                            ->orWhere('name', 'LIKE',"%{$search}%")
                            ->orWhere('username', 'LIKE',"%{$search}%")
                            ->orWhere('email', 'LIKE',"%{$search}%")
                            ->orWhere('phone', 'LIKE',"%{$search}%")
                            ->orWhere('level', 'LIKE',"%{$search}%")
                            ->count();
        }

        $data = array();
        if(!empty($users))
        {
            foreach ($users as $u)
            {
                // $show =  route('complaint.show',$u->id);

                $nestedData['id'] = $u->id;
                $nestedData['name'] = $u->name;
                $nestedData['username'] = $u->username;
                $nestedData['email'] = $u->email;
                $nestedData['phone'] = $u->phone;                
                $nestedData['level'] = $u->level;                
                // $nestedData['options'] = "&emsp;<a href='$show' title='Detail Pengaduan'>Tanggapi</a>";
                $data[] = $nestedData;

            }
        }
          
        $json_data = array(
                    "draw"            => intval($request->input('draw')),  
                    "recordsTotal"    => intval($totalData),  
                    "recordsFiltered" => intval($totalFiltered), 
                    "data"            => $data   
                    );
            
        echo json_encode($json_data); 
        
    }

    public function getComplaintsDetail()
    {
        $complaints = Complaint::latest()->paginate(25);
        return view('auth.admin.laporan-pengaduan.index', compact('complaints'));
    }

    public function getUsersDetail()
    {
        $users = User::latest()->paginate(25);
        $users_all = User::all();
        return view('auth.admin.users-apm.index', compact('users', 'users_all'));
    }

    public function destroyUser(User $user)
    {
        $user->delete();
        session()->flash('success_user_delete', 'Sudah Di Hapus');
        return redirect('/home/users-details');
    }

    public function storeResponse($id)
    {

        $image = request()->file('image') ? request()->file('image')->store("images/response") : null;

        $complaint_id = Complaint::find($id)->id;
        $complaint = Complaint::find($id);

        $response = new Response();
        $response->date_response = request('date_response');
        $response->response = request('response');
        $response->image = $image;
        $response->user_id = auth()->user()->id;
        $response->complaint_id = $complaint_id;
        $response->save();

        $complaint->status = "Completed";
        $complaint->save();

        session()->flash('success_response', 'Tanggapan Anda Sudah Di Tayangkan');
        return redirect('/home');

    }

    public function updateResponse($id)
    {
        $response = Response::find($id);

        if (request()->file('image')) {
            Storage::delete($response->image);
            $image = request()->file('image')->store("images/reponse");
        } else {
            $image = $response->image;
        }

        $response->update([
            'date_response' => request('date_response'),
            'response' => request('response'),
            'image' => $image,
        ]);        

        session()->flash('success_response_update', 'Tanggapan Anda Sudah Di Perbarui');
        return redirect('/home');
    }

    // public function destroyResponse(Response $response, Complaint $complaint, $id)
    // {
    //     Storage::delete($response->image);
    //     $response->delete();

    //     $complaint = Complaint::find($id);
    //     $complaint->status = "Process";
    //     $complaint->save();

    //     session()->flash('deleted', 'Laporan Anda Sudah Di Hapus');
    //     return redirect('/home');
    // }    

}
