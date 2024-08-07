<?php

return [
    /*
    |------------------------------------------------- -------------------------
    | Table Columns
    |------------------------------------------------- -------------------------
    */

    'column.name' => 'Имя',
    'column.guard_name' => 'Guard',
    'column.roles' => 'Роли',
    'column.permissions' => 'Разрешения',
    'column.updated_at' => 'Обновлено',

    /*
    |------------------------------------------------- -------------------------
    | Form Fields
    |------------------------------------------------- -------------------------
    */

    'field.name' => 'Имя',
    'field.guard_name' => 'Guard',
    'field.permissions' => 'Разрешения',
    'field.select_all.name' => 'Выбрать все',
    'field.select_all.message' => 'Включить все разрешения, которые <span class="text-primary font-medium">Доступны</span> для этой роли',

    /*
    |------------------------------------------------- -------------------------
    | Navigation & Resource
    |------------------------------------------------- -------------------------
    */

    'nav.group' => 'Пользователи',
    'nav.role.label' => 'Роли',
    'nav.role.icon' => 'heroicon-o-shield-check',
    'resource.label.role' => 'Роль',
    'resource.label.roles' => 'Роли',

    /*
    |------------------------------------------------- -------------------------
    | Section & Tabs
    |------------------------------------------------- -------------------------
    */

    'section' => 'Сути',
    'resources' => 'Ресурсы',
    'widgets' => 'Виджеты',
    'pages' => 'Страницы',
    'custom' => 'Пользовательские разрешения',

    /*
    |------------------------------------------------- -------------------------
    | Messages
    |------------------------------------------------- -------------------------
    */

    'forbidden' => 'У вас нет доступа',

    /*
    |------------------------------------------------- -------------------------
    | Resource Permissions' Labels
    |------------------------------------------------- -------------------------
    */

    'resource_permission_prefixes_labels' => [
        'view' => 'Просмотр (view)',
        'view_any' => 'Любой может просмотреть (view_any)',
        'create' => 'Создание (create)',
        'update' => 'Обновление (update)',
        'delete' => 'Удаление (delete)',
        'delete_any' => 'Любой может удалить (delete_any)',
        'force_delete' => 'Принудительно удалить (force_delete)',
        'force_delete_any' => 'Может принудительно удалить любой (force_delete_any)',
        'restore' => 'Восстановление (restore)',
        'reorder' => 'Изменение порядка (reorder)',
        'restore_any' => 'Любой может восстановить (restore_any)',
        'replicate' => 'Копировать (replicate)',
    ],
];
