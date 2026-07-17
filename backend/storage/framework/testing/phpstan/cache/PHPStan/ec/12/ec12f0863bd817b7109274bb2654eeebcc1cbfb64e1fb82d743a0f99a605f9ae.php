<?php declare(strict_types = 1);

// osfsl-C:/projects/cacao/backend/vendor/composer/../google/auth/src/ProjectIdProviderInterface.php-PHPStan\BetterReflection\Reflection\ReflectionClass-Google\Auth\ProjectIdProviderInterface
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-d982ea2eb4803a17ee85a8fa9e8e17f0e07a0259a47e08e064d956a67d6cd462-8.2.32-6.70.0.3',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'Google\\Auth\\ProjectIdProviderInterface',
        'filename' => 'C:/projects/cacao/backend/vendor/composer/../google/auth/src/ProjectIdProviderInterface.php',
      ),
    ),
    'namespace' => 'Google\\Auth',
    'name' => 'Google\\Auth\\ProjectIdProviderInterface',
    'shortName' => 'ProjectIdProviderInterface',
    'isInterface' => true,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * Describes a Credentials object which supports fetching the project ID.
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 23,
    'endLine' => 32,
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
    ),
    'immediateMethods' => 
    array (
      'getProjectId' => 
      array (
        'name' => 'getProjectId',
        'parameters' => 
        array (
          'httpHandler' => 
          array (
            'name' => 'httpHandler',
            'default' => 
            array (
              'code' => 'null',
              'attributes' => 
              array (
                'startLine' => 31,
                'endLine' => 31,
                'startTokenPos' => 31,
                'startFilePos' => 959,
                'endTokenPos' => 31,
                'endFilePos' => 962,
              ),
            ),
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
                      'name' => 'callable',
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
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 31,
            'endLine' => 31,
            'startColumn' => 34,
            'endColumn' => 62,
            'parameterIndex' => 0,
            'isOptional' => true,
          ),
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Get the project ID.
 *
 * @param callable|null $httpHandler Callback which delivers psr7 request
 * @return string|null
 */',
        'startLine' => 31,
        'endLine' => 31,
        'startColumn' => 5,
        'endColumn' => 64,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Google\\Auth',
        'declaringClassName' => 'Google\\Auth\\ProjectIdProviderInterface',
        'implementingClassName' => 'Google\\Auth\\ProjectIdProviderInterface',
        'currentClassName' => 'Google\\Auth\\ProjectIdProviderInterface',
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