<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Account;

class OrderController extends Controller
{
    public function getList(){
    	$data['acclist'] = Account::where('id', '>',0)->paginate(8);
    	$data['cateleft'] = 'order';
    	return view('backend.order',$data);
    }
}
