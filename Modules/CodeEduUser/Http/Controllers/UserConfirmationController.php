<?php

namespace CodeEduUser\Http\Controllers;

use CodeEduUser\Repositories\UserRepository;
use Jrean\UserVerification\Traits\VerifiesUsers;


class UserConfirmationController extends Controller
{
    use VerifiesUsers;
    /**
     * @var \CodeEduUser\Repositories\UserRepository
     */
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

}
