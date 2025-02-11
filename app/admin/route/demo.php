<?php

// +----------------------------------------------------------------------
// | ThinkAdmin
// +----------------------------------------------------------------------
// | 版权所有 2014~2021 广州楚才信息科技有限公司 [ http://www.cuci.cc ]
// +----------------------------------------------------------------------
// | 官方网站: https://thinkadmin.top
// +----------------------------------------------------------------------
// | 开源协议 ( https://mit-license.org )
// | 免费声明 ( https://thinkadmin.top/disclaimer )
// +----------------------------------------------------------------------
// | gitee 代码仓库：https://gitee.com/zoujingli/ThinkAdmin
// | github 代码仓库：https://github.com/zoujingli/ThinkAdmin
// +----------------------------------------------------------------------

use think\admin\service\SystemService;
use think\App;

invoke(function (App $app) {
    /*! 非开发环境，清理限制文件 */
    if ($app->request->isGet() && !SystemService::instance()->checkRunMode()) {
        @unlink("{$app->getBasePath()}admin/controller/api/Update.php");
        @unlink("{$app->getBasePath()}admin/route/demo.php");
        @rmdir("{$app->getBasePath()}admin/route");
        return;
    }
    /*! 演示环境禁止操作路由绑定 */
    if (SystemService::instance()->checkRunMode('demo')) {
        $app->route->post('index/pass', function () {
            return json(['code' => 0, 'info' => '演示环境禁止修改用户密码！']);
        });
        $app->route->post('config/system', function () {
            return json(['code' => 0, 'info' => '演示环境禁止修改系统配置！']);
        });
        $app->route->post('config/storage', function () {
            return json(['code' => 0, 'info' => '演示环境禁止修改系统配置！']);
        });
        $app->route->post('menu', function () {
            return json(['code' => 0, 'info' => '演示环境禁止给菜单排序！']);
        });
        $app->route->post('menu/index', function () {
            return json(['code' => 0, 'info' => '演示环境禁止给菜单排序！']);
        });
        $app->route->post('menu/add', function () {
            return json(['code' => 0, 'info' => '演示环境禁止添加菜单！']);
        });
        $app->route->post('menu/edit', function () {
            return json(['code' => 0, 'info' => '演示环境禁止编辑菜单！']);
        });
        $app->route->post('menu/state', function () {
            return json(['code' => 0, 'info' => '演示环境禁止禁用菜单！']);
        });
        $app->route->post('menu/remove', function () {
            return json(['code' => 0, 'info' => '演示环境禁止删除菜单！']);
        });
        $app->route->post('user/pass', function () {
            return json(['code' => 0, 'info' => '演示环境禁止修改用户密码！']);
        });
    }

});