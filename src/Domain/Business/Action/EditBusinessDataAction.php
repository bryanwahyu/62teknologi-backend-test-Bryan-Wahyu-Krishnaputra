<?php
namespace Domain\Business\Action;

use Infra\Business\Model\Business;
use Infra\Shared\Foundations\Action;

class EditBusinessDataAction extends Action{
    public function execute(Business $bus,$data){
        $bus->update($data);
    }
}