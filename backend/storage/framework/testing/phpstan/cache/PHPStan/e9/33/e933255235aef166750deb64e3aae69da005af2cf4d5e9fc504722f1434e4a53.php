<?php declare(strict_types = 1);

// osfsl-C:/projects/cacao/backend/vendor/composer/../google/auth/src/UpdateMetadataTrait.php-PHPStan\BetterReflection\Reflection\ReflectionClass-Google\Auth\UpdateMetadataTrait
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-f10d553abd87e5a05192750bc15b51a9e839cea6ae978c00ccb460a1a34efebc-8.2.32-6.70.0.3',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'Google\\Auth\\UpdateMetadataTrait',
        'filename' => 'C:/projects/cacao/backend/vendor/composer/../google/auth/src/UpdateMetadataTrait.php',
      ),
    ),
    'namespace' => 'Google\\Auth',
    'name' => 'Google\\Auth\\UpdateMetadataTrait',
    'shortName' => 'UpdateMetadataTrait',
    'isInterface' => false,
    'isTrait' => true,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * Provides shared methods for updating request metadata (request headers).
 *
 * Should implement {@see UpdateMetadataInterface} and {@see FetchAuthTokenInterface}.
 *
 * @internal
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 27,
    'endLine' => 74,
    'startColumn' => 1,
    'endColumn' => 1,
    'parentClassName' => NULL,
    'implementsClassNames' => 
    array (
    ),
    'traitClassNames' => 
    array (
      0 => 'Google\\Auth\\MetricsTrait',
    ),
    'immediateConstants' => 
    array (
    ),
    'immediateProperties' => 
    array (
    ),
    'immediateMethods' => 
    array (
      'getUpdateMetadataFunc' => 
      array (
        'name' => 'getUpdateMetadataFunc',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * export a callback function which updates runtime metadata.
 *
 * @deprecated
 * @return callable updateMetadata function
 */',
        'startLine' => 37,
        'endLine' => 40,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Google\\Auth',
        'declaringClassName' => 'Google\\Auth\\UpdateMetadataTrait',
        'implementingClassName' => 'Google\\Auth\\UpdateMetadataTrait',
        'currentClassName' => 'Google\\Auth\\UpdateMetadataTrait',
        'aliasName' => NULL,
      ),
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
            'startLine' => 51,
            'endLine' => 51,
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
                'startLine' => 52,
                'endLine' => 52,
                'startTokenPos' => 61,
                'startFilePos' => 1505,
                'endTokenPos' => 61,
                'endFilePos' => 1508,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 52,
            'endLine' => 52,
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
                'startLine' => 53,
                'endLine' => 53,
                'startTokenPos' => 71,
                'startFilePos' => 1544,
                'endTokenPos' => 71,
                'endFilePos' => 1547,
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
            'startLine' => 53,
            'endLine' => 53,
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
        'startLine' => 50,
        'endLine' => 73,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Google\\Auth',
        'declaringClassName' => 'Google\\Auth\\UpdateMetadataTrait',
        'implementingClassName' => 'Google\\Auth\\UpdateMetadataTrait',
        'currentClassName' => 'Google\\Auth\\UpdateMetadataTrait',
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