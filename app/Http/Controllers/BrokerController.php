<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log; // send notifications via slack or any other means
use Illuminate\Support\Str;

use App\Models\Broker;
use Mail;
use App\Mail\DemoEmail;
use App\Mail\BrokerDenial;
use App\Mail\BrokerAccepted;

class BrokerController extends Controller
{

    private $uploadPath = "uploads/construction/";





    function __construct()
    {
         $this->middleware('permission:project-list|project-create|project-edit|project-delete', ['only' => ['index','show']]);
         $this->middleware('permission:project-create', ['only' => ['create','store']]);
         $this->middleware('permission:project-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:project-delete', ['only' => ['destroy']]);
    }


    public function index() {

        $resource = Broker::select('id', 'status', 'company_name', 'state', 'authorized_p_name', 'authorized_p_contact' )->orderBy('id', 'Desc');


        if($resource->get()->isEmpty()) {
            $this->data['resource_status'] = 'No broker registrations found. You can launch a new project above to start-off';

        } else {
            $this->data['resource'] = $resource->get();

        }

        return view('broker', $this->data);
    }

    public function show($id) {

        $this->data['resource'] = $resource = Broker::with('broker_files')->find($id);

        return view('broker.show.index', $this->data);
    }


    public function verification_denied(Request $request) {
        
        /**CHANGE THE BROKERAGE STATUS */
        $result = Broker::find($request->broker_id);
        $result->status = 2;
        $result->save();

        /**SEND NOTIFICATION TO BROKER VIA EMAIL */
        try{
            $data = [
                'messages' => $request->message,
                'name' => $result->company_name,
            ];
            Mail::mailer('noreply')->to('web@edgerealty.ae')->send(new BrokerDenial($data));

            // if($request->message != ''){
            //     $data = [
            //         'messages' => $request->message,
            //         'name' => $request->result->copmany_name,
            //     ];
            //     Mail::mailer('noreply')->to('as@edgerealty.ae')->send(new BrokerDenial($data));
            // } else {
            //     Mail::mailer('noreply')->to('as@edgerealty.ae')->send(new BrokerDenial());
            // }
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
        return $this->index();
    }


    public function verification_accepted(Request $request) {

        $result = Broker::find($request->broker_id);
        $result->status = 1;
        $result->save();

        try{
            $data = [
                'name' => $result->company_name,
            ];
            Mail::mailer('noreply')->to('web@edgerealty.ae')->send(new BrokerAccepted($data));
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
        return $this->index();
    }

    public function create() {
        return view('broker.create.index');
    }
}
