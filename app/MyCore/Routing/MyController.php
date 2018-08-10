<?php

/**
 * Created by PhpStorm.
 * User: tuantruong
 * Date: 7/20/18
 * Time: 2:59 PM.
 */

namespace App\MyCore\Routing;

use App\Helpers\MyCurl;
use App\Http\Controllers\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class MyController extends BaseController
{
    public $user = null;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            return $next($request);
        });
    }

    /**
     * @param string $method
     * @param $url
     * @param array $var
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function callApi($method = 'GET', $url, $var = array())
    {
        $headers = array(
            'Content-Type: application/json',
            'token: '.session('token'),
        );

        $curl = new MyCurl($headers);
        $response = array();
        switch ($method) {
            case 'GET':
                $response = $curl->get($url, $var);
                break;
            case 'POST':
                $response = $curl->post($url, $var);
                break;
        }
        if ($response === null) {
            session()->flash('msg-error', 'Hệ thống đã xảy ra lỗi, vui lòng thử lại sau.');

            return redirect()->back();
        }

        if (isset($response['code'])) {
            if ($response['code'] == -1) {
                dd($response);
            }
        }

        return $response;
    }
}
