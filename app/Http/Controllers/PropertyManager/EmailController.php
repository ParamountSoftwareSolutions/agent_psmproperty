<?php

namespace App\Http\Controllers\PropertyManager;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Models\BuildingSale;
use App\Models\User;
use App\Models\EmailHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use PharIo\Manifest\Email;

class EmailController extends Controller
{
    public function email_compose()
    {
        return view('property.email.compose');
    }

    public function email_compose_send(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'subject' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with($this->message($validator->errors()->first(), 'danger'));
        }
        $data = [];
        $data['subject'] = $request->subject;
        $data['body'] = $request->body;
        if($request->email != 'both' && $request->email != 'clients' && $request->email != 'leads'){
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->with($this->message($validator->errors()->first(), 'danger'));
            }
            $data['emails'] = [$request->email];
            $data['total'] = 1;
            $data['sent'] = 1;
        }
        else{
            $building = Helpers::building_detail();
            $leads = BuildingSale::where('order_type','lead');
            $clients = BuildingSale::whereIn('building_id', $building->pluck('id')->toArray())->where('order_type','sale');
            if (Auth::user()->roles[0]->name == 'sale_person') {
                $leads->where('user_id', Auth::id());
                $clients->where('user_id', Auth::id());
            }
            $leads->pluck('customer_id')->toArray();
            $clients->pluck('customer_id')->toArray();
            $both = array_merge($leads,$clients);

            if($request->email == 'leads'){
                $users = $leads;
            }
            elseif($request->email == 'clients'){
                $users = $clients;
            }
            elseif($request->email == 'both'){
                $users = $both;
            }
            else{
                $users = [];
            }
            $email_list = User::whereIn('id',$both)->pluck('email')->toArray();
            $data['total'] = count($email_list);
            $data['emails'] = array_filter($email_list);
            $data['sent'] = count($data['emails']);
        }
        if(isset($request->images)){
            $images = $request->images;
            foreach($images as $img){
                $ext = $img->getClientOriginalExtension();
                $name = time().'-'.rand().'.'.$ext;
                $path = 'mail-media';
                $img->move(public_path($path),$name);
                $data['image'][] = 'public/'.$path."/".$name;
            }
        }
        else{
            $data['image'] = [];
        }
        try {
            foreach($data['emails'] as $email){
                $data['email'] = $email;
                Mail::send('mail.email_template', $data, function($message) use($data) {
                    $message->to($data['email'])->subject($data['subject']);
                });
                if (!Mail::failures()) {
                    $email_history = new EmailHistory();
                    $email_history->send_by = Auth::user()->id;
                    $email_history->to = $email;
                    $email_history->subject = $data['subject'];
                    $email_history->body = $data['body'];
                    $email_history->images = implode(',',$data['image']);
                    $email_history->date = date('Y-m-d H:i:s');
                    $email_history->save();
                }
            }
            return redirect()->route('property_manager.email.compose',Helpers::user_login_route()['panel'])->with($this->message($data['sent'].' of '.$data['total'].' Email Sent Successfully', 'success'));
        }
        catch(Exception $e) {
            return redirect()->back()->with($this->message('Email Sent Error', 'danger'));
        }
    }
    public function send_email(){
        $email_histories = EmailHistory::where('send_by',Auth::user()->id)->get();
        return view('property.email.sent',compact('email_histories'));
    }
    public function email_destroy($panel,$id){
        $email_history = EmailHistory::findOrFail($id);
        $email_history->delete();
        if($email_history){
            return response()->json(['status' => 'success', 'message' =>  'Email Delete Successfully']);
        } else{
            return response()->json(['status' => 'error', 'message' =>  'Email Delete Error']);
        }
    }

    public function email_forward(Request $request,$panel,$id)
    {
        $mail = EmailHistory::findOrFail($id);
        $data['subject'] = $request->subject;
        $data['body'] = $request->body;
        if($request->email != 'both' && $request->email != 'clients' && $request->email != 'leads'){
        $validator = Validator::make($request->all(), [
            'email' => 'email',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with($this->message($validator->errors()->first(), 'danger'));
        }
        $data['emails'] = [$request->email];
        $data['total'] = 1;
        $data['sent'] = 1;
    }
    else{
        $building = Helpers::building_detail();
        $leads = BuildingSale::where('order_type','lead');
        $clients = BuildingSale::whereIn('building_id', $building->pluck('id')->toArray())->where('order_type','sale');
        if (Auth::user()->roles[0]->name == 'sale_person') {
            $leads->where('user_id', Auth::id());
            $clients->where('user_id', Auth::id());
        }
        $leads->pluck('customer_id')->toArray();
        $clients->pluck('customer_id')->toArray();
        $both = array_merge($leads,$clients);

        if($request->email == 'leads'){
            $users = $leads;
        }
        elseif($request->email == 'clients'){
            $users = $clients;
        }
        elseif($request->email == 'both'){
            $users = $both;
        }
        else{
            $users = [];
        }
        $email_list = User::whereIn('id',$both)->pluck('email')->toArray();
        $data['total'] = count($email_list);
        $data['emails'] = array_filter($email_list);
        $data['sent'] = count($data['emails']);
    }

    }
}
