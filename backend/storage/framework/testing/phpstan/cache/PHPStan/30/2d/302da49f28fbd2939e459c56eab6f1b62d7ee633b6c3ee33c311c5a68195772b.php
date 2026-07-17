<?php declare(strict_types = 1);

// osfsl-C:/projects/cacao/backend/vendor/composer/../filament/support/src/Commands/AssetsCommand.php-PHPStan\BetterReflection\Reflection\ReflectionClass-Filament\Support\Commands\AssetsCommand
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-34d6f321b57e492981f3c78919f7722aad055cf610b1790542f6863aef6e6b7c-8.2.32-6.70.0.3',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'Filament\\Support\\Commands\\AssetsCommand',
        'filename' => 'C:/projects/cacao/backend/vendor/composer/../filament/support/src/Commands/AssetsCommand.php',
      ),
    ),
    'namespace' => 'Filament\\Support\\Commands',
    'name' => 'Filament\\Support\\Commands\\AssetsCommand',
    'shortName' => 'AssetsCommand',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => NULL,
    'attributes' => 
    array (
      0 => 
      array (
        'name' => 'Symfony\\Component\\Console\\Attribute\\AsCommand',
        'isRepeated' => false,
        'arguments' => 
        array (
          'name' => 
          array (
            'code' => '\'filament:assets\'',
            'attributes' => 
            array (
              'startLine' => 11,
              'endLine' => 11,
              'startTokenPos' => 38,
              'startFilePos' => 288,
              'endTokenPos' => 38,
              'endFilePos' => 304,
            ),
          ),
        ),
      ),
    ),
    'startLine' => 11,
    'endLine' => 91,
    'startColumn' => 1,
    'endColumn' => 1,
    'parentClassName' => 'Illuminate\\Console\\Command',
    'implementsClassNames' => 
    array (
    ),
    'traitClassNames' => 
    array (
      0 => 'Filament\\Support\\Commands\\Concerns\\CanManipulateFiles',
    ),
    'immediateConstants' => 
    array (
    ),
    'immediateProperties' => 
    array (
      'description' => 
      array (
        'declaringClassName' => 'Filament\\Support\\Commands\\AssetsCommand',
        'implementingClassName' => 'Filament\\Support\\Commands\\AssetsCommand',
        'name' => 'description',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '\'Set up Filament assets\'',
          'attributes' => 
          array (
            'startLine' => 16,
            'endLine' => 16,
            'startTokenPos' => 63,
            'startFilePos' => 404,
            'endTokenPos' => 63,
            'endFilePos' => 427,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 16,
        'endLine' => 16,
        'startColumn' => 5,
        'endColumn' => 54,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'name' => 
      array (
        'declaringClassName' => 'Filament\\Support\\Commands\\AssetsCommand',
        'implementingClassName' => 'Filament\\Support\\Commands\\AssetsCommand',
        'name' => 'name',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '\'filament:assets\'',
          'attributes' => 
          array (
            'startLine' => 18,
            'endLine' => 18,
            'startTokenPos' => 72,
            'startFilePos' => 453,
            'endTokenPos' => 72,
            'endFilePos' => 469,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 18,
        'endLine' => 18,
        'startColumn' => 5,
        'endColumn' => 40,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'publishedAssets' => 
      array (
        'declaringClassName' => 'Filament\\Support\\Commands\\AssetsCommand',
        'implementingClassName' => 'Filament\\Support\\Commands\\AssetsCommand',
        'name' => 'publishedAssets',
        'modifiers' => 2,
        'type' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'array',
            'isIdentifier' => true,
          ),
        ),
        'default' => 
        array (
          'code' => '[]',
          'attributes' => 
          array (
            'startLine' => 21,
            'endLine' => 21,
            'startTokenPos' => 85,
            'startFilePos' => 542,
            'endTokenPos' => 86,
            'endFilePos' => 543,
          ),
        ),
        'docComment' => '/** @var array<string> */',
        'attributes' => 
        array (
        ),
        'startLine' => 21,
        'endLine' => 21,
        'startColumn' => 5,
        'endColumn' => 42,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
    ),
    'immediateMethods' => 
    array (
      'handle' => 
      array (
        'name' => 'handle',
        'parameters' => 
        array (
          'filesystem' => 
          array (
            'name' => 'filesystem',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'Illuminate\\Filesystem\\Filesystem',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 23,
            'endLine' => 23,
            'startColumn' => 28,
            'endColumn' => 49,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'int',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 23,
        'endLine' => 74,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Filament\\Support\\Commands',
        'declaringClassName' => 'Filament\\Support\\Commands\\AssetsCommand',
        'implementingClassName' => 'Filament\\Support\\Commands\\AssetsCommand',
        'currentClassName' => 'Filament\\Support\\Commands\\AssetsCommand',
        'aliasName' => NULL,
      ),
      'copyAsset' => 
      array (
        'name' => 'copyAsset',
        'parameters' => 
        array (
          'from' => 
          array (
            'name' => 'from',
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
            'startLine' => 76,
            'endLine' => 76,
            'startColumn' => 34,
            'endColumn' => 45,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'to' => 
          array (
            'name' => 'to',
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
            'startLine' => 76,
            'endLine' => 76,
            'startColumn' => 48,
            'endColumn' => 57,
            'parameterIndex' => 1,
            'isOptional' => false,
          ),
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'void',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 76,
        'endLine' => 90,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'Filament\\Support\\Commands',
        'declaringClassName' => 'Filament\\Support\\Commands\\AssetsCommand',
        'implementingClassName' => 'Filament\\Support\\Commands\\AssetsCommand',
        'currentClassName' => 'Filament\\Support\\Commands\\AssetsCommand',
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