<?php

declare(strict_types=1);

namespace app\api_admin\listener;

use cigoadmin\library\Encrypt;
use cigoadmin\library\ErrorCode;
use cigoadmin\library\HttpReponseCode;
use cigoadmin\library\traites\ApiCommon;
use cigoadmin\model\UserLoginRecord;
use think\facade\Cache;

class CommonLogin
{
    use ApiCommon;

    /**
     * 事件监听处理
     *
     * @return mixed
     */
    public function handle($params)
    {
        $args = $params['args'];
        $moduleName = $params['moduleName'];
        $user = $params['userInfo'];
        //生成token
        $token = Encrypt::makeToken();
        $user->last_log_time = time();
        $user->is_online = 1;
        $user->save();
        Cache::set('user_token_' . $moduleName . '_' . $token, [
            'userId' => $user->id,
            'params' => input()
        ], 7 * 24 * 60 * 60);

        //记录登录信息
        $args['password'] = isset($args['password']) ? Encrypt::encrypt($args['password']) : ''; //避免客户密码泄露
        UserLoginRecord::recordSuccess($user->id, $args);

        abort($this->makeApiReturn(
            "登录成功",
            [
                'userInfo' => $user->hidden(['password']),
            ],
            ErrorCode::OK,
            HttpReponseCode::Success_OK,
            [
                'Cigo-Token' => $token
            ]
        ));

        return false;
    }
}
