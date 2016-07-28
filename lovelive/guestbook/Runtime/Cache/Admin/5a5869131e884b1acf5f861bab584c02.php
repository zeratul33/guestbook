<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加用户</title>
    <link href="/lovelive/./guestbook//Admin/Tpl/Public/css/tableCSS.css" rel="stylesheet">
    <script src="/lovelive/./guestbook//Admin/Tpl/Public/js/jquery-2.1.4.js"></script>
    <script>
        $(function(){
            $(".add-role").click(function(){
                var obj = $(this).parents('tr').clone();
                obj.find('.add-role').remove();
                $("#last").before(obj);
            });
        })
    </script>
</head>
<body>
<form action='<?php echo U("Admin/Rbac/addUserHandle");?>' method="post">
    <table class="table">
        <tr>
            <th colspan="2">添加用户</th>
        </tr>
        <tr>
            <td>用户名:</td>
            <td><input type="text" name="username" ></td>
        </tr>
        <tr>
            <td>密码:</td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td>所属角色</td>
            <td><select name="role_id[]">
                    <option value="">请选择</option>
                    <?php if(is_array($role)): foreach($role as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["name"]); ?>(<?php echo ($v["remark"]); ?>)</option><?php endforeach; endif; ?>
                </select>
                <span class="add-role">增加角色栏</span>
            </td>
        </tr>
        <tr id="last">
            <td colspan="2">
                <input type="submit">
            </td>
        </tr>
    </table>
</form>
</body>
</html>