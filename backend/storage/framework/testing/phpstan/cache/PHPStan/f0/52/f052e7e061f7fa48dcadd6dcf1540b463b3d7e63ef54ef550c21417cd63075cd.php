<?php declare(strict_types = 1);

// osfsl-C:/projects/cacao/backend/vendor/composer/../google/auth/src/Credentials/ServiceAccountCredentials.php-PHPStan\BetterReflection\Reflection\ReflectionClass-Google\Auth\Credentials\ServiceAccountCredentials
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-5e57a272f9589a0c070ba6a0cc89af7ae163fab89786ec2988ccf476c915aa73-8.2.32-6.70.0.3',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'filename' => 'C:/projects/cacao/backend/vendor/composer/../google/auth/src/Credentials/ServiceAccountCredentials.php',
      ),
    ),
    'namespace' => 'Google\\Auth\\Credentials',
    'name' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
    'shortName' => 'ServiceAccountCredentials',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * ServiceAccountCredentials supports authorization using a Google service
 * account.
 *
 * (cf https://developers.google.com/accounts/docs/OAuth2ServiceAccount)
 *
 * It\'s initialized using the json key file that\'s downloadable from developer
 * console, which should contain a private_key and client_email fields that it
 * uses.
 *
 * Use it with AuthTokenMiddleware to authorize http requests:
 *
 * ```
 * use Google\\Auth\\Credentials\\ServiceAccountCredentials;
 * use Google\\Auth\\Middleware\\AuthTokenMiddleware;
 * use GuzzleHttp\\Client;
 * use GuzzleHttp\\HandlerStack;
 *
 * $sa = new ServiceAccountCredentials(
 *     \'https://www.googleapis.com/auth/taskqueue\',
 *     \'/path/to/your/json/key_file.json\'
 * );
 * $middleware = new AuthTokenMiddleware($sa);
 * $stack = HandlerStack::create();
 * $stack->push($middleware);
 *
 * $client = new Client([
 *     \'handler\' => $stack,
 *     \'base_uri\' => \'https://www.googleapis.com/taskqueue/v1beta2/projects/\',
 *     \'auth\' => \'google_auth\' // authorize all requests
 * ]);
 *
 * $res = $client->get(\'myproject/taskqueues/myqueue\');
 * ```
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 67,
    'endLine' => 492,
    'startColumn' => 1,
    'endColumn' => 1,
    'parentClassName' => 'Google\\Auth\\CredentialsLoader',
    'implementsClassNames' => 
    array (
      0 => 'Google\\Auth\\GetQuotaProjectInterface',
      1 => 'Google\\Auth\\SignBlobInterface',
      2 => 'Google\\Auth\\ProjectIdProviderInterface',
    ),
    'traitClassNames' => 
    array (
      0 => 'Google\\Auth\\ServiceAccountSignerTrait',
      1 => 'Google\\Auth\\Credentials\\RegionalAccessBoundaryTrait',
    ),
    'immediateConstants' => 
    array (
      'CRED_TYPE' => 
      array (
        'declaringClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'implementingClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'name' => 'CRED_TYPE',
        'modifiers' => 4,
        'type' => NULL,
        'value' => 
        array (
          'code' => '\'sa\'',
          'attributes' => 
          array (
            'startLine' => 80,
            'endLine' => 80,
            'startTokenPos' => 105,
            'startFilePos' => 2478,
            'endTokenPos' => 105,
            'endFilePos' => 2481,
          ),
        ),
        'docComment' => '/**
 * Used in observability metric headers
 *
 * @var string
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 80,
        'endLine' => 80,
        'startColumn' => 5,
        'endColumn' => 35,
      ),
      'IAM_SCOPE' => 
      array (
        'declaringClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'implementingClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'name' => 'IAM_SCOPE',
        'modifiers' => 4,
        'type' => NULL,
        'value' => 
        array (
          'code' => '\'https://www.googleapis.com/auth/iam\'',
          'attributes' => 
          array (
            'startLine' => 81,
            'endLine' => 81,
            'startTokenPos' => 116,
            'startFilePos' => 2514,
            'endTokenPos' => 116,
            'endFilePos' => 2550,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 81,
        'endLine' => 81,
        'startColumn' => 5,
        'endColumn' => 68,
      ),
    ),
    'immediateProperties' => 
    array (
      'auth' => 
      array (
        'declaringClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'implementingClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'name' => 'auth',
        'modifiers' => 2,
        'type' => NULL,
        'default' => NULL,
        'docComment' => '/**
 * The OAuth2 instance used to conduct authorization.
 *
 * @var OAuth2
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 88,
        'endLine' => 88,
        'startColumn' => 5,
        'endColumn' => 20,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'quotaProject' => 
      array (
        'declaringClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'implementingClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'name' => 'quotaProject',
        'modifiers' => 2,
        'type' => NULL,
        'default' => NULL,
        'docComment' => '/**
 * The quota project associated with the JSON credentials
 *
 * @var string
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 95,
        'endLine' => 95,
        'startColumn' => 5,
        'endColumn' => 28,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'projectId' => 
      array (
        'declaringClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'implementingClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'name' => 'projectId',
        'modifiers' => 2,
        'type' => NULL,
        'default' => NULL,
        'docComment' => '/**
 * @var string|null
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 100,
        'endLine' => 100,
        'startColumn' => 5,
        'endColumn' => 25,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'lastReceivedJwtAccessToken' => 
      array (
        'declaringClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'implementingClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'name' => 'lastReceivedJwtAccessToken',
        'modifiers' => 4,
        'type' => NULL,
        'default' => NULL,
        'docComment' => '/**
 * @var array<mixed>|null
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 105,
        'endLine' => 105,
        'startColumn' => 5,
        'endColumn' => 40,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'useJwtAccessWithScope' => 
      array (
        'declaringClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'implementingClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'name' => 'useJwtAccessWithScope',
        'modifiers' => 4,
        'type' => NULL,
        'default' => 
        array (
          'code' => 'false',
          'attributes' => 
          array (
            'startLine' => 110,
            'endLine' => 110,
            'startTokenPos' => 155,
            'startFilePos' => 3035,
            'endTokenPos' => 155,
            'endFilePos' => 3039,
          ),
        ),
        'docComment' => '/**
 * @var bool
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 110,
        'endLine' => 110,
        'startColumn' => 5,
        'endColumn' => 43,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'jwtAccessCredentials' => 
      array (
        'declaringClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'implementingClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'name' => 'jwtAccessCredentials',
        'modifiers' => 4,
        'type' => NULL,
        'default' => NULL,
        'docComment' => '/**
 * @var ServiceAccountJwtAccessCredentials|null
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 115,
        'endLine' => 115,
        'startColumn' => 5,
        'endColumn' => 34,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'universeDomain' => 
      array (
        'declaringClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'implementingClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'name' => 'universeDomain',
        'modifiers' => 4,
        'type' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'string',
            'isIdentifier' => true,
          ),
        ),
        'default' => NULL,
        'docComment' => '/**
 * @var string
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 120,
        'endLine' => 120,
        'startColumn' => 5,
        'endColumn' => 35,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'isIdTokenRequest' => 
      array (
        'declaringClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'implementingClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'name' => 'isIdTokenRequest',
        'modifiers' => 4,
        'type' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'bool',
            'isIdentifier' => true,
          ),
        ),
        'default' => 
        array (
          'code' => 'false',
          'attributes' => 
          array (
            'startLine' => 126,
            'endLine' => 126,
            'startTokenPos' => 184,
            'startFilePos' => 3388,
            'endTokenPos' => 184,
            'endFilePos' => 3392,
          ),
        ),
        'docComment' => '/**
 * Whether this is an ID token request or an access token request. Used when
 * building the metric header.
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 126,
        'endLine' => 126,
        'startColumn' => 5,
        'endColumn' => 43,
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
      '__construct' => 
      array (
        'name' => '__construct',
        'parameters' => 
        array (
          'scope' => 
          array (
            'name' => 'scope',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 141,
            'endLine' => 141,
            'startColumn' => 9,
            'endColumn' => 14,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'jsonKey' => 
          array (
            'name' => 'jsonKey',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 142,
            'endLine' => 142,
            'startColumn' => 9,
            'endColumn' => 16,
            'parameterIndex' => 1,
            'isOptional' => false,
          ),
          'sub' => 
          array (
            'name' => 'sub',
            'default' => 
            array (
              'code' => 'null',
              'attributes' => 
              array (
                'startLine' => 143,
                'endLine' => 143,
                'startTokenPos' => 206,
                'startFilePos' => 4142,
                'endTokenPos' => 206,
                'endFilePos' => 4145,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 143,
            'endLine' => 143,
            'startColumn' => 9,
            'endColumn' => 19,
            'parameterIndex' => 2,
            'isOptional' => true,
          ),
          'targetAudience' => 
          array (
            'name' => 'targetAudience',
            'default' => 
            array (
              'code' => 'null',
              'attributes' => 
              array (
                'startLine' => 144,
                'endLine' => 144,
                'startTokenPos' => 213,
                'startFilePos' => 4174,
                'endTokenPos' => 213,
                'endFilePos' => 4177,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 144,
            'endLine' => 144,
            'startColumn' => 9,
            'endColumn' => 30,
            'parameterIndex' => 3,
            'isOptional' => true,
          ),
          'enableRegionalAccessBoundary' => 
          array (
            'name' => 'enableRegionalAccessBoundary',
            'default' => 
            array (
              'code' => 'false',
              'attributes' => 
              array (
                'startLine' => 145,
                'endLine' => 145,
                'startTokenPos' => 222,
                'startFilePos' => 4225,
                'endTokenPos' => 222,
                'endFilePos' => 4229,
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
            'startLine' => 145,
            'endLine' => 145,
            'startColumn' => 9,
            'endColumn' => 50,
            'parameterIndex' => 4,
            'isOptional' => true,
          ),
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Create a new ServiceAccountCredentials.
 *
 * @param string|string[]|null $scope the scope of the access request, expressed
 *   either as an Array or as a space-delimited String.
 * @param string|array<mixed> $jsonKey JSON credential file path or JSON credentials
 *   as an associative array
 * @param string $sub an email address account to impersonate, in situations when
 *   the service account has been delegated domain wide access.
 * @param string $targetAudience The audience for the ID token.
 * @param bool $enableRegionalAccessBoundary Lookup and include the regional access boundary header.
 */',
        'startLine' => 140,
        'endLine' => 194,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Google\\Auth\\Credentials',
        'declaringClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'implementingClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'currentClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'aliasName' => NULL,
      ),
      'useJwtAccessWithScope' => 
      array (
        'name' => 'useJwtAccessWithScope',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * When called, the ServiceAccountCredentials will use an instance of
 * ServiceAccountJwtAccessCredentials to fetch (self-sign) an access token
 * even when only scopes are supplied. Otherwise,
 * ServiceAccountJwtAccessCredentials is only called when no scopes and an
 * authUrl (audience) is suppled.
 *
 * @return void
 */',
        'startLine' => 205,
        'endLine' => 208,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Google\\Auth\\Credentials',
        'declaringClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'implementingClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'currentClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'aliasName' => NULL,
      ),
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
                'startLine' => 223,
                'endLine' => 223,
                'startTokenPos' => 641,
                'startFilePos' => 7200,
                'endTokenPos' => 641,
                'endFilePos' => 7203,
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
            'startLine' => 223,
            'endLine' => 223,
            'startColumn' => 36,
            'endColumn' => 64,
            'parameterIndex' => 0,
            'isOptional' => true,
          ),
          'headers' => 
          array (
            'name' => 'headers',
            'default' => 
            array (
              'code' => '[]',
              'attributes' => 
              array (
                'startLine' => 223,
                'endLine' => 223,
                'startTokenPos' => 650,
                'startFilePos' => 7223,
                'endTokenPos' => 651,
                'endFilePos' => 7224,
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
            'startLine' => 223,
            'endLine' => 223,
            'startColumn' => 67,
            'endColumn' => 85,
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
 * @param callable|null $httpHandler
 * @param array<mixed> $headers [optional] Headers to be inserted
 *     into the token endpoint request present.
 *
 * @return array<mixed> {
 *     A set of auth related metadata, containing the following
 *
 *     @type string $access_token
 *     @type int $expires_in
 *     @type string $token_type
 * }
 */',
        'startLine' => 223,
        'endLine' => 267,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Google\\Auth\\Credentials',
        'declaringClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'implementingClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'currentClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
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
 * Return the Cache Key for the credentials.
 * For the cache key format is one of the following:
 * ClientEmail.Scope[.Sub]
 * ClientEmail.Audience[.Sub]
 *
 * @return string
 */',
        'startLine' => 277,
        'endLine' => 290,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Google\\Auth\\Credentials',
        'declaringClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'implementingClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'currentClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
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
 * @return array<mixed>
 */',
        'startLine' => 295,
        'endLine' => 302,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Google\\Auth\\Credentials',
        'declaringClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'implementingClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'currentClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'aliasName' => NULL,
      ),
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
                'startLine' => 312,
                'endLine' => 312,
                'startTokenPos' => 1171,
                'startFilePos' => 10372,
                'endTokenPos' => 1171,
                'endFilePos' => 10375,
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
            'startLine' => 312,
            'endLine' => 312,
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
 * Get the project ID from the service account keyfile.
 *
 * Returns null if the project ID does not exist in the keyfile.
 *
 * @param callable|null $httpHandler Not used by this credentials type.
 * @return string|null
 */',
        'startLine' => 312,
        'endLine' => 315,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Google\\Auth\\Credentials',
        'declaringClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'implementingClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'currentClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
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
            'startLine' => 326,
            'endLine' => 326,
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
                'startLine' => 327,
                'endLine' => 327,
                'startTokenPos' => 1201,
                'startFilePos' => 10808,
                'endTokenPos' => 1201,
                'endFilePos' => 10811,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 327,
            'endLine' => 327,
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
                'startLine' => 328,
                'endLine' => 328,
                'startTokenPos' => 1211,
                'startFilePos' => 10847,
                'endTokenPos' => 1211,
                'endFilePos' => 10850,
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
            'startLine' => 328,
            'endLine' => 328,
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
        'startLine' => 325,
        'endLine' => 344,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Google\\Auth\\Credentials',
        'declaringClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'implementingClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'currentClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'aliasName' => NULL,
      ),
      'updateMetadataSelfSignedJwt' => 
      array (
        'name' => 'updateMetadataSelfSignedJwt',
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
            'startLine' => 355,
            'endLine' => 355,
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
                'startLine' => 356,
                'endLine' => 356,
                'startTokenPos' => 1325,
                'startFilePos' => 11806,
                'endTokenPos' => 1325,
                'endFilePos' => 11809,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 356,
            'endLine' => 356,
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
                'startLine' => 357,
                'endLine' => 357,
                'startTokenPos' => 1335,
                'startFilePos' => 11845,
                'endTokenPos' => 1335,
                'endFilePos' => 11848,
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
            'startLine' => 357,
            'endLine' => 357,
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
 * Updates metadata with the authorization token for SSJWTs.
 *
 * @param array<mixed> $metadata metadata hashmap
 * @param string $authUri optional auth uri
 * @param callable|null $httpHandler callback which delivers psr7 request
 * @return array<mixed> updated metadata hashmap
 */',
        'startLine' => 354,
        'endLine' => 374,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 4,
        'namespace' => 'Google\\Auth\\Credentials',
        'declaringClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'implementingClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'currentClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'aliasName' => NULL,
      ),
      'createJwtAccessCredentials' => 
      array (
        'name' => 'createJwtAccessCredentials',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * @return ServiceAccountJwtAccessCredentials
 */',
        'startLine' => 379,
        'endLine' => 394,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 4,
        'namespace' => 'Google\\Auth\\Credentials',
        'declaringClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'implementingClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'currentClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'aliasName' => NULL,
      ),
      'setSub' => 
      array (
        'name' => 'setSub',
        'parameters' => 
        array (
          'sub' => 
          array (
            'name' => 'sub',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 401,
            'endLine' => 401,
            'startColumn' => 28,
            'endColumn' => 31,
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
 * @param string $sub an email address account to impersonate, in situations when
 *   the service account has been delegated domain wide access.
 * @return void
 */',
        'startLine' => 401,
        'endLine' => 404,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Google\\Auth\\Credentials',
        'declaringClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'implementingClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'currentClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
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
                'startLine' => 414,
                'endLine' => 414,
                'startTokenPos' => 1560,
                'startFilePos' => 13584,
                'endTokenPos' => 1560,
                'endFilePos' => 13587,
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
            'startLine' => 414,
            'endLine' => 414,
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
 * Get the client name from the keyfile.
 *
 * In this case, it returns the keyfile\'s client_email key.
 *
 * @param callable|null $httpHandler Not used by this credentials type.
 * @return string
 */',
        'startLine' => 414,
        'endLine' => 417,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Google\\Auth\\Credentials',
        'declaringClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'implementingClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'currentClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'aliasName' => NULL,
      ),
      'getPrivateKey' => 
      array (
        'name' => 'getPrivateKey',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Get the private key from the keyfile.
 *
 * In this case, it returns the keyfile\'s private_key key, needed for JWT signing.
 *
 * @return string
 */',
        'startLine' => 426,
        'endLine' => 429,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Google\\Auth\\Credentials',
        'declaringClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'implementingClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'currentClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'aliasName' => NULL,
      ),
      'getQuotaProject' => 
      array (
        'name' => 'getQuotaProject',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Get the quota project used for this API request
 *
 * @return string|null
 */',
        'startLine' => 436,
        'endLine' => 439,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Google\\Auth\\Credentials',
        'declaringClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'implementingClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'currentClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'aliasName' => NULL,
      ),
      'getUniverseDomain' => 
      array (
        'name' => 'getUniverseDomain',
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
        'docComment' => '/**
 * Get the universe domain configured in the JSON credential.
 *
 * @return string
 */',
        'startLine' => 446,
        'endLine' => 449,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Google\\Auth\\Credentials',
        'declaringClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'implementingClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'currentClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
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
        'startLine' => 451,
        'endLine' => 454,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'Google\\Auth\\Credentials',
        'declaringClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'implementingClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'currentClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'aliasName' => NULL,
      ),
      'useSelfSignedJwt' => 
      array (
        'name' => 'useSelfSignedJwt',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * @return bool
 */',
        'startLine' => 459,
        'endLine' => 491,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 4,
        'namespace' => 'Google\\Auth\\Credentials',
        'declaringClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'implementingClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
        'currentClassName' => 'Google\\Auth\\Credentials\\ServiceAccountCredentials',
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