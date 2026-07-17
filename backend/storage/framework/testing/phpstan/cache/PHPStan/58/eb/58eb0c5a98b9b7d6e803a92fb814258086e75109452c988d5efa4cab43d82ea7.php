<?php declare(strict_types = 1);

// odsl-C:\projects\cacao\backend\app\Services\Messaging\DisabledSmsOrderNotifier.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Services\Messaging\DisabledSmsOrderNotifier
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.2.32-23befabe1a59bc07f09ebefd48c6144d7ce39a6c46672748968e6f8686dc0286',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Services\\Messaging\\DisabledSmsOrderNotifier',
        'filename' => 'C:/projects/cacao/backend/app/Services/Messaging/DisabledSmsOrderNotifier.php',
      ),
    ),
    'namespace' => 'App\\Services\\Messaging',
    'name' => 'App\\Services\\Messaging\\DisabledSmsOrderNotifier',
    'shortName' => 'DisabledSmsOrderNotifier',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => NULL,
    'attributes' => 
    array (
    ),
    'startLine' => 8,
    'endLine' => 14,
    'startColumn' => 1,
    'endColumn' => 1,
    'parentClassName' => NULL,
    'implementsClassNames' => 
    array (
      0 => 'App\\Contracts\\SmsOrderNotifier',
    ),
    'traitClassNames' => 
    array (
    ),
    'immediateConstants' => 
    array (
    ),
    'immediateProperties' => 
    array (
    ),
    'immediateMethods' => 
    array (
      'send' => 
      array (
        'name' => 'send',
        'parameters' => 
        array (
          'order' => 
          array (
            'name' => 'order',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'App\\Models\\Order',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 10,
            'endLine' => 10,
            'startColumn' => 26,
            'endColumn' => 37,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'event' => 
          array (
            'name' => 'event',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'string',
                'isIdentifier' => true,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 10,
            'endLine' => 10,
            'startColumn' => 40,
            'endColumn' => 52,
            'parameterIndex' => 1,
            'isOptional' => false,
          ),
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionUnionType',
          'data' => 
          array (
            'types' => 
            array (
              0 => 
              array (
                'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
                'data' => 
                array (
                  'name' => 'string',
                  'isIdentifier' => true,
                ),
              ),
              1 => 
              array (
                'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
                'data' => 
                array (
                  'name' => 'null',
                  'isIdentifier' => true,
                ),
              ),
            ),
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 10,
        'endLine' => 13,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Services\\Messaging',
        'declaringClassName' => 'App\\Services\\Messaging\\DisabledSmsOrderNotifier',
        'implementingClassName' => 'App\\Services\\Messaging\\DisabledSmsOrderNotifier',
        'currentClassName' => 'App\\Services\\Messaging\\DisabledSmsOrderNotifier',
        'aliasName' => NULL,
      ),
    ),
    'traitsData' => 
    array (
      'aliases' => 
      array (
      ),
      'modifiers' => 
      array (
      ),
      'precedences' => 
      array (
      ),
      'hashes' => 
      array (
      ),
    ),
  ),
));