<?php
/**
 * Created by PhpStorm.
 * User: Zeratul
 * Date: 2016/7/14
 * Time: 18:25
 */
namespace Admin\Model;
use Think\Model\RelationModel;
class UserRelationModel extends RelationModel{
        protected $tableName = 'admin';

        protected $_link = array(
            'role'=>array(
                'mapping_type'=>4,
                'relation_table'=>'ad_role_user',
                'foreign_key'=>'user_id',
                'relation_key'=>'role_id',
                'mapping_fields'=>'id,name,remark',
            )
        );

}
?>