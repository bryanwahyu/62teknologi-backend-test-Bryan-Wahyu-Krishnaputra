<?php

use App\Http\Controllers\API\V1\Business\GetBusinessController;
use Domain\Business\Action\CreateBusinessDataAction;
use Domain\Business\Action\DeleteBusinessDataAction;
use Domain\Business\Action\EditBusinessDataAction;
use Domain\Business\Action\GetBusinessFromYelpAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Infra\Business\Model\Business;

Route::prefix('business')->group(function () {
    Route::get('search',function(Request $req){
        GetBusinessFromYelpAction::resolve()->execute($req->query());
    });
    Route::post('',function(Request $req){
        CreateBusinessDataAction::resolve()->execute($req->all());
    });
    Route::prefix('{bus}')->group(function(){
        Route::put('', function (Business $bus,Request $req) {
                EditBusinessDataAction::resolve()->execute($bus,$req->all());
        });
        Route::delete('', function (Business $bus) {
            DeleteBusinessDataAction::resolve()->execute($bus);
        });
    });
});