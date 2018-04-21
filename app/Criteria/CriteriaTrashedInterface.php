<?php

namespace App\Criteria;


interface CriteriaTrashedInterface
{
    public function onlyTrashed();
    public function withTrashed();
}