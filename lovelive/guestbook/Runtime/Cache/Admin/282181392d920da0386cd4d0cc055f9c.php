<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>节点列表</title>

</head>
<body>
    <div id="wrap">
        <a href='<?php echo U("Admin/Rbac/addNode");?>'>添加应用</a>
        <?php if(is_array($node)): foreach($node as $key=>$app): ?><div id="app">
                <p>
                <strong><?php echo ($app["title"]); ?></strong>
                [<a href='<?php echo U("Admin/Rbac/addNode",array("pid"=>$app["id"],"level"=>2));?>'>添加控制器</a>]
                    [<a href="">修改</a>]
                    [<a href="">删除</a>]
                </p>
            </div>
            <?php if(is_array($app["child"])): foreach($app["child"] as $key=>$action): ?><dl>
                    <dt><?php echo ($action["title"]); ?></dt>
                    [<a href='<?php echo U("Admin/Rbac/addNode",array("pid"=>$action["id"],"level"=>3));?>'>添加动作方法</a>]
                    [<a href="">修改</a>]
                    [<a href="">删除</a>]
                </dl>
                <?php if(is_array($action["child"])): foreach($action["child"] as $key=>$method): ?><dd><span><?php echo ($method["title"]); ?></span>
                        [<a href="">修改</a>]
                        [<a href="">删除</a>]
                    </dd><?php endforeach; endif; endforeach; endif; endforeach; endif; ?>
    </div>
</body>
</html>