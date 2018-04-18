<?php

namespace App\Criteria;

trait CriteriaOnlyTrashedTrait {

    public function onlyTrashed() {
        $this->pushCriteria(FindOnlyTrashedCriteria::class);
        return $this;
    }

}