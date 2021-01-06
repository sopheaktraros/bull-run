<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Subscription;
use App\Models\Subscriber;
use App\Models\Package;
use App\Models\PackagePermission;
use App\Models\SubscriberBranch;
use App\Models\SubscriberCounter;
use App\Models\SubscriberRole;
use App\Models\SubscriberPermission;
use App\Models\SubscriberUser;
use App\Http\Resources\SubscriptionResource;

class SubscriptionController extends Controller
{

    private $subscriber_id;
    private $package_id;
    private $branch_id;
    private $counter_id;
    private $role_id;
    private $first_name;
    private $last_name;
    private $email;
    private $phone;
    private $username;
    private $password;
    private $isChange;

    public function set_subscriber_id($subscriber_id){$this->subscriber_id = $subscriber_id;}
    public function set_package_id($package_id){$this->package_id = $package_id;}
    public function set_branch_id($branch_id){$this->branch_id = $branch_id;}
    public function set_counter_id($counter_id){$this->counter_id = $counter_id;}
    public function set_role_id($role_id){$this->role_id = $role_id;}
    public function set_first_name($first_name){$this->first_name = $first_name;}
    public function set_last_name($last_name){$this->last_name = $last_name;}
    public function set_email($email){$this->email = $email;}
    public function set_phone($phone){$this->phone = $phone;}
    public function set_username($username){$this->username = $username;}
    public function set_password($password){$this->password = $password;}
    public function set_isChange($isChange){$this->isChange = $isChange;}

    public function get_subscriber_id(){return $this->subscriber_id;}
    public function get_package_id(){return $this->package_id;}
    public function get_branch_id(){return $this->branch_id;}
    public function get_counter_id(){return $this->counter_id;}
    public function get_role_id(){return $this->role_id;}
    public function get_first_name(){return $this->first_name;}
    public function get_last_name(){return $this->last_name;}
    public function get_email(){return $this->email;}
    public function get_phone(){return $this->phone;}
    public function get_username(){return $this->username;}
    public function get_password(){return $this->password;}
    public function get_isChange(){return $this->isChange;}

    public function __construct()
    {
        $this->Subscription = new Subscription;
        $this->Subscriber = new Subscriber;
        $this->Package = new Package;
        $this->PackagePermission = new PackagePermission;
        $this->SubscriberBranch = new SubscriberBranch;
        $this->SubscriberRole = new SubscriberRole;
        $this->SubscriberPermission = new SubscriberPermission;
        $this->SubscriberUser = new SubscriberUser;
        $this->SubscriberCounter = new SubscriberCounter;
    }

    public function index()
    {
        return view('admin.subscription.index');
    }

    public function response(){
        $data = $this->Subscription->get();
        
        $result = SubscriptionResource::collection($data);

        return $result;
    }

