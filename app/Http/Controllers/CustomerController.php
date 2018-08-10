<?php

/**
 * Created by PhpStorm.
 * User: tuantruong
 * Date: 7/11/18
 * Time: 11:32 AM.
 */

namespace App\Http\Controllers;

use App\Http\Models\User;
use App\MyCore\Routing\MyController;
use Illuminate\Http\Request;

class CustomerController extends MyController
{
    public $data = array();
    public $_model;
    public $_inputs = array();

    public function __construct()
    {
        parent::__construct();
//        $this->_model = new User();
//        $this->_inputs = \Request::all();
        $this->data['params'] = $this->_inputs;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getShowAll()
    {
        return view('customer.show-all');
    }

    public function getAjaxData(Request $request)
    {
        $filters = array(
            'offset' => (int) $request->input('offset', 0),
            'limit' => (int) $request->input('limit', PAGE_LIST_COUNT),
            'sort' => $request->input('sort', 'user_id'),
            'order' => $request->input('order', 'asc'),
        );

        if (isset($request['email'])) {
            $filters['email'] = $request['email'];
        }
        if (isset($request['phone'])) {
            $filters['phone'] = $request['phone'];
        }
        if (isset($request['name'])) {
            $filters['name'] = $request['name'];
        }
        if (isset($request['address'])) {
            $filters['address'] = $request['address'];
        }
        if (isset($request['created_time_from'])) {
            $filters['created_time_from'] = $request['created_time_from'];
        }
        if (isset($request['created_time_to'])) {
            $filters['created_time_to'] = $request['created_time_to'];
        }

        $request = $this->callApi('GET', 'http://api.openstack.fdrive.vn/api/users/search', $filters);
        $data = $request['data'];

        return response()->json([
            'total' => $data['total'],
            'rows' => $data['data'],
        ]);
    }
}
