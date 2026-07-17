<?php declare(strict_types = 1);

// osfsl-C:/projects/cacao/backend/vendor/composer/../google/auth/src/ServiceAccountSignerTrait.php-PHPStan\BetterReflection\Reflection\ReflectionClass-Google\Auth\ServiceAccountSignerTrait
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-2d921c5e7288a5f0107df1ae879016e647a3f8a7374a3f048a24ef89c955f191-8.2.32-6.70.0.3',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'Google\\Auth\\ServiceAccountSignerTrait',
        'filename' => 'C:/projects/cacao/backend/vendor/composer/../google/auth/src/ServiceAccountSignerTrait.php',
      ),
    ),
    'namespace' => 'Google\\Auth',
    'name' => 'Google\\Auth\\ServiceAccountSignerTrait',
    'shortName' => 'ServiceAccountSignerTrait',
    'isInterface' => false,
    'isTrait' => true,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * Sign a string using a Service Account private key.
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 26,
    'endLine' => 56,
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
      'signBlob' => 
      array (
        'name' => 'signBlob',
        'parameters' => 
        array (
          'stringToSign' => 
          array (
            'name' => 'stringToSign',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 36,
            'endLine' => 36,
            'startColumn' => 30,
            'endColumn' => 42,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'forceOpenssl' => 
          array (
            'name' => 'forceOpenssl',
            'default' => 
            array (
              'code' => 'false',
              'attributes' => 
              array (
                'startLine' => 36,
                'endLine' => 36,
                'startTokenPos' => 41,
                'startFilePos' => 1127,
                'endTokenPos' => 41,
                'endFilePos' => 1131,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 36,
            'endLine' => 36,
            'startColumn' => 45,
            'endColumn' => 65,
            'parameterIndex' => 1,
            'isOptional' => true,
          ),
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Sign a string using the service account private key.
 *
 * @param string $stringToSign
 * @param bool $forceOpenssl Whether to use OpenSSL regardless of
 *        whether phpseclib is installed. **Defaults to** `false`.
 * @return string
 */',
        'startLine' => 36,
        'endLine' => 55,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Google\\Auth',
        'declaringClassName' => 'Google\\Auth\\ServiceAccountSignerTrait',
        'implementingClassName' => 'Google\\Auth\\ServiceAccountSignerTrait',
        'currentClassName' => 'Google\\Auth\\ServiceAccountSignerTrait',
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