    public function create()
    {
        return view('admin.subscription.create')->with([
            "subscriber" => $this->Subscriber->where("status","ENABLE")->get(),
            "subscription" => $this->Subscription->select('subscriber_id')->pluck('subscriber_id')->all(),
            "package" => $this->Package->where([
                ['status', '=', 'ENABLE'],
                ['id', '!=', '1'],
            ])->get()
        ]);
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'subscriber_id' => 'required',
            'package_id' => 'required',
            'price' => 'required',
            'started_date' => 'required',
            'period' => 'required',
        ]);

        $requestData = $request->all();

        $this->set_subscriber_id($request->subscriber_id);
        $this->set_package_id($request->package_id);
        $this->set_first_name($request->first_name);
        $this->set_last_name($request->last_name);
        $this->set_email($request->email);
        $this->set_phone($request->phone);

        $requestData["due_date"] = date('Y-m-d', strtotime("+".$request->period." month", strtotime($request->started_date)));
        $requestData["lifetime"] = $this->Package->where('id', $this->get_package_id())->first()->lifetime;

        $this->Subscription->create($requestData);

        $this->generateSubscriberBranch();

        return redirect('subscription');
    }

    public function generateSubscriberBranch(){
        $branchData = array(
            "subscriber_id" => $this->get_subscriber_id(),
            "name" => "Head Office"
        );

        $id = $this->SubscriberBranch->create($branchData)->id;
        $this->set_branch_id($id);

        $this->generateSubscriberRole();
    }

    public function generateSubscriberRole(){
        $roleData = array(
            "subscriber_id" => $this->get_subscriber_id(),
            "name" => "Admin"
        );

        $id = $this->SubscriberRole->create($roleData)->id;
        $this->set_role_id($id);

        $this->generateSubscriberPermission();
    }

    public function generateSubscriberPermission(){
        DB::statement('
            INSERT INTO subscriber_permissions(subscriber_id, package_permission_id, subscriber_role_id,`name_en`,`name_kh`,`group`,`order`,control,icon,enable,`active`,`write`,`update`,`delete`,`viewable`) 
            SELECT '.$this->get_subscriber_id().', id, '.$this->get_role_id().',`name_en`,`name_kh`,`group`,`order`,control,icon,`enable`,if(`enable` = 0, 0, `active`),`write`,`update`,`delete`,`viewable` from package_permissions where package_id = '.$this->get_package_id().' order by `group` and `order`
        ');

        
        $this->generateSubscriberCounter();
    }

    public function generateSubscriberCounter(){
        $counterData = array(
            "subscriber_id" => $this->get_subscriber_id(),
            "branch_id" => $this->get_branch_id(),
            "name" => "Admin",
            "is_main" => 1,
            "description" => "Default Counter"
        );

        $id = $this->SubscriberCounter->create($counterData)->id;
        $this->set_counter_id($id);

        $this->generateSubscriberUser();
    }

    public function generateSubscriberUser(){
        $userData = array(
            "subscriber_id" => $this->get_subscriber_id(),
            "subscriber_role_id" => $this->get_role_id(),
            "subscriber_branch_id" => $this->get_branch_id(),
            "subscriber_counter_id" => $this->get_counter_id(),
            "first_name" => $this->get_first_name(),
            "last_name" => $this->get_last_name(),
            "email" => $this->get_email(),
            "phone" => $this->get_phone(),
            "username" => "admin".$this->get_subscriber_id(),
            "password" => Hash::make("admin".$this->get_subscriber_id())
        );

        $this->SubscriberUser->create($userData);

        $this->generateSubscriberCurrency();
    }

    public function generateSubscriberCurrency(){
        DB::statement('
            INSERT INTO currency(subscriber_id, flag, country,`keyword`,`symbol`,`khmer_keyword`,lowest_amount,`sort`,`show`,is_main) 
            SELECT '.$this->get_subscriber_id().', flag, country,`keyword`,`symbol`,`khmer_keyword`,lowest_amount,`sort`,`show`,0 from currency where subscriber_id = 0 order by id
        ');
    }

    public function edit($id)
    {
        $subscription = $this->Subscription->findOrFail($id);

        return view('admin.subscription.edit')->with([
            "subscription" => $subscription,
            "subscriber_user" => $this->SubscriberUser->where(["is_main" => 1, "subscriber_id" => $subscription->subscriber_id])->first(),
            "subscriber" => $this->Subscriber->where("status","ENABLE")->get(),
            "package" => $this->Package->where([
                ['status', '=', 'ENABLE'],
                ['id', '!=', '1'],
            ])->get()
        ]);
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'subscriber_id' => 'required',
            'package_id' => 'required',
            'price' => 'required',
            'started_date' => 'required'
        ]);

        $requestData = $request->all();

        $this->set_subscriber_id($request->subscriber_id);
        $this->set_package_id($request->package_id);
        $this->set_first_name($request->first_name);
        $this->set_last_name($request->last_name);
        $this->set_email($request->email);
        $this->set_phone($request->phone);
        $this->set_isChange(0);

        if($request->period != null){
            $requestData["due_date"] = date('Y-m-d', strtotime("+".$request->period." month", strtotime($request->started_date)));
            $this->set_isChange(1);
        }
        $requestData["lifetime"] = $this->Package->where('id', $this->get_package_id())->first()->lifetime;
        
        $subscription = $this->Subscription->findOrFail($id);

        $subscription->update($requestData);

        $this->updateSubscriberUser();

        return redirect('subscription');
    }

    public function updateSubscriberUser(){
        
        $this->SubscriberUser->update([
            "first_name" => $this->get_first_name(),
            "last_name" => $this->get_last_name(),
            "email" => $this->get_email(),
            "phone" => $this->get_phone(),
        ]);

        $this->updateSubscriptionPermission();
    }

    public function updateSubscriptionPermission(){
        if($this->get_isChange() == 1){
            $permission = $this->PackagePermission->where('package_id','=',$this->get_package_id())->get();
            foreach($permission as $p){
                $data = array(
                    "package_permission_id" => $p->id,
                    "active" => $p->enable,
                    "enable" => $p->enable,
                    "control" => $p->control
                );

                $this->SubscriberPermission->where([
                    'subscriber_id' => $this->get_subscriber_id(),
                    'group' => $p->group,
                    'order' => $p->order
                ])->update($data);
            }
        }
    }
    
    public function destroy($id)
    {
        $package = $this->Package->findOrFail($id);

        $packageData["status"] = 'DISABLE';

        $package->update($packageData);
        
        return redirect()->back();
    }
}
