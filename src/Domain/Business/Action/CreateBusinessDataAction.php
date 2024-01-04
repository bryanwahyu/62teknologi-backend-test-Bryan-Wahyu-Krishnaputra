<?php
namespace Domain\Business\Action;

use Illuminate\Support\Arr;
use Infra\Business\Model\Business;
use Infra\Shared\Foundations\Action;

class CreateBusinessDataAction extends Action{
    public function execute($data){
        Business::create($this->cleaned($data));
        return 0;
        
    }
    public function cleaned($data){
        $keytowanttoStore=['id', 'alias', 'name','is_closed','categories','coordinates','location','price','rating','url','display_phone','rating'];
        $datatoextra=Arr::only($data,$keytowanttoStore);
        $newdata=Arr::except($datatoextra,'id');
        $newdata['categories']=json_encode($newdata['categories']);
        $newdata['coordinates']=json_encode($newdata['coordinates']);
        $newdata['location']=json_encode($newdata['location']);
        $newdata['yelp_id']=$datatoextra['id'];
        dd($newdata);
        return $newdata;
    }
}