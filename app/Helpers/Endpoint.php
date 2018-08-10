<?php
/**
 * Created by PhpStorm.
 * User: tuantruong
 * Date: 7/13/18
 * Time: 10:54 AM
 */

namespace App\Helpers;


class Endpoint
{

    public static $login =                 apiBaseInsight . 'insight/login';


    public static $getShowRoleStaff =      apiBaseInsight . 'insight/authorized/show-role-staff';
    public static $getAjaxRoleStaff =      apiBaseInsight . 'insight/staffs/ajax-data';

    public static $getShowRole =           apiBaseInsight . 'insight/authorized/show-role';
    public static $getAjaxRole =           apiBaseInsight . 'insight/authorized/ajax-role';

    public static $getEditRoleStaff =      apiBaseInsight . 'insight/authorized/edit-role-staff/';
    public static $postEditRoleStaff =     apiBaseInsight . 'insight/authorized/edit-role-staff/';

    public static $getEditPermission =     apiBaseInsight . 'insight/authorized/edit-permission/';
    public static $postEditPermission =    apiBaseInsight . 'insight/authorized/edit-permission/';



    public static $getShowAllStaffs =      apiBaseInsight . 'insight/staffs/show-all';
    public static $ajaxStaff =             apiBaseInsight . 'insight/staffs/ajax-data';
    public static $getEditStaff =          apiBaseInsight . 'insight/staffs/edit/';
    public static $postEditStaff =         apiBaseInsight . 'insight/staffs/edit/';
    public static $getAddStaff =           apiBaseInsight . 'insight/staffs/add';
    public static $postAddStaff =          apiBaseInsight . 'insight/staffs/add';
    public static $postRemove =            apiBaseInsight . 'insight/staffs/remove';
    public static $postTrash =             apiBaseInsight . 'insight/staffs/trash';
    public static $getShowTrash =          apiBaseInsight . 'insight/staffs/show-trash';
    public static $ajaxTrash =             apiBaseInsight . 'insight/staffs/ajax-trash';
    public static $postRestore =           apiBaseInsight . 'insight/staffs/restore';


    public static $getAddServer =          apiBaseInsight . 'insight/fdrive/server/add';
    public static $postAddServer =         apiBaseInsight . 'insight/fdrive/server/add';

    public static $searchServerFdrive =         API_FDRIVE . 'server/search/';
    public static $detailServerFdrive =         API_FDRIVE . 'server/detail/';
    public static $actionServerFdrive =         API_FDRIVE . 'server/action/';
}
