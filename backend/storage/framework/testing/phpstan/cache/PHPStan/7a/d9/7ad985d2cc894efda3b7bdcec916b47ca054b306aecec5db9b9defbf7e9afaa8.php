<?php declare(strict_types = 1);

// osfsl-C:/projects/cacao/backend/vendor/composer/../google/auth/src/MetricsTrait.php-PHPStan\BetterReflection\Reflection\ReflectionClass-Google\Auth\MetricsTrait
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-d9dca559a9a40838e2ceaadebb56c2b00825a599b6b6a1040e83b3a98d7f92ec-8.2.32-6.70.0.3',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'Google\\Auth\\MetricsTrait',
        'filename' => 'C:/projects/cacao/backend/vendor/composer/../google/auth/src/MetricsTrait.php',
      ),
    ),
    'namespace' => 'Google\\Auth',
    'name' => 'Google\\Auth\\MetricsTrait',
    'shortName' => 'MetricsTrait',
    'isInterface' => false,
    'isTrait' => true,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * Trait containing helper methods required for enabling
 * observability metrics in the library.
 *
 * @internal
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 26,
    'endLine' => 120,
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
      'version' => 
      array (
        'declaringClassName' => 'Google\\Auth\\MetricsTrait',
        'implementingClassName' => 'Google\\Auth\\MetricsTrait',
        'name' => 'version',
        'modifiers' => 20,
        'type' => NULL,
        'default' => NULL,
        'docComment' => '/**
 * @var string The version of the auth library php.
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 31,
        'endLine' => 31,
        'startColumn' => 5,
        'endColumn' => 28,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'metricMetadataKey' => 
      array (
        'declaringClassName' => 'Google\\Auth\\MetricsTrait',
        'implementingClassName' => 'Google\\Auth\\MetricsTrait',
        'name' => 'metricMetadataKey',
        'modifiers' => 18,
        'type' => NULL,
        'default' => 
        array (
          'code' => '\'x-goog-api-client\'',
          'attributes' => 
          array (
            'startLine' => 36,
            'endLine' => 36,
            'startTokenPos' => 35,
            'startFilePos' => 994,
            'endTokenPos' => 35,
            'endFilePos' => 1012,
          ),
        ),
        'docComment' => '/**
 * @var string The header key for the observability metrics.
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 36,
        'endLine' => 36,
        'startColumn' => 5,
        'endColumn' => 62,
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
      'getMetricsHeader' => 
      array (
        'name' => 'getMetricsHeader',
        'parameters' => 
        array (
          'credType' => 
          array (
            'name' => 'credType',
            'default' => 
            array (
              'code' => '\'\'',
              'attributes' => 
              array (
                'startLine' => 48,
                'endLine' => 48,
                'startTokenPos' => 53,
                'startFilePos' => 1584,
                'endTokenPos' => 53,
                'endFilePos' => 1585,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 48,
            'endLine' => 48,
            'startColumn' => 9,
            'endColumn' => 22,
            'parameterIndex' => 0,
            'isOptional' => true,
          ),
          'authRequestType' => 
          array (
            'name' => 'authRequestType',
            'default' => 
            array (
              'code' => '\'\'',
              'attributes' => 
              array (
                'startLine' => 49,
                'endLine' => 49,
                'startTokenPos' => 60,
                'startFilePos' => 1615,
                'endTokenPos' => 60,
                'endFilePos' => 1616,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 49,
            'endLine' => 49,
            'startColumn' => 9,
            'endColumn' => 29,
            'parameterIndex' => 1,
            'isOptional' => true,
          ),
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'string',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * @param string $credType [Optional] The credential type.
 *        Empty value will not add any credential type to the header.
 *        Should be one of `\'sa\'`, `\'jwt\'`, `\'imp\'`, `\'mds\'`, `\'u\'`.
 * @param string $authRequestType [Optional] The auth request type.
 *        Empty value will not add any auth request type to the header.
 *        Should be one of `\'at\'`, `\'it\'`, `\'mds\'`.
 * @return string The header value for the observability metrics.
 */',
        'startLine' => 47,
        'endLine' => 66,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 18,
        'namespace' => 'Google\\Auth',
        'declaringClassName' => 'Google\\Auth\\MetricsTrait',
        'implementingClassName' => 'Google\\Auth\\MetricsTrait',
        'currentClassName' => 'Google\\Auth\\MetricsTrait',
        'aliasName' => NULL,
      ),
      'applyServiceApiUsageMetrics' => 
      array (
        'name' => 'applyServiceApiUsageMetrics',
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
            'startLine' => 72,
            'endLine' => 72,
            'startColumn' => 52,
            'endColumn' => 60,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * @param array<mixed> $metadata The metadata to update and return.
 * @return array<mixed> The updated metadata.
 */',
        'startLine' => 72,
        'endLine' => 90,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'Google\\Auth',
        'declaringClassName' => 'Google\\Auth\\MetricsTrait',
        'implementingClassName' => 'Google\\Auth\\MetricsTrait',
        'currentClassName' => 'Google\\Auth\\MetricsTrait',
        'aliasName' => NULL,
      ),
      'applyTokenEndpointMetrics' => 
      array (
        'name' => 'applyTokenEndpointMetrics',
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
            'startLine' => 98,
            'endLine' => 98,
            'startColumn' => 50,
            'endColumn' => 58,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'authRequestType' => 
          array (
            'name' => 'authRequestType',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 98,
            'endLine' => 98,
            'startColumn' => 61,
            'endColumn' => 76,
            'parameterIndex' => 1,
            'isOptional' => false,
          ),
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * @param array<mixed> $metadata The metadata to update and return.
 * @param string $authRequestType The auth request type. Possible values are
 *        `\'at\'`, `\'it\'`, `\'mds\'`.
 * @return array<mixed> The updated metadata.
 */',
        'startLine' => 98,
        'endLine' => 105,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'Google\\Auth',
        'declaringClassName' => 'Google\\Auth\\MetricsTrait',
        'implementingClassName' => 'Google\\Auth\\MetricsTrait',
        'currentClassName' => 'Google\\Auth\\MetricsTrait',
        'aliasName' => NULL,
      ),
      'getVersion' => 
      array (
        'name' => 'getVersion',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'string',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 107,
        'endLine' => 114,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 18,
        'namespace' => 'Google\\Auth',
        'declaringClassName' => 'Google\\Auth\\MetricsTrait',
        'implementingClassName' => 'Google\\Auth\\MetricsTrait',
        'currentClassName' => 'Google\\Auth\\MetricsTrait',
        'aliasName' => NULL,
      ),
      'getCredType' => 
      array (
        'name' => 'getCredType',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'string',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 116,
        'endLine' => 119,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'Google\\Auth',
        'declaringClassName' => 'Google\\Auth\\MetricsTrait',
        'implementingClassName' => 'Google\\Auth\\MetricsTrait',
        'currentClassName' => 'Google\\Auth\\MetricsTrait',
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