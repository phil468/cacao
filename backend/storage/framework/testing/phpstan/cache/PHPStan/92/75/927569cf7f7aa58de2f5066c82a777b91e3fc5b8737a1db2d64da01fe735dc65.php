<?php declare(strict_types = 1);

// osfsl-C:/projects/cacao/backend/vendor/composer/../google/auth/src/UpdateMetadataInterface.php-PHPStan\BetterReflection\Reflection\ReflectionClass-Google\Auth\UpdateMetadataInterface
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-2aa89b88f5680b5bbaf33398ca4fc5731f4ce16efc120272b3204df06e806661-8.2.32-6.70.0.3',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'Google\\Auth\\UpdateMetadataInterface',
        'filename' => 'C:/projects/cacao/backend/vendor/composer/../google/auth/src/UpdateMetadataInterface.php',
      ),
    ),
    'namespace' => 'Google\\Auth',
    'name' => 'Google\\Auth\\UpdateMetadataInterface',
    'shortName' => 'UpdateMetadataInterface',
    'isInterface' => true,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * Describes a Credentials object which supports updating request metadata
 * (request headers).
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 24,
    'endLine' => 41,
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
      'AUTH_METADATA_KEY' => 
      array (
        'declaringClassName' => 'Google\\Auth\\UpdateMetadataInterface',
        'implementingClassName' => 'Google\\Auth\\UpdateMetadataInterface',
        'name' => 'AUTH_METADATA_KEY',
        'modifiers' => 1,
        'type' => NULL,
        'value' => 
        array (
          'code' => '\'authorization\'',
          'attributes' => 
          array (
            'startLine' => 26,
            'endLine' => 26,
            'startTokenPos' => 22,
            'startFilePos' => 796,
            'endTokenPos' => 22,
            'endFilePos' => 810,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 26,
        'endLine' => 26,
        'startColumn' => 5,
        'endColumn' => 46,
      ),
    ),
    'immediateProperties' => 
    array (
    ),
    'immediateMethods' => 
    array (
      'updateMetadata' => 
      array (
        'name' => 'updateMetadata',
        'parameters' => 
        array (
          'metadata' => 
          array (
            'name' => 'metadata',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 37,
            'endLine' => 37,
            'startColumn' => 9,
            'endColumn' => 17,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'authUri' => 
          array (
            'name' => 'authUri',
            'default' => 
            array (
              'code' => 'null',
              'attributes' => 
              array (
                'startLine' => 38,
                'endLine' => 38,
                'startTokenPos' => 41,
                'startFilePos' => 1198,
                'endTokenPos' => 41,
                'endFilePos' => 1201,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 38,
            'endLine' => 38,
            'startColumn' => 9,
            'endColumn' => 23,
            'parameterIndex' => 1,
            'isOptional' => true,
          ),
          'httpHandler' => 
          array (
            'name' => 'httpHandler',
            'default' => 
            array (
              'code' => 'null',
              'attributes' => 
              array (
                'startLine' => 39,
                'endLine' => 39,
                'startTokenPos' => 51,
                'startFilePos' => 1237,
                'endTokenPos' => 51,
                'endFilePos' => 1240,
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
            'startLine' => 39,
            'endLine' => 39,
            'startColumn' => 9,
            'endColumn' => 37,
            'parameterIndex' => 2,
            'isOptional' => true,
          ),
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Updates metadata with the authorization token.
 *
 * @param array<mixed> $metadata metadata hashmap
 * @param string $authUri optional auth uri
 * @param callable|null $httpHandler callback which delivers psr7 request
 * @return array<mixed> updated metadata hashmap
 */',
        'startLine' => 36,
        'endLine' => 40,
        'startColumn' => 5,
        'endColumn' => 6,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Google\\Auth',
        'declaringClassName' => 'Google\\Auth\\UpdateMetadataInterface',
        'implementingClassName' => 'Google\\Auth\\UpdateMetadataInterface',
        'currentClassName' => 'Google\\Auth\\UpdateMetadataInterface',
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