<?php

declare(strict_types=1);

namespace app\api_client\controller\v1;

use app\api_client\controller\CommonV1;
use cigoadmin\controller\User as UserAlias;

class User extends CommonV1
{
    use UserAlias;

    public function loginByPhone()
    {
        return $this->phoneLogin(true);
    }


    public function logout()
    {
        return $this->doLogout();
    }
}
