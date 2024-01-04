<?php
namespace Domain\Business\Action;

use Infra\Business\Model\Business;
use Infra\Shared\Foundations\Action;

class DeleteBusinessDataAction extends Action{
    public function execute(Business $bus){
        $bus->delete();
    }
}