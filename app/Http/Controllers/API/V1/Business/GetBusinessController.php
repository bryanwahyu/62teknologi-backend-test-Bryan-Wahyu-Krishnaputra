<?php
namespace App\Http\Controllers\API\V1\Business;

use Domain\Business\Action\GetBusinessFromYelpAction;
use Illuminate\Http\Request;
use Infra\Shared\Controllers\BaseController;

class GetBusinessController extends BaseController{
    public function __invoke(Request $req)
    {
        $data=GetBusinessFromYelpAction::resolve()->execute($req->query());
        return $data;
    }
}