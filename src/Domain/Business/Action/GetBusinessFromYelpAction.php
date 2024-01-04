<?php
namespace Domain\Business\Action;

use Infra\Services\Yelp\YelpServicesV3;
use Infra\Shared\Foundations\Action;

class GetBusinessFromYelpAction extends Action{
    public function execute($query){
        $YelpServices= new YelpServicesV3();
        $data=json_decode($YelpServices->getBusiness($query),true);
        $this->save($data['businesses']);
        return $data['businesses'];
    }
    protected function save($data){
        foreach($data as $item){
        CreateBusinessDataAction::resolve()->execute($item);
        }

    }
}