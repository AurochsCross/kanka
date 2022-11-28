<?php

return [
    'actions'       => [
        'add_appearance'    => '添加外观',
        'add_organisation'  => '添加组织',
        'add_personality'   => '添加个性',
    ],
    'conversations' => [
        'title' => ':name的对话',
    ],
    'create'        => [
        'title' => '新角色',
    ],
    'destroy'       => [],
    'dice_rolls'    => [
        'hint'  => '可以为一名角色分配此属性以供游戏使用。',
        'title' => ':name的掷骰',
    ],
    'edit'          => [],
    'fields'        => [
        'age'                       => '年龄',
        'families'                  => '家族',
        'is_dead'                   => '死亡',
        'is_personality_visible'    => '个性可见',
        'life'                      => '生活状况',
        'physical'                  => '躯体特征',
        'pronouns'                  => '人称代词',
        'sex'                       => '性别',
        'title'                     => '头衔/称号',
        'traits'                    => '特质',
    ],
    'helpers'       => [
        'age'   => '你也可以将此实体与战役的日历相链接以自动计算其年龄。:more。',
    ],
    'hints'         => [
        'is_dead'                   => '这个角色已经死亡',
        'is_personality_visible'    => '取消勾选来向非管理员用户隐藏该角色的个性特质。',
        'personality_not_visible'   => '该角色的个性特征目前仅有管理员可见。',
        'personality_visible'       => '该角色的个性特征目前为所有人可见。',
    ],
    'index'         => [],
    'items'         => [
        'hint'  => '分配给该角色的道具将会展示在这里。',
        'title' => ':name的物品',
    ],
    'journals'      => [
        'title' => ':name的日志',
    ],
    'maps'          => [
        'title' => ':name的关系图',
    ],
    'organisations' => [
        'actions'       => [
            'add'   => '添加至组织',
        ],
        'create'        => [
            'success'   => '角色成功添加至组织。',
            'title'     => '为:name创建新组织',
        ],
        'destroy'       => [
            'success'   => '成功移除角色组织。',
        ],
        'edit'          => [
            'success'   => '成功更新角色组织。',
            'title'     => '为:name更新组织',
        ],
        'fields'        => [
            'organisation'  => '组织',
            'role'          => '职位',
        ],
        'hint'          => '角色可以是许多组织的成员。这代表着他们为谁工作，或者是什么隐秘社会的一份子。',
        'placeholders'  => [
            'organisation'  => '选择一个组织...',
        ],
        'title'         => ':name的组织',
    ],
    'placeholders'  => [
        'age'               => '年龄',
        'appearance_entry'  => '描述',
        'appearance_name'   => '头发，眼睛，皮肤，身高',
        'personality_entry' => '细节',
        'personality_name'  => '目标，行为方式，恐惧之物，情感牵绊',
        'physical'          => '躯体特征',
        'pronouns'          => '他/她/它/他们 等',
        'sex'               => '性别',
        'title'             => '头衔/称号',
        'traits'            => '特质',
        'type'              => 'NPC，玩家角色，神明',
    ],
    'quests'        => [
        'helpers'   => [
            'quest_giver'   => '该角色发布的任务。',
            'quest_member'  => '该角色参与的任务。',
        ],
    ],
    'sections'      => [
        'appearance'    => '外貌',
        'general'       => '一般信息',
        'personality'   => '个性',
    ],
    'show'          => [
        'tabs'  => [
            'organisations' => '组织',
        ],
    ],
    'warnings'      => [
        'personality_hidden'    => '你无权编辑这个角色的个性特征。',
    ],
];
