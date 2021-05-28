<?php

declare(strict_types=1);

namespace app\api_admin\controller\v1;

use app\api_admin\controller\CommonV1;
use app\api_admin\library\ApiErrorCode;
use app\api_admin\library\ApiHttpReponseCode;
use cigoadmin\controller\Menu as TraitMenu;

class Menu extends CommonV1
{
    use TraitMenu;

    /**
     * 获取树形菜单
     */
    public function index()
    {
        return $this->menuTree();
    }

    /**
     * 获取基础菜单数据
     * @return mixed
     */
    public function base()
    {
        return $this->menuBase();
    }

    public function both()
    {
        return $this->menuBoth();
    }
}
