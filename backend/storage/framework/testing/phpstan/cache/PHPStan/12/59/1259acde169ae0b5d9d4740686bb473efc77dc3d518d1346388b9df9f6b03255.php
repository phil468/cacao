<?php declare(strict_types = 1);

// osfsl-C:/projects/cacao/backend/vendor/composer/../google/auth/src/FetchAuthTokenInterface.php-PHPStan\BetterReflection\Reflection\ReflectionClass-Google\Auth\FetchAuthTokenInterface
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-13b202e81613528578dd24ce6335146e6330ad9e9d3538c14c37467ed7808f48-8.2.32-6.70.0.3',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'Google\\Auth\\FetchAuthTokenInterface',
        'filename' => 'C:/projects/cacao/backend/vendor/composer/../google/auth/src/FetchAuthTokenInterface.php',
      ),
    ),
    'namespace' => 'Google\\Auth',
    'name' => 'Google\\Auth\\FetchAuthTokenInterface',
    'shortName' => 'FetchAuthTokenInterface',
    'isInterface' => true,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * An interface implemented by objects that can fetch auth tokens.
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 23,
    'endLine' => 54,
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
      'fetchAuthToken' => 
      array (
        'name' => 'fetchAuthToken',
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
                'startFilePos' => 1007,
                'endTokenPos' => 31,
                'endFilePos' => 1010,
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
            'startColumn' => 36,
            'endColumn' => 64,
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
 * Fetches the auth tokens based on the current state.
 *
 * @param callable|null $httpHandler callback which delivers psr7 request
 * @return array<mixed> a hash of auth tokens
 */',
        'startLine' => 31,
        'endLine' => 31,
        'startColumn' => 5,
        'endColumn' => 66,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Google\\Auth',
        'declaringClassName' => 'Google\\Auth\\FetchAuthTokenInterface',
        'implementingClassName' => 'Google\\Auth\\FetchAuthTokenInterface',
        'currentClassName' => 'Google\\Auth\\FetchAuthTokenInterface',
        'aliasName' => NULL,
      ),
      'getCacheKey' => 
      array (
        'name' => 'getCacheKey',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Obtains a key that can used to cache the results of #fetchAuthToken.
 *
 * If the value is empty, the auth token is not cached.
 *
 * @return string a key that may be used to cache the auth token.
 */',
        'startLine' => 40,
        'endLine' => 40,
        'startColumn' => 5,
        'endColumn' => 34,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Google\\Auth',
        'declaringClassName' => 'Google\\Auth\\FetchAuthTokenInterface',
        'implementingClassName' => 'Google\\Auth\\FetchAuthTokenInterface',
        'currentClassName' => 'Google\\Auth\\FetchAuthTokenInterface',
        'aliasName' => NULL,
      ),
      'getLastReceivedToken' => 
      array (
        'name' => 'getLastReceivedToken',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Returns an associative array with the token and
 * expiration time.
 *
 * @return null|array<mixed> {
 *     The last received access token.
 *
 *     @type string $access_token The access token string.
 *     @type int $expires_at The time the token expires as a UNIX timestamp.
 * }
 */',
        'startLine' => 53,
        'endLine' => 53,
        'startColumn' => 5,
        'endColumn' => 43,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Google\\Auth',
        'declaringClassName' => 'Google\\Auth\\FetchAuthTokenInterface',
        'implementingClassName' => 'Google\\Auth\\FetchAuthTokenInterface',
        'currentClassName' => 'Google\\Auth\\FetchAuthTokenInterface',
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