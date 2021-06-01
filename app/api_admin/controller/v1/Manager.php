<?php

declare(strict_types=1);

namespace app\api_admin\controller\v1;

use app\api_admin\controller\CommonV1;
use app\api_admin\library\ApiErrorCode;
use app\api_admin\library\ApiHttpReponseCode;
use cigoadmin\controller\Manager as TraitManager;
use Think\Exception;

class Manager extends CommonV1
{
    use TraitManager;

    public function login()
    {
        return $this->doLogin();
    }

    public function logout()
    {
        return $this->doLogout();
    }

    public function addManager()
    {
        return $this->add();
    }

    public function editManager()
    {
        return $this->edit();
    }

    public function statusManager()
    {
        return $this->setStatus();
    }

    public function getManagerList()
    {
        return $this->getList();
    }
}
