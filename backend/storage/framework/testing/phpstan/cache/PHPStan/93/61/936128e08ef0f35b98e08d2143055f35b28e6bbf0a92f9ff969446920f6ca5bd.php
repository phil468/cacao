<?php declare(strict_types = 1);

// ftm-C:\projects\cacao\backend\vendor\spatie\laravel-permission\src\Models\Permission.php
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v5-2.3.2',
   'data' => 
  array (
    0 => 
    array (
      '739196ef5d72a7e634ce96dcdee72a41' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Spatie\\Permission\\Models',
         'uses' => 
        array (
          'collection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'carbon' => 'Illuminate\\Support\\Carbon',
          'permissioncontract' => 'Spatie\\Permission\\Contracts\\Permission',
          'permissionalreadyexists' => 'Spatie\\Permission\\Exceptions\\PermissionAlreadyExists',
          'permissiondoesnotexist' => 'Spatie\\Permission\\Exceptions\\PermissionDoesNotExist',
          'guard' => 'Spatie\\Permission\\Guard',
          'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
          'hasroles' => 'Spatie\\Permission\\Traits\\HasRoles',
          'refreshespermissioncache' => 'Spatie\\Permission\\Traits\\RefreshesPermissionCache',
        ),
         'className' => 'Spatie\\Permission\\Models\\Permission',
         'functionName' => NULL,
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '5ea4f5a583ec65e7435a25b56e368705' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Spatie\\Permission\\Traits',
         'uses' => 
        array (
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'arr' => 'Illuminate\\Support\\Arr',
          'collection' => 'Illuminate\\Support\\Collection',
          'permission' => 'Spatie\\Permission\\Contracts\\Permission',
          'role' => 'Spatie\\Permission\\Contracts\\Role',
          'roleattached' => 'Spatie\\Permission\\Events\\RoleAttached',
          'roledetached' => 'Spatie\\Permission\\Events\\RoleDetached',
          'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
        ),
         'className' => 'Spatie\\Permission\\Models\\Permission',
         'functionName' => NULL,
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Spatie\\Permission\\Traits\\HasRoles',
         'traitData' => 
        array (
          0 => 'C:\\projects\\cacao\\backend\\vendor\\spatie\\laravel-permission\\src\\Models\\Permission.php',
          1 => 'Spatie\\Permission\\Models\\Permission',
          2 => 'Spatie\\Permission\\Traits\\HasRoles',
          3 => NULL,
          4 => NULL,
        ),
      )),
      '7c30bef9d7318ee0efd8e962e55614dd' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Spatie\\Permission\\Traits',
         'uses' => 
        array (
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'arr' => 'Illuminate\\Support\\Arr',
          'collection' => 'Illuminate\\Support\\Collection',
          'permission' => 'Spatie\\Permission\\Contracts\\Permission',
          'role' => 'Spatie\\Permission\\Contracts\\Role',
          'wildcard' => 'Spatie\\Permission\\Contracts\\Wildcard',
          'permissionattached' => 'Spatie\\Permission\\Events\\PermissionAttached',
          'permissiondetached' => 'Spatie\\Permission\\Events\\PermissionDetached',
          'guarddoesnotmatch' => 'Spatie\\Permission\\Exceptions\\GuardDoesNotMatch',
          'permissiondoesnotexist' => 'Spatie\\Permission\\Exceptions\\PermissionDoesNotExist',
          'wildcardpermissioninvalidargument' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionInvalidArgument',
          'wildcardpermissionnotimplementscontract' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionNotImplementsContract',
          'guard' => 'Spatie\\Permission\\Guard',
          'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
          'wildcardpermission' => 'Spatie\\Permission\\WildcardPermission',
        ),
         'className' => 'Spatie\\Permission\\Models\\Permission',
         'functionName' => NULL,
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Spatie\\Permission\\Traits\\HasPermissions',
         'traitData' => 
        array (
          0 => 'C:\\projects\\cacao\\backend\\vendor\\spatie\\laravel-permission\\src\\Models\\Permission.php',
          1 => 'Spatie\\Permission\\Models\\Permission',
          2 => 'Spatie\\Permission\\Traits\\HasPermissions',
          3 => 'Spatie\\Permission\\Traits\\HasRoles',
          4 => NULL,
        ),
      )),
      '604496125c647f32a3f61d961abc4516' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Spatie\\Permission\\Traits',
         'uses' => 
        array (
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'arr' => 'Illuminate\\Support\\Arr',
          'collection' => 'Illuminate\\Support\\Collection',
          'permission' => 'Spatie\\Permission\\Contracts\\Permission',
          'role' => 'Spatie\\Permission\\Contracts\\Role',
          'wildcard' => 'Spatie\\Permission\\Contracts\\Wildcard',
          'permissionattached' => 'Spatie\\Permission\\Events\\PermissionAttached',
          'permissiondetached' => 'Spatie\\Permission\\Events\\PermissionDetached',
          'guarddoesnotmatch' => 'Spatie\\Permission\\Exceptions\\GuardDoesNotMatch',
          'permissiondoesnotexist' => 'Spatie\\Permission\\Exceptions\\PermissionDoesNotExist',
          'wildcardpermissioninvalidargument' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionInvalidArgument',
          'wildcardpermissionnotimplementscontract' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionNotImplementsContract',
          'guard' => 'Spatie\\Permission\\Guard',
          'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
          'wildcardpermission' => 'Spatie\\Permission\\WildcardPermission',
        ),
         'className' => 'Spatie\\Permission\\Models\\Permission',
         'functionName' => 'bootHasPermissions',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Spatie\\Permission\\Traits\\HasPermissions',
         'traitData' => 
        array (
          0 => 'C:\\projects\\cacao\\backend\\vendor\\spatie\\laravel-permission\\src\\Models\\Permission.php',
          1 => 'Spatie\\Permission\\Models\\Permission',
          2 => 'Spatie\\Permission\\Traits\\HasPermissions',
          3 => 'Spatie\\Permission\\Traits\\HasRoles',
          4 => NULL,
        ),
      )),
      '522743a3d69eaceb2dcfa1bbbd2c296b' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Spatie\\Permission\\Traits',
         'uses' => 
        array (
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'arr' => 'Illuminate\\Support\\Arr',
          'collection' => 'Illuminate\\Support\\Collection',
          'permission' => 'Spatie\\Permission\\Contracts\\Permission',
          'role' => 'Spatie\\Permission\\Contracts\\Role',
          'wildcard' => 'Spatie\\Permission\\Contracts\\Wildcard',
          'permissionattached' => 'Spatie\\Permission\\Events\\PermissionAttached',
          'permissiondetached' => 'Spatie\\Permission\\Events\\PermissionDetached',
          'guarddoesnotmatch' => 'Spatie\\Permission\\Exceptions\\GuardDoesNotMatch',
          'permissiondoesnotexist' => 'Spatie\\Permission\\Exceptions\\PermissionDoesNotExist',
          'wildcardpermissioninvalidargument' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionInvalidArgument',
          'wildcardpermissionnotimplementscontract' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionNotImplementsContract',
          'guard' => 'Spatie\\Permission\\Guard',
          'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
          'wildcardpermission' => 'Spatie\\Permission\\WildcardPermission',
        ),
         'className' => 'Spatie\\Permission\\Models\\Permission',
         'functionName' => 'getPermissionClass',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Spatie\\Permission\\Traits\\HasPermissions',
         'traitData' => 
        array (
          0 => 'C:\\projects\\cacao\\backend\\vendor\\spatie\\laravel-permission\\src\\Models\\Permission.php',
          1 => 'Spatie\\Permission\\Models\\Permission',
          2 => 'Spatie\\Permission\\Traits\\HasPermissions',
          3 => 'Spatie\\Permission\\Traits\\HasRoles',
          4 => NULL,
        ),
      )),
      'a1812689fb536cb8ec5161f6f76ef214' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Spatie\\Permission\\Traits',
         'uses' => 
        array (
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'arr' => 'Illuminate\\Support\\Arr',
          'collection' => 'Illuminate\\Support\\Collection',
          'permission' => 'Spatie\\Permission\\Contracts\\Permission',
          'role' => 'Spatie\\Permission\\Contracts\\Role',
          'wildcard' => 'Spatie\\Permission\\Contracts\\Wildcard',
          'permissionattached' => 'Spatie\\Permission\\Events\\PermissionAttached',
          'permissiondetached' => 'Spatie\\Permission\\Events\\PermissionDetached',
          'guarddoesnotmatch' => 'Spatie\\Permission\\Exceptions\\GuardDoesNotMatch',
          'permissiondoesnotexist' => 'Spatie\\Permission\\Exceptions\\PermissionDoesNotExist',
          'wildcardpermissioninvalidargument' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionInvalidArgument',
          'wildcardpermissionnotimplementscontract' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionNotImplementsContract',
          'guard' => 'Spatie\\Permission\\Guard',
          'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
          'wildcardpermission' => 'Spatie\\Permission\\WildcardPermission',
        ),
         'className' => 'Spatie\\Permission\\Models\\Permission',
         'functionName' => 'getWildcardClass',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Spatie\\Permission\\Traits\\HasPermissions',
         'traitData' => 
        array (
          0 => 'C:\\projects\\cacao\\backend\\vendor\\spatie\\laravel-permission\\src\\Models\\Permission.php',
          1 => 'Spatie\\Permission\\Models\\Permission',
          2 => 'Spatie\\Permission\\Traits\\HasPermissions',
          3 => 'Spatie\\Permission\\Traits\\HasRoles',
          4 => NULL,
        ),
      )),
      '32fa40ce30fcbe0dec0177f8370e4c8b' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Spatie\\Permission\\Traits',
         'uses' => 
        array (
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'arr' => 'Illuminate\\Support\\Arr',
          'collection' => 'Illuminate\\Support\\Collection',
          'permission' => 'Spatie\\Permission\\Contracts\\Permission',
          'role' => 'Spatie\\Permission\\Contracts\\Role',
          'wildcard' => 'Spatie\\Permission\\Contracts\\Wildcard',
          'permissionattached' => 'Spatie\\Permission\\Events\\PermissionAttached',
          'permissiondetached' => 'Spatie\\Permission\\Events\\PermissionDetached',
          'guarddoesnotmatch' => 'Spatie\\Permission\\Exceptions\\GuardDoesNotMatch',
          'permissiondoesnotexist' => 'Spatie\\Permission\\Exceptions\\PermissionDoesNotExist',
          'wildcardpermissioninvalidargument' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionInvalidArgument',
          'wildcardpermissionnotimplementscontract' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionNotImplementsContract',
          'guard' => 'Spatie\\Permission\\Guard',
          'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
          'wildcardpermission' => 'Spatie\\Permission\\WildcardPermission',
        ),
         'className' => 'Spatie\\Permission\\Models\\Permission',
         'functionName' => 'permissions',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Spatie\\Permission\\Traits\\HasPermissions',
         'traitData' => 
        array (
          0 => 'C:\\projects\\cacao\\backend\\vendor\\spatie\\laravel-permission\\src\\Models\\Permission.php',
          1 => 'Spatie\\Permission\\Models\\Permission',
          2 => 'Spatie\\Permission\\Traits\\HasPermissions',
          3 => 'Spatie\\Permission\\Traits\\HasRoles',
          4 => NULL,
        ),
      )),
      '6ef7b580c0764ecaac17c1778a7e662f' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Spatie\\Permission\\Traits',
         'uses' => 
        array (
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'arr' => 'Illuminate\\Support\\Arr',
          'collection' => 'Illuminate\\Support\\Collection',
          'permission' => 'Spatie\\Permission\\Contracts\\Permission',
          'role' => 'Spatie\\Permission\\Contracts\\Role',
          'wildcard' => 'Spatie\\Permission\\Contracts\\Wildcard',
          'permissionattached' => 'Spatie\\Permission\\Events\\PermissionAttached',
          'permissiondetached' => 'Spatie\\Permission\\Events\\PermissionDetached',
          'guarddoesnotmatch' => 'Spatie\\Permission\\Exceptions\\GuardDoesNotMatch',
          'permissiondoesnotexist' => 'Spatie\\Permission\\Exceptions\\PermissionDoesNotExist',
          'wildcardpermissioninvalidargument' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionInvalidArgument',
          'wildcardpermissionnotimplementscontract' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionNotImplementsContract',
          'guard' => 'Spatie\\Permission\\Guard',
          'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
          'wildcardpermission' => 'Spatie\\Permission\\WildcardPermission',
        ),
         'className' => 'Spatie\\Permission\\Models\\Permission',
         'functionName' => 'scopePermission',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Spatie\\Permission\\Traits\\HasPermissions',
         'traitData' => 
        array (
          0 => 'C:\\projects\\cacao\\backend\\vendor\\spatie\\laravel-permission\\src\\Models\\Permission.php',
          1 => 'Spatie\\Permission\\Models\\Permission',
          2 => 'Spatie\\Permission\\Traits\\HasPermissions',
          3 => 'Spatie\\Permission\\Traits\\HasRoles',
          4 => NULL,
        ),
      )),
      '6c6c849c2cb62f08b3376a8b9856039f' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Spatie\\Permission\\Traits',
         'uses' => 
        array (
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'arr' => 'Illuminate\\Support\\Arr',
          'collection' => 'Illuminate\\Support\\Collection',
          'permission' => 'Spatie\\Permission\\Contracts\\Permission',
          'role' => 'Spatie\\Permission\\Contracts\\Role',
          'wildcard' => 'Spatie\\Permission\\Contracts\\Wildcard',
          'permissionattached' => 'Spatie\\Permission\\Events\\PermissionAttached',
          'permissiondetached' => 'Spatie\\Permission\\Events\\PermissionDetached',
          'guarddoesnotmatch' => 'Spatie\\Permission\\Exceptions\\GuardDoesNotMatch',
          'permissiondoesnotexist' => 'Spatie\\Permission\\Exceptions\\PermissionDoesNotExist',
          'wildcardpermissioninvalidargument' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionInvalidArgument',
          'wildcardpermissionnotimplementscontract' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionNotImplementsContract',
          'guard' => 'Spatie\\Permission\\Guard',
          'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
          'wildcardpermission' => 'Spatie\\Permission\\WildcardPermission',
        ),
         'className' => 'Spatie\\Permission\\Models\\Permission',
         'functionName' => 'scopeWithoutPermission',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Spatie\\Permission\\Traits\\HasPermissions',
         'traitData' => 
        array (
          0 => 'C:\\projects\\cacao\\backend\\vendor\\spatie\\laravel-permission\\src\\Models\\Permission.php',
          1 => 'Spatie\\Permission\\Models\\Permission',
          2 => 'Spatie\\Permission\\Traits\\HasPermissions',
          3 => 'Spatie\\Permission\\Traits\\HasRoles',
          4 => NULL,
        ),
      )),
      'f9a4749c9b98a6362f7d84e19eaec676' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Spatie\\Permission\\Traits',
         'uses' => 
        array (
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'arr' => 'Illuminate\\Support\\Arr',
          'collection' => 'Illuminate\\Support\\Collection',
          'permission' => 'Spatie\\Permission\\Contracts\\Permission',
          'role' => 'Spatie\\Permission\\Contracts\\Role',
          'wildcard' => 'Spatie\\Permission\\Contracts\\Wildcard',
          'permissionattached' => 'Spatie\\Permission\\Events\\PermissionAttached',
          'permissiondetached' => 'Spatie\\Permission\\Events\\PermissionDetached',
          'guarddoesnotmatch' => 'Spatie\\Permission\\Exceptions\\GuardDoesNotMatch',
          'permissiondoesnotexist' => 'Spatie\\Permission\\Exceptions\\PermissionDoesNotExist',
          'wildcardpermissioninvalidargument' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionInvalidArgument',
          'wildcardpermissionnotimplementscontract' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionNotImplementsContract',
          'guard' => 'Spatie\\Permission\\Guard',
          'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
          'wildcardpermission' => 'Spatie\\Permission\\WildcardPermission',
        ),
         'className' => 'Spatie\\Permission\\Models\\Permission',
         'functionName' => 'convertToPermissionModels',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Spatie\\Permission\\Traits\\HasPermissions',
         'traitData' => 
        array (
          0 => 'C:\\projects\\cacao\\backend\\vendor\\spatie\\laravel-permission\\src\\Models\\Permission.php',
          1 => 'Spatie\\Permission\\Models\\Permission',
          2 => 'Spatie\\Permission\\Traits\\HasPermissions',
          3 => 'Spatie\\Permission\\Traits\\HasRoles',
          4 => NULL,
        ),
      )),
      'c2355caa91e624033cca7cc2a49ffb5e' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Spatie\\Permission\\Traits',
         'uses' => 
        array (
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'arr' => 'Illuminate\\Support\\Arr',
          'collection' => 'Illuminate\\Support\\Collection',
          'permission' => 'Spatie\\Permission\\Contracts\\Permission',
          'role' => 'Spatie\\Permission\\Contracts\\Role',
          'wildcard' => 'Spatie\\Permission\\Contracts\\Wildcard',
          'permissionattached' => 'Spatie\\Permission\\Events\\PermissionAttached',
          'permissiondetached' => 'Spatie\\Permission\\Events\\PermissionDetached',
          'guarddoesnotmatch' => 'Spatie\\Permission\\Exceptions\\GuardDoesNotMatch',
          'permissiondoesnotexist' => 'Spatie\\Permission\\Exceptions\\PermissionDoesNotExist',
          'wildcardpermissioninvalidargument' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionInvalidArgument',
          'wildcardpermissionnotimplementscontract' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionNotImplementsContract',
          'guard' => 'Spatie\\Permission\\Guard',
          'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
          'wildcardpermission' => 'Spatie\\Permission\\WildcardPermission',
        ),
         'className' => 'Spatie\\Permission\\Models\\Permission',
         'functionName' => 'filterPermission',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Spatie\\Permission\\Traits\\HasPermissions',
         'traitData' => 
        array (
          0 => 'C:\\projects\\cacao\\backend\\vendor\\spatie\\laravel-permission\\src\\Models\\Permission.php',
          1 => 'Spatie\\Permission\\Models\\Permission',
          2 => 'Spatie\\Permission\\Traits\\HasPermissions',
          3 => 'Spatie\\Permission\\Traits\\HasRoles',
          4 => NULL,
        ),
      )),
      '5c5bd2fb6c458ba2672d0eee6415e1b3' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Spatie\\Permission\\Traits',
         'uses' => 
        array (
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'arr' => 'Illuminate\\Support\\Arr',
          'collection' => 'Illuminate\\Support\\Collection',
          'permission' => 'Spatie\\Permission\\Contracts\\Permission',
          'role' => 'Spatie\\Permission\\Contracts\\Role',
          'wildcard' => 'Spatie\\Permission\\Contracts\\Wildcard',
          'permissionattached' => 'Spatie\\Permission\\Events\\PermissionAttached',
          'permissiondetached' => 'Spatie\\Permission\\Events\\PermissionDetached',
          'guarddoesnotmatch' => 'Spatie\\Permission\\Exceptions\\GuardDoesNotMatch',
          'permissiondoesnotexist' => 'Spatie\\Permission\\Exceptions\\PermissionDoesNotExist',
          'wildcardpermissioninvalidargument' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionInvalidArgument',
          'wildcardpermissionnotimplementscontract' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionNotImplementsContract',
          'guard' => 'Spatie\\Permission\\Guard',
          'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
          'wildcardpermission' => 'Spatie\\Permission\\WildcardPermission',
        ),
         'className' => 'Spatie\\Permission\\Models\\Permission',
         'functionName' => 'hasPermissionTo',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Spatie\\Permission\\Traits\\HasPermissions',
         'traitData' => 
        array (
          0 => 'C:\\projects\\cacao\\backend\\vendor\\spatie\\laravel-permission\\src\\Models\\Permission.php',
          1 => 'Spatie\\Permission\\Models\\Permission',
          2 => 'Spatie\\Permission\\Traits\\HasPermissions',
          3 => 'Spatie\\Permission\\Traits\\HasRoles',
          4 => NULL,
        ),
      )),
      '904e8cf2f7b8147a11c0ed9c4c06a6e0' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Spatie\\Permission\\Traits',
         'uses' => 
        array (
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'arr' => 'Illuminate\\Support\\Arr',
          'collection' => 'Illuminate\\Support\\Collection',
          'permission' => 'Spatie\\Permission\\Contracts\\Permission',
          'role' => 'Spatie\\Permission\\Contracts\\Role',
          'wildcard' => 'Spatie\\Permission\\Contracts\\Wildcard',
          'permissionattached' => 'Spatie\\Permission\\Events\\PermissionAttached',
          'permissiondetached' => 'Spatie\\Permission\\Events\\PermissionDetached',
          'guarddoesnotmatch' => 'Spatie\\Permission\\Exceptions\\GuardDoesNotMatch',
          'permissiondoesnotexist' => 'Spatie\\Permission\\Exceptions\\PermissionDoesNotExist',
          'wildcardpermissioninvalidargument' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionInvalidArgument',
          'wildcardpermissionnotimplementscontract' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionNotImplementsContract',
          'guard' => 'Spatie\\Permission\\Guard',
          'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
          'wildcardpermission' => 'Spatie\\Permission\\WildcardPermission',
        ),
         'className' => 'Spatie\\Permission\\Models\\Permission',
         'functionName' => 'hasWildcardPermission',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Spatie\\Permission\\Traits\\HasPermissions',
         'traitData' => 
        array (
          0 => 'C:\\projects\\cacao\\backend\\vendor\\spatie\\laravel-permission\\src\\Models\\Permission.php',
          1 => 'Spatie\\Permission\\Models\\Permission',
          2 => 'Spatie\\Permission\\Traits\\HasPermissions',
          3 => 'Spatie\\Permission\\Traits\\HasRoles',
          4 => NULL,
        ),
      )),
      '3009862571a42131160069f8c6ad96e1' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Spatie\\Permission\\Traits',
         'uses' => 
        array (
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'arr' => 'Illuminate\\Support\\Arr',
          'collection' => 'Illuminate\\Support\\Collection',
          'permission' => 'Spatie\\Permission\\Contracts\\Permission',
          'role' => 'Spatie\\Permission\\Contracts\\Role',
          'wildcard' => 'Spatie\\Permission\\Contracts\\Wildcard',
          'permissionattached' => 'Spatie\\Permission\\Events\\PermissionAttached',
          'permissiondetached' => 'Spatie\\Permission\\Events\\PermissionDetached',
          'guarddoesnotmatch' => 'Spatie\\Permission\\Exceptions\\GuardDoesNotMatch',
          'permissiondoesnotexist' => 'Spatie\\Permission\\Exceptions\\PermissionDoesNotExist',
          'wildcardpermissioninvalidargument' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionInvalidArgument',
          'wildcardpermissionnotimplementscontract' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionNotImplementsContract',
          'guard' => 'Spatie\\Permission\\Guard',
          'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
          'wildcardpermission' => 'Spatie\\Permission\\WildcardPermission',
        ),
         'className' => 'Spatie\\Permission\\Models\\Permission',
         'functionName' => 'checkPermissionTo',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Spatie\\Permission\\Traits\\HasPermissions',
         'traitData' => 
        array (
          0 => 'C:\\projects\\cacao\\backend\\vendor\\spatie\\laravel-permission\\src\\Models\\Permission.php',
          1 => 'Spatie\\Permission\\Models\\Permission',
          2 => 'Spatie\\Permission\\Traits\\HasPermissions',
          3 => 'Spatie\\Permission\\Traits\\HasRoles',
          4 => NULL,
        ),
      )),
      '95ecfe102568ec8031b00bcbe2fb3310' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Spatie\\Permission\\Traits',
         'uses' => 
        array (
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'arr' => 'Illuminate\\Support\\Arr',
          'collection' => 'Illuminate\\Support\\Collection',
          'permission' => 'Spatie\\Permission\\Contracts\\Permission',
          'role' => 'Spatie\\Permission\\Contracts\\Role',
          'wildcard' => 'Spatie\\Permission\\Contracts\\Wildcard',
          'permissionattached' => 'Spatie\\Permission\\Events\\PermissionAttached',
          'permissiondetached' => 'Spatie\\Permission\\Events\\PermissionDetached',
          'guarddoesnotmatch' => 'Spatie\\Permission\\Exceptions\\GuardDoesNotMatch',
          'permissiondoesnotexist' => 'Spatie\\Permission\\Exceptions\\PermissionDoesNotExist',
          'wildcardpermissioninvalidargument' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionInvalidArgument',
          'wildcardpermissionnotimplementscontract' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionNotImplementsContract',
          'guard' => 'Spatie\\Permission\\Guard',
          'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
          'wildcardpermission' => 'Spatie\\Permission\\WildcardPermission',
        ),
         'className' => 'Spatie\\Permission\\Models\\Permission',
         'functionName' => 'hasAnyPermission',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Spatie\\Permission\\Traits\\HasPermissions',
         'traitData' => 
        array (
          0 => 'C:\\projects\\cacao\\backend\\vendor\\spatie\\laravel-permission\\src\\Models\\Permission.php',
          1 => 'Spatie\\Permission\\Models\\Permission',
          2 => 'Spatie\\Permission\\Traits\\HasPermissions',
          3 => 'Spatie\\Permission\\Traits\\HasRoles',
          4 => NULL,
        ),
      )),
      '283bbe5d67089626ed5e5e4d69f2193f' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Spatie\\Permission\\Traits',
         'uses' => 
        array (
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'arr' => 'Illuminate\\Support\\Arr',
          'collection' => 'Illuminate\\Support\\Collection',
          'permission' => 'Spatie\\Permission\\Contracts\\Permission',
          'role' => 'Spatie\\Permission\\Contracts\\Role',
          'wildcard' => 'Spatie\\Permission\\Contracts\\Wildcard',
          'permissionattached' => 'Spatie\\Permission\\Events\\PermissionAttached',
          'permissiondetached' => 'Spatie\\Permission\\Events\\PermissionDetached',
          'guarddoesnotmatch' => 'Spatie\\Permission\\Exceptions\\GuardDoesNotMatch',
          'permissiondoesnotexist' => 'Spatie\\Permission\\Exceptions\\PermissionDoesNotExist',
          'wildcardpermissioninvalidargument' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionInvalidArgument',
          'wildcardpermissionnotimplementscontract' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionNotImplementsContract',
          'guard' => 'Spatie\\Permission\\Guard',
          'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
          'wildcardpermission' => 'Spatie\\Permission\\WildcardPermission',
        ),
         'className' => 'Spatie\\Permission\\Models\\Permission',
         'functionName' => 'hasAllPermissions',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Spatie\\Permission\\Traits\\HasPermissions',
         'traitData' => 
        array (
          0 => 'C:\\projects\\cacao\\backend\\vendor\\spatie\\laravel-permission\\src\\Models\\Permission.php',
          1 => 'Spatie\\Permission\\Models\\Permission',
          2 => 'Spatie\\Permission\\Traits\\HasPermissions',
          3 => 'Spatie\\Permission\\Traits\\HasRoles',
          4 => NULL,
        ),
      )),
      '7a239f7ceb2fe9c7d944bbd1d2280079' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Spatie\\Permission\\Traits',
         'uses' => 
        array (
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'arr' => 'Illuminate\\Support\\Arr',
          'collection' => 'Illuminate\\Support\\Collection',
          'permission' => 'Spatie\\Permission\\Contracts\\Permission',
          'role' => 'Spatie\\Permission\\Contracts\\Role',
          'wildcard' => 'Spatie\\Permission\\Contracts\\Wildcard',
          'permissionattached' => 'Spatie\\Permission\\Events\\PermissionAttached',
          'permissiondetached' => 'Spatie\\Permission\\Events\\PermissionDetached',
          'guarddoesnotmatch' => 'Spatie\\Permission\\Exceptions\\GuardDoesNotMatch',
          'permissiondoesnotexist' => 'Spatie\\Permission\\Exceptions\\PermissionDoesNotExist',
          'wildcardpermissioninvalidargument' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionInvalidArgument',
          'wildcardpermissionnotimplementscontract' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionNotImplementsContract',
          'guard' => 'Spatie\\Permission\\Guard',
          'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
          'wildcardpermission' => 'Spatie\\Permission\\WildcardPermission',
        ),
         'className' => 'Spatie\\Permission\\Models\\Permission',
         'functionName' => 'hasPermissionViaRole',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Spatie\\Permission\\Traits\\HasPermissions',
         'traitData' => 
        array (
          0 => 'C:\\projects\\cacao\\backend\\vendor\\spatie\\laravel-permission\\src\\Models\\Permission.php',
          1 => 'Spatie\\Permission\\Models\\Permission',
          2 => 'Spatie\\Permission\\Traits\\HasPermissions',
          3 => 'Spatie\\Permission\\Traits\\HasRoles',
          4 => NULL,
        ),
      )),
      'aec8a8f3323c8f8bc2f97357a81fcc2d' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Spatie\\Permission\\Traits',
         'uses' => 
        array (
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'arr' => 'Illuminate\\Support\\Arr',
          'collection' => 'Illuminate\\Support\\Collection',
          'permission' => 'Spatie\\Permission\\Contracts\\Permission',
          'role' => 'Spatie\\Permission\\Contracts\\Role',
          'wildcard' => 'Spatie\\Permission\\Contracts\\Wildcard',
          'permissionattached' => 'Spatie\\Permission\\Events\\PermissionAttached',
          'permissiondetached' => 'Spatie\\Permission\\Events\\PermissionDetached',
          'guarddoesnotmatch' => 'Spatie\\Permission\\Exceptions\\GuardDoesNotMatch',
          'permissiondoesnotexist' => 'Spatie\\Permission\\Exceptions\\PermissionDoesNotExist',
          'wildcardpermissioninvalidargument' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionInvalidArgument',
          'wildcardpermissionnotimplementscontract' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionNotImplementsContract',
          'guard' => 'Spatie\\Permission\\Guard',
          'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
          'wildcardpermission' => 'Spatie\\Permission\\WildcardPermission',
        ),
         'className' => 'Spatie\\Permission\\Models\\Permission',
         'functionName' => 'hasDirectPermission',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Spatie\\Permission\\Traits\\HasPermissions',
         'traitData' => 
        array (
          0 => 'C:\\projects\\cacao\\backend\\vendor\\spatie\\laravel-permission\\src\\Models\\Permission.php',
          1 => 'Spatie\\Permission\\Models\\Permission',
          2 => 'Spatie\\Permission\\Traits\\HasPermissions',
          3 => 'Spatie\\Permission\\Traits\\HasRoles',
          4 => NULL,
        ),
      )),
      'b7823e38e13fe4826dd9847ea6c98d03' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Spatie\\Permission\\Traits',
         'uses' => 
        array (
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'arr' => 'Illuminate\\Support\\Arr',
          'collection' => 'Illuminate\\Support\\Collection',
          'permission' => 'Spatie\\Permission\\Contracts\\Permission',
          'role' => 'Spatie\\Permission\\Contracts\\Role',
          'wildcard' => 'Spatie\\Permission\\Contracts\\Wildcard',
          'permissionattached' => 'Spatie\\Permission\\Events\\PermissionAttached',
          'permissiondetached' => 'Spatie\\Permission\\Events\\PermissionDetached',
          'guarddoesnotmatch' => 'Spatie\\Permission\\Exceptions\\GuardDoesNotMatch',
          'permissiondoesnotexist' => 'Spatie\\Permission\\Exceptions\\PermissionDoesNotExist',
          'wildcardpermissioninvalidargument' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionInvalidArgument',
          'wildcardpermissionnotimplementscontract' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionNotImplementsContract',
          'guard' => 'Spatie\\Permission\\Guard',
          'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
          'wildcardpermission' => 'Spatie\\Permission\\WildcardPermission',
        ),
         'className' => 'Spatie\\Permission\\Models\\Permission',
         'functionName' => 'getPermissionsViaRoles',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Spatie\\Permission\\Traits\\HasPermissions',
         'traitData' => 
        array (
          0 => 'C:\\projects\\cacao\\backend\\vendor\\spatie\\laravel-permission\\src\\Models\\Permission.php',
          1 => 'Spatie\\Permission\\Models\\Permission',
          2 => 'Spatie\\Permission\\Traits\\HasPermissions',
          3 => 'Spatie\\Permission\\Traits\\HasRoles',
          4 => NULL,
        ),
      )),
      '58ec3d81ad02c59edb1684c500ade0f5' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Spatie\\Permission\\Traits',
         'uses' => 
        array (
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'arr' => 'Illuminate\\Support\\Arr',
          'collection' => 'Illuminate\\Support\\Collection',
          'permission' => 'Spatie\\Permission\\Contracts\\Permission',
          'role' => 'Spatie\\Permission\\Contracts\\Role',
          'wildcard' => 'Spatie\\Permission\\Contracts\\Wildcard',
          'permissionattached' => 'Spatie\\Permission\\Events\\PermissionAttached',
          'permissiondetached' => 'Spatie\\Permission\\Events\\PermissionDetached',
          'guarddoesnotmatch' => 'Spatie\\Permission\\Exceptions\\GuardDoesNotMatch',
          'permissiondoesnotexist' => 'Spatie\\Permission\\Exceptions\\PermissionDoesNotExist',
          'wildcardpermissioninvalidargument' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionInvalidArgument',
          'wildcardpermissionnotimplementscontract' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionNotImplementsContract',
          'guard' => 'Spatie\\Permission\\Guard',
          'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
          'wildcardpermission' => 'Spatie\\Permission\\WildcardPermission',
        ),
         'className' => 'Spatie\\Permission\\Models\\Permission',
         'functionName' => 'getAllPermissions',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Spatie\\Permission\\Traits\\HasPermissions',
         'traitData' => 
        array (
          0 => 'C:\\projects\\cacao\\backend\\vendor\\spatie\\laravel-permission\\src\\Models\\Permission.php',
          1 => 'Spatie\\Permission\\Models\\Permission',
          2 => 'Spatie\\Permission\\Traits\\HasPermissions',
          3 => 'Spatie\\Permission\\Traits\\HasRoles',
          4 => NULL,
        ),
      )),
      '66a0e30f5e8427e5829bde934496d905' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Spatie\\Permission\\Traits',
         'uses' => 
        array (
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'arr' => 'Illuminate\\Support\\Arr',
          'collection' => 'Illuminate\\Support\\Collection',
          'permission' => 'Spatie\\Permission\\Contracts\\Permission',
          'role' => 'Spatie\\Permission\\Contracts\\Role',
          'wildcard' => 'Spatie\\Permission\\Contracts\\Wildcard',
          'permissionattached' => 'Spatie\\Permission\\Events\\PermissionAttached',
          'permissiondetached' => 'Spatie\\Permission\\Events\\PermissionDetached',
          'guarddoesnotmatch' => 'Spatie\\Permission\\Exceptions\\GuardDoesNotMatch',
          'permissiondoesnotexist' => 'Spatie\\Permission\\Exceptions\\PermissionDoesNotExist',
          'wildcardpermissioninvalidargument' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionInvalidArgument',
          'wildcardpermissionnotimplementscontract' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionNotImplementsContract',
          'guard' => 'Spatie\\Permission\\Guard',
          'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
          'wildcardpermission' => 'Spatie\\Permission\\WildcardPermission',
        ),
         'className' => 'Spatie\\Permission\\Models\\Permission',
         'functionName' => 'collectPermissions',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Spatie\\Permission\\Traits\\HasPermissions',
         'traitData' => 
        array (
          0 => 'C:\\projects\\cacao\\backend\\vendor\\spatie\\laravel-permission\\src\\Models\\Permission.php',
          1 => 'Spatie\\Permission\\Models\\Permission',
          2 => 'Spatie\\Permission\\Traits\\HasPermissions',
          3 => 'Spatie\\Permission\\Traits\\HasRoles',
          4 => NULL,
        ),
      )),
      '6dace78506233e30910e481c410d87e0' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Spatie\\Permission\\Traits',
         'uses' => 
        array (
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'arr' => 'Illuminate\\Support\\Arr',
          'collection' => 'Illuminate\\Support\\Collection',
          'permission' => 'Spatie\\Permission\\Contracts\\Permission',
          'role' => 'Spatie\\Permission\\Contracts\\Role',
          'wildcard' => 'Spatie\\Permission\\Contracts\\Wildcard',
          'permissionattached' => 'Spatie\\Permission\\Events\\PermissionAttached',
          'permissiondetached' => 'Spatie\\Permission\\Events\\PermissionDetached',
          'guarddoesnotmatch' => 'Spatie\\Permission\\Exceptions\\GuardDoesNotMatch',
          'permissiondoesnotexist' => 'Spatie\\Permission\\Exceptions\\PermissionDoesNotExist',
          'wildcardpermissioninvalidargument' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionInvalidArgument',
          'wildcardpermissionnotimplementscontract' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionNotImplementsContract',
          'guard' => 'Spatie\\Permission\\Guard',
          'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
          'wildcardpermission' => 'Spatie\\Permission\\WildcardPermission',
        ),
         'className' => 'Spatie\\Permission\\Models\\Permission',
         'functionName' => 'givePermissionTo',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Spatie\\Permission\\Traits\\HasPermissions',
         'traitData' => 
        array (
          0 => 'C:\\projects\\cacao\\backend\\vendor\\spatie\\laravel-permission\\src\\Models\\Permission.php',
          1 => 'Spatie\\Permission\\Models\\Permission',
          2 => 'Spatie\\Permission\\Traits\\HasPermissions',
          3 => 'Spatie\\Permission\\Traits\\HasRoles',
          4 => NULL,
        ),
      )),
      'a74389b63bc4c1bb6fa12f5afc71fcba' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Spatie\\Permission\\Traits',
         'uses' => 
        array (
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'arr' => 'Illuminate\\Support\\Arr',
          'collection' => 'Illuminate\\Support\\Collection',
          'permission' => 'Spatie\\Permission\\Contracts\\Permission',
          'role' => 'Spatie\\Permission\\Contracts\\Role',
          'wildcard' => 'Spatie\\Permission\\Contracts\\Wildcard',
          'permissionattached' => 'Spatie\\Permission\\Events\\PermissionAttached',
          'permissiondetached' => 'Spatie\\Permission\\Events\\PermissionDetached',
          'guarddoesnotmatch' => 'Spatie\\Permission\\Exceptions\\GuardDoesNotMatch',
          'permissiondoesnotexist' => 'Spatie\\Permission\\Exceptions\\PermissionDoesNotExist',
          'wildcardpermissioninvalidargument' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionInvalidArgument',
          'wildcardpermissionnotimplementscontract' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionNotImplementsContract',
          'guard' => 'Spatie\\Permission\\Guard',
          'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
          'wildcardpermission' => 'Spatie\\Permission\\WildcardPermission',
        ),
         'className' => 'Spatie\\Permission\\Models\\Permission',
         'functionName' => 'forgetWildcardPermissionIndex',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Spatie\\Permission\\Traits\\HasPermissions',
         'traitData' => 
        array (
          0 => 'C:\\projects\\cacao\\backend\\vendor\\spatie\\laravel-permission\\src\\Models\\Permission.php',
          1 => 'Spatie\\Permission\\Models\\Permission',
          2 => 'Spatie\\Permission\\Traits\\HasPermissions',
          3 => 'Spatie\\Permission\\Traits\\HasRoles',
          4 => NULL,
        ),
      )),
      '447a90bb505fccf86482253bb3dbe6e4' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Spatie\\Permission\\Traits',
         'uses' => 
        array (
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'arr' => 'Illuminate\\Support\\Arr',
          'collection' => 'Illuminate\\Support\\Collection',
          'permission' => 'Spatie\\Permission\\Contracts\\Permission',
          'role' => 'Spatie\\Permission\\Contracts\\Role',
          'wildcard' => 'Spatie\\Permission\\Contracts\\Wildcard',
          'permissionattached' => 'Spatie\\Permission\\Events\\PermissionAttached',
          'permissiondetached' => 'Spatie\\Permission\\Events\\PermissionDetached',
          'guarddoesnotmatch' => 'Spatie\\Permission\\Exceptions\\GuardDoesNotMatch',
          'permissiondoesnotexist' => 'Spatie\\Permission\\Exceptions\\PermissionDoesNotExist',
          'wildcardpermissioninvalidargument' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionInvalidArgument',
          'wildcardpermissionnotimplementscontract' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionNotImplementsContract',
          'guard' => 'Spatie\\Permission\\Guard',
          'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
          'wildcardpermission' => 'Spatie\\Permission\\WildcardPermission',
        ),
         'className' => 'Spatie\\Permission\\Models\\Permission',
         'functionName' => 'syncPermissions',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Spatie\\Permission\\Traits\\HasPermissions',
         'traitData' => 
        array (
          0 => 'C:\\projects\\cacao\\backend\\vendor\\spatie\\laravel-permission\\src\\Models\\Permission.php',
          1 => 'Spatie\\Permission\\Models\\Permission',
          2 => 'Spatie\\Permission\\Traits\\HasPermissions',
          3 => 'Spatie\\Permission\\Traits\\HasRoles',
          4 => NULL,
        ),
      )),
      '06ce964d6b768dd68d9fd57f8d82d338' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Spatie\\Permission\\Traits',
         'uses' => 
        array (
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'arr' => 'Illuminate\\Support\\Arr',
          'collection' => 'Illuminate\\Support\\Collection',
          'permission' => 'Spatie\\Permission\\Contracts\\Permission',
          'role' => 'Spatie\\Permission\\Contracts\\Role',
          'wildcard' => 'Spatie\\Permission\\Contracts\\Wildcard',
          'permissionattached' => 'Spatie\\Permission\\Events\\PermissionAttached',
          'permissiondetached' => 'Spatie\\Permission\\Events\\PermissionDetached',
          'guarddoesnotmatch' => 'Spatie\\Permission\\Exceptions\\GuardDoesNotMatch',
          'permissiondoesnotexist' => 'Spatie\\Permission\\Exceptions\\PermissionDoesNotExist',
          'wildcardpermissioninvalidargument' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionInvalidArgument',
          'wildcardpermissionnotimplementscontract' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionNotImplementsContract',
          'guard' => 'Spatie\\Permission\\Guard',
          'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
          'wildcardpermission' => 'Spatie\\Permission\\WildcardPermission',
        ),
         'className' => 'Spatie\\Permission\\Models\\Permission',
         'functionName' => 'revokePermissionTo',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Spatie\\Permission\\Traits\\HasPermissions',
         'traitData' => 
        array (
          0 => 'C:\\projects\\cacao\\backend\\vendor\\spatie\\laravel-permission\\src\\Models\\Permission.php',
          1 => 'Spatie\\Permission\\Models\\Permission',
          2 => 'Spatie\\Permission\\Traits\\HasPermissions',
          3 => 'Spatie\\Permission\\Traits\\HasRoles',
          4 => NULL,
        ),
      )),
      'd2e72c2af9a6df857ace54560250ee89' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Spatie\\Permission\\Traits',
         'uses' => 
        array (
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'arr' => 'Illuminate\\Support\\Arr',
          'collection' => 'Illuminate\\Support\\Collection',
          'permission' => 'Spatie\\Permission\\Contracts\\Permission',
          'role' => 'Spatie\\Permission\\Contracts\\Role',
          'wildcard' => 'Spatie\\Permission\\Contracts\\Wildcard',
          'permissionattached' => 'Spatie\\Permission\\Events\\PermissionAttached',
          'permissiondetached' => 'Spatie\\Permission\\Events\\PermissionDetached',
          'guarddoesnotmatch' => 'Spatie\\Permission\\Exceptions\\GuardDoesNotMatch',
          'permissiondoesnotexist' => 'Spatie\\Permission\\Exceptions\\PermissionDoesNotExist',
          'wildcardpermissioninvalidargument' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionInvalidArgument',
          'wildcardpermissionnotimplementscontract' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionNotImplementsContract',
          'guard' => 'Spatie\\Permission\\Guard',
          'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
          'wildcardpermission' => 'Spatie\\Permission\\WildcardPermission',
        ),
         'className' => 'Spatie\\Permission\\Models\\Permission',
         'functionName' => 'getPermissionNames',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Spatie\\Permission\\Traits\\HasPermissions',
         'traitData' => 
        array (
          0 => 'C:\\projects\\cacao\\backend\\vendor\\spatie\\laravel-permission\\src\\Models\\Permission.php',
          1 => 'Spatie\\Permission\\Models\\Permission',
          2 => 'Spatie\\Permission\\Traits\\HasPermissions',
          3 => 'Spatie\\Permission\\Traits\\HasRoles',
          4 => NULL,
        ),
      )),
      '2d1244c4b361da1b063a19327fce4b07' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Spatie\\Permission\\Traits',
         'uses' => 
        array (
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'arr' => 'Illuminate\\Support\\Arr',
          'collection' => 'Illuminate\\Support\\Collection',
          'permission' => 'Spatie\\Permission\\Contracts\\Permission',
          'role' => 'Spatie\\Permission\\Contracts\\Role',
          'wildcard' => 'Spatie\\Permission\\Contracts\\Wildcard',
          'permissionattached' => 'Spatie\\Permission\\Events\\PermissionAttached',
          'permissiondetached' => 'Spatie\\Permission\\Events\\PermissionDetached',
          'guarddoesnotmatch' => 'Spatie\\Permission\\Exceptions\\GuardDoesNotMatch',
          'permissiondoesnotexist' => 'Spatie\\Permission\\Exceptions\\PermissionDoesNotExist',
          'wildcardpermissioninvalidargument' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionInvalidArgument',
          'wildcardpermissionnotimplementscontract' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionNotImplementsContract',
          'guard' => 'Spatie\\Permission\\Guard',
          'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
          'wildcardpermission' => 'Spatie\\Permission\\WildcardPermission',
        ),
         'className' => 'Spatie\\Permission\\Models\\Permission',
         'functionName' => 'getStoredPermission',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Spatie\\Permission\\Traits\\HasPermissions',
         'traitData' => 
        array (
          0 => 'C:\\projects\\cacao\\backend\\vendor\\spatie\\laravel-permission\\src\\Models\\Permission.php',
          1 => 'Spatie\\Permission\\Models\\Permission',
          2 => 'Spatie\\Permission\\Traits\\HasPermissions',
          3 => 'Spatie\\Permission\\Traits\\HasRoles',
          4 => NULL,
        ),
      )),
      'c6d7c40df830afd77ec7395e40882401' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Spatie\\Permission\\Traits',
         'uses' => 
        array (
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'arr' => 'Illuminate\\Support\\Arr',
          'collection' => 'Illuminate\\Support\\Collection',
          'permission' => 'Spatie\\Permission\\Contracts\\Permission',
          'role' => 'Spatie\\Permission\\Contracts\\Role',
          'wildcard' => 'Spatie\\Permission\\Contracts\\Wildcard',
          'permissionattached' => 'Spatie\\Permission\\Events\\PermissionAttached',
          'permissiondetached' => 'Spatie\\Permission\\Events\\PermissionDetached',
          'guarddoesnotmatch' => 'Spatie\\Permission\\Exceptions\\GuardDoesNotMatch',
          'permissiondoesnotexist' => 'Spatie\\Permission\\Exceptions\\PermissionDoesNotExist',
          'wildcardpermissioninvalidargument' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionInvalidArgument',
          'wildcardpermissionnotimplementscontract' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionNotImplementsContract',
          'guard' => 'Spatie\\Permission\\Guard',
          'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
          'wildcardpermission' => 'Spatie\\Permission\\WildcardPermission',
        ),
         'className' => 'Spatie\\Permission\\Models\\Permission',
         'functionName' => 'ensureModelSharesGuard',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Spatie\\Permission\\Traits\\HasPermissions',
         'traitData' => 
        array (
          0 => 'C:\\projects\\cacao\\backend\\vendor\\spatie\\laravel-permission\\src\\Models\\Permission.php',
          1 => 'Spatie\\Permission\\Models\\Permission',
          2 => 'Spatie\\Permission\\Traits\\HasPermissions',
          3 => 'Spatie\\Permission\\Traits\\HasRoles',
          4 => NULL,
        ),
      )),
      'b42e826adc33ffa13a68e827c2d24b94' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Spatie\\Permission\\Traits',
         'uses' => 
        array (
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'arr' => 'Illuminate\\Support\\Arr',
          'collection' => 'Illuminate\\Support\\Collection',
          'permission' => 'Spatie\\Permission\\Contracts\\Permission',
          'role' => 'Spatie\\Permission\\Contracts\\Role',
          'wildcard' => 'Spatie\\Permission\\Contracts\\Wildcard',
          'permissionattached' => 'Spatie\\Permission\\Events\\PermissionAttached',
          'permissiondetached' => 'Spatie\\Permission\\Events\\PermissionDetached',
          'guarddoesnotmatch' => 'Spatie\\Permission\\Exceptions\\GuardDoesNotMatch',
          'permissiondoesnotexist' => 'Spatie\\Permission\\Exceptions\\PermissionDoesNotExist',
          'wildcardpermissioninvalidargument' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionInvalidArgument',
          'wildcardpermissionnotimplementscontract' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionNotImplementsContract',
          'guard' => 'Spatie\\Permission\\Guard',
          'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
          'wildcardpermission' => 'Spatie\\Permission\\WildcardPermission',
        ),
         'className' => 'Spatie\\Permission\\Models\\Permission',
         'functionName' => 'getGuardNames',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Spatie\\Permission\\Traits\\HasPermissions',
         'traitData' => 
        array (
          0 => 'C:\\projects\\cacao\\backend\\vendor\\spatie\\laravel-permission\\src\\Models\\Permission.php',
          1 => 'Spatie\\Permission\\Models\\Permission',
          2 => 'Spatie\\Permission\\Traits\\HasPermissions',
          3 => 'Spatie\\Permission\\Traits\\HasRoles',
          4 => NULL,
        ),
      )),
      '3211b3abdfd1f5730ebb5f697a6e5cfb' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Spatie\\Permission\\Traits',
         'uses' => 
        array (
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'arr' => 'Illuminate\\Support\\Arr',
          'collection' => 'Illuminate\\Support\\Collection',
          'permission' => 'Spatie\\Permission\\Contracts\\Permission',
          'role' => 'Spatie\\Permission\\Contracts\\Role',
          'wildcard' => 'Spatie\\Permission\\Contracts\\Wildcard',
          'permissionattached' => 'Spatie\\Permission\\Events\\PermissionAttached',
          'permissiondetached' => 'Spatie\\Permission\\Events\\PermissionDetached',
          'guarddoesnotmatch' => 'Spatie\\Permission\\Exceptions\\GuardDoesNotMatch',
          'permissiondoesnotexist' => 'Spatie\\Permission\\Exceptions\\PermissionDoesNotExist',
          'wildcardpermissioninvalidargument' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionInvalidArgument',
          'wildcardpermissionnotimplementscontract' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionNotImplementsContract',
          'guard' => 'Spatie\\Permission\\Guard',
          'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
          'wildcardpermission' => 'Spatie\\Permission\\WildcardPermission',
        ),
         'className' => 'Spatie\\Permission\\Models\\Permission',
         'functionName' => 'getDefaultGuardName',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Spatie\\Permission\\Traits\\HasPermissions',
         'traitData' => 
        array (
          0 => 'C:\\projects\\cacao\\backend\\vendor\\spatie\\laravel-permission\\src\\Models\\Permission.php',
          1 => 'Spatie\\Permission\\Models\\Permission',
          2 => 'Spatie\\Permission\\Traits\\HasPermissions',
          3 => 'Spatie\\Permission\\Traits\\HasRoles',
          4 => NULL,
        ),
      )),
      '512fb8c8edeff5eea257009ef8151bfa' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Spatie\\Permission\\Traits',
         'uses' => 
        array (
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'arr' => 'Illuminate\\Support\\Arr',
          'collection' => 'Illuminate\\Support\\Collection',
          'permission' => 'Spatie\\Permission\\Contracts\\Permission',
          'role' => 'Spatie\\Permission\\Contracts\\Role',
          'wildcard' => 'Spatie\\Permission\\Contracts\\Wildcard',
          'permissionattached' => 'Spatie\\Permission\\Events\\PermissionAttached',
          'permissiondetached' => 'Spatie\\Permission\\Events\\PermissionDetached',
          'guarddoesnotmatch' => 'Spatie\\Permission\\Exceptions\\GuardDoesNotMatch',
          'permissiondoesnotexist' => 'Spatie\\Permission\\Exceptions\\PermissionDoesNotExist',
          'wildcardpermissioninvalidargument' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionInvalidArgument',
          'wildcardpermissionnotimplementscontract' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionNotImplementsContract',
          'guard' => 'Spatie\\Permission\\Guard',
          'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
          'wildcardpermission' => 'Spatie\\Permission\\WildcardPermission',
        ),
         'className' => 'Spatie\\Permission\\Models\\Permission',
         'functionName' => 'forgetCachedPermissions',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Spatie\\Permission\\Traits\\HasPermissions',
         'traitData' => 
        array (
          0 => 'C:\\projects\\cacao\\backend\\vendor\\spatie\\laravel-permission\\src\\Models\\Permission.php',
          1 => 'Spatie\\Permission\\Models\\Permission',
          2 => 'Spatie\\Permission\\Traits\\HasPermissions',
          3 => 'Spatie\\Permission\\Traits\\HasRoles',
          4 => NULL,
        ),
      )),
      '164f9f13ba41c2fa87df5a2a0968037e' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Spatie\\Permission\\Traits',
         'uses' => 
        array (
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'arr' => 'Illuminate\\Support\\Arr',
          'collection' => 'Illuminate\\Support\\Collection',
          'permission' => 'Spatie\\Permission\\Contracts\\Permission',
          'role' => 'Spatie\\Permission\\Contracts\\Role',
          'wildcard' => 'Spatie\\Permission\\Contracts\\Wildcard',
          'permissionattached' => 'Spatie\\Permission\\Events\\PermissionAttached',
          'permissiondetached' => 'Spatie\\Permission\\Events\\PermissionDetached',
          'guarddoesnotmatch' => 'Spatie\\Permission\\Exceptions\\GuardDoesNotMatch',
          'permissiondoesnotexist' => 'Spatie\\Permission\\Exceptions\\PermissionDoesNotExist',
          'wildcardpermissioninvalidargument' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionInvalidArgument',
          'wildcardpermissionnotimplementscontract' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionNotImplementsContract',
          'guard' => 'Spatie\\Permission\\Guard',
          'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
          'wildcardpermission' => 'Spatie\\Permission\\WildcardPermission',
        ),
         'className' => 'Spatie\\Permission\\Models\\Permission',
         'functionName' => 'hasAllDirectPermissions',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Spatie\\Permission\\Traits\\HasPermissions',
         'traitData' => 
        array (
          0 => 'C:\\projects\\cacao\\backend\\vendor\\spatie\\laravel-permission\\src\\Models\\Permission.php',
          1 => 'Spatie\\Permission\\Models\\Permission',
          2 => 'Spatie\\Permission\\Traits\\HasPermissions',
          3 => 'Spatie\\Permission\\Traits\\HasRoles',
          4 => NULL,
        ),
      )),
      '8a264b1b2d60aa4a1777af1cc6a3f0c8' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Spatie\\Permission\\Traits',
         'uses' => 
        array (
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'arr' => 'Illuminate\\Support\\Arr',
          'collection' => 'Illuminate\\Support\\Collection',
          'permission' => 'Spatie\\Permission\\Contracts\\Permission',
          'role' => 'Spatie\\Permission\\Contracts\\Role',
          'wildcard' => 'Spatie\\Permission\\Contracts\\Wildcard',
          'permissionattached' => 'Spatie\\Permission\\Events\\PermissionAttached',
          'permissiondetached' => 'Spatie\\Permission\\Events\\PermissionDetached',
          'guarddoesnotmatch' => 'Spatie\\Permission\\Exceptions\\GuardDoesNotMatch',
          'permissiondoesnotexist' => 'Spatie\\Permission\\Exceptions\\PermissionDoesNotExist',
          'wildcardpermissioninvalidargument' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionInvalidArgument',
          'wildcardpermissionnotimplementscontract' => 'Spatie\\Permission\\Exceptions\\WildcardPermissionNotImplementsContract',
          'guard' => 'Spatie\\Permission\\Guard',
          'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
          'wildcardpermission' => 'Spatie\\Permission\\WildcardPermission',
        ),
         'className' => 'Spatie\\Permission\\Models\\Permission',
         'functionName' => 'hasAnyDirectPermission',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Spatie\\Permission\\Traits\\HasPermissions',
         'traitData' => 
        array (
          0 => 'C:\\projects\\cacao\\backend\\vendor\\spatie\\laravel-permission\\src\\Models\\Permission.php',
          1 => 'Spatie\\Permission\\Models\\Permission',
          2 => 'Spatie\\Permission\\Traits\\HasPermissions',
          3 => 'Spatie\\Permission\\Traits\\HasRoles',
          4 => NULL,
        ),
      )),
      '056bcf9bc3907278b666bb816b285fd9' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Spatie\\Permission\\Traits',
         'uses' => 
        array (
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'arr' => 'Illuminate\\Support\\Arr',
          'collection' => 'Illuminate\\Support\\Collection',
          'permission' => 'Spatie\\Permission\\Contracts\\Permission',
          'role' => 'Spatie\\Permission\\Contracts\\Role',
          'roleattached' => 'Spatie\\Permission\\Events\\RoleAttached',
          'roledetached' => 'Spatie\\Permission\\Events\\RoleDetached',
          'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
        ),
         'className' => 'Spatie\\Permission\\Models\\Permission',
         'functionName' => 'bootHasRoles',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Spatie\\Permission\\Traits\\HasRoles',
         'traitData' => 
        array (
          0 => 'C:\\projects\\cacao\\backend\\vendor\\spatie\\laravel-permission\\src\\Models\\Permission.php',
          1 => 'Spatie\\Permission\\Models\\Permission',
          2 => 'Spatie\\Permission\\Traits\\HasRoles',
          3 => NULL,
          4 => NULL,
        ),
      )),
      'c98c35636080dc5a6857580231e3ec6a' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Spatie\\Permission\\Traits',
         'uses' => 
        array (
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'arr' => 'Illuminate\\Support\\Arr',
          'collection' => 'Illuminate\\Support\\Collection',
          'permission' => 'Spatie\\Permission\\Contracts\\Permission',
          'role' => 'Spatie\\Permission\\Contracts\\Role',
          'roleattached' => 'Spatie\\Permission\\Events\\RoleAttached',
          'roledetached' => 'Spatie\\Permission\\Events\\RoleDetached',
          'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
        ),
         'className' => 'Spatie\\Permission\\Models\\Permission',
         'functionName' => 'getRoleClass',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Spatie\\Permission\\Traits\\HasRoles',
         'traitData' => 
        array (
          0 => 'C:\\projects\\cacao\\backend\\vendor\\spatie\\laravel-permission\\src\\Models\\Permission.php',
          1 => 'Spatie\\Permission\\Models\\Permission',
          2 => 'Spatie\\Permission\\Traits\\HasRoles',
          3 => NULL,
          4 => NULL,
        ),
      )),
      'dc9f6ec5a1011f32d15f68e16470ebdb' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Spatie\\Permission\\Traits',
         'uses' => 
        array (
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'arr' => 'Illuminate\\Support\\Arr',
          'collection' => 'Illuminate\\Support\\Collection',
          'permission' => 'Spatie\\Permission\\Contracts\\Permission',
          'role' => 'Spatie\\Permission\\Contracts\\Role',
          'roleattached' => 'Spatie\\Permission\\Events\\RoleAttached',
          'roledetached' => 'Spatie\\Permission\\Events\\RoleDetached',
          'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
        ),
         'className' => 'Spatie\\Permission\\Models\\Permission',
         'functionName' => 'roles',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Spatie\\Permission\\Traits\\HasRoles',
         'traitData' => 
        array (
          0 => 'C:\\projects\\cacao\\backend\\vendor\\spatie\\laravel-permission\\src\\Models\\Permission.php',
          1 => 'Spatie\\Permission\\Models\\Permission',
          2 => 'Spatie\\Permission\\Traits\\HasRoles',
          3 => NULL,
          4 => NULL,
        ),
      )),
      'e32ba64fa4b09d0018d81eff1778a2f2' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Spatie\\Permission\\Traits',
         'uses' => 
        array (
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'arr' => 'Illuminate\\Support\\Arr',
          'collection' => 'Illuminate\\Support\\Collection',
          'permission' => 'Spatie\\Permission\\Contracts\\Permission',
          'role' => 'Spatie\\Permission\\Contracts\\Role',
          'roleattached' => 'Spatie\\Permission\\Events\\RoleAttached',
          'roledetached' => 'Spatie\\Permission\\Events\\RoleDetached',
          'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
        ),
         'className' => 'Spatie\\Permission\\Models\\Permission',
         'functionName' => 'scopeRole',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Spatie\\Permission\\Traits\\HasRoles',
         'traitData' => 
        array (
          0 => 'C:\\projects\\cacao\\backend\\vendor\\spatie\\laravel-permission\\src\\Models\\Permission.php',
          1 => 'Spatie\\Permission\\Models\\Permission',
          2 => 'Spatie\\Permission\\Traits\\HasRoles',
          3 => NULL,
          4 => NULL,
        ),
      )),
      'bbd2378ea4bee85e04ed1ab730738e27' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Spatie\\Permission\\Traits',
         'uses' => 
        array (
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'arr' => 'Illuminate\\Support\\Arr',
          'collection' => 'Illuminate\\Support\\Collection',
          'permission' => 'Spatie\\Permission\\Contracts\\Permission',
          'role' => 'Spatie\\Permission\\Contracts\\Role',
          'roleattached' => 'Spatie\\Permission\\Events\\RoleAttached',
          'roledetached' => 'Spatie\\Permission\\Events\\RoleDetached',
          'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
        ),
         'className' => 'Spatie\\Permission\\Models\\Permission',
         'functionName' => 'scopeWithoutRole',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Spatie\\Permission\\Traits\\HasRoles',
         'traitData' => 
        array (
          0 => 'C:\\projects\\cacao\\backend\\vendor\\spatie\\laravel-permission\\src\\Models\\Permission.php',
          1 => 'Spatie\\Permission\\Models\\Permission',
          2 => 'Spatie\\Permission\\Traits\\HasRoles',
          3 => NULL,
          4 => NULL,
        ),
      )),
      '7c5c121b7b8c88e815fde5305a0747cc' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Spatie\\Permission\\Traits',
         'uses' => 
        array (
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'arr' => 'Illuminate\\Support\\Arr',
          'collection' => 'Illuminate\\Support\\Collection',
          'permission' => 'Spatie\\Permission\\Contracts\\Permission',
          'role' => 'Spatie\\Permission\\Contracts\\Role',
          'roleattached' => 'Spatie\\Permission\\Events\\RoleAttached',
          'roledetached' => 'Spatie\\Permission\\Events\\RoleDetached',
          'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
        ),
         'className' => 'Spatie\\Permission\\Models\\Permission',
         'functionName' => 'collectRoles',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Spatie\\Permission\\Traits\\HasRoles',
         'traitData' => 
        array (
          0 => 'C:\\projects\\cacao\\backend\\vendor\\spatie\\laravel-permission\\src\\Models\\Permission.php',
          1 => 'Spatie\\Permission\\Models\\Permission',
          2 => 'Spatie\\Permission\\Traits\\HasRoles',
          3 => NULL,
          4 => NULL,
        ),
      )),
      'b5ea1285d643d49ffcfdcdd81f372dfe' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Spatie\\Permission\\Traits',
         'uses' => 
        array (
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'arr' => 'Illuminate\\Support\\Arr',
          'collection' => 'Illuminate\\Support\\Collection',
          'permission' => 'Spatie\\Permission\\Contracts\\Permission',
          'role' => 'Spatie\\Permission\\Contracts\\Role',
          'roleattached' => 'Spatie\\Permission\\Events\\RoleAttached',
          'roledetached' => 'Spatie\\Permission\\Events\\RoleDetached',
          'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
        ),
         'className' => 'Spatie\\Permission\\Models\\Permission',
         'functionName' => 'assignRole',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Spatie\\Permission\\Traits\\HasRoles',
         'traitData' => 
        array (
          0 => 'C:\\projects\\cacao\\backend\\vendor\\spatie\\laravel-permission\\src\\Models\\Permission.php',
          1 => 'Spatie\\Permission\\Models\\Permission',
          2 => 'Spatie\\Permission\\Traits\\HasRoles',
          3 => NULL,
          4 => NULL,
        ),
      )),
      '316ef6a1cb730481df53f756cb96def1' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Spatie\\Permission\\Traits',
         'uses' => 
        array (
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'arr' => 'Illuminate\\Support\\Arr',
          'collection' => 'Illuminate\\Support\\Collection',
          'permission' => 'Spatie\\Permission\\Contracts\\Permission',
          'role' => 'Spatie\\Permission\\Contracts\\Role',
          'roleattached' => 'Spatie\\Permission\\Events\\RoleAttached',
          'roledetached' => 'Spatie\\Permission\\Events\\RoleDetached',
          'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
        ),
         'className' => 'Spatie\\Permission\\Models\\Permission',
         'functionName' => 'removeRole',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Spatie\\Permission\\Traits\\HasRoles',
         'traitData' => 
        array (
          0 => 'C:\\projects\\cacao\\backend\\vendor\\spatie\\laravel-permission\\src\\Models\\Permission.php',
          1 => 'Spatie\\Permission\\Models\\Permission',
          2 => 'Spatie\\Permission\\Traits\\HasRoles',
          3 => NULL,
          4 => NULL,
        ),
      )),
      'bfcd7dbcf26af142cda5dd3713daa0cc' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Spatie\\Permission\\Traits',
         'uses' => 
        array (
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'arr' => 'Illuminate\\Support\\Arr',
          'collection' => 'Illuminate\\Support\\Collection',
          'permission' => 'Spatie\\Permission\\Contracts\\Permission',
          'role' => 'Spatie\\Permission\\Contracts\\Role',
          'roleattached' => 'Spatie\\Permission\\Events\\RoleAttached',
          'roledetached' => 'Spatie\\Permission\\Events\\RoleDetached',
          'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
        ),
         'className' => 'Spatie\\Permission\\Models\\Permission',
         'functionName' => 'syncRoles',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Spatie\\Permission\\Traits\\HasRoles',
         'traitData' => 
        array (
          0 => 'C:\\projects\\cacao\\backend\\vendor\\spatie\\laravel-permission\\src\\Models\\Permission.php',
          1 => 'Spatie\\Permission\\Models\\Permission',
          2 => 'Spatie\\Permission\\Traits\\HasRoles',
          3 => NULL,
          4 => NULL,
        ),
      )),
      'd6dd29d685daa0f40346cbd8eae15519' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Spatie\\Permission\\Traits',
         'uses' => 
        array (
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'arr' => 'Illuminate\\Support\\Arr',
          'collection' => 'Illuminate\\Support\\Collection',
          'permission' => 'Spatie\\Permission\\Contracts\\Permission',
          'role' => 'Spatie\\Permission\\Contracts\\Role',
          'roleattached' => 'Spatie\\Permission\\Events\\RoleAttached',
          'roledetached' => 'Spatie\\Permission\\Events\\RoleDetached',
          'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
        ),
         'className' => 'Spatie\\Permission\\Models\\Permission',
         'functionName' => 'hasRole',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Spatie\\Permission\\Traits\\HasRoles',
         'traitData' => 
        array (
          0 => 'C:\\projects\\cacao\\backend\\vendor\\spatie\\laravel-permission\\src\\Models\\Permission.php',
          1 => 'Spatie\\Permission\\Models\\Permission',
          2 => 'Spatie\\Permission\\Traits\\HasRoles',
          3 => NULL,
          4 => NULL,
        ),
      )),
      '6e4fdad061fcc2556434f30ab27dca8b' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Spatie\\Permission\\Traits',
         'uses' => 
        array (
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'arr' => 'Illuminate\\Support\\Arr',
          'collection' => 'Illuminate\\Support\\Collection',
          'permission' => 'Spatie\\Permission\\Contracts\\Permission',
          'role' => 'Spatie\\Permission\\Contracts\\Role',
          'roleattached' => 'Spatie\\Permission\\Events\\RoleAttached',
          'roledetached' => 'Spatie\\Permission\\Events\\RoleDetached',
          'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
        ),
         'className' => 'Spatie\\Permission\\Models\\Permission',
         'functionName' => 'hasAnyRole',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Spatie\\Permission\\Traits\\HasRoles',
         'traitData' => 
        array (
          0 => 'C:\\projects\\cacao\\backend\\vendor\\spatie\\laravel-permission\\src\\Models\\Permission.php',
          1 => 'Spatie\\Permission\\Models\\Permission',
          2 => 'Spatie\\Permission\\Traits\\HasRoles',
          3 => NULL,
          4 => NULL,
        ),
      )),
      '66d54f207980cf46d371edf2e510e52b' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Spatie\\Permission\\Traits',
         'uses' => 
        array (
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'arr' => 'Illuminate\\Support\\Arr',
          'collection' => 'Illuminate\\Support\\Collection',
          'permission' => 'Spatie\\Permission\\Contracts\\Permission',
          'role' => 'Spatie\\Permission\\Contracts\\Role',
          'roleattached' => 'Spatie\\Permission\\Events\\RoleAttached',
          'roledetached' => 'Spatie\\Permission\\Events\\RoleDetached',
          'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
        ),
         'className' => 'Spatie\\Permission\\Models\\Permission',
         'functionName' => 'hasAllRoles',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Spatie\\Permission\\Traits\\HasRoles',
         'traitData' => 
        array (
          0 => 'C:\\projects\\cacao\\backend\\vendor\\spatie\\laravel-permission\\src\\Models\\Permission.php',
          1 => 'Spatie\\Permission\\Models\\Permission',
          2 => 'Spatie\\Permission\\Traits\\HasRoles',
          3 => NULL,
          4 => NULL,
        ),
      )),
      'fc97892229748ea52891eb6b481d8607' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Spatie\\Permission\\Traits',
         'uses' => 
        array (
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'arr' => 'Illuminate\\Support\\Arr',
          'collection' => 'Illuminate\\Support\\Collection',
          'permission' => 'Spatie\\Permission\\Contracts\\Permission',
          'role' => 'Spatie\\Permission\\Contracts\\Role',
          'roleattached' => 'Spatie\\Permission\\Events\\RoleAttached',
          'roledetached' => 'Spatie\\Permission\\Events\\RoleDetached',
          'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
        ),
         'className' => 'Spatie\\Permission\\Models\\Permission',
         'functionName' => 'hasExactRoles',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Spatie\\Permission\\Traits\\HasRoles',
         'traitData' => 
        array (
          0 => 'C:\\projects\\cacao\\backend\\vendor\\spatie\\laravel-permission\\src\\Models\\Permission.php',
          1 => 'Spatie\\Permission\\Models\\Permission',
          2 => 'Spatie\\Permission\\Traits\\HasRoles',
          3 => NULL,
          4 => NULL,
        ),
      )),
      'fe81c8affec4ef96ec32acfa0891ae47' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Spatie\\Permission\\Traits',
         'uses' => 
        array (
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'arr' => 'Illuminate\\Support\\Arr',
          'collection' => 'Illuminate\\Support\\Collection',
          'permission' => 'Spatie\\Permission\\Contracts\\Permission',
          'role' => 'Spatie\\Permission\\Contracts\\Role',
          'roleattached' => 'Spatie\\Permission\\Events\\RoleAttached',
          'roledetached' => 'Spatie\\Permission\\Events\\RoleDetached',
          'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
        ),
         'className' => 'Spatie\\Permission\\Models\\Permission',
         'functionName' => 'getDirectPermissions',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Spatie\\Permission\\Traits\\HasRoles',
         'traitData' => 
        array (
          0 => 'C:\\projects\\cacao\\backend\\vendor\\spatie\\laravel-permission\\src\\Models\\Permission.php',
          1 => 'Spatie\\Permission\\Models\\Permission',
          2 => 'Spatie\\Permission\\Traits\\HasRoles',
          3 => NULL,
          4 => NULL,
        ),
      )),
      'c3123cead751e6c9000c085cfa70d933' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Spatie\\Permission\\Traits',
         'uses' => 
        array (
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'arr' => 'Illuminate\\Support\\Arr',
          'collection' => 'Illuminate\\Support\\Collection',
          'permission' => 'Spatie\\Permission\\Contracts\\Permission',
          'role' => 'Spatie\\Permission\\Contracts\\Role',
          'roleattached' => 'Spatie\\Permission\\Events\\RoleAttached',
          'roledetached' => 'Spatie\\Permission\\Events\\RoleDetached',
          'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
        ),
         'className' => 'Spatie\\Permission\\Models\\Permission',
         'functionName' => 'getRoleNames',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Spatie\\Permission\\Traits\\HasRoles',
         'traitData' => 
        array (
          0 => 'C:\\projects\\cacao\\backend\\vendor\\spatie\\laravel-permission\\src\\Models\\Permission.php',
          1 => 'Spatie\\Permission\\Models\\Permission',
          2 => 'Spatie\\Permission\\Traits\\HasRoles',
          3 => NULL,
          4 => NULL,
        ),
      )),
      'b4f8e04c4b95a48edba446a7415ea250' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Spatie\\Permission\\Traits',
         'uses' => 
        array (
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'arr' => 'Illuminate\\Support\\Arr',
          'collection' => 'Illuminate\\Support\\Collection',
          'permission' => 'Spatie\\Permission\\Contracts\\Permission',
          'role' => 'Spatie\\Permission\\Contracts\\Role',
          'roleattached' => 'Spatie\\Permission\\Events\\RoleAttached',
          'roledetached' => 'Spatie\\Permission\\Events\\RoleDetached',
          'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
        ),
         'className' => 'Spatie\\Permission\\Models\\Permission',
         'functionName' => 'getStoredRole',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Spatie\\Permission\\Traits\\HasRoles',
         'traitData' => 
        array (
          0 => 'C:\\projects\\cacao\\backend\\vendor\\spatie\\laravel-permission\\src\\Models\\Permission.php',
          1 => 'Spatie\\Permission\\Models\\Permission',
          2 => 'Spatie\\Permission\\Traits\\HasRoles',
          3 => NULL,
          4 => NULL,
        ),
      )),
      '0c742e6f17ba7a7382b73b48afa47146' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Spatie\\Permission\\Traits',
         'uses' => 
        array (
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'arr' => 'Illuminate\\Support\\Arr',
          'collection' => 'Illuminate\\Support\\Collection',
          'permission' => 'Spatie\\Permission\\Contracts\\Permission',
          'role' => 'Spatie\\Permission\\Contracts\\Role',
          'roleattached' => 'Spatie\\Permission\\Events\\RoleAttached',
          'roledetached' => 'Spatie\\Permission\\Events\\RoleDetached',
          'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
        ),
         'className' => 'Spatie\\Permission\\Models\\Permission',
         'functionName' => 'convertPipeToArray',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Spatie\\Permission\\Traits\\HasRoles',
         'traitData' => 
        array (
          0 => 'C:\\projects\\cacao\\backend\\vendor\\spatie\\laravel-permission\\src\\Models\\Permission.php',
          1 => 'Spatie\\Permission\\Models\\Permission',
          2 => 'Spatie\\Permission\\Traits\\HasRoles',
          3 => NULL,
          4 => NULL,
        ),
      )),
      'ae301fbe50a2ad99342c61311df22720' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Spatie\\Permission\\Traits',
         'uses' => 
        array (
          'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
        ),
         'className' => 'Spatie\\Permission\\Models\\Permission',
         'functionName' => NULL,
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Spatie\\Permission\\Traits\\RefreshesPermissionCache',
         'traitData' => 
        array (
          0 => 'C:\\projects\\cacao\\backend\\vendor\\spatie\\laravel-permission\\src\\Models\\Permission.php',
          1 => 'Spatie\\Permission\\Models\\Permission',
          2 => 'Spatie\\Permission\\Traits\\RefreshesPermissionCache',
          3 => NULL,
          4 => NULL,
        ),
      )),
      '1322b0b49d19b51658a7a11cfc5c135a' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Spatie\\Permission\\Traits',
         'uses' => 
        array (
          'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
        ),
         'className' => 'Spatie\\Permission\\Models\\Permission',
         'functionName' => 'bootRefreshesPermissionCache',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Spatie\\Permission\\Traits\\RefreshesPermissionCache',
         'traitData' => 
        array (
          0 => 'C:\\projects\\cacao\\backend\\vendor\\spatie\\laravel-permission\\src\\Models\\Permission.php',
          1 => 'Spatie\\Permission\\Models\\Permission',
          2 => 'Spatie\\Permission\\Traits\\RefreshesPermissionCache',
          3 => NULL,
          4 => NULL,
        ),
      )),
      '649add75f9b7a7ba7a30883243434f58' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Spatie\\Permission\\Models',
         'uses' => 
        array (
          'collection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'carbon' => 'Illuminate\\Support\\Carbon',
          'permissioncontract' => 'Spatie\\Permission\\Contracts\\Permission',
          'permissionalreadyexists' => 'Spatie\\Permission\\Exceptions\\PermissionAlreadyExists',
          'permissiondoesnotexist' => 'Spatie\\Permission\\Exceptions\\PermissionDoesNotExist',
          'guard' => 'Spatie\\Permission\\Guard',
          'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
          'hasroles' => 'Spatie\\Permission\\Traits\\HasRoles',
          'refreshespermissioncache' => 'Spatie\\Permission\\Traits\\RefreshesPermissionCache',
        ),
         'className' => 'Spatie\\Permission\\Models\\Permission',
         'functionName' => '__construct',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Spatie\\Permission\\Models',
           'uses' => 
          array (
            'collection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'model' => 'Illuminate\\Database\\Eloquent\\Model',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'carbon' => 'Illuminate\\Support\\Carbon',
            'permissioncontract' => 'Spatie\\Permission\\Contracts\\Permission',
            'permissionalreadyexists' => 'Spatie\\Permission\\Exceptions\\PermissionAlreadyExists',
            'permissiondoesnotexist' => 'Spatie\\Permission\\Exceptions\\PermissionDoesNotExist',
            'guard' => 'Spatie\\Permission\\Guard',
            'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
            'hasroles' => 'Spatie\\Permission\\Traits\\HasRoles',
            'refreshespermissioncache' => 'Spatie\\Permission\\Traits\\RefreshesPermissionCache',
          ),
           'className' => 'Spatie\\Permission\\Models\\Permission',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'fc96dfab2f14b13f5b0b151742367e89' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Spatie\\Permission\\Models',
         'uses' => 
        array (
          'collection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'carbon' => 'Illuminate\\Support\\Carbon',
          'permissioncontract' => 'Spatie\\Permission\\Contracts\\Permission',
          'permissionalreadyexists' => 'Spatie\\Permission\\Exceptions\\PermissionAlreadyExists',
          'permissiondoesnotexist' => 'Spatie\\Permission\\Exceptions\\PermissionDoesNotExist',
          'guard' => 'Spatie\\Permission\\Guard',
          'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
          'hasroles' => 'Spatie\\Permission\\Traits\\HasRoles',
          'refreshespermissioncache' => 'Spatie\\Permission\\Traits\\RefreshesPermissionCache',
        ),
         'className' => 'Spatie\\Permission\\Models\\Permission',
         'functionName' => 'create',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Spatie\\Permission\\Models',
           'uses' => 
          array (
            'collection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'model' => 'Illuminate\\Database\\Eloquent\\Model',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'carbon' => 'Illuminate\\Support\\Carbon',
            'permissioncontract' => 'Spatie\\Permission\\Contracts\\Permission',
            'permissionalreadyexists' => 'Spatie\\Permission\\Exceptions\\PermissionAlreadyExists',
            'permissiondoesnotexist' => 'Spatie\\Permission\\Exceptions\\PermissionDoesNotExist',
            'guard' => 'Spatie\\Permission\\Guard',
            'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
            'hasroles' => 'Spatie\\Permission\\Traits\\HasRoles',
            'refreshespermissioncache' => 'Spatie\\Permission\\Traits\\RefreshesPermissionCache',
          ),
           'className' => 'Spatie\\Permission\\Models\\Permission',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'cdf5d09e4cb2af72ddec27dbc19ff1be' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Spatie\\Permission\\Models',
         'uses' => 
        array (
          'collection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'carbon' => 'Illuminate\\Support\\Carbon',
          'permissioncontract' => 'Spatie\\Permission\\Contracts\\Permission',
          'permissionalreadyexists' => 'Spatie\\Permission\\Exceptions\\PermissionAlreadyExists',
          'permissiondoesnotexist' => 'Spatie\\Permission\\Exceptions\\PermissionDoesNotExist',
          'guard' => 'Spatie\\Permission\\Guard',
          'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
          'hasroles' => 'Spatie\\Permission\\Traits\\HasRoles',
          'refreshespermissioncache' => 'Spatie\\Permission\\Traits\\RefreshesPermissionCache',
        ),
         'className' => 'Spatie\\Permission\\Models\\Permission',
         'functionName' => 'roles',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Spatie\\Permission\\Models',
           'uses' => 
          array (
            'collection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'model' => 'Illuminate\\Database\\Eloquent\\Model',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'carbon' => 'Illuminate\\Support\\Carbon',
            'permissioncontract' => 'Spatie\\Permission\\Contracts\\Permission',
            'permissionalreadyexists' => 'Spatie\\Permission\\Exceptions\\PermissionAlreadyExists',
            'permissiondoesnotexist' => 'Spatie\\Permission\\Exceptions\\PermissionDoesNotExist',
            'guard' => 'Spatie\\Permission\\Guard',
            'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
            'hasroles' => 'Spatie\\Permission\\Traits\\HasRoles',
            'refreshespermissioncache' => 'Spatie\\Permission\\Traits\\RefreshesPermissionCache',
          ),
           'className' => 'Spatie\\Permission\\Models\\Permission',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '845f795b0a5baf54fdf7e6dfa4f7bd30' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Spatie\\Permission\\Models',
         'uses' => 
        array (
          'collection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'carbon' => 'Illuminate\\Support\\Carbon',
          'permissioncontract' => 'Spatie\\Permission\\Contracts\\Permission',
          'permissionalreadyexists' => 'Spatie\\Permission\\Exceptions\\PermissionAlreadyExists',
          'permissiondoesnotexist' => 'Spatie\\Permission\\Exceptions\\PermissionDoesNotExist',
          'guard' => 'Spatie\\Permission\\Guard',
          'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
          'hasroles' => 'Spatie\\Permission\\Traits\\HasRoles',
          'refreshespermissioncache' => 'Spatie\\Permission\\Traits\\RefreshesPermissionCache',
        ),
         'className' => 'Spatie\\Permission\\Models\\Permission',
         'functionName' => 'users',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Spatie\\Permission\\Models',
           'uses' => 
          array (
            'collection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'model' => 'Illuminate\\Database\\Eloquent\\Model',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'carbon' => 'Illuminate\\Support\\Carbon',
            'permissioncontract' => 'Spatie\\Permission\\Contracts\\Permission',
            'permissionalreadyexists' => 'Spatie\\Permission\\Exceptions\\PermissionAlreadyExists',
            'permissiondoesnotexist' => 'Spatie\\Permission\\Exceptions\\PermissionDoesNotExist',
            'guard' => 'Spatie\\Permission\\Guard',
            'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
            'hasroles' => 'Spatie\\Permission\\Traits\\HasRoles',
            'refreshespermissioncache' => 'Spatie\\Permission\\Traits\\RefreshesPermissionCache',
          ),
           'className' => 'Spatie\\Permission\\Models\\Permission',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '8df35919534edc8f1b7289b018f20d18' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Spatie\\Permission\\Models',
         'uses' => 
        array (
          'collection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'carbon' => 'Illuminate\\Support\\Carbon',
          'permissioncontract' => 'Spatie\\Permission\\Contracts\\Permission',
          'permissionalreadyexists' => 'Spatie\\Permission\\Exceptions\\PermissionAlreadyExists',
          'permissiondoesnotexist' => 'Spatie\\Permission\\Exceptions\\PermissionDoesNotExist',
          'guard' => 'Spatie\\Permission\\Guard',
          'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
          'hasroles' => 'Spatie\\Permission\\Traits\\HasRoles',
          'refreshespermissioncache' => 'Spatie\\Permission\\Traits\\RefreshesPermissionCache',
        ),
         'className' => 'Spatie\\Permission\\Models\\Permission',
         'functionName' => 'findByName',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Spatie\\Permission\\Models',
           'uses' => 
          array (
            'collection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'model' => 'Illuminate\\Database\\Eloquent\\Model',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'carbon' => 'Illuminate\\Support\\Carbon',
            'permissioncontract' => 'Spatie\\Permission\\Contracts\\Permission',
            'permissionalreadyexists' => 'Spatie\\Permission\\Exceptions\\PermissionAlreadyExists',
            'permissiondoesnotexist' => 'Spatie\\Permission\\Exceptions\\PermissionDoesNotExist',
            'guard' => 'Spatie\\Permission\\Guard',
            'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
            'hasroles' => 'Spatie\\Permission\\Traits\\HasRoles',
            'refreshespermissioncache' => 'Spatie\\Permission\\Traits\\RefreshesPermissionCache',
          ),
           'className' => 'Spatie\\Permission\\Models\\Permission',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '6ec76c019c2c380ac62ddc565d2ec1df' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Spatie\\Permission\\Models',
         'uses' => 
        array (
          'collection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'carbon' => 'Illuminate\\Support\\Carbon',
          'permissioncontract' => 'Spatie\\Permission\\Contracts\\Permission',
          'permissionalreadyexists' => 'Spatie\\Permission\\Exceptions\\PermissionAlreadyExists',
          'permissiondoesnotexist' => 'Spatie\\Permission\\Exceptions\\PermissionDoesNotExist',
          'guard' => 'Spatie\\Permission\\Guard',
          'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
          'hasroles' => 'Spatie\\Permission\\Traits\\HasRoles',
          'refreshespermissioncache' => 'Spatie\\Permission\\Traits\\RefreshesPermissionCache',
        ),
         'className' => 'Spatie\\Permission\\Models\\Permission',
         'functionName' => 'findById',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Spatie\\Permission\\Models',
           'uses' => 
          array (
            'collection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'model' => 'Illuminate\\Database\\Eloquent\\Model',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'carbon' => 'Illuminate\\Support\\Carbon',
            'permissioncontract' => 'Spatie\\Permission\\Contracts\\Permission',
            'permissionalreadyexists' => 'Spatie\\Permission\\Exceptions\\PermissionAlreadyExists',
            'permissiondoesnotexist' => 'Spatie\\Permission\\Exceptions\\PermissionDoesNotExist',
            'guard' => 'Spatie\\Permission\\Guard',
            'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
            'hasroles' => 'Spatie\\Permission\\Traits\\HasRoles',
            'refreshespermissioncache' => 'Spatie\\Permission\\Traits\\RefreshesPermissionCache',
          ),
           'className' => 'Spatie\\Permission\\Models\\Permission',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '86e045c522b86197ec24faef08865432' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Spatie\\Permission\\Models',
         'uses' => 
        array (
          'collection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'carbon' => 'Illuminate\\Support\\Carbon',
          'permissioncontract' => 'Spatie\\Permission\\Contracts\\Permission',
          'permissionalreadyexists' => 'Spatie\\Permission\\Exceptions\\PermissionAlreadyExists',
          'permissiondoesnotexist' => 'Spatie\\Permission\\Exceptions\\PermissionDoesNotExist',
          'guard' => 'Spatie\\Permission\\Guard',
          'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
          'hasroles' => 'Spatie\\Permission\\Traits\\HasRoles',
          'refreshespermissioncache' => 'Spatie\\Permission\\Traits\\RefreshesPermissionCache',
        ),
         'className' => 'Spatie\\Permission\\Models\\Permission',
         'functionName' => 'findOrCreate',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Spatie\\Permission\\Models',
           'uses' => 
          array (
            'collection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'model' => 'Illuminate\\Database\\Eloquent\\Model',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'carbon' => 'Illuminate\\Support\\Carbon',
            'permissioncontract' => 'Spatie\\Permission\\Contracts\\Permission',
            'permissionalreadyexists' => 'Spatie\\Permission\\Exceptions\\PermissionAlreadyExists',
            'permissiondoesnotexist' => 'Spatie\\Permission\\Exceptions\\PermissionDoesNotExist',
            'guard' => 'Spatie\\Permission\\Guard',
            'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
            'hasroles' => 'Spatie\\Permission\\Traits\\HasRoles',
            'refreshespermissioncache' => 'Spatie\\Permission\\Traits\\RefreshesPermissionCache',
          ),
           'className' => 'Spatie\\Permission\\Models\\Permission',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '4bada6aff13e53f2f4492da1c548e956' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Spatie\\Permission\\Models',
         'uses' => 
        array (
          'collection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'carbon' => 'Illuminate\\Support\\Carbon',
          'permissioncontract' => 'Spatie\\Permission\\Contracts\\Permission',
          'permissionalreadyexists' => 'Spatie\\Permission\\Exceptions\\PermissionAlreadyExists',
          'permissiondoesnotexist' => 'Spatie\\Permission\\Exceptions\\PermissionDoesNotExist',
          'guard' => 'Spatie\\Permission\\Guard',
          'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
          'hasroles' => 'Spatie\\Permission\\Traits\\HasRoles',
          'refreshespermissioncache' => 'Spatie\\Permission\\Traits\\RefreshesPermissionCache',
        ),
         'className' => 'Spatie\\Permission\\Models\\Permission',
         'functionName' => 'getPermissions',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Spatie\\Permission\\Models',
           'uses' => 
          array (
            'collection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'model' => 'Illuminate\\Database\\Eloquent\\Model',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'carbon' => 'Illuminate\\Support\\Carbon',
            'permissioncontract' => 'Spatie\\Permission\\Contracts\\Permission',
            'permissionalreadyexists' => 'Spatie\\Permission\\Exceptions\\PermissionAlreadyExists',
            'permissiondoesnotexist' => 'Spatie\\Permission\\Exceptions\\PermissionDoesNotExist',
            'guard' => 'Spatie\\Permission\\Guard',
            'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
            'hasroles' => 'Spatie\\Permission\\Traits\\HasRoles',
            'refreshespermissioncache' => 'Spatie\\Permission\\Traits\\RefreshesPermissionCache',
          ),
           'className' => 'Spatie\\Permission\\Models\\Permission',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'a14417fd215c108738d1bf55f46b50ec' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Spatie\\Permission\\Models',
         'uses' => 
        array (
          'collection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'carbon' => 'Illuminate\\Support\\Carbon',
          'permissioncontract' => 'Spatie\\Permission\\Contracts\\Permission',
          'permissionalreadyexists' => 'Spatie\\Permission\\Exceptions\\PermissionAlreadyExists',
          'permissiondoesnotexist' => 'Spatie\\Permission\\Exceptions\\PermissionDoesNotExist',
          'guard' => 'Spatie\\Permission\\Guard',
          'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
          'hasroles' => 'Spatie\\Permission\\Traits\\HasRoles',
          'refreshespermissioncache' => 'Spatie\\Permission\\Traits\\RefreshesPermissionCache',
        ),
         'className' => 'Spatie\\Permission\\Models\\Permission',
         'functionName' => 'getPermission',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Spatie\\Permission\\Models',
           'uses' => 
          array (
            'collection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'model' => 'Illuminate\\Database\\Eloquent\\Model',
            'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'carbon' => 'Illuminate\\Support\\Carbon',
            'permissioncontract' => 'Spatie\\Permission\\Contracts\\Permission',
            'permissionalreadyexists' => 'Spatie\\Permission\\Exceptions\\PermissionAlreadyExists',
            'permissiondoesnotexist' => 'Spatie\\Permission\\Exceptions\\PermissionDoesNotExist',
            'guard' => 'Spatie\\Permission\\Guard',
            'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
            'hasroles' => 'Spatie\\Permission\\Traits\\HasRoles',
            'refreshespermissioncache' => 'Spatie\\Permission\\Traits\\RefreshesPermissionCache',
          ),
           'className' => 'Spatie\\Permission\\Models\\Permission',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
    ),
    1 => 
    array (
      'C:\\projects\\cacao\\backend\\vendor\\spatie\\laravel-permission\\src\\Models\\Permission.php' => '15d7bc7455a26c3fd6a4993ab3dc77e9bff63fd12f51344e8a52cd91ac0f6357',
      'C:\\projects\\cacao\\backend\\vendor\\composer\\..\\spatie\\laravel-permission\\src\\Traits\\HasRoles.php' => '2a592993c44a108bcce617ba904f42128ceebbddf464e87b2d40f6af986fce0f',
      'C:\\projects\\cacao\\backend\\vendor\\composer\\..\\spatie\\laravel-permission\\src\\Traits\\HasPermissions.php' => '89d1dc525802930071b0d69e4541279edee0de7e82f08b06f816d87b7fe8cd55',
      'C:\\projects\\cacao\\backend\\vendor\\composer\\..\\spatie\\laravel-permission\\src\\Traits\\RefreshesPermissionCache.php' => '370881494ee529b47bbc1faed96282b4faf9b828a35fc32ff9c766f1f4c2f69f',
    ),
  ),
));