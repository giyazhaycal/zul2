<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Users;

class UsersController extends Controller
{
    public function __construct()
    {
    	$this->data['page_title'] = 'listusers';
    	$this->middleware('auth');
    }
    public function ShowUsers()
    {
    	$this->data['users'] = Users::get();
        return view('list-users',$this->data);
    }

    public function datatable()
    {
        return DataTables::eloquent(Users::query())
     
        ->addColumn('action', function ($row) {
            return '<div class="btn-group">
                        <a href="'.url('gallery/form').'/'.$row->user_cid.'" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
                        <button class="btn btn-xs btn-default" type="button" title="Remove" onclick="mineral_confirm(\''.$row->name.'\',\''.$row->user_cid.'\')"><i class="fa fa-times"></i></button>
                    </div>';
        })
        ->rawColumns(['action'])
        ->toJson();
    }


}
