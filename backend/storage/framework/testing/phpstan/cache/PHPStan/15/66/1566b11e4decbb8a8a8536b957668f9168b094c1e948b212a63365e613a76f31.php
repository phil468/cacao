<?php declare(strict_types = 1);

// osfsl-C:/projects/cacao/backend/vendor/composer/../filament/forms/src/Components/Concerns/InteractsWithToolbarButtons.php-PHPStan\BetterReflection\Reflection\ReflectionClass-Filament\Forms\Components\Concerns\InteractsWithToolbarButtons
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-0df342813ded5ac66e1238c93cdad8a8c5269a494f324b65b9c75357f83ae9c2-8.2.32-6.70.0.3',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'Filament\\Forms\\Components\\Concerns\\InteractsWithToolbarButtons',
        'filename' => 'C:/projects/cacao/backend/vendor/composer/../filament/forms/src/Components/Concerns/InteractsWithToolbarButtons.php',
      ),
    ),
    'namespace' => 'Filament\\Forms\\Components\\Concerns',
    'name' => 'Filament\\Forms\\Components\\Concerns\\InteractsWithToolbarButtons',
    'shortName' => 'InteractsWithToolbarButtons',
    'isInterface' => false,
    'isTrait' => true,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => NULL,
    'attributes' => 
    array (
    ),
    'startLine' => 9,
    'endLine' => 307,
    'startColumn' => 1,
    'endColumn' => 1,
    'parentClassName' => NULL,
    'implementsClassNames' => 
    array (
    ),
    'traitClassNames' => 
    array (
    ),
    'immediateConstants' => 
    array (
    ),
    'immediateProperties' => 
    array (
      'toolbarButtons' => 
      array (
        'declaringClassName' => 'Filament\\Forms\\Components\\Concerns\\InteractsWithToolbarButtons',
        'implementingClassName' => 'Filament\\Forms\\Components\\Concerns\\InteractsWithToolbarButtons',
        'name' => 'toolbarButtons',
        'modifiers' => 2,
        'type' => 
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
                  'name' => 'array',
                  'isIdentifier' => true,
                ),
              ),
              1 => 
              array (
                'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
                'data' => 
                array (
                  'name' => 'Closure',
                  'isIdentifier' => false,
                ),
              ),
              2 => 
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
        'default' => 
        array (
          'code' => 'null',
          'attributes' => 
          array (
            'startLine' => 14,
            'endLine' => 14,
            'startTokenPos' => 46,
            'startFilePos' => 297,
            'endTokenPos' => 46,
            'endFilePos' => 300,
          ),
        ),
        'docComment' => '/**
 * @var array<int, string | object | array<int, string | object>> | Closure | null
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 14,
        'endLine' => 14,
        'startColumn' => 5,
        'endColumn' => 60,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'toolbarButtonsModifications' => 
      array (
        'declaringClassName' => 'Filament\\Forms\\Components\\Concerns\\InteractsWithToolbarButtons',
        'implementingClassName' => 'Filament\\Forms\\Components\\Concerns\\InteractsWithToolbarButtons',
        'name' => 'toolbarButtonsModifications',
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
            'startLine' => 19,
            'endLine' => 19,
            'startTokenPos' => 59,
            'startFilePos' => 435,
            'endTokenPos' => 60,
            'endFilePos' => 436,
          ),
        ),
        'docComment' => '/**
 * @var array<array{type: string, buttons?: array<string>}>
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 19,
        'endLine' => 19,
        'startColumn' => 5,
        'endColumn' => 54,
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
      'disableAllToolbarButtons' => 
      array (
        'name' => 'disableAllToolbarButtons',
        'parameters' => 
        array (
          'condition' => 
          array (
            'name' => 'condition',
            'default' => 
            array (
              'code' => 'true',
              'attributes' => 
              array (
                'startLine' => 21,
                'endLine' => 21,
                'startTokenPos' => 75,
                'startFilePos' => 503,
                'endTokenPos' => 75,
                'endFilePos' => 506,
              ),
            ),
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'bool',
                'isIdentifier' => true,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 21,
            'endLine' => 21,
            'startColumn' => 46,
            'endColumn' => 67,
            'parameterIndex' => 0,
            'isOptional' => true,
          ),
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'static',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 21,
        'endLine' => 28,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Filament\\Forms\\Components\\Concerns',
        'declaringClassName' => 'Filament\\Forms\\Components\\Concerns\\InteractsWithToolbarButtons',
        'implementingClassName' => 'Filament\\Forms\\Components\\Concerns\\InteractsWithToolbarButtons',
        'currentClassName' => 'Filament\\Forms\\Components\\Concerns\\InteractsWithToolbarButtons',
        'aliasName' => NULL,
      ),
      'disableToolbarButtons' => 
      array (
        'name' => 'disableToolbarButtons',
        'parameters' => 
        array (
          'buttonsToDisable' => 
          array (
            'name' => 'buttonsToDisable',
            'default' => 
            array (
              'code' => '[]',
              'attributes' => 
              array (
                'startLine' => 33,
                'endLine' => 33,
                'startTokenPos' => 131,
                'startFilePos' => 814,
                'endTokenPos' => 132,
                'endFilePos' => 815,
              ),
            ),
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'array',
                'isIdentifier' => true,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 33,
            'endLine' => 33,
            'startColumn' => 43,
            'endColumn' => 70,
            'parameterIndex' => 0,
            'isOptional' => true,
          ),
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'static',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * @param  array<string | array<string>>  $buttonsToDisable
 */',
        'startLine' => 33,
        'endLine' => 45,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Filament\\Forms\\Components\\Concerns',
        'declaringClassName' => 'Filament\\Forms\\Components\\Concerns\\InteractsWithToolbarButtons',
        'implementingClassName' => 'Filament\\Forms\\Components\\Concerns\\InteractsWithToolbarButtons',
        'currentClassName' => 'Filament\\Forms\\Components\\Concerns\\InteractsWithToolbarButtons',
        'aliasName' => NULL,
      ),
      'enableToolbarButtons' => 
      array (
        'name' => 'enableToolbarButtons',
        'parameters' => 
        array (
          'buttonsToEnable' => 
          array (
            'name' => 'buttonsToEnable',
            'default' => 
            array (
              'code' => '[]',
              'attributes' => 
              array (
                'startLine' => 50,
                'endLine' => 50,
                'startTokenPos' => 214,
                'startFilePos' => 1452,
                'endTokenPos' => 215,
                'endFilePos' => 1453,
              ),
            ),
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'array',
                'isIdentifier' => true,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 50,
            'endLine' => 50,
            'startColumn' => 42,
            'endColumn' => 68,
            'parameterIndex' => 0,
            'isOptional' => true,
          ),
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'static',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * @param  array<string | object | array<string | object>>  $buttonsToEnable
 */',
        'startLine' => 50,
        'endLine' => 62,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Filament\\Forms\\Components\\Concerns',
        'declaringClassName' => 'Filament\\Forms\\Components\\Concerns\\InteractsWithToolbarButtons',
        'implementingClassName' => 'Filament\\Forms\\Components\\Concerns\\InteractsWithToolbarButtons',
        'currentClassName' => 'Filament\\Forms\\Components\\Concerns\\InteractsWithToolbarButtons',
        'aliasName' => NULL,
      ),
      'toolbarButtons' => 
      array (
        'name' => 'toolbarButtons',
        'parameters' => 
        array (
          'buttons' => 
          array (
            'name' => 'buttons',
            'default' => NULL,
            'type' => 
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
                      'name' => 'array',
                      'isIdentifier' => true,
                    ),
                  ),
                  1 => 
                  array (
                    'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
                    'data' => 
                    array (
                      'name' => 'Closure',
                      'isIdentifier' => false,
                    ),
                  ),
                  2 => 
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
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 67,
            'endLine' => 67,
            'startColumn' => 36,
            'endColumn' => 66,
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
            'name' => 'static',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * @param  array<int, string | object | array<int, string | object>> | Closure | null  $buttons
 */',
        'startLine' => 67,
        'endLine' => 73,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Filament\\Forms\\Components\\Concerns',
        'declaringClassName' => 'Filament\\Forms\\Components\\Concerns\\InteractsWithToolbarButtons',
        'implementingClassName' => 'Filament\\Forms\\Components\\Concerns\\InteractsWithToolbarButtons',
        'currentClassName' => 'Filament\\Forms\\Components\\Concerns\\InteractsWithToolbarButtons',
        'aliasName' => NULL,
      ),
      'getToolbarButtons' => 
      array (
        'name' => 'getToolbarButtons',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'array',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * @return array<array<string | object>>
 */',
        'startLine' => 78,
        'endLine' => 125,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Filament\\Forms\\Components\\Concerns',
        'declaringClassName' => 'Filament\\Forms\\Components\\Concerns\\InteractsWithToolbarButtons',
        'implementingClassName' => 'Filament\\Forms\\Components\\Concerns\\InteractsWithToolbarButtons',
        'currentClassName' => 'Filament\\Forms\\Components\\Concerns\\InteractsWithToolbarButtons',
        'aliasName' => NULL,
      ),
      'applyDisableToolbarButtonsModification' => 
      array (
        'name' => 'applyDisableToolbarButtonsModification',
        'parameters' => 
        array (
          'buttons' => 
          array (
            'name' => 'buttons',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'array',
                'isIdentifier' => true,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 132,
            'endLine' => 132,
            'startColumn' => 63,
            'endColumn' => 76,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'buttonsToDisable' => 
          array (
            'name' => 'buttonsToDisable',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'array',
                'isIdentifier' => true,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 132,
            'endLine' => 132,
            'startColumn' => 79,
            'endColumn' => 101,
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
            'name' => 'array',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * @param  array<int, string | object | array<int, string | object>>  $buttons
 * @param  array<string>  $buttonsToDisable
 * @return array<int, string | object | array<int, string | object>>
 */',
        'startLine' => 132,
        'endLine' => 179,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'Filament\\Forms\\Components\\Concerns',
        'declaringClassName' => 'Filament\\Forms\\Components\\Concerns\\InteractsWithToolbarButtons',
        'implementingClassName' => 'Filament\\Forms\\Components\\Concerns\\InteractsWithToolbarButtons',
        'currentClassName' => 'Filament\\Forms\\Components\\Concerns\\InteractsWithToolbarButtons',
        'aliasName' => NULL,
      ),
      'filterDisabledToolbarButtonsFromItem' => 
      array (
        'name' => 'filterDisabledToolbarButtonsFromItem',
        'parameters' => 
        array (
          'item' => 
          array (
            'name' => 'item',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'object',
                'isIdentifier' => true,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 184,
            'endLine' => 184,
            'startColumn' => 61,
            'endColumn' => 72,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'buttonsToDisable' => 
          array (
            'name' => 'buttonsToDisable',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'array',
                'isIdentifier' => true,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 184,
            'endLine' => 184,
            'startColumn' => 75,
            'endColumn' => 97,
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
                  'name' => 'object',
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
        'docComment' => '/**
 * @param  array<string>  $buttonsToDisable
 */',
        'startLine' => 184,
        'endLine' => 187,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'Filament\\Forms\\Components\\Concerns',
        'declaringClassName' => 'Filament\\Forms\\Components\\Concerns\\InteractsWithToolbarButtons',
        'implementingClassName' => 'Filament\\Forms\\Components\\Concerns\\InteractsWithToolbarButtons',
        'currentClassName' => 'Filament\\Forms\\Components\\Concerns\\InteractsWithToolbarButtons',
        'aliasName' => NULL,
      ),
      'applyEnableToolbarButtonsModification' => 
      array (
        'name' => 'applyEnableToolbarButtonsModification',
        'parameters' => 
        array (
          'buttons' => 
          array (
            'name' => 'buttons',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'array',
                'isIdentifier' => true,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 194,
            'endLine' => 194,
            'startColumn' => 62,
            'endColumn' => 75,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'buttonsToEnable' => 
          array (
            'name' => 'buttonsToEnable',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'array',
                'isIdentifier' => true,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 194,
            'endLine' => 194,
            'startColumn' => 78,
            'endColumn' => 99,
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
            'name' => 'array',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * @param  array<int, string | object | array<int, string | object>>  $buttons
 * @param  array<int, string | object | array<int, string | object>>  $buttonsToEnable
 * @return array<int, string | object | array<int, string | object>>
 */',
        'startLine' => 194,
        'endLine' => 237,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'Filament\\Forms\\Components\\Concerns',
        'declaringClassName' => 'Filament\\Forms\\Components\\Concerns\\InteractsWithToolbarButtons',
        'implementingClassName' => 'Filament\\Forms\\Components\\Concerns\\InteractsWithToolbarButtons',
        'currentClassName' => 'Filament\\Forms\\Components\\Concerns\\InteractsWithToolbarButtons',
        'aliasName' => NULL,
      ),
      'hasToolbarButtonInButtons' => 
      array (
        'name' => 'hasToolbarButtonInButtons',
        'parameters' => 
        array (
          'buttons' => 
          array (
            'name' => 'buttons',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'array',
                'isIdentifier' => true,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 242,
            'endLine' => 242,
            'startColumn' => 50,
            'endColumn' => 63,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'button' => 
          array (
            'name' => 'button',
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
            'startLine' => 242,
            'endLine' => 242,
            'startColumn' => 66,
            'endColumn' => 79,
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
            'name' => 'bool',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * @param  array<int, string | object | array<int, string | object>>  $buttons
 */',
        'startLine' => 242,
        'endLine' => 263,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'Filament\\Forms\\Components\\Concerns',
        'declaringClassName' => 'Filament\\Forms\\Components\\Concerns\\InteractsWithToolbarButtons',
        'implementingClassName' => 'Filament\\Forms\\Components\\Concerns\\InteractsWithToolbarButtons',
        'currentClassName' => 'Filament\\Forms\\Components\\Concerns\\InteractsWithToolbarButtons',
        'aliasName' => NULL,
      ),
      'hasToolbarButtonInItem' => 
      array (
        'name' => 'hasToolbarButtonInItem',
        'parameters' => 
        array (
          'item' => 
          array (
            'name' => 'item',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'object',
                'isIdentifier' => true,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 265,
            'endLine' => 265,
            'startColumn' => 47,
            'endColumn' => 58,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'button' => 
          array (
            'name' => 'button',
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
            'startLine' => 265,
            'endLine' => 265,
            'startColumn' => 61,
            'endColumn' => 74,
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
            'name' => 'bool',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 265,
        'endLine' => 268,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'Filament\\Forms\\Components\\Concerns',
        'declaringClassName' => 'Filament\\Forms\\Components\\Concerns\\InteractsWithToolbarButtons',
        'implementingClassName' => 'Filament\\Forms\\Components\\Concerns\\InteractsWithToolbarButtons',
        'currentClassName' => 'Filament\\Forms\\Components\\Concerns\\InteractsWithToolbarButtons',
        'aliasName' => NULL,
      ),
      'getExtraToolbarButtonsModifications' => 
      array (
        'name' => 'getExtraToolbarButtonsModifications',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'array',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * @return array<array{type: string, buttons?: array<string | array<string | array<string>>>}>
 */',
        'startLine' => 273,
        'endLine' => 276,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'Filament\\Forms\\Components\\Concerns',
        'declaringClassName' => 'Filament\\Forms\\Components\\Concerns\\InteractsWithToolbarButtons',
        'implementingClassName' => 'Filament\\Forms\\Components\\Concerns\\InteractsWithToolbarButtons',
        'currentClassName' => 'Filament\\Forms\\Components\\Concerns\\InteractsWithToolbarButtons',
        'aliasName' => NULL,
      ),
      'getDefaultToolbarButtons' => 
      array (
        'name' => 'getDefaultToolbarButtons',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'array',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * @return array<string | array<string>>
 */',
        'startLine' => 281,
        'endLine' => 284,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Filament\\Forms\\Components\\Concerns',
        'declaringClassName' => 'Filament\\Forms\\Components\\Concerns\\InteractsWithToolbarButtons',
        'implementingClassName' => 'Filament\\Forms\\Components\\Concerns\\InteractsWithToolbarButtons',
        'currentClassName' => 'Filament\\Forms\\Components\\Concerns\\InteractsWithToolbarButtons',
        'aliasName' => NULL,
      ),
      'hasToolbarButton' => 
      array (
        'name' => 'hasToolbarButton',
        'parameters' => 
        array (
          'button' => 
          array (
            'name' => 'button',
            'default' => NULL,
            'type' => 
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
                      'name' => 'array',
                      'isIdentifier' => true,
                    ),
                  ),
                ),
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 289,
            'endLine' => 289,
            'startColumn' => 38,
            'endColumn' => 59,
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
            'name' => 'bool',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * @param  string | array<string>  $button
 */',
        'startLine' => 289,
        'endLine' => 301,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Filament\\Forms\\Components\\Concerns',
        'declaringClassName' => 'Filament\\Forms\\Components\\Concerns\\InteractsWithToolbarButtons',
        'implementingClassName' => 'Filament\\Forms\\Components\\Concerns\\InteractsWithToolbarButtons',
        'currentClassName' => 'Filament\\Forms\\Components\\Concerns\\InteractsWithToolbarButtons',
        'aliasName' => NULL,
      ),
      'hasCustomToolbarButtons' => 
      array (
        'name' => 'hasCustomToolbarButtons',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'bool',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 303,
        'endLine' => 306,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Filament\\Forms\\Components\\Concerns',
        'declaringClassName' => 'Filament\\Forms\\Components\\Concerns\\InteractsWithToolbarButtons',
        'implementingClassName' => 'Filament\\Forms\\Components\\Concerns\\InteractsWithToolbarButtons',
        'currentClassName' => 'Filament\\Forms\\Components\\Concerns\\InteractsWithToolbarButtons',
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