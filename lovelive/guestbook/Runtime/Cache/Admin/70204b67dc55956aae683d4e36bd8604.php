<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>权限配置</title>
    <script src="/lovelive/./guestbook//Admin/Tpl/Public/js/jquery-2.1.4.js"></script>
    <script>
        $(function(){
            $("input[level=1]").click(function(){

                var inputs = $(this).parents(".app").find("input");

                if ($(this).prop("checked"))
                {

                    inputs.prop("checked",true);
                }
                else inputs.prop('checked',false);
            });
            $("input[level=2]").click(function(){

                var inputs = $(this).parents("dl").find("input");

                if ($(this).prop("checked"))
                {

                    inputs.prop("checked",true);
                }
                else inputs.prop('checked',false);
            });

        })
    </script>
</head>
<body>
<div id="wrap">
    <a href='<?php echo U("Admin/Rbac/role");?>'>返回</a>
    <form action='<?php echo U("Admin/Rbac/setAccess");?>' method="post">
    <?php if(is_array($node)): foreach($node as $key=>$app): ?><div class="app">
            <p>
                <strong><?php echo ($app["title"]); ?></strong>
                <input type="checkbox" name="access[]" value="<?php echo ($app["id"]); ?>_1" level="1" <?php if($app["access"]==1): ?>checked<?php endif; ?>/>
            </p>

        <?php if(is_array($app["child"])): foreach($app["child"] as $key=>$action): ?><dl>
                <dt>
                    <strong><?php echo ($action["title"]); ?></strong>
                    <input type="checkbox" name="access[]" value="<?php echo ($action["id"]); ?>_2" level="2" <?php if($action["access"]==1): ?>checked<?php endif; ?>/>
                </dt>
                <?php if(is_array($action["child"])): foreach($action["child"] as $key=>$method): ?><dd><span><?php echo ($method["title"]); ?></span>
                        <input type="checkbox" name="access[]" value="<?php echo ($method["id"]); ?>_3" level="3" <?php if($method["access"]==1): ?>checked<?php endif; ?>/>
                    </dd><?php endforeach; endif; ?>
            </dl><?php endforeach; endif; ?>
        </div><?php endforeach; endif; ?>
        <input type="hidden" name="rid" value="<?php echo ($rid); ?>">
        <input type="submit">
    </form>
</div>
</body>
</html>