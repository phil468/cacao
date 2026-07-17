<?php declare(strict_types = 1);

// osfsl-C:/projects/cacao/backend/vendor/composer/../google/auth/src/CacheTrait.php-PHPStan\BetterReflection\Reflection\ReflectionClass-Google\Auth\CacheTrait
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-c503e940a8d435a3e277285e644429394cd046bc66d76b81c4251219fa170c4a-8.2.32-6.70.0.3',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'Google\\Auth\\CacheTrait',
        'filename' => 'C:/projects/cacao/backend/vendor/composer/../google/auth/src/CacheTrait.php',
      ),
    ),
    'namespace' => 'Google\\Auth',
    'name' => 'Google\\Auth\\CacheTrait',
    'shortName' => 'CacheTrait',
    'isInterface' => false,
    'isTrait' => true,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => NULL,
    'attributes' => 
    array (
    ),
    'startLine' => 22,
    'endLine' => 111,
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
      'maxKeyLength' => 
      array (
        'declaringClassName' => 'Google\\Auth\\CacheTrait',
        'implementingClassName' => 'Google\\Auth\\CacheTrait',
        'name' => 'maxKeyLength',
        'modifiers' => 4,
        'type' => NULL,
        'default' => 
        array (
          'code' => '64',
          'attributes' => 
          array (
            'startLine' => 27,
            'endLine' => 27,
            'startTokenPos' => 27,
            'startFilePos' => 744,
            'endTokenPos' => 27,
            'endFilePos' => 745,
          ),
        ),
        'docComment' => '/**
 * @var int
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 27,
        'endLine' => 27,
        'startColumn' => 5,
        'endColumn' => 31,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'cacheConfig' => 
      array (
        'declaringClassName' => 'Google\\Auth\\CacheTrait',
        'implementingClassName' => 'Google\\Auth\\CacheTrait',
        'name' => 'cacheConfig',
        'modifiers' => 4,
        'type' => NULL,
        'default' => NULL,
        'docComment' => '/**
 * @var array<mixed>
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 32,
        'endLine' => 32,
        'startColumn' => 5,
        'endColumn' => 25,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'cache' => 
      array (
        'declaringClassName' => 'Google\\Auth\\CacheTrait',
        'implementingClassName' => 'Google\\Auth\\CacheTrait',
        'name' => 'cache',
        'modifiers' => 4,
        'type' => NULL,
        'default' => NULL,
        'docComment' => '/**
 * @var ?CacheItemPoolInterface
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 37,
        'endLine' => 37,
        'startColumn' => 5,
        'endColumn' => 19,
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
      'getCachedValue' => 
      array (
        'name' => 'getCachedValue',
        'parameters' => 
        array (
          'k' => 
          array (
            'name' => 'k',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 47,
            'endLine' => 47,
            'startColumn' => 37,
            'endColumn' => 38,
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
 * Gets the cached value if it is present in the cache when that is
 * available.
 *
 * @param mixed $k
 *
 * @return mixed
 */',
        'startLine' => 47,
        'endLine' => 62,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 4,
        'namespace' => 'Google\\Auth',
        'declaringClassName' => 'Google\\Auth\\CacheTrait',
        'implementingClassName' => 'Google\\Auth\\CacheTrait',
        'currentClassName' => 'Google\\Auth\\CacheTrait',
        'aliasName' => NULL,
      ),
      'setCachedValue' => 
      array (
        'name' => 'setCachedValue',
        'parameters' => 
        array (
          'k' => 
          array (
            'name' => 'k',
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
            'startColumn' => 37,
            'endColumn' => 38,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'v' => 
          array (
            'name' => 'v',
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
            'startColumn' => 41,
            'endColumn' => 42,
            'parameterIndex' => 1,
            'isOptional' => false,
          ),
          'lifetime' => 
          array (
            'name' => 'lifetime',
            'default' => 
            array (
              'code' => 'null',
              'attributes' => 
              array (
                'startLine' => 72,
                'endLine' => 72,
                'startTokenPos' => 167,
                'startFilePos' => 1665,
                'endTokenPos' => 167,
                'endFilePos' => 1668,
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
                      'name' => 'int',
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
            'startLine' => 72,
            'endLine' => 72,
            'startColumn' => 45,
            'endColumn' => 65,
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
 * Saves the value in the cache when that is available.
 *
 * @param mixed $k
 * @param mixed $v
 * @param int|null $lifetime
 * @return mixed
 */',
        'startLine' => 72,
        'endLine' => 87,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 4,
        'namespace' => 'Google\\Auth',
        'declaringClassName' => 'Google\\Auth\\CacheTrait',
        'implementingClassName' => 'Google\\Auth\\CacheTrait',
        'currentClassName' => 'Google\\Auth\\CacheTrait',
        'aliasName' => NULL,
      ),
      'getFullCacheKey' => 
      array (
        'name' => 'getFullCacheKey',
        'parameters' => 
        array (
          'key' => 
          array (
            'name' => 'key',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 93,
            'endLine' => 93,
            'startColumn' => 38,
            'endColumn' => 41,
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
 * @param null|string $key
 * @return null|string
 */',
        'startLine' => 93,
        'endLine' => 110,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 4,
        'namespace' => 'Google\\Auth',
        'declaringClassName' => 'Google\\Auth\\CacheTrait',
        'implementingClassName' => 'Google\\Auth\\CacheTrait',
        'currentClassName' => 'Google\\Auth\\CacheTrait',
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