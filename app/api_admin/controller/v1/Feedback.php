<?php

declare(strict_types=1);

namespace app\api_admin\controller\v1;

use app\api_admin\controller\CommonV1;
use cigoadmin\controller\Feedback as TraitFeedback;

/**
 * Class Feedback
 * @package app\api_admin\controller\v1
 */
class Feedback extends CommonV1
{
    use TraitFeedback;

    /**
     * 添加
     */
    public function add()
    {
        return $this->addFeedBack();
    }
}
