<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Package;
use App\Models\PackagePermission;
use App\Models\SubscriberPermission;
use App\Models\Subscriber;

class PackagePermissionController extends Controller
{
    public function __construct()
    {
        $this->PackagePermission = new PackagePermission;
        $this->SubscriberPermission = new SubscriberPermission;
        $this->Subscriber = new Subscriber;
        $this->Package = new Package;
    }

    public function index()
    {

        return view('admin.package_permission.index')->with([
            "package" => $this->Package->where("id","!=",1)->get()
        ]);
    }

    public function response($id){
        $menu =$this->PackagePermission->where([
            ['active', '!=', '0'],
            ['order', '=', '0'],
            ['package_id','=',$id]
        ])->orderBy('group')->get();
        $c = count($menu);
        echo '{"Menu":[{';
        foreach($menu as $i){
            
            echo '"menu_id"' . ':"' . $i->id . '"'
                    . ',' . '"menu_name"' . ':"' . $i->name_en . '",' . '"menu_package_id"' . ':"' . $i->package_id . '",' . '"menu_control"' . ':"' . $i->control . '",' . '"menu_order"' . ':"' . $i->order . '",' . '"menu_enable"' . ':"' . $i->enable . '"'
                    . ',' . '"menu_active"' . ':"' . $i->active . '","Submenu":';
                $submenu=$this->PackagePermission->where([['package_id','=',$id],['order','!=',0],['group','=',$i->group],['active','!=',0]])->get();
                echo json_encode($submenu);
                $c --;
                if($c > 0)
                    echo "},{";
        }
        echo "}]}";
    }


    public function update(Request $request){
        
        $permission = $this->PackagePermission->where('package_id','=',$request->package)->get();
       
        foreach($permission as $p){
            $data = array(
                "enable" => $request->input('ck_enable_'.$p->id) == null ? 0 : 1,
                "write" => $request->input('ck_write_'.$p->id) == null ? 0 : 1,
                "update" => $request->input('ck_update_'.$p->id) == null ? 0 : 1,
                "delete" => $request->input('ck_delete_'.$p->id) == null ? 0 : 1,
            );

            $enable = $request->input('ck_enable_'.$p->id) == null ? 0 : 1;
            
            $this->SubscriberPermission->where('package_permission_id',$p->id)->update([
                "active" => $enable,
                "enable" => $enable
            ]);
            
            $this->PackagePermission->where('id',$p->id)->update($data);

        }
        
        return redirect("package_permission");
    }

}
