<?php declare(strict_types = 1);

// osfsl-C:/projects/cacao/backend/vendor/composer/../google/auth/src/CredentialsLoader.php-PHPStan\BetterReflection\Reflection\ReflectionClass-Google\Auth\CredentialsLoader
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-34d8914ddf85640301023fc07725cf907a6b89799a58b766ce8a6e4dfae03938-8.2.32-6.70.0.3',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'Google\\Auth\\CredentialsLoader',
        'filename' => 'C:/projects/cacao/backend/vendor/composer/../google/auth/src/CredentialsLoader.php',
      ),
    ),
    'namespace' => 'Google\\Auth',
    'name' => 'Google\\Auth\\CredentialsLoader',
    'shortName' => 'CredentialsLoader',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 64,
    'docComment' => '/**
 * CredentialsLoader contains the behaviour used to locate and find default
 * credentials files on the file system.
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 33,
    'endLine' => 336,
    'startColumn' => 1,
    'endColumn' => 1,
    'parentClassName' => NULL,
    'implementsClassNames' => 
    array (
      0 => 'Google\\Auth\\GetUniverseDomainInterface',
      1 => 'Google\\Auth\\FetchAuthTokenInterface',
      2 => 'Google\\Auth\\UpdateMetadataInterface',
    ),
    'traitClassNames' => 
    array (
      0 => 'Google\\Auth\\UpdateMetadataTrait',
    ),
    'immediateConstants' => 
    array (
      'TOKEN_CREDENTIAL_URI' => 
      array (
        'declaringClassName' => 'Google\\Auth\\CredentialsLoader',
        'implementingClassName' => 'Google\\Auth\\CredentialsLoader',
        'name' => 'TOKEN_CREDENTIAL_URI',
        'modifiers' => 1,
        'type' => NULL,
        'value' => 
        array (
          'code' => '\'https://oauth2.googleapis.com/token\'',
          'attributes' => 
          array (
            'startLine' => 40,
            'endLine' => 40,
            'startTokenPos' => 79,
            'startFilePos' => 1351,
            'endTokenPos' => 79,
            'endFilePos' => 1387,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 40,
        'endLine' => 40,
        'startColumn' => 5,
        'endColumn' => 71,
      ),
      'ENV_VAR' => 
      array (
        'declaringClassName' => 'Google\\Auth\\CredentialsLoader',
        'implementingClassName' => 'Google\\Auth\\CredentialsLoader',
        'name' => 'ENV_VAR',
        'modifiers' => 1,
        'type' => NULL,
        'value' => 
        array (
          'code' => '\'GOOGLE_APPLICATION_CREDENTIALS\'',
          'attributes' => 
          array (
            'startLine' => 41,
            'endLine' => 41,
            'startTokenPos' => 88,
            'startFilePos' => 1410,
            'endTokenPos' => 88,
            'endFilePos' => 1441,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 41,
        'endLine' => 41,
        'startColumn' => 5,
        'endColumn' => 53,
      ),
      'QUOTA_PROJECT_ENV_VAR' => 
      array (
        'declaringClassName' => 'Google\\Auth\\CredentialsLoader',
        'implementingClassName' => 'Google\\Auth\\CredentialsLoader',
        'name' => 'QUOTA_PROJECT_ENV_VAR',
        'modifiers' => 1,
        'type' => NULL,
        'value' => 
        array (
          'code' => '\'GOOGLE_CLOUD_QUOTA_PROJECT\'',
          'attributes' => 
          array (
            'startLine' => 42,
            'endLine' => 42,
            'startTokenPos' => 97,
            'startFilePos' => 1478,
            'endTokenPos' => 97,
            'endFilePos' => 1505,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 42,
        'endLine' => 42,
        'startColumn' => 5,
        'endColumn' => 63,
      ),
      'WELL_KNOWN_PATH' => 
      array (
        'declaringClassName' => 'Google\\Auth\\CredentialsLoader',
        'implementingClassName' => 'Google\\Auth\\CredentialsLoader',
        'name' => 'WELL_KNOWN_PATH',
        'modifiers' => 1,
        'type' => NULL,
        'value' => 
        array (
          'code' => '\'gcloud/application_default_credentials.json\'',
          'attributes' => 
          array (
            'startLine' => 43,
            'endLine' => 43,
            'startTokenPos' => 106,
            'startFilePos' => 1536,
            'endTokenPos' => 106,
            'endFilePos' => 1580,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 43,
        'endLine' => 43,
        'startColumn' => 5,
        'endColumn' => 74,
      ),
      'NON_WINDOWS_WELL_KNOWN_PATH_BASE' => 
      array (
        'declaringClassName' => 'Google\\Auth\\CredentialsLoader',
        'implementingClassName' => 'Google\\Auth\\CredentialsLoader',
        'name' => 'NON_WINDOWS_WELL_KNOWN_PATH_BASE',
        'modifiers' => 1,
        'type' => NULL,
        'value' => 
        array (
          'code' => '\'.config\'',
          'attributes' => 
          array (
            'startLine' => 44,
            'endLine' => 44,
            'startTokenPos' => 115,
            'startFilePos' => 1628,
            'endTokenPos' => 115,
            'endFilePos' => 1636,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 44,
        'endLine' => 44,
        'startColumn' => 5,
        'endColumn' => 55,
      ),
      'MTLS_WELL_KNOWN_PATH' => 
      array (
        'declaringClassName' => 'Google\\Auth\\CredentialsLoader',
        'implementingClassName' => 'Google\\Auth\\CredentialsLoader',
        'name' => 'MTLS_WELL_KNOWN_PATH',
        'modifiers' => 1,
        'type' => NULL,
        'value' => 
        array (
          'code' => '\'.secureConnect/context_aware_metadata.json\'',
          'attributes' => 
          array (
            'startLine' => 45,
            'endLine' => 45,
            'startTokenPos' => 124,
            'startFilePos' => 1672,
            'endTokenPos' => 124,
            'endFilePos' => 1715,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 45,
        'endLine' => 45,
        'startColumn' => 5,
        'endColumn' => 78,
      ),
      'MTLS_CERT_ENV_VAR' => 
      array (
        'declaringClassName' => 'Google\\Auth\\CredentialsLoader',
        'implementingClassName' => 'Google\\Auth\\CredentialsLoader',
        'name' => 'MTLS_CERT_ENV_VAR',
        'modifiers' => 1,
        'type' => NULL,
        'value' => 
        array (
          'code' => '\'GOOGLE_API_USE_CLIENT_CERTIFICATE\'',
          'attributes' => 
          array (
            'startLine' => 46,
            'endLine' => 46,
            'startTokenPos' => 133,
            'startFilePos' => 1748,
            'endTokenPos' => 133,
            'endFilePos' => 1782,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 46,
        'endLine' => 46,
        'startColumn' => 5,
        'endColumn' => 66,
      ),
    ),
    'immediateProperties' => 
    array (
    ),
    'immediateMethods' => 
    array (
      'unableToReadEnv' => 
      array (
        'name' => 'unableToReadEnv',
        'parameters' => 
        array (
          'cause' => 
          array (
            'name' => 'cause',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 52,
            'endLine' => 52,
            'startColumn' => 45,
            'endColumn' => 50,
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
 * @param string $cause
 * @return string
 */',
        'startLine' => 52,
        'endLine' => 59,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 20,
        'namespace' => 'Google\\Auth',
        'declaringClassName' => 'Google\\Auth\\CredentialsLoader',
        'implementingClassName' => 'Google\\Auth\\CredentialsLoader',
        'currentClassName' => 'Google\\Auth\\CredentialsLoader',
        'aliasName' => NULL,
      ),
      'isOnWindows' => 
      array (
        'name' => 'isOnWindows',
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
        'startLine' => 64,
        'endLine' => 67,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 20,
        'namespace' => 'Google\\Auth',
        'declaringClassName' => 'Google\\Auth\\CredentialsLoader',
        'implementingClassName' => 'Google\\Auth\\CredentialsLoader',
        'currentClassName' => 'Google\\Auth\\CredentialsLoader',
        'aliasName' => NULL,
      ),
      'fromEnv' => 
      array (
        'name' => 'fromEnv',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Load a JSON key from the path specified in the environment.
 *
 * Load a JSON key from the path specified in the environment
 * variable GOOGLE_APPLICATION_CREDENTIALS. Return null if
 * GOOGLE_APPLICATION_CREDENTIALS is not specified.
 *
 * @return array<mixed>|null JSON key | null
 */',
        'startLine' => 78,
        'endLine' => 91,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 17,
        'namespace' => 'Google\\Auth',
        'declaringClassName' => 'Google\\Auth\\CredentialsLoader',
        'implementingClassName' => 'Google\\Auth\\CredentialsLoader',
        'currentClassName' => 'Google\\Auth\\CredentialsLoader',
        'aliasName' => NULL,
      ),
      'fromWellKnownFile' => 
      array (
        'name' => 'fromWellKnownFile',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Load a JSON key from a well known path.
 *
 * The well known path is OS dependent:
 *
 * * windows: %APPDATA%/gcloud/application_default_credentials.json
 * * others: $HOME/.config/gcloud/application_default_credentials.json
 *
 * If the file does not exist, this returns null.
 *
 * @return array<mixed>|null JSON key | null
 */',
        'startLine' => 105,
        'endLine' => 119,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 17,
        'namespace' => 'Google\\Auth',
        'declaringClassName' => 'Google\\Auth\\CredentialsLoader',
        'implementingClassName' => 'Google\\Auth\\CredentialsLoader',
        'currentClassName' => 'Google\\Auth\\CredentialsLoader',
        'aliasName' => NULL,
      ),
      'makeCredentials' => 
      array (
        'name' => 'makeCredentials',
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
            'startLine' => 160,
            'endLine' => 160,
            'startColumn' => 9,
            'endColumn' => 14,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'jsonKey' => 
          array (
            'name' => 'jsonKey',
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
            'startLine' => 161,
            'endLine' => 161,
            'startColumn' => 9,
            'endColumn' => 22,
            'parameterIndex' => 1,
            'isOptional' => false,
          ),
          'defaultScope' => 
          array (
            'name' => 'defaultScope',
            'default' => 
            array (
              'code' => 'null',
              'attributes' => 
              array (
                'startLine' => 162,
                'endLine' => 162,
                'startTokenPos' => 495,
                'startFilePos' => 6053,
                'endTokenPos' => 495,
                'endFilePos' => 6056,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 162,
            'endLine' => 162,
            'startColumn' => 9,
            'endColumn' => 28,
            'parameterIndex' => 2,
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
                'startLine' => 163,
                'endLine' => 163,
                'startTokenPos' => 504,
                'startFilePos' => 6104,
                'endTokenPos' => 504,
                'endFilePos' => 6108,
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
            'startLine' => 163,
            'endLine' => 163,
            'startColumn' => 9,
            'endColumn' => 50,
            'parameterIndex' => 3,
            'isOptional' => true,
          ),
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Create a new Credentials instance.
 *
 * @deprecated This method is being deprecated because of a potential security risk.
 *
 * This method does not validate the credential configuration. The security
 * risk occurs when a credential configuration is accepted from a source
 * that is not under your control and used without validation on your side.
 *
 * If you know that you will be loading credential configurations of a
 * specific type, it is recommended to use a credential-type-specific
 * method.
 * This will ensure that an unexpected credential type with potential for
 * malicious intent is not loaded unintentionally. You might still have to do
 * validation for certain credential types. Please follow the recommendation
 * for that method. For example, if you want to load only service accounts,
 * you can create the {@see ServiceAccountCredentials} explicitly:
 *
 * ```
 * use Google\\Auth\\Credentials\\ServiceAccountCredentials;
 * $creds = new ServiceAccountCredentials($scopes, $json);
 * ```
 *
 * If you are loading your credential configuration from an untrusted source and have
 * not mitigated the risks (e.g. by validating the configuration yourself), make
 * these changes as soon as possible to prevent security risks to your environment.
 *
 * Regardless of the method used, it is always your responsibility to validate
 * configurations received from external sources.
 *
 * @see https://cloud.google.com/docs/authentication/external/externally-sourced-credentials
 *
 * @param string|string[] $scope
 * @param array<mixed> $jsonKey
 * @param string|string[] $defaultScope
 * @param bool $enableRegionalAccessBoundary Lookup and include the regional access boundary header.
 * @return ServiceAccountCredentials|UserRefreshCredentials|ImpersonatedServiceAccountCredentials|ExternalAccountCredentials|ExternalAccountAuthorizedUserCredentials
 */',
        'startLine' => 159,
        'endLine' => 204,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 17,
        'namespace' => 'Google\\Auth',
        'declaringClassName' => 'Google\\Auth\\CredentialsLoader',
        'implementingClassName' => 'Google\\Auth\\CredentialsLoader',
        'currentClassName' => 'Google\\Auth\\CredentialsLoader',
        'aliasName' => NULL,
      ),
      'makeHttpClient' => 
      array (
        'name' => 'makeHttpClient',
        'parameters' => 
        array (
          'fetcher' => 
          array (
            'name' => 'fetcher',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'Google\\Auth\\FetchAuthTokenInterface',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 216,
            'endLine' => 216,
            'startColumn' => 9,
            'endColumn' => 40,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'httpClientOptions' => 
          array (
            'name' => 'httpClientOptions',
            'default' => 
            array (
              'code' => '[]',
              'attributes' => 
              array (
                'startLine' => 217,
                'endLine' => 217,
                'startTokenPos' => 824,
                'startFilePos' => 8394,
                'endTokenPos' => 825,
                'endFilePos' => 8395,
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
            'startLine' => 217,
            'endLine' => 217,
            'startColumn' => 9,
            'endColumn' => 37,
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
                'startLine' => 218,
                'endLine' => 218,
                'startTokenPos' => 835,
                'startFilePos' => 8431,
                'endTokenPos' => 835,
                'endFilePos' => 8434,
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
            'startLine' => 218,
            'endLine' => 218,
            'startColumn' => 9,
            'endColumn' => 37,
            'parameterIndex' => 2,
            'isOptional' => true,
          ),
          'tokenCallback' => 
          array (
            'name' => 'tokenCallback',
            'default' => 
            array (
              'code' => 'null',
              'attributes' => 
              array (
                'startLine' => 219,
                'endLine' => 219,
                'startTokenPos' => 845,
                'startFilePos' => 8472,
                'endTokenPos' => 845,
                'endFilePos' => 8475,
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
            'startLine' => 219,
            'endLine' => 219,
            'startColumn' => 9,
            'endColumn' => 39,
            'parameterIndex' => 3,
            'isOptional' => true,
          ),
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Create an authorized HTTP Client from an instance of FetchAuthTokenInterface.
 *
 * @param FetchAuthTokenInterface $fetcher is used to fetch the auth token
 * @param array<mixed> $httpClientOptions (optional) Array of request options to apply.
 * @param callable|null $httpHandler (optional) http client to fetch the token.
 * @param callable|null $tokenCallback (optional) function to be called when a new token is fetched.
 * @return \\GuzzleHttp\\Client
 */',
        'startLine' => 215,
        'endLine' => 233,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 17,
        'namespace' => 'Google\\Auth',
        'declaringClassName' => 'Google\\Auth\\CredentialsLoader',
        'implementingClassName' => 'Google\\Auth\\CredentialsLoader',
        'currentClassName' => 'Google\\Auth\\CredentialsLoader',
        'aliasName' => NULL,
      ),
      'makeInsecureCredentials' => 
      array (
        'name' => 'makeInsecureCredentials',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Create a new instance of InsecureCredentials.
 *
 * @return InsecureCredentials
 */',
        'startLine' => 240,
        'endLine' => 243,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 17,
        'namespace' => 'Google\\Auth',
        'declaringClassName' => 'Google\\Auth\\CredentialsLoader',
        'implementingClassName' => 'Google\\Auth\\CredentialsLoader',
        'currentClassName' => 'Google\\Auth\\CredentialsLoader',
        'aliasName' => NULL,
      ),
      'quotaProjectFromEnv' => 
      array (
        'name' => 'quotaProjectFromEnv',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Fetch a quota project from the environment variable
 * GOOGLE_CLOUD_QUOTA_PROJECT. Return null if
 * GOOGLE_CLOUD_QUOTA_PROJECT is not specified.
 *
 * @return string|null
 */',
        'startLine' => 252,
        'endLine' => 255,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 17,
        'namespace' => 'Google\\Auth',
        'declaringClassName' => 'Google\\Auth\\CredentialsLoader',
        'implementingClassName' => 'Google\\Auth\\CredentialsLoader',
        'currentClassName' => 'Google\\Auth\\CredentialsLoader',
        'aliasName' => NULL,
      ),
      'getDefaultClientCertSource' => 
      array (
        'name' => 'getDefaultClientCertSource',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Gets a callable which returns the default device certification.
 *
 * @throws UnexpectedValueException
 * @return callable|null
 */',
        'startLine' => 263,
        'endLine' => 281,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 17,
        'namespace' => 'Google\\Auth',
        'declaringClassName' => 'Google\\Auth\\CredentialsLoader',
        'implementingClassName' => 'Google\\Auth\\CredentialsLoader',
        'currentClassName' => 'Google\\Auth\\CredentialsLoader',
        'aliasName' => NULL,
      ),
      'shouldLoadClientCertSource' => 
      array (
        'name' => 'shouldLoadClientCertSource',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Determines whether or not the default device certificate should be loaded.
 *
 * @return bool
 */',
        'startLine' => 288,
        'endLine' => 291,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 17,
        'namespace' => 'Google\\Auth',
        'declaringClassName' => 'Google\\Auth\\CredentialsLoader',
        'implementingClassName' => 'Google\\Auth\\CredentialsLoader',
        'currentClassName' => 'Google\\Auth\\CredentialsLoader',
        'aliasName' => NULL,
      ),
      'loadDefaultClientCertSourceFile' => 
      array (
        'name' => 'loadDefaultClientCertSourceFile',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * @return array{cert_provider_command:string[]}|null
 */',
        'startLine' => 296,
        'endLine' => 319,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 20,
        'namespace' => 'Google\\Auth',
        'declaringClassName' => 'Google\\Auth\\CredentialsLoader',
        'implementingClassName' => 'Google\\Auth\\CredentialsLoader',
        'currentClassName' => 'Google\\Auth\\CredentialsLoader',
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
 * Get the universe domain from the credential. Defaults to "googleapis.com"
 * for all credential types which do not support universe domain.
 *
 * @return string
 */',
        'startLine' => 327,
        'endLine' => 330,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Google\\Auth',
        'declaringClassName' => 'Google\\Auth\\CredentialsLoader',
        'implementingClassName' => 'Google\\Auth\\CredentialsLoader',
        'currentClassName' => 'Google\\Auth\\CredentialsLoader',
        'aliasName' => NULL,
      ),
      'getEnv' => 
      array (
        'name' => 'getEnv',
        'parameters' => 
        array (
          'env' => 
          array (
            'name' => 'env',
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
            'startLine' => 332,
            'endLine' => 332,
            'startColumn' => 36,
            'endColumn' => 46,
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
            'name' => 'mixed',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 332,
        'endLine' => 335,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 20,
        'namespace' => 'Google\\Auth',
        'declaringClassName' => 'Google\\Auth\\CredentialsLoader',
        'implementingClassName' => 'Google\\Auth\\CredentialsLoader',
        'currentClassName' => 'Google\\Auth\\CredentialsLoader',
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