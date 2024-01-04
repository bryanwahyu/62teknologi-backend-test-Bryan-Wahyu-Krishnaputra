<?php
namespace Infra\Services\Yelp;

use Illuminate\Support\Facades\Http;
use Infra\Shared\Services\BaseServices;

class YelpServicesV3  extends BaseServices{
    public function __construct(){
        $this->key=env("YELP_KEY");
        $this->client_id=env("YELP_CLIENT_ID");
        $this->url=env('YELP_URL').'v3';
    }
    protected function  getAuthHeaders(){
        return [
            'Authorization'=>'Bearer Ubf1-f0uqsJUnssqPMGo-tiFeZTT85oFmKfznlPmjDtX8s83jYMoAb-ApuD63wgq6LDZNsUXG6gurZIVYaj2jzxJmmLdCdXbDqIHU_b6KiCEVi8v-YB0OSsW6MWaY3Yx',
            'Accept'=>'application/json' 
        ];
    }
    public function getBusiness($query){
        $url=$this->buildBusinessSearchUrl($query);
        $headers=$this->getAuthHeaders();
        $response=Http::withHeaders($headers)->get($url);
        return $response->body();
    }
    protected function buildBusinessSearchUrl($query) {
        return $this->url .'/businesses/search?' . http_build_query($query, '', '&');
    }
}
