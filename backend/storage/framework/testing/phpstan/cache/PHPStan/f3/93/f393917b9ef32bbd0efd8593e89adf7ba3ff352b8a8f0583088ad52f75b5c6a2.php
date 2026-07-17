<?php declare(strict_types = 1);

// osfsl-C:/projects/cacao/backend/vendor/composer/../google/auth/src/SignBlobInterface.php-PHPStan\BetterReflection\Reflection\ReflectionClass-Google\Auth\SignBlobInterface
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-aff38de2db45e12135b4fb006ed27bf7474af1177c2db0e23e59445d27369301-8.2.32-6.70.0.3',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'Google\\Auth\\SignBlobInterface',
        'filename' => 'C:/projects/cacao/backend/vendor/composer/../google/auth/src/SignBlobInterface.php',
      ),
    ),
    'namespace' => 'Google\\Auth',
    'name' => 'Google\\Auth\\SignBlobInterface',
    'shortName' => 'SignBlobInterface',
    'isInterface' => true,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * Describes a class which supports signing arbitrary strings.
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 23,
    'endLine' => 44,
    'startColumn' => 1,
    'endColumn' => 1,
    'parentClassName' => NULL,
    'implementsClassNames' => 
    array (
      0 => 'Google\\Auth\\FetchAuthTokenInterface',
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
            'startLine' => 34,
            'endLine' => 34,
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
                'startLine' => 34,
                'endLine' => 34,
                'startTokenPos' => 35,
                'startFilePos' => 1241,
                'endTokenPos' => 35,
                'endFilePos' => 1245,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 34,
            'endLine' => 34,
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
 * Sign a string using the method which is best for a given credentials type.
 *
 * @param string $stringToSign The string to sign.
 * @param bool $forceOpenssl Require use of OpenSSL for local signing. Does
 *        not apply to signing done using external services. **Defaults to**
 *        `false`.
 * @return string The resulting signature. Value should be base64-encoded.
 */',
        'startLine' => 34,
        'endLine' => 34,
        'startColumn' => 5,
        'endColumn' => 67,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Google\\Auth',
        'declaringClassName' => 'Google\\Auth\\SignBlobInterface',
        'implementingClassName' => 'Google\\Auth\\SignBlobInterface',
        'currentClassName' => 'Google\\Auth\\SignBlobInterface',
        'aliasName' => NULL,
      ),
      'getClientName' => 
      array (
        'name' => 'getClientName',
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
                'startLine' => 43,
                'endLine' => 43,
                'startTokenPos' => 54,
                'startFilePos' => 1528,
                'endTokenPos' => 54,
                'endFilePos' => 1531,
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
            'startLine' => 43,
            'endLine' => 43,
            'startColumn' => 35,
            'endColumn' => 63,
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
 * Returns the current Client Name.
 *
 * @param callable|null $httpHandler callback which delivers psr7 request, if
 *     one is required to obtain a client name.
 * @return string
 */',
        'startLine' => 43,
        'endLine' => 43,
        'startColumn' => 5,
        'endColumn' => 65,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Google\\Auth',
        'declaringClassName' => 'Google\\Auth\\SignBlobInterface',
        'implementingClassName' => 'Google\\Auth\\SignBlobInterface',
        'currentClassName' => 'Google\\Auth\\SignBlobInterface',
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