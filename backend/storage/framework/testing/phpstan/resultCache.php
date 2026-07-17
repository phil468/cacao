<?php declare(strict_types = 1);

return [
	'lastFullAnalysisTime' => 1784245959,
	'meta' => array (
  'cacheVersion' => 'v13-packageDependencies',
  'phpstanVersion' => '2.2.5',
  'fnsr' => false,
  'metaExtensions' => 
  array (
  ),
  'phpVersion' => 80232,
  'projectConfig' => '{conditionalTags: {Larastan\\Larastan\\Rules\\NoEnvCallsOutsideOfConfigRule: {phpstan.rules.rule: %noEnvCallsOutsideOfConfig%}, Larastan\\Larastan\\Rules\\NoModelMakeRule: {phpstan.rules.rule: %noModelMake%}, Larastan\\Larastan\\Rules\\NoUnnecessaryCollectionCallRule: {phpstan.rules.rule: %noUnnecessaryCollectionCall%}, Larastan\\Larastan\\Rules\\NoUnnecessaryEnumerableToArrayCallsRule: {phpstan.rules.rule: %noUnnecessaryEnumerableToArrayCalls%}, Larastan\\Larastan\\Rules\\OctaneCompatibilityRule: {phpstan.rules.rule: %checkOctaneCompatibility%}, Larastan\\Larastan\\Rules\\UnusedViewsRule: {phpstan.rules.rule: %checkUnusedViews%}, Larastan\\Larastan\\Rules\\NoMissingTranslationsRule: {phpstan.rules.rule: %checkMissingTranslations%}, Larastan\\Larastan\\Rules\\ModelAppendsRule: {phpstan.rules.rule: %checkModelAppends%}, Larastan\\Larastan\\Rules\\NoPublicModelScopeAndAccessorRule: {phpstan.rules.rule: %checkModelMethodVisibility%}, Larastan\\Larastan\\Rules\\NoAuthFacadeInRequestScopeRule: {phpstan.rules.rule: %checkAuthCallsWhenInRequestScope%}, Larastan\\Larastan\\Rules\\NoAuthHelperInRequestScopeRule: {phpstan.rules.rule: %checkAuthCallsWhenInRequestScope%}, Larastan\\Larastan\\ReturnTypes\\Helpers\\EnvFunctionDynamicFunctionReturnTypeExtension: {phpstan.broker.dynamicFunctionReturnTypeExtension: %generalizeEnvReturnType%}, Larastan\\Larastan\\ReturnTypes\\Helpers\\ConfigFunctionDynamicFunctionReturnTypeExtension: {phpstan.broker.dynamicFunctionReturnTypeExtension: %checkConfigTypes%}, Larastan\\Larastan\\ReturnTypes\\ConfigRepositoryDynamicMethodReturnTypeExtension: {phpstan.broker.dynamicMethodReturnTypeExtension: %checkConfigTypes%}, Larastan\\Larastan\\ReturnTypes\\ConfigFacadeCollectionDynamicStaticMethodReturnTypeExtension: {phpstan.broker.dynamicStaticMethodReturnTypeExtension: %checkConfigTypes%}, Larastan\\Larastan\\Rules\\ConfigCollectionRule: {phpstan.rules.rule: %checkConfigTypes%}}, parameters: {universalObjectCratesClasses: [Illuminate\\Http\\Request, Illuminate\\Support\\Optional], earlyTerminatingFunctionCalls: [abort, dd], mixinExcludeClasses: [Eloquent], bootstrapFiles: [bootstrap.php], checkOctaneCompatibility: false, noEnvCallsOutsideOfConfig: true, noModelMake: true, noUnnecessaryCollectionCall: true, noUnnecessaryCollectionCallOnly: [], noUnnecessaryCollectionCallExcept: [], noUnnecessaryEnumerableToArrayCalls: false, squashedMigrationsPath: [], databaseMigrationsPath: [], disableMigrationScan: false, disableSchemaScan: false, configDirectories: [], viewDirectories: [], translationDirectories: [], checkModelProperties: false, checkUnusedViews: false, checkMissingTranslations: false, checkModelAppends: true, checkModelMethodVisibility: false, generalizeEnvReturnType: false, checkConfigTypes: false, checkAuthCallsWhenInRequestScope: false, parseModelCastsMethod: false, enableMigrationCache: false, paths: [C:\\projects\\cacao\\backend\\app, C:\\projects\\cacao\\backend\\routes], level: 6}, rules: [Larastan\\Larastan\\Rules\\UselessConstructs\\NoUselessWithFunctionCallsRule, Larastan\\Larastan\\Rules\\UselessConstructs\\NoUselessValueFunctionCallsRule, Larastan\\Larastan\\Rules\\DeferrableServiceProviderMissingProvidesRule, Larastan\\Larastan\\Rules\\ConsoleCommand\\UndefinedArgumentOrOptionRule], services: {{class: Larastan\\Larastan\\Methods\\RelationForwardsCallsExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\ModelForwardsCallsExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\EloquentBuilderForwardsCallsExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\HigherOrderTapProxyExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\HigherOrderCollectionProxyExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\StorageMethodsClassReflectionExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\ContractsMethodsExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\FacadesMethodsExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\ManagersMethodsExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\AuthsMethodsExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\ModelFactoryMethodsClassReflectionExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\RedirectResponseMethodsClassReflectionExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\MacroMethodsClassReflectionExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\ViewWithMethodsClassReflectionExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Properties\\ModelAccessorExtension, tags: [phpstan.broker.propertiesClassReflectionExtension]}, {class: Larastan\\Larastan\\Properties\\ModelPropertyExtension, tags: [phpstan.broker.propertiesClassReflectionExtension]}, {class: Larastan\\Larastan\\Properties\\HigherOrderCollectionProxyPropertyExtension, tags: [phpstan.broker.propertiesClassReflectionExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\HigherOrderTapProxyExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ContainerArrayAccessDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension], arguments: {className: Illuminate\\Contracts\\Container\\Container}}, {class: Larastan\\Larastan\\ReturnTypes\\ContainerArrayAccessDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension], arguments: {className: Illuminate\\Container\\Container}}, {class: Larastan\\Larastan\\ReturnTypes\\ContainerArrayAccessDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension], arguments: {className: Illuminate\\Foundation\\Application}}, {class: Larastan\\Larastan\\ReturnTypes\\ContainerArrayAccessDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension], arguments: {className: Illuminate\\Contracts\\Foundation\\Application}}, {class: Larastan\\Larastan\\Properties\\ModelRelationsExtension, tags: [phpstan.broker.propertiesClassReflectionExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ModelOnlyDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ModelFactoryDynamicStaticMethodReturnTypeExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ModelDynamicStaticMethodReturnTypeExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\AppMakeDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\AuthExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\GuardDynamicStaticMethodReturnTypeExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\AuthManagerExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\DateExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\GuardExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\RequestFileExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\RequestRouteExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\RequestUserExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\EloquentBuilderExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\RelationCollectionExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\TestCaseExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\Support\\CollectionHelper}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\AuthExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\CollectExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\NowAndTodayExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\ResponseExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\ValidatorExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\LiteralExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\CollectionFilterRejectDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\CollectionWhereNotNullDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\NewModelQueryDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\FactoryDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\Types\\AbortIfFunctionTypeSpecifyingExtension, tags: [phpstan.typeSpecifier.functionTypeSpecifyingExtension], arguments: {methodName: abort, negate: false}}, {class: Larastan\\Larastan\\Types\\AbortIfFunctionTypeSpecifyingExtension, tags: [phpstan.typeSpecifier.functionTypeSpecifyingExtension], arguments: {methodName: abort, negate: true}}, {class: Larastan\\Larastan\\Types\\AbortIfFunctionTypeSpecifyingExtension, tags: [phpstan.typeSpecifier.functionTypeSpecifyingExtension], arguments: {methodName: throw, negate: false}}, {class: Larastan\\Larastan\\Types\\AbortIfFunctionTypeSpecifyingExtension, tags: [phpstan.typeSpecifier.functionTypeSpecifyingExtension], arguments: {methodName: throw, negate: true}}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\AppExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\ValueExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\StrExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\TapExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\StorageDynamicStaticMethodReturnTypeExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\Types\\GenericEloquentCollectionTypeNodeResolverExtension, tags: [phpstan.phpDoc.typeNodeResolverExtension]}, {class: Larastan\\Larastan\\Types\\ViewStringTypeNodeResolverExtension, tags: [phpstan.phpDoc.typeNodeResolverExtension]}, {class: Larastan\\Larastan\\Rules\\OctaneCompatibilityRule}, {class: Larastan\\Larastan\\Rules\\NoEnvCallsOutsideOfConfigRule, arguments: {configDirectories: %configDirectories%}}, {class: Larastan\\Larastan\\Rules\\NoModelMakeRule}, {class: Larastan\\Larastan\\Rules\\NoUnnecessaryCollectionCallRule, arguments: {onlyMethods: %noUnnecessaryCollectionCallOnly%, excludeMethods: %noUnnecessaryCollectionCallExcept%}}, {class: Larastan\\Larastan\\Rules\\NoUnnecessaryEnumerableToArrayCallsRule}, {class: Larastan\\Larastan\\Rules\\ModelAppendsRule}, {class: Larastan\\Larastan\\Rules\\NoPublicModelScopeAndAccessorRule}, {class: Larastan\\Larastan\\Types\\GenericEloquentBuilderTypeNodeResolverExtension, tags: [phpstan.phpDoc.typeNodeResolverExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\AppEnvironmentReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension], arguments: {class: Illuminate\\Foundation\\Application}}, {class: Larastan\\Larastan\\ReturnTypes\\AppEnvironmentReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension], arguments: {class: Illuminate\\Contracts\\Foundation\\Application}}, {class: Larastan\\Larastan\\ReturnTypes\\AppFacadeEnvironmentReturnTypeExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\Types\\ModelProperty\\ModelPropertyTypeNodeResolverExtension, tags: [phpstan.phpDoc.typeNodeResolverExtension], arguments: {active: %checkModelProperties%}}, {class: Larastan\\Larastan\\Types\\CollectionOf\\CollectionOfTypeNodeResolverExtension, tags: [phpstan.phpDoc.typeNodeResolverExtension]}, {class: Larastan\\Larastan\\Properties\\MigrationHelper, arguments: {databaseMigrationPath: %databaseMigrationsPath%, disableMigrationScan: %disableMigrationScan%, parser: @migrationsParser, reflectionProvider: @reflectionProvider}}, iamcalSqlParser: {class: Larastan\\Larastan\\SQL\\IamcalSqlParser, autowired: false}, sqlParserFactory: {class: Larastan\\Larastan\\SQL\\SqlParserFactory, arguments: {iamcalSqlParser: @iamcalSqlParser}}, sqlParser: {type: Larastan\\Larastan\\SQL\\SqlParser, factory: [@sqlParserFactory, create]}, {class: Larastan\\Larastan\\Properties\\SquashedMigrationHelper, arguments: {schemaPaths: %squashedMigrationsPath%, disableSchemaScan: %disableSchemaScan%}}, {class: Larastan\\Larastan\\Properties\\ModelCastHelper, arguments: {parser: @currentPhpVersionSimpleDirectParser, parseModelCastsMethod: %parseModelCastsMethod%}}, {class: Larastan\\Larastan\\Properties\\MigrationCache, arguments: {cacheDirectory: %tmpDir%, enabled: %enableMigrationCache%}}, {class: Larastan\\Larastan\\Properties\\ModelPropertyHelper}, {class: Larastan\\Larastan\\Rules\\ModelRuleHelper}, {class: Larastan\\Larastan\\Methods\\BuilderHelper, arguments: {checkProperties: %checkModelProperties%}}, {class: Larastan\\Larastan\\Rules\\RelationExistenceRule, tags: [phpstan.rules.rule]}, {class: Larastan\\Larastan\\Rules\\CheckDispatchArgumentTypesCompatibleWithClassConstructorRule, arguments: {dispatchableClass: Illuminate\\Foundation\\Bus\\Dispatchable}, tags: [phpstan.rules.rule]}, {class: Larastan\\Larastan\\Rules\\CheckDispatchArgumentTypesCompatibleWithClassConstructorRule, arguments: {dispatchableClass: Illuminate\\Foundation\\Events\\Dispatchable}, tags: [phpstan.rules.rule]}, {class: Larastan\\Larastan\\Properties\\Schema\\MySqlDataTypeToPhpTypeConverter}, {class: Larastan\\Larastan\\LarastanStubFilesExtension, tags: [phpstan.stubFilesExtension]}, {class: Larastan\\Larastan\\Rules\\UnusedViewsRule}, {class: Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector, tags: [phpstan.collector]}, {class: Larastan\\Larastan\\Collectors\\UsedEmailViewCollector, tags: [phpstan.collector]}, {class: Larastan\\Larastan\\Collectors\\UsedViewMakeCollector, tags: [phpstan.collector]}, {class: Larastan\\Larastan\\Collectors\\UsedViewFacadeMakeCollector, tags: [phpstan.collector]}, {class: Larastan\\Larastan\\Collectors\\UsedRouteFacadeViewCollector, tags: [phpstan.collector]}, {class: Larastan\\Larastan\\Collectors\\UsedViewInAnotherViewCollector}, {class: Larastan\\Larastan\\Support\\ViewFileHelper, arguments: {viewDirectories: %viewDirectories%}}, {class: Larastan\\Larastan\\Support\\ViewParser, arguments: {parser: @currentPhpVersionSimpleDirectParser}}, {class: Larastan\\Larastan\\Rules\\NoMissingTranslationsRule, arguments: {translationDirectories: %translationDirectories%}}, {class: Larastan\\Larastan\\Collectors\\UsedTranslationFunctionCollector, tags: [phpstan.collector]}, {class: Larastan\\Larastan\\Collectors\\UsedTranslationTranslatorCollector, tags: [phpstan.collector]}, {class: Larastan\\Larastan\\Collectors\\UsedTranslationFacadeCollector, tags: [phpstan.collector]}, {class: Larastan\\Larastan\\Collectors\\UsedTranslationViewCollector}, {class: Larastan\\Larastan\\ReturnTypes\\ApplicationMakeDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ContainerMakeDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ConsoleCommand\\ArgumentDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ConsoleCommand\\HasArgumentDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ConsoleCommand\\OptionDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ConsoleCommand\\HasOptionDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\TranslatorGetReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\LangGetReturnTypeExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\TransHelperReturnTypeExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\DoubleUnderscoreHelperReturnTypeExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\AppMakeHelper}, {class: Larastan\\Larastan\\Internal\\ConsoleApplicationResolver}, {class: Larastan\\Larastan\\Internal\\ConsoleApplicationHelper}, {class: Larastan\\Larastan\\Support\\HigherOrderCollectionProxyHelper}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\ConfigFunctionDynamicFunctionReturnTypeExtension}, {class: Larastan\\Larastan\\ReturnTypes\\ConfigRepositoryDynamicMethodReturnTypeExtension}, {class: Larastan\\Larastan\\ReturnTypes\\ConfigFacadeCollectionDynamicStaticMethodReturnTypeExtension}, {class: Larastan\\Larastan\\Support\\ConfigParser, arguments: {parser: @currentPhpVersionSimpleDirectParser, configPaths: %configDirectories%, treatPhpDocTypesAsCertain: %treatPhpDocTypesAsCertain%}}, {class: Larastan\\Larastan\\Internal\\ConfigHelper}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\EnvFunctionDynamicFunctionReturnTypeExtension}, {class: Larastan\\Larastan\\ReturnTypes\\FormRequestSafeDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\EloquentCollectionMapDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\Rules\\NoAuthFacadeInRequestScopeRule}, {class: Larastan\\Larastan\\Rules\\NoAuthHelperInRequestScopeRule}, {class: Larastan\\Larastan\\Rules\\ConfigCollectionRule}, {class: Illuminate\\Filesystem\\Filesystem, autowired: self}, migrationsParser: {class: PHPStan\\Parser\\CachedParser, arguments: {originalParser: @currentPhpVersionSimpleDirectParser, cachedNodesByStringCountMax: %cache.nodesByStringCountMax%}, autowired: false}}}',
  'analysedPaths' => 
  array (
    0 => 'C:\\projects\\cacao\\backend\\app',
    1 => 'C:\\projects\\cacao\\backend\\routes',
  ),
  'scannedFiles' => 
  array (
  ),
  'composerLocks' => 
  array (
    'C:/projects/cacao/backend/composer.lock' => '837d7be003369375317ab511f7d72ede0753fa8e257ef6dbef96e3732fbfaf6b',
  ),
  'composerInstalled' => 
  array (
    'C:/projects/cacao/backend/vendor/composer/installed.php' => 
    array (
      'versions' => 
      array (
        'anourvalar/eloquent-serialize' => 
        array (
          'pretty_version' => '1.3.10',
          'version' => '1.3.10.0',
          'reference' => '2be26f176b764a2d6f20118bfa4b125f71fa88f8',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../anourvalar/eloquent-serialize',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'blade-ui-kit/blade-heroicons' => 
        array (
          'pretty_version' => '2.7.0',
          'version' => '2.7.0.0',
          'reference' => '66fa8ba09dba12e0cdb410b8cb94f3b890eca440',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../blade-ui-kit/blade-heroicons',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'blade-ui-kit/blade-icons' => 
        array (
          'pretty_version' => '1.10.1',
          'version' => '1.10.1.0',
          'reference' => '6e072d021ea6249986c330b93293c33d0c4f0e34',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../blade-ui-kit/blade-icons',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'brianium/paratest' => 
        array (
          'pretty_version' => 'v7.8.5',
          'version' => '7.8.5.0',
          'reference' => '9b324c8fc319cf9728b581c7a90e1c8f6361c5e5',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../brianium/paratest',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'brick/math' => 
        array (
          'pretty_version' => '0.14.8',
          'version' => '0.14.8.0',
          'reference' => '63422359a44b7f06cae63c3b429b59e8efcc0629',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../brick/math',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'carbonphp/carbon-doctrine-types' => 
        array (
          'pretty_version' => '3.2.0',
          'version' => '3.2.0.0',
          'reference' => '18ba5ddfec8976260ead6e866180bd5d2f71aa1d',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../carbonphp/carbon-doctrine-types',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'chillerlan/php-qrcode' => 
        array (
          'pretty_version' => '5.0.5',
          'version' => '5.0.5.0',
          'reference' => '7b66282572fc14075c0507d74d9837dab25b38d6',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../chillerlan/php-qrcode',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'chillerlan/php-settings-container' => 
        array (
          'pretty_version' => '3.3.0',
          'version' => '3.3.0.0',
          'reference' => 'a0a487cbf5344f721eb504bf0f59bada40c381b7',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../chillerlan/php-settings-container',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'cordoval/hamcrest-php' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => '*',
          ),
        ),
        'danharrin/date-format-converter' => 
        array (
          'pretty_version' => 'v0.3.1',
          'version' => '0.3.1.0',
          'reference' => '7c31171bc981e48726729a5f3a05a2d2b63f0b1e',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../danharrin/date-format-converter',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'danharrin/livewire-rate-limiting' => 
        array (
          'pretty_version' => 'v2.2.0',
          'version' => '2.2.0.0',
          'reference' => 'c03e649220089f6e5a52d422e24e3f98c73e456d',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../danharrin/livewire-rate-limiting',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'davedevelopment/hamcrest-php' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => '*',
          ),
        ),
        'dflydev/dot-access-data' => 
        array (
          'pretty_version' => 'v3.0.3',
          'version' => '3.0.3.0',
          'reference' => 'a23a2bf4f31d3518f3ecb38660c95715dfead60f',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../dflydev/dot-access-data',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'doctrine/deprecations' => 
        array (
          'pretty_version' => '1.1.6',
          'version' => '1.1.6.0',
          'reference' => 'd4fe3e6fd9bb9e72557a19674f44d8ac7db4c6ca',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../doctrine/deprecations',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'doctrine/inflector' => 
        array (
          'pretty_version' => '2.1.0',
          'version' => '2.1.0.0',
          'reference' => '6d6c96277ea252fc1304627204c3d5e6e15faa3b',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../doctrine/inflector',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'doctrine/lexer' => 
        array (
          'pretty_version' => '3.0.1',
          'version' => '3.0.1.0',
          'reference' => '31ad66abc0fc9e1a1f2d9bc6a42668d2fbbcd6dd',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../doctrine/lexer',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'dragonmantank/cron-expression' => 
        array (
          'pretty_version' => 'v3.6.0',
          'version' => '3.6.0.0',
          'reference' => 'd61a8a9604ec1f8c3d150d09db6ce98b32675013',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../dragonmantank/cron-expression',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'egulias/email-validator' => 
        array (
          'pretty_version' => '4.0.4',
          'version' => '4.0.4.0',
          'reference' => 'd42c8731f0624ad6bdc8d3e5e9a4524f68801cfa',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../egulias/email-validator',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'fidry/cpu-core-counter' => 
        array (
          'pretty_version' => '1.3.0',
          'version' => '1.3.0.0',
          'reference' => 'db9508f7b1474469d9d3c53b86f817e344732678',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../fidry/cpu-core-counter',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'filament/actions' => 
        array (
          'pretty_version' => 'v4.11.8',
          'version' => '4.11.8.0',
          'reference' => '090eff05e788d22e76786078982ca0c97bbe0308',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../filament/actions',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'filament/filament' => 
        array (
          'pretty_version' => 'v4.11.8',
          'version' => '4.11.8.0',
          'reference' => 'b682c419917750326d61c28dc6b1ceb6d5d7da9a',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../filament/filament',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'filament/forms' => 
        array (
          'pretty_version' => 'v4.11.8',
          'version' => '4.11.8.0',
          'reference' => 'b1f740ecf8ed432773ec71accda6c6b9a5b81a95',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../filament/forms',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'filament/infolists' => 
        array (
          'pretty_version' => 'v4.11.8',
          'version' => '4.11.8.0',
          'reference' => '6cbc84c102ccf948ffa0c0b90058109cddb0cf07',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../filament/infolists',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'filament/notifications' => 
        array (
          'pretty_version' => 'v4.11.8',
          'version' => '4.11.8.0',
          'reference' => '444629e7be97cde97e7525e1f6788f4d9f40e0ac',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../filament/notifications',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'filament/query-builder' => 
        array (
          'pretty_version' => 'v4.11.8',
          'version' => '4.11.8.0',
          'reference' => 'b67af4c4c5e9e62861842648d3c433668a1f63f7',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../filament/query-builder',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'filament/schemas' => 
        array (
          'pretty_version' => 'v4.11.8',
          'version' => '4.11.8.0',
          'reference' => '15cfdbe16dec4ce87db6168cc082f508d3d351c1',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../filament/schemas',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'filament/support' => 
        array (
          'pretty_version' => 'v4.11.8',
          'version' => '4.11.8.0',
          'reference' => '6073203fa9e0e341e23d09caeaa83a8593f2fbbe',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../filament/support',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'filament/tables' => 
        array (
          'pretty_version' => 'v4.11.8',
          'version' => '4.11.8.0',
          'reference' => 'f1dad0a948094603112833ea796f225035481752',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../filament/tables',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'filament/widgets' => 
        array (
          'pretty_version' => 'v4.11.8',
          'version' => '4.11.8.0',
          'reference' => 'a7a88af16c01817ba6c7802f4f0bcf66b9101201',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../filament/widgets',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'filp/whoops' => 
        array (
          'pretty_version' => '2.18.4',
          'version' => '2.18.4.0',
          'reference' => 'd2102955e48b9fd9ab24280a7ad12ed552752c4d',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../filp/whoops',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'firebase/php-jwt' => 
        array (
          'pretty_version' => 'v7.1.0',
          'version' => '7.1.0.0',
          'reference' => 'b374a5d1a4f1f67fadc2165cdb284645945e2fc0',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../firebase/php-jwt',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'fruitcake/php-cors' => 
        array (
          'pretty_version' => 'v1.4.0',
          'version' => '1.4.0.0',
          'reference' => '38aaa6c3fd4c157ffe2a4d10aa8b9b16ba8de379',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../fruitcake/php-cors',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'google/auth' => 
        array (
          'pretty_version' => 'v1.52.0',
          'version' => '1.52.0.0',
          'reference' => '7a7e5ab2ff2d9449a252eab587d4dae978c22a77',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../google/auth',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'graham-campbell/result-type' => 
        array (
          'pretty_version' => 'v1.1.4',
          'version' => '1.1.4.0',
          'reference' => 'e01f4a821471308ba86aa202fed6698b6b695e3b',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../graham-campbell/result-type',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'guzzlehttp/guzzle' => 
        array (
          'pretty_version' => '7.14.2',
          'version' => '7.14.2.0',
          'reference' => 'fa88c57803501ad0770f5cddb1e60525d49da9a1',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../guzzlehttp/guzzle',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'guzzlehttp/promises' => 
        array (
          'pretty_version' => '2.5.1',
          'version' => '2.5.1.0',
          'reference' => '9ad1e4fc607446a055b95870c7f668e93b5cff29',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../guzzlehttp/promises',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'guzzlehttp/psr7' => 
        array (
          'pretty_version' => '2.12.5',
          'version' => '2.12.5.0',
          'reference' => '9365d578a9fd1552ad6ca9c3cb530708526feb09',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../guzzlehttp/psr7',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'guzzlehttp/uri-template' => 
        array (
          'pretty_version' => 'v1.0.9',
          'version' => '1.0.9.0',
          'reference' => 'd7580af6d3f8384325d9cd3e99b21c3ed1848176',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../guzzlehttp/uri-template',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'hamcrest/hamcrest-php' => 
        array (
          'pretty_version' => 'v2.1.1',
          'version' => '2.1.1.0',
          'reference' => 'f8b1c0173b22fa6ec77a81fe63e5b01eba7e6487',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../hamcrest/hamcrest-php',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'iamcal/sql-parser' => 
        array (
          'pretty_version' => 'v0.7',
          'version' => '0.7.0.0',
          'reference' => '610392f38de49a44dab08dc1659960a29874c4b8',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../iamcal/sql-parser',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'illuminate/auth' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/broadcasting' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/bus' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/cache' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/collections' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/concurrency' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/conditionable' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/config' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/console' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/container' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/contracts' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/cookie' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/database' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/encryption' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/events' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/filesystem' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/hashing' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/http' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/json-schema' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/log' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/macroable' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/mail' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/notifications' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/pagination' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/pipeline' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/process' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/queue' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/redis' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/reflection' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/routing' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/session' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/support' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/testing' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/translation' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/validation' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/view' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'jean85/pretty-package-versions' => 
        array (
          'pretty_version' => '2.1.1',
          'version' => '2.1.1.0',
          'reference' => '4d7aa5dab42e2a76d99559706022885de0e18e1a',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../jean85/pretty-package-versions',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'kirschbaum-development/eloquent-power-joins' => 
        array (
          'pretty_version' => '4.3.2',
          'version' => '4.3.2.0',
          'reference' => '33c189bd51a510c1ceba67222395ead08a29863a',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../kirschbaum-development/eloquent-power-joins',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'kodova/hamcrest-php' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => '*',
          ),
        ),
        'larastan/larastan' => 
        array (
          'pretty_version' => 'v3.10.0',
          'version' => '3.10.0.0',
          'reference' => '2970f83398154178a739609c244577267c7ee8eb',
          'type' => 'phpstan-extension',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../larastan/larastan',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'laravel/framework' => 
        array (
          'pretty_version' => 'v12.64.0',
          'version' => '12.64.0.0',
          'reference' => '727a8ea2949c23ca8b5316b86a00984b6017b7a0',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../laravel/framework',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'laravel/pint' => 
        array (
          'pretty_version' => 'v1.29.3',
          'version' => '1.29.3.0',
          'reference' => 'da1d1111a6aa2e082d2a388b194afe1ba0a05d14',
          'type' => 'project',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../laravel/pint',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'laravel/prompts' => 
        array (
          'pretty_version' => 'v0.3.21',
          'version' => '0.3.21.0',
          'reference' => '7753c65c281c2550c7c183f14e18062073b7d821',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../laravel/prompts',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'laravel/sail' => 
        array (
          'pretty_version' => 'v1.63.0',
          'version' => '1.63.0.0',
          'reference' => '51bbce3f803c1d386cabbb44e618c955a12ff5fc',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../laravel/sail',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'laravel/sanctum' => 
        array (
          'pretty_version' => 'v4.3.2',
          'version' => '4.3.2.0',
          'reference' => '2a9bccc18e9907808e0018dd15fa643937886b1e',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../laravel/sanctum',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'laravel/serializable-closure' => 
        array (
          'pretty_version' => 'v2.0.13',
          'version' => '2.0.13.0',
          'reference' => 'b566ee0dd251f3c4078bed003a7ce015f5ea6dce',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../laravel/serializable-closure',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'laravel/socialite' => 
        array (
          'pretty_version' => 'v5.28.0',
          'version' => '5.28.0.0',
          'reference' => '4c131ff4b24d8881a9c8fe4eecb5ffeff9803f26',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../laravel/socialite',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'laravel/tinker' => 
        array (
          'pretty_version' => 'v2.11.1',
          'version' => '2.11.1.0',
          'reference' => 'c9f80cc835649b5c1842898fb043f8cc098dd741',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../laravel/tinker',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'league/commonmark' => 
        array (
          'pretty_version' => '2.8.3',
          'version' => '2.8.3.0',
          'reference' => '1902f60f984235023acbe03db6ad614a37b3c3e7',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../league/commonmark',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'league/config' => 
        array (
          'pretty_version' => 'v1.2.0',
          'version' => '1.2.0.0',
          'reference' => '754b3604fb2984c71f4af4a9cbe7b57f346ec1f3',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../league/config',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'league/csv' => 
        array (
          'pretty_version' => '9.28.0',
          'version' => '9.28.0.0',
          'reference' => '6582ace29ae09ba5b07049d40ea13eb19c8b5073',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../league/csv',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'league/flysystem' => 
        array (
          'pretty_version' => '3.35.2',
          'version' => '3.35.2.0',
          'reference' => 'b277b5dc3d56650b68904117124e79c851e12376',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../league/flysystem',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'league/flysystem-local' => 
        array (
          'pretty_version' => '3.31.0',
          'version' => '3.31.0.0',
          'reference' => '2f669db18a4c20c755c2bb7d3a7b0b2340488079',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../league/flysystem-local',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'league/mime-type-detection' => 
        array (
          'pretty_version' => '1.17.0',
          'version' => '1.17.0.0',
          'reference' => 'f5f47eff7c48ed1003069a2ca67f316fb4021c76',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../league/mime-type-detection',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'league/oauth1-client' => 
        array (
          'pretty_version' => 'v1.11.0',
          'version' => '1.11.0.0',
          'reference' => 'f9c94b088837eb1aae1ad7c4f23eb65cc6993055',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../league/oauth1-client',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'league/uri' => 
        array (
          'pretty_version' => '7.8.1',
          'version' => '7.8.1.0',
          'reference' => '08cf38e3924d4f56238125547b5720496fac8fd4',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../league/uri',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'league/uri-components' => 
        array (
          'pretty_version' => '7.8.1',
          'version' => '7.8.1.0',
          'reference' => '848ff9db2f0be06229d6034b7c2e33d41b4fd675',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../league/uri-components',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'league/uri-interfaces' => 
        array (
          'pretty_version' => '7.8.1',
          'version' => '7.8.1.0',
          'reference' => '85d5c77c5d6d3af6c54db4a78246364908f3c928',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../league/uri-interfaces',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'livewire/livewire' => 
        array (
          'pretty_version' => 'v3.8.2',
          'version' => '3.8.2.0',
          'reference' => 'e77fce60d0615d68dc6b8fafe98a6739d9752a24',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../livewire/livewire',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'masterminds/html5' => 
        array (
          'pretty_version' => '2.10.1',
          'version' => '2.10.1.0',
          'reference' => 'fd5018f6815fff903946d0564977b44ce8010e29',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../masterminds/html5',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'mockery/mockery' => 
        array (
          'pretty_version' => '1.6.12',
          'version' => '1.6.12.0',
          'reference' => '1f4efdd7d3beafe9807b08156dfcb176d18f1699',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../mockery/mockery',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'monolog/monolog' => 
        array (
          'pretty_version' => '3.10.0',
          'version' => '3.10.0.0',
          'reference' => 'b321dd6749f0bf7189444158a3ce785cc16d69b0',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../monolog/monolog',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'mtdowling/cron-expression' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => '^1.0',
          ),
        ),
        'myclabs/deep-copy' => 
        array (
          'pretty_version' => '1.13.4',
          'version' => '1.13.4.0',
          'reference' => '07d290f0c47959fd5eed98c95ee5602db07e0b6a',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../myclabs/deep-copy',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'nesbot/carbon' => 
        array (
          'pretty_version' => '3.13.1',
          'version' => '3.13.1.0',
          'reference' => '2937ad3d1d2c506fd2bc97d571438a95641f44e2',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../nesbot/carbon',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'nette/php-generator' => 
        array (
          'pretty_version' => 'v4.2.2',
          'version' => '4.2.2.0',
          'reference' => '0d7060926f5c3e8c488b9b9ced42d857f12a34b5',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../nette/php-generator',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'nette/schema' => 
        array (
          'pretty_version' => 'v1.3.5',
          'version' => '1.3.5.0',
          'reference' => 'f0ab1a3cda782dbc5da270d28545236aa80c4002',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../nette/schema',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'nette/utils' => 
        array (
          'pretty_version' => 'v4.1.4',
          'version' => '4.1.4.0',
          'reference' => '7da6c396d7ebe142bc857c20479d5e70a5e1aac7',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../nette/utils',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'nikic/php-parser' => 
        array (
          'pretty_version' => 'v5.8.0',
          'version' => '5.8.0.0',
          'reference' => '044a6a392ff8ad0d61f14370a5fbbd0a0107152f',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../nikic/php-parser',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'nunomaduro/collision' => 
        array (
          'pretty_version' => 'v8.9.4',
          'version' => '8.9.4.0',
          'reference' => '716af8f95a470e9094cfca09ed897b023be191a5',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../nunomaduro/collision',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'nunomaduro/termwind' => 
        array (
          'pretty_version' => 'v2.4.0',
          'version' => '2.4.0.0',
          'reference' => '712a31b768f5daea284c2169a7d227031001b9a8',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../nunomaduro/termwind',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'openspout/openspout' => 
        array (
          'pretty_version' => 'v4.28.5',
          'version' => '4.28.5.0',
          'reference' => 'ab05a09fe6fce57c90338f83280648a9786ce36b',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../openspout/openspout',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'paragonie/constant_time_encoding' => 
        array (
          'pretty_version' => 'v3.1.3',
          'version' => '3.1.3.0',
          'reference' => 'd5b01a39b3415c2cd581d3bd3a3575c1ebbd8e77',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../paragonie/constant_time_encoding',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'paragonie/random_compat' => 
        array (
          'pretty_version' => 'v9.99.100',
          'version' => '9.99.100.0',
          'reference' => '996434e5492cb4c3edcb9168db6fbb1359ef965a',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../paragonie/random_compat',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'pestphp/pest' => 
        array (
          'pretty_version' => 'v3.8.7',
          'version' => '3.8.7.0',
          'reference' => 'f108313b52e8c28dc7121ce34303f817a3790202',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../pestphp/pest',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'pestphp/pest-plugin' => 
        array (
          'pretty_version' => 'v3.0.0',
          'version' => '3.0.0.0',
          'reference' => 'e79b26c65bc11c41093b10150c1341cc5cdbea83',
          'type' => 'composer-plugin',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../pestphp/pest-plugin',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'pestphp/pest-plugin-arch' => 
        array (
          'pretty_version' => 'v3.1.1',
          'version' => '3.1.1.0',
          'reference' => 'db7bd9cb1612b223e16618d85475c6f63b9c8daa',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../pestphp/pest-plugin-arch',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'pestphp/pest-plugin-laravel' => 
        array (
          'pretty_version' => 'v3.2.0',
          'version' => '3.2.0.0',
          'reference' => '6801be82fd92b96e82dd72e563e5674b1ce365fc',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../pestphp/pest-plugin-laravel',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'pestphp/pest-plugin-mutate' => 
        array (
          'pretty_version' => 'v3.0.5',
          'version' => '3.0.5.0',
          'reference' => 'e10dbdc98c9e2f3890095b4fe2144f63a5717e08',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../pestphp/pest-plugin-mutate',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phar-io/manifest' => 
        array (
          'pretty_version' => '2.0.4',
          'version' => '2.0.4.0',
          'reference' => '54750ef60c58e43759730615a392c31c80e23176',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../phar-io/manifest',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phar-io/version' => 
        array (
          'pretty_version' => '3.2.1',
          'version' => '3.2.1.0',
          'reference' => '4f7fd7836c6f332bb2933569e566a0d6c4cbed74',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../phar-io/version',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpdocumentor/reflection-common' => 
        array (
          'pretty_version' => '2.2.0',
          'version' => '2.2.0.0',
          'reference' => '1d01c49d4ed62f25aa84a747ad35d5a16924662b',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../phpdocumentor/reflection-common',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpdocumentor/reflection-docblock' => 
        array (
          'pretty_version' => '6.0.3',
          'version' => '6.0.3.0',
          'reference' => '7bae67520aa9f5ecc506d646810bd40d9da54582',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../phpdocumentor/reflection-docblock',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpdocumentor/type-resolver' => 
        array (
          'pretty_version' => '2.0.0',
          'version' => '2.0.0.0',
          'reference' => '327a05bbee54120d4786a0dc67aad30226ad4cf9',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../phpdocumentor/type-resolver',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpoption/phpoption' => 
        array (
          'pretty_version' => '1.9.5',
          'version' => '1.9.5.0',
          'reference' => '75365b91986c2405cf5e1e012c5595cd487a98be',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../phpoption/phpoption',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'phpseclib/phpseclib' => 
        array (
          'pretty_version' => '3.0.55',
          'version' => '3.0.55.0',
          'reference' => 'db9744e6d47e742b1f974e965ad49bdd041105af',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../phpseclib/phpseclib',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'phpstan/phpdoc-parser' => 
        array (
          'pretty_version' => '2.3.3',
          'version' => '2.3.3.0',
          'reference' => 'fb19eedd2bb67ff8cf7a5502ad329e701d6398a3',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../phpstan/phpdoc-parser',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpstan/phpstan' => 
        array (
          'pretty_version' => '2.2.5',
          'version' => '2.2.5.0',
          'reference' => '909c1e5fef7989ac0d0c1c5c42e32a5c4f6198a0',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../phpstan/phpstan',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpunit/php-code-coverage' => 
        array (
          'pretty_version' => '11.0.12',
          'version' => '11.0.12.0',
          'reference' => '2c1ed04922802c15e1de5d7447b4856de949cf56',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../phpunit/php-code-coverage',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpunit/php-file-iterator' => 
        array (
          'pretty_version' => '5.1.1',
          'version' => '5.1.1.0',
          'reference' => '2f3a64888c814fc235386b7387dd5b5ed92ad903',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../phpunit/php-file-iterator',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpunit/php-invoker' => 
        array (
          'pretty_version' => '5.0.1',
          'version' => '5.0.1.0',
          'reference' => 'c1ca3814734c07492b3d4c5f794f4b0995333da2',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../phpunit/php-invoker',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpunit/php-text-template' => 
        array (
          'pretty_version' => '4.0.1',
          'version' => '4.0.1.0',
          'reference' => '3e0404dc6b300e6bf56415467ebcb3fe4f33e964',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../phpunit/php-text-template',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpunit/php-timer' => 
        array (
          'pretty_version' => '7.0.1',
          'version' => '7.0.1.0',
          'reference' => '3b415def83fbcb41f991d9ebf16ae4ad8b7837b3',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../phpunit/php-timer',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpunit/phpunit' => 
        array (
          'pretty_version' => '11.5.56',
          'version' => '11.5.56.0',
          'reference' => '5f83edffa6967c3db468d48a695ec7bcb02e9256',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../phpunit/phpunit',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'pragmarx/google2fa' => 
        array (
          'pretty_version' => 'v9.0.0',
          'version' => '9.0.0.0',
          'reference' => 'e6bc62dd6ae83acc475f57912e27466019a1f2cf',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../pragmarx/google2fa',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'pragmarx/google2fa-qrcode' => 
        array (
          'pretty_version' => 'v4.0.0',
          'version' => '4.0.0.0',
          'reference' => '16159f84fa0838c276f35d46de57fd90dfbb385c',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../pragmarx/google2fa-qrcode',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'psr/cache' => 
        array (
          'pretty_version' => '3.0.0',
          'version' => '3.0.0.0',
          'reference' => 'aa5030cfa5405eccfdcb1083ce040c2cb8d253bf',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../psr/cache',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'psr/clock' => 
        array (
          'pretty_version' => '1.0.0',
          'version' => '1.0.0.0',
          'reference' => 'e41a24703d4560fd0acb709162f73b8adfc3aa0d',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../psr/clock',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'psr/clock-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '1.0',
          ),
        ),
        'psr/container' => 
        array (
          'pretty_version' => '2.0.2',
          'version' => '2.0.2.0',
          'reference' => 'c71ecc56dfe541dbd90c5360474fbc405f8d5963',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../psr/container',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'psr/container-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '1.1|2.0',
          ),
        ),
        'psr/event-dispatcher' => 
        array (
          'pretty_version' => '1.0.0',
          'version' => '1.0.0.0',
          'reference' => 'dbefd12671e8a14ec7f180cab83036ed26714bb0',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../psr/event-dispatcher',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'psr/event-dispatcher-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '1.0',
          ),
        ),
        'psr/http-client' => 
        array (
          'pretty_version' => '1.0.3',
          'version' => '1.0.3.0',
          'reference' => 'bb5906edc1c324c9a05aa0873d40117941e5fa90',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../psr/http-client',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'psr/http-client-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '1.0',
          ),
        ),
        'psr/http-factory' => 
        array (
          'pretty_version' => '1.1.0',
          'version' => '1.1.0.0',
          'reference' => '2b4765fddfe3b508ac62f829e852b1501d3f6e8a',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../psr/http-factory',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'psr/http-factory-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '1.0',
          ),
        ),
        'psr/http-message' => 
        array (
          'pretty_version' => '2.0',
          'version' => '2.0.0.0',
          'reference' => '402d35bcb92c70c026d1a6a9883f06b2ead23d71',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../psr/http-message',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'psr/http-message-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '1.0',
          ),
        ),
        'psr/log' => 
        array (
          'pretty_version' => '3.0.2',
          'version' => '3.0.2.0',
          'reference' => 'f16e1d5863e37f8d8c2a01719f5b34baa2b714d3',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../psr/log',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'psr/log-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '1.0|2.0|3.0',
            1 => '3.0.0',
          ),
        ),
        'psr/simple-cache' => 
        array (
          'pretty_version' => '3.0.0',
          'version' => '3.0.0.0',
          'reference' => '764e0b3939f5ca87cb904f570ef9be2d78a07865',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../psr/simple-cache',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'psr/simple-cache-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '1.0|2.0|3.0',
          ),
        ),
        'psy/psysh' => 
        array (
          'pretty_version' => 'v0.12.24',
          'version' => '0.12.24.0',
          'reference' => 'ca0fdcf8a7617afa3adfdf1b5fef573dffb69ca1',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../psy/psysh',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'ralouphie/getallheaders' => 
        array (
          'pretty_version' => '3.0.3',
          'version' => '3.0.3.0',
          'reference' => '120b605dfeb996808c31b6477290a714d356e822',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../ralouphie/getallheaders',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'ramsey/collection' => 
        array (
          'pretty_version' => '2.1.1',
          'version' => '2.1.1.0',
          'reference' => '344572933ad0181accbf4ba763e85a0306a8c5e2',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../ramsey/collection',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'ramsey/uuid' => 
        array (
          'pretty_version' => '4.9.3',
          'version' => '4.9.3.0',
          'reference' => '1df15849d00943a67d677dc9cfd80795f038c9f8',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../ramsey/uuid',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'rhumsaa/uuid' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => '4.9.3',
          ),
        ),
        'ryangjchandler/blade-capture-directive' => 
        array (
          'pretty_version' => 'v1.1.1',
          'version' => '1.1.1.0',
          'reference' => '3f9e80b56ff60b78755ef320e3e16d88850101d6',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../ryangjchandler/blade-capture-directive',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'scrivo/highlight.php' => 
        array (
          'pretty_version' => 'v9.18.1.10',
          'version' => '9.18.1.10',
          'reference' => '850f4b44697a2552e892ffe71490ba2733c2fc6e',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../scrivo/highlight.php',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'sebastian/cli-parser' => 
        array (
          'pretty_version' => '3.0.2',
          'version' => '3.0.2.0',
          'reference' => '15c5dd40dc4f38794d383bb95465193f5e0ae180',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../sebastian/cli-parser',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/code-unit' => 
        array (
          'pretty_version' => '3.0.3',
          'version' => '3.0.3.0',
          'reference' => '54391c61e4af8078e5b276ab082b6d3c54c9ad64',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../sebastian/code-unit',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/code-unit-reverse-lookup' => 
        array (
          'pretty_version' => '4.0.1',
          'version' => '4.0.1.0',
          'reference' => '183a9b2632194febd219bb9246eee421dad8d45e',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../sebastian/code-unit-reverse-lookup',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/comparator' => 
        array (
          'pretty_version' => '6.3.3',
          'version' => '6.3.3.0',
          'reference' => '2c95e1e86cb8dd41beb8d502057d1081ccc8eca9',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../sebastian/comparator',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/complexity' => 
        array (
          'pretty_version' => '4.0.1',
          'version' => '4.0.1.0',
          'reference' => 'ee41d384ab1906c68852636b6de493846e13e5a0',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../sebastian/complexity',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/diff' => 
        array (
          'pretty_version' => '6.0.2',
          'version' => '6.0.2.0',
          'reference' => 'b4ccd857127db5d41a5b676f24b51371d76d8544',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../sebastian/diff',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/environment' => 
        array (
          'pretty_version' => '7.2.1',
          'version' => '7.2.1.0',
          'reference' => 'a5c75038693ad2e8d4b6c15ba2403532647830c4',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../sebastian/environment',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/exporter' => 
        array (
          'pretty_version' => '6.3.2',
          'version' => '6.3.2.0',
          'reference' => '70a298763b40b213ec087c51c739efcaa90bcd74',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../sebastian/exporter',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/global-state' => 
        array (
          'pretty_version' => '7.0.2',
          'version' => '7.0.2.0',
          'reference' => '3be331570a721f9a4b5917f4209773de17f747d7',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../sebastian/global-state',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/lines-of-code' => 
        array (
          'pretty_version' => '3.0.1',
          'version' => '3.0.1.0',
          'reference' => 'd36ad0d782e5756913e42ad87cb2890f4ffe467a',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../sebastian/lines-of-code',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/object-enumerator' => 
        array (
          'pretty_version' => '6.0.1',
          'version' => '6.0.1.0',
          'reference' => 'f5b498e631a74204185071eb41f33f38d64608aa',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../sebastian/object-enumerator',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/object-reflector' => 
        array (
          'pretty_version' => '4.0.1',
          'version' => '4.0.1.0',
          'reference' => '6e1a43b411b2ad34146dee7524cb13a068bb35f9',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../sebastian/object-reflector',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/recursion-context' => 
        array (
          'pretty_version' => '6.0.3',
          'version' => '6.0.3.0',
          'reference' => 'f6458abbf32a6c8174f8f26261475dc133b3d9dc',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../sebastian/recursion-context',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/type' => 
        array (
          'pretty_version' => '5.1.3',
          'version' => '5.1.3.0',
          'reference' => 'f77d2d4e78738c98d9a68d2596fe5e8fa380f449',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../sebastian/type',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/version' => 
        array (
          'pretty_version' => '5.0.2',
          'version' => '5.0.2.0',
          'reference' => 'c687e3387b99f5b03b6caa64c74b63e2936ff874',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../sebastian/version',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'spatie/invade' => 
        array (
          'pretty_version' => '2.1.0',
          'version' => '2.1.0.0',
          'reference' => 'b920f6411d21df4e8610a138e2e87ae4957d7f63',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../spatie/invade',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'spatie/laravel-package-tools' => 
        array (
          'pretty_version' => '1.93.1',
          'version' => '1.93.1.0',
          'reference' => 'd5552849801f2642aea710557463234b59ef65eb',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../spatie/laravel-package-tools',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'spatie/laravel-permission' => 
        array (
          'pretty_version' => '6.25.0',
          'version' => '6.25.0.0',
          'reference' => 'd7d4cb0d58616722f1afc90e0484e4825155b9b3',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../spatie/laravel-permission',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'spatie/once' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => '*',
          ),
        ),
        'spatie/shiki-php' => 
        array (
          'pretty_version' => '2.4.0',
          'version' => '2.4.0.0',
          'reference' => 'b8b0ca32d3a82bc5c533e68ffab96c5d4ec1b9ba',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../spatie/shiki-php',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'staabm/side-effects-detector' => 
        array (
          'pretty_version' => '1.0.5',
          'version' => '1.0.5.0',
          'reference' => 'd8334211a140ce329c13726d4a715adbddd0a163',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../staabm/side-effects-detector',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'symfony/clock' => 
        array (
          'pretty_version' => 'v7.4.8',
          'version' => '7.4.8.0',
          'reference' => '674fa3b98e21531dd040e613479f5f6fa8f32111',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../symfony/clock',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/console' => 
        array (
          'pretty_version' => 'v7.4.14',
          'version' => '7.4.14.0',
          'reference' => '92f58bc4bf97a92ed1b9f367f0cd44f20bde0e87',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../symfony/console',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/css-selector' => 
        array (
          'pretty_version' => 'v7.4.9',
          'version' => '7.4.9.0',
          'reference' => 'b75663ed96cf4756e28e3105476f220f92886cc4',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../symfony/css-selector',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/deprecation-contracts' => 
        array (
          'pretty_version' => 'v3.7.1',
          'version' => '3.7.1.0',
          'reference' => 'f3202fa1b5097b0af062dc978b32ecf63404e31d',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../symfony/deprecation-contracts',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/error-handler' => 
        array (
          'pretty_version' => 'v7.4.14',
          'version' => '7.4.14.0',
          'reference' => '4e1a093b481f323e6e326451f9760c3868430673',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../symfony/error-handler',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/event-dispatcher' => 
        array (
          'pretty_version' => 'v7.4.14',
          'version' => '7.4.14.0',
          'reference' => '51fe3d170227be8d1772214b82ae506e15ed78ff',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../symfony/event-dispatcher',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/event-dispatcher-contracts' => 
        array (
          'pretty_version' => 'v3.7.1',
          'version' => '3.7.1.0',
          'reference' => 'c7de7a00ffb67842132da02ea92988a39ccd9f4e',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../symfony/event-dispatcher-contracts',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/event-dispatcher-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '2.0|3.0',
          ),
        ),
        'symfony/finder' => 
        array (
          'pretty_version' => 'v7.4.14',
          'version' => '7.4.14.0',
          'reference' => '13b38720174286f55d1761152b575a8d1436fc25',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../symfony/finder',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/html-sanitizer' => 
        array (
          'pretty_version' => 'v7.4.14',
          'version' => '7.4.14.0',
          'reference' => 'c328df69f5b6f44a0d031d757903d955bebb23b3',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../symfony/html-sanitizer',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/http-foundation' => 
        array (
          'pretty_version' => 'v7.4.14',
          'version' => '7.4.14.0',
          'reference' => '06db5ae1552177bf8572f8908839f12e3c06aed3',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../symfony/http-foundation',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/http-kernel' => 
        array (
          'pretty_version' => 'v7.4.14',
          'version' => '7.4.14.0',
          'reference' => 'e99af79b1e776646eda0e1c23b7b45c184ff99be',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../symfony/http-kernel',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/mailer' => 
        array (
          'pretty_version' => 'v7.4.14',
          'version' => '7.4.14.0',
          'reference' => 'f88ce03ae73e3edb5c176ce1f337709996e88495',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../symfony/mailer',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/mime' => 
        array (
          'pretty_version' => 'v7.4.13',
          'version' => '7.4.13.0',
          'reference' => 'a845722765c4f6b2ce88beaf4f4479975b186770',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../symfony/mime',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-ctype' => 
        array (
          'pretty_version' => 'v1.37.0',
          'version' => '1.37.0.0',
          'reference' => '141046a8f9477948ff284fa65be2095baafb94f2',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../symfony/polyfill-ctype',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-intl-grapheme' => 
        array (
          'pretty_version' => 'v1.38.1',
          'version' => '1.38.1.0',
          'reference' => 'e9247d281d694a5120554d9afaf54e070e88a603',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../symfony/polyfill-intl-grapheme',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-intl-idn' => 
        array (
          'pretty_version' => 'v1.38.1',
          'version' => '1.38.1.0',
          'reference' => 'dc21118016c039a66235cf93d96b435ffb282412',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../symfony/polyfill-intl-idn',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-intl-normalizer' => 
        array (
          'pretty_version' => 'v1.38.0',
          'version' => '1.38.0.0',
          'reference' => '2d446c214bdbe5b71bde5011b060a05fece3ae6b',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../symfony/polyfill-intl-normalizer',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-mbstring' => 
        array (
          'pretty_version' => 'v1.38.2',
          'version' => '1.38.2.0',
          'reference' => 'd3d318bad5e7a1bfbd026009c8bfb8d8f99ae6b6',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../symfony/polyfill-mbstring',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-php80' => 
        array (
          'pretty_version' => 'v1.37.0',
          'version' => '1.37.0.0',
          'reference' => 'dfb55726c3a76ea3b6459fcfda1ec2d80a682411',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../symfony/polyfill-php80',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-php83' => 
        array (
          'pretty_version' => 'v1.38.2',
          'version' => '1.38.2.0',
          'reference' => '796a26abb75ce49f3a84433cd81bf1009d73d5f8',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../symfony/polyfill-php83',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-php84' => 
        array (
          'pretty_version' => 'v1.38.1',
          'version' => '1.38.1.0',
          'reference' => 'f4e1dfaee5b74aba5964fe1fd4dfc7ba5e3085fa',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../symfony/polyfill-php84',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-php85' => 
        array (
          'pretty_version' => 'v1.38.1',
          'version' => '1.38.1.0',
          'reference' => 'ba2ba04f3352cfa2dcbbcb90aee13ed967f505b1',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../symfony/polyfill-php85',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-uuid' => 
        array (
          'pretty_version' => 'v1.37.0',
          'version' => '1.37.0.0',
          'reference' => '26dfec253c4cf3e51b541b52ddf7e42cb0908e94',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../symfony/polyfill-uuid',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/process' => 
        array (
          'pretty_version' => 'v7.4.13',
          'version' => '7.4.13.0',
          'reference' => 'f5804be144caceb570f6747519999636b664f24c',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../symfony/process',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/routing' => 
        array (
          'pretty_version' => 'v7.4.13',
          'version' => '7.4.13.0',
          'reference' => '3a162171bb008e5e0f15dce6581373a4c0e8390d',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../symfony/routing',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/service-contracts' => 
        array (
          'pretty_version' => 'v3.7.1',
          'version' => '3.7.1.0',
          'reference' => 'c0a284bab1ed8aa0417e3d69250ab437739563a0',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../symfony/service-contracts',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/string' => 
        array (
          'pretty_version' => 'v7.4.13',
          'version' => '7.4.13.0',
          'reference' => '961683010db3b27ec6ebcd7308e6e1ee8fa7ffde',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../symfony/string',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/translation' => 
        array (
          'pretty_version' => 'v7.4.14',
          'version' => '7.4.14.0',
          'reference' => 'a1af4dacb24eb7ef4f1ca71b94da8ddbce572281',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../symfony/translation',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/translation-contracts' => 
        array (
          'pretty_version' => 'v3.7.1',
          'version' => '3.7.1.0',
          'reference' => 'ccb206b98faccc511ebae8e5fad50f2dc0b30621',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../symfony/translation-contracts',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/translation-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '2.3|3.0',
          ),
        ),
        'symfony/uid' => 
        array (
          'pretty_version' => 'v7.4.9',
          'version' => '7.4.9.0',
          'reference' => '2676b524340abcfe4d6151ec698463cebafee439',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../symfony/uid',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/var-dumper' => 
        array (
          'pretty_version' => 'v7.4.14',
          'version' => '7.4.14.0',
          'reference' => '9a3a56a4a1e65a5cb4f8d13801fe8ab0a170e358',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../symfony/var-dumper',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/yaml' => 
        array (
          'pretty_version' => 'v7.4.14',
          'version' => '7.4.14.0',
          'reference' => 'f8f328665ace2370d1e10645b807ba1646dc7dcc',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../symfony/yaml',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'ta-tikoma/phpunit-architecture-test' => 
        array (
          'pretty_version' => '0.8.7',
          'version' => '0.8.7.0',
          'reference' => '1248f3f506ca9641d4f68cebcd538fa489754db8',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../ta-tikoma/phpunit-architecture-test',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'theseer/tokenizer' => 
        array (
          'pretty_version' => '1.3.1',
          'version' => '1.3.1.0',
          'reference' => 'b7489ce515e168639d17feec34b8847c326b0b3c',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../theseer/tokenizer',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'tijsverkoyen/css-to-inline-styles' => 
        array (
          'pretty_version' => 'v2.4.0',
          'version' => '2.4.0.0',
          'reference' => 'f0292ccf0ec75843d65027214426b6b163b48b41',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../tijsverkoyen/css-to-inline-styles',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'ueberdosis/tiptap-php' => 
        array (
          'pretty_version' => '2.1.1',
          'version' => '2.1.1.0',
          'reference' => '74bfb7be1c8c6102b240f3879b7f984a6ab87b97',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../ueberdosis/tiptap-php',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'vlucas/phpdotenv' => 
        array (
          'pretty_version' => 'v5.6.4',
          'version' => '5.6.4.0',
          'reference' => '416df702837983f8d5ff48c9c3fee4f5f57b980b',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../vlucas/phpdotenv',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'voku/portable-ascii' => 
        array (
          'pretty_version' => '2.1.1',
          'version' => '2.1.1.0',
          'reference' => '8e1051fe39379367aecf014f41744ce7539a856f',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../voku/portable-ascii',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'webmozart/assert' => 
        array (
          'pretty_version' => '2.4.1',
          'version' => '2.4.1.0',
          'reference' => '2ccb7c2e821038c03a3e6e1700c570c158c55f70',
          'type' => 'library',
          'install_path' => 'C:\\projects\\cacao\\backend\\vendor\\composer/../webmozart/assert',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
      ),
    ),
  ),
  'executedFilesHashes' => 
  array (
    'C:\\projects\\cacao\\backend\\vendor\\larastan\\larastan\\bootstrap.php' => '5a3eacbf63b3e41659adfee92facededf8e020a932800f93c9a8b0e67f235805',
    'phar://C:\\projects\\cacao\\backend\\vendor\\phpstan\\phpstan\\phpstan.phar\\stubs\\runtime\\Attribute85.php' => 'cb8b31e82c61ce197871c9e8a6f122256751f2ab606dd2be90846d4fa5f8933e',
    'phar://C:\\projects\\cacao\\backend\\vendor\\phpstan\\phpstan\\phpstan.phar\\stubs\\runtime\\ReflectionAttribute.php' => 'c0068e383717870a304781d462f7e2afe1c6f24e9133851852a2aca96b4fa26f',
    'phar://C:\\projects\\cacao\\backend\\vendor\\phpstan\\phpstan\\phpstan.phar\\stubs\\runtime\\ReflectionIntersectionType.php' => '65fe0a8bc6fe285d8ddc8798ab5b9299920af70db5ad74596bc08df823e7c5d9',
    'phar://C:\\projects\\cacao\\backend\\vendor\\phpstan\\phpstan\\phpstan.phar\\stubs\\runtime\\ReflectionUnionType.php' => '1e2fe940e4ba4e00d9ee6adb2af3ee1bf333e6f8afe61c61deb038886d293427',
  ),
  'phpExtensions' => 
  array (
    0 => 'Core',
    1 => 'PDO',
    2 => 'Phar',
    3 => 'Reflection',
    4 => 'SPL',
    5 => 'SimpleXML',
    6 => 'bcmath',
    7 => 'calendar',
    8 => 'ctype',
    9 => 'curl',
    10 => 'date',
    11 => 'dom',
    12 => 'fileinfo',
    13 => 'filter',
    14 => 'hash',
    15 => 'iconv',
    16 => 'intl',
    17 => 'json',
    18 => 'libxml',
    19 => 'mbstring',
    20 => 'mysqlnd',
    21 => 'openssl',
    22 => 'pcre',
    23 => 'pdo_mysql',
    24 => 'pdo_sqlite',
    25 => 'random',
    26 => 'readline',
    27 => 'session',
    28 => 'sqlite3',
    29 => 'standard',
    30 => 'tokenizer',
    31 => 'xml',
    32 => 'xmlreader',
    33 => 'xmlwriter',
    34 => 'zip',
    35 => 'zlib',
  ),
  'stubFiles' => 
  array (
  ),
  'level' => '6',
),
	'projectExtensionFiles' => array (
),
	'errorsCallback' => static function (): array { return array (
); },
	'locallyIgnoredErrorsCallback' => static function (): array { return array (
); },
	'linesToIgnore' => array (
),
	'unmatchedLineIgnores' => array (
),
	'collectedDataCallback' => static function (): array { return array (
  'C:\\projects\\cacao\\backend\\app\\Console\\Commands\\BackupDatabase.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\PossiblyPureMethodCallCollector' => 
    array (
      0 => 
      array (
        0 => 
        array (
          0 => 'Symfony\\Component\\Process\\Process',
        ),
        1 => 'setTimeout',
        2 => 40,
      ),
      1 => 
      array (
        0 => 
        array (
          0 => 'Symfony\\Component\\Process\\Process',
        ),
        1 => 'run',
        2 => 47,
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Support\\Facades\\File',
        1 => 'delete',
        2 => 55,
      ),
      1 => 
      array (
        0 => 'Illuminate\\Support\\Facades\\File',
        1 => 'delete',
        2 => 61,
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Contracts\\PaymentResult.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Contracts\\PaymentResult',
        1 => 
        array (
        ),
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\AddressResource.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Filament\\Resources\\AddressResource',
        1 => 'getPages',
        2 => 'App\\Filament\\Resources\\AddressResource',
        3 => 
        array (
          0 => 'm' . "\0" . 'filament\\resources\\pages\\page' . "\0" . 'route',
        ),
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\AddressResource\\Pages\\EditAddress.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Filament\\Resources\\AddressResource\\Pages\\EditAddress',
        1 => 'getHeaderActions',
        2 => 'App\\Filament\\Resources\\AddressResource\\Pages\\EditAddress',
        3 => 
        array (
          0 => 'm' . "\0" . 'filament\\actions\\action' . "\0" . 'make',
        ),
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\AddressResource\\Pages\\ListAddresses.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Filament\\Resources\\AddressResource\\Pages\\ListAddresses',
        1 => 'getHeaderActions',
        2 => 'App\\Filament\\Resources\\AddressResource\\Pages\\ListAddresses',
        3 => 
        array (
          0 => 'm' . "\0" . 'filament\\actions\\action' . "\0" . 'make',
        ),
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\AdminResource.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Filament\\Resources\\AdminResource',
        1 => 'canEdit',
        2 => 'App\\Filament\\Resources\\AdminResource',
        3 => 
        array (
          0 => 'm' . "\0" . 'app\\filament\\resources\\adminresource' . "\0" . 'canmanage',
        ),
      ),
      1 => 
      array (
        0 => 'App\\Filament\\Resources\\AdminResource',
        1 => 'canDelete',
        2 => 'App\\Filament\\Resources\\AdminResource',
        3 => 
        array (
          0 => 'm' . "\0" . 'app\\filament\\resources\\adminresource' . "\0" . 'canmanage',
        ),
      ),
      2 => 
      array (
        0 => 'App\\Filament\\Resources\\AdminResource',
        1 => 'canDeleteAny',
        2 => 'App\\Filament\\Resources\\AdminResource',
        3 => 
        array (
          0 => 'm' . "\0" . 'app\\filament\\resources\\adminresource' . "\0" . 'canmanage',
        ),
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\AdminUserResource.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Filament\\Resources\\AdminUserResource',
        1 => 'getPages',
        2 => 'App\\Filament\\Resources\\AdminUserResource',
        3 => 
        array (
          0 => 'm' . "\0" . 'filament\\resources\\pages\\page' . "\0" . 'route',
        ),
      ),
    ),
    'PHPStan\\Rules\\Methods\\NamedArgumentParameterMethodCallsCollector' => 
    array (
      0 => 
      array (
        0 => 'Filament\\Forms\\Components\\Field',
        1 => 'unique',
        2 => 'ignoreRecord',
        3 => 38,
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\AdminUserResource\\Pages\\ListAdminUsers.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Filament\\Resources\\AdminUserResource\\Pages\\ListAdminUsers',
        1 => 'getHeaderActions',
        2 => 'App\\Filament\\Resources\\AdminUserResource\\Pages\\ListAdminUsers',
        3 => 
        array (
          0 => 'm' . "\0" . 'filament\\actions\\action' . "\0" . 'make',
        ),
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\BannerResource.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Filament\\Resources\\BannerResource',
        1 => 'getPages',
        2 => 'App\\Filament\\Resources\\BannerResource',
        3 => 
        array (
          0 => 'm' . "\0" . 'filament\\resources\\pages\\page' . "\0" . 'route',
        ),
      ),
    ),
    'PHPStan\\Rules\\Methods\\OverridingMethodRenamesParameterCollector' => 
    array (
      0 => 
      array (
        0 => 'Filament\\Resources\\Resource',
        1 => 'form',
        2 => 'App\\Filament\\Resources\\BannerResource',
        3 => 'schema',
        4 => 's',
      ),
      1 => 
      array (
        0 => 'Filament\\Resources\\Resource',
        1 => 'table',
        2 => 'App\\Filament\\Resources\\BannerResource',
        3 => 'table',
        4 => 't',
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\BannerResource\\Pages\\ListBanners.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Filament\\Resources\\BannerResource\\Pages\\ListBanners',
        1 => 'getHeaderActions',
        2 => 'App\\Filament\\Resources\\BannerResource\\Pages\\ListBanners',
        3 => 
        array (
          0 => 'm' . "\0" . 'filament\\actions\\action' . "\0" . 'make',
        ),
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\BusinessSettingResource.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Filament\\Resources\\BusinessSettingResource',
        1 => 'getPages',
        2 => 'App\\Filament\\Resources\\BusinessSettingResource',
        3 => 
        array (
          0 => 'm' . "\0" . 'filament\\resources\\pages\\page' . "\0" . 'route',
        ),
      ),
    ),
    'PHPStan\\Rules\\Methods\\NamedArgumentParameterMethodCallsCollector' => 
    array (
      0 => 
      array (
        0 => 'Filament\\Forms\\Components\\Field',
        1 => 'unique',
        2 => 'ignoreRecord',
        3 => 29,
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\BusinessSettingResource\\Pages\\ListBusinessSettings.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Filament\\Resources\\BusinessSettingResource\\Pages\\ListBusinessSettings',
        1 => 'getHeaderActions',
        2 => 'App\\Filament\\Resources\\BusinessSettingResource\\Pages\\ListBusinessSettings',
        3 => 
        array (
          0 => 'm' . "\0" . 'filament\\actions\\action' . "\0" . 'make',
        ),
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CategoryResource.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Filament\\Resources\\CategoryResource',
        1 => 'getPages',
        2 => 'App\\Filament\\Resources\\CategoryResource',
        3 => 
        array (
          0 => 'm' . "\0" . 'filament\\resources\\pages\\page' . "\0" . 'route',
        ),
      ),
    ),
    'PHPStan\\Rules\\Methods\\NamedArgumentParameterMethodCallsCollector' => 
    array (
      0 => 
      array (
        0 => 'Filament\\Forms\\Components\\Field',
        1 => 'unique',
        2 => 'ignoreRecord',
        3 => 36,
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CategoryResource\\Pages\\ListCategories.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Filament\\Resources\\CategoryResource\\Pages\\ListCategories',
        1 => 'getHeaderActions',
        2 => 'App\\Filament\\Resources\\CategoryResource\\Pages\\ListCategories',
        3 => 
        array (
          0 => 'm' . "\0" . 'filament\\actions\\action' . "\0" . 'make',
        ),
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ContactRequestResource.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Filament\\Resources\\ContactRequestResource',
        1 => 'getPages',
        2 => 'App\\Filament\\Resources\\ContactRequestResource',
        3 => 
        array (
          0 => 'm' . "\0" . 'filament\\resources\\pages\\page' . "\0" . 'route',
        ),
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CouponResource.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Filament\\Resources\\CouponResource',
        1 => 'getPages',
        2 => 'App\\Filament\\Resources\\CouponResource',
        3 => 
        array (
          0 => 'm' . "\0" . 'filament\\resources\\pages\\page' . "\0" . 'route',
        ),
      ),
    ),
    'PHPStan\\Rules\\Methods\\NamedArgumentParameterMethodCallsCollector' => 
    array (
      0 => 
      array (
        0 => 'Filament\\Forms\\Components\\Field',
        1 => 'unique',
        2 => 'ignoreRecord',
        3 => 32,
      ),
    ),
    'PHPStan\\Rules\\Methods\\OverridingMethodRenamesParameterCollector' => 
    array (
      0 => 
      array (
        0 => 'Filament\\Resources\\Resource',
        1 => 'form',
        2 => 'App\\Filament\\Resources\\CouponResource',
        3 => 'schema',
        4 => 's',
      ),
      1 => 
      array (
        0 => 'Filament\\Resources\\Resource',
        1 => 'table',
        2 => 'App\\Filament\\Resources\\CouponResource',
        3 => 'table',
        4 => 't',
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CouponResource\\Pages\\ListCoupons.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Filament\\Resources\\CouponResource\\Pages\\ListCoupons',
        1 => 'getHeaderActions',
        2 => 'App\\Filament\\Resources\\CouponResource\\Pages\\ListCoupons',
        3 => 
        array (
          0 => 'm' . "\0" . 'filament\\actions\\action' . "\0" . 'make',
        ),
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CustomerResource.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Filament\\Resources\\CustomerResource',
        1 => 'canCreate',
        2 => 'App\\Filament\\Resources\\CustomerResource',
        3 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 'App\\Filament\\Resources\\CustomerResource',
        1 => 'getPages',
        2 => 'App\\Filament\\Resources\\CustomerResource',
        3 => 
        array (
          0 => 'm' . "\0" . 'filament\\resources\\pages\\page' . "\0" . 'route',
        ),
      ),
    ),
    'PHPStan\\Rules\\Methods\\NamedArgumentParameterMethodCallsCollector' => 
    array (
      0 => 
      array (
        0 => 'Filament\\Forms\\Components\\Field',
        1 => 'unique',
        2 => 'ignoreRecord',
        3 => 35,
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\DeliveryRateResource.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Filament\\Resources\\DeliveryRateResource',
        1 => 'getPages',
        2 => 'App\\Filament\\Resources\\DeliveryRateResource',
        3 => 
        array (
          0 => 'm' . "\0" . 'filament\\resources\\pages\\page' . "\0" . 'route',
        ),
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\DeliveryRateResource\\Pages\\EditDeliveryRate.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Filament\\Resources\\DeliveryRateResource\\Pages\\EditDeliveryRate',
        1 => 'getHeaderActions',
        2 => 'App\\Filament\\Resources\\DeliveryRateResource\\Pages\\EditDeliveryRate',
        3 => 
        array (
          0 => 'm' . "\0" . 'filament\\actions\\action' . "\0" . 'make',
        ),
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\DeliveryRateResource\\Pages\\ListDeliveryRates.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Filament\\Resources\\DeliveryRateResource\\Pages\\ListDeliveryRates',
        1 => 'getHeaderActions',
        2 => 'App\\Filament\\Resources\\DeliveryRateResource\\Pages\\ListDeliveryRates',
        3 => 
        array (
          0 => 'm' . "\0" . 'filament\\actions\\action' . "\0" . 'make',
        ),
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\DeliveryZoneResource.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Filament\\Resources\\DeliveryZoneResource',
        1 => 'getPages',
        2 => 'App\\Filament\\Resources\\DeliveryZoneResource',
        3 => 
        array (
          0 => 'm' . "\0" . 'filament\\resources\\pages\\page' . "\0" . 'route',
        ),
      ),
    ),
    'PHPStan\\Rules\\Methods\\OverridingMethodRenamesParameterCollector' => 
    array (
      0 => 
      array (
        0 => 'Filament\\Resources\\Resource',
        1 => 'form',
        2 => 'App\\Filament\\Resources\\DeliveryZoneResource',
        3 => 'schema',
        4 => 's',
      ),
      1 => 
      array (
        0 => 'Filament\\Resources\\Resource',
        1 => 'table',
        2 => 'App\\Filament\\Resources\\DeliveryZoneResource',
        3 => 'table',
        4 => 't',
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\DeliveryZoneResource\\Pages\\ListDeliveryZones.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Filament\\Resources\\DeliveryZoneResource\\Pages\\ListDeliveryZones',
        1 => 'getHeaderActions',
        2 => 'App\\Filament\\Resources\\DeliveryZoneResource\\Pages\\ListDeliveryZones',
        3 => 
        array (
          0 => 'm' . "\0" . 'filament\\actions\\action' . "\0" . 'make',
        ),
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\FaqResource.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Filament\\Resources\\FaqResource',
        1 => 'getPages',
        2 => 'App\\Filament\\Resources\\FaqResource',
        3 => 
        array (
          0 => 'm' . "\0" . 'filament\\resources\\pages\\page' . "\0" . 'route',
        ),
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\FaqResource\\Pages\\EditFaq.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Filament\\Resources\\FaqResource\\Pages\\EditFaq',
        1 => 'getHeaderActions',
        2 => 'App\\Filament\\Resources\\FaqResource\\Pages\\EditFaq',
        3 => 
        array (
          0 => 'm' . "\0" . 'filament\\actions\\action' . "\0" . 'make',
        ),
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\FaqResource\\Pages\\ListFaqs.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Filament\\Resources\\FaqResource\\Pages\\ListFaqs',
        1 => 'getHeaderActions',
        2 => 'App\\Filament\\Resources\\FaqResource\\Pages\\ListFaqs',
        3 => 
        array (
          0 => 'm' . "\0" . 'filament\\actions\\action' . "\0" . 'make',
        ),
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\InventoryMovementResource.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Filament\\Resources\\InventoryMovementResource',
        1 => 'canCreate',
        2 => 'App\\Filament\\Resources\\InventoryMovementResource',
        3 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 'App\\Filament\\Resources\\InventoryMovementResource',
        1 => 'getPages',
        2 => 'App\\Filament\\Resources\\InventoryMovementResource',
        3 => 
        array (
          0 => 'm' . "\0" . 'filament\\resources\\pages\\page' . "\0" . 'route',
        ),
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\OrderResource.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Filament\\Resources\\OrderResource',
        1 => 'canCreate',
        2 => 'App\\Filament\\Resources\\OrderResource',
        3 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 'App\\Filament\\Resources\\OrderResource',
        1 => 'getPages',
        2 => 'App\\Filament\\Resources\\OrderResource',
        3 => 
        array (
          0 => 'm' . "\0" . 'filament\\resources\\pages\\page' . "\0" . 'route',
        ),
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PaymentMethodResource.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Filament\\Resources\\PaymentMethodResource',
        1 => 'getPages',
        2 => 'App\\Filament\\Resources\\PaymentMethodResource',
        3 => 
        array (
          0 => 'm' . "\0" . 'filament\\resources\\pages\\page' . "\0" . 'route',
        ),
      ),
    ),
    'PHPStan\\Rules\\Methods\\NamedArgumentParameterMethodCallsCollector' => 
    array (
      0 => 
      array (
        0 => 'Filament\\Forms\\Components\\Field',
        1 => 'unique',
        2 => 'ignoreRecord',
        3 => 30,
      ),
    ),
    'PHPStan\\Rules\\Methods\\OverridingMethodRenamesParameterCollector' => 
    array (
      0 => 
      array (
        0 => 'Filament\\Resources\\Resource',
        1 => 'form',
        2 => 'App\\Filament\\Resources\\PaymentMethodResource',
        3 => 'schema',
        4 => 's',
      ),
      1 => 
      array (
        0 => 'Filament\\Resources\\Resource',
        1 => 'table',
        2 => 'App\\Filament\\Resources\\PaymentMethodResource',
        3 => 'table',
        4 => 't',
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PermissionResource.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Filament\\Resources\\PermissionResource',
        1 => 'getPages',
        2 => 'App\\Filament\\Resources\\PermissionResource',
        3 => 
        array (
          0 => 'm' . "\0" . 'filament\\resources\\pages\\page' . "\0" . 'route',
        ),
      ),
    ),
    'PHPStan\\Rules\\Methods\\NamedArgumentParameterMethodCallsCollector' => 
    array (
      0 => 
      array (
        0 => 'Filament\\Forms\\Components\\Field',
        1 => 'unique',
        2 => 'ignoreRecord',
        3 => 28,
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PermissionResource\\Pages\\ListPermissions.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Filament\\Resources\\PermissionResource\\Pages\\ListPermissions',
        1 => 'getHeaderActions',
        2 => 'App\\Filament\\Resources\\PermissionResource\\Pages\\ListPermissions',
        3 => 
        array (
          0 => 'm' . "\0" . 'filament\\actions\\action' . "\0" . 'make',
        ),
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductImageResource.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Filament\\Resources\\ProductImageResource',
        1 => 'getPages',
        2 => 'App\\Filament\\Resources\\ProductImageResource',
        3 => 
        array (
          0 => 'm' . "\0" . 'filament\\resources\\pages\\page' . "\0" . 'route',
        ),
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductImageResource\\Pages\\ListProductImages.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Filament\\Resources\\ProductImageResource\\Pages\\ListProductImages',
        1 => 'getHeaderActions',
        2 => 'App\\Filament\\Resources\\ProductImageResource\\Pages\\ListProductImages',
        3 => 
        array (
          0 => 'm' . "\0" . 'filament\\actions\\action' . "\0" . 'make',
        ),
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductResource.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Filament\\Resources\\ProductResource',
        1 => 'getPages',
        2 => 'App\\Filament\\Resources\\ProductResource',
        3 => 
        array (
          0 => 'm' . "\0" . 'filament\\resources\\pages\\page' . "\0" . 'route',
        ),
      ),
    ),
    'PHPStan\\Rules\\Methods\\NamedArgumentParameterMethodCallsCollector' => 
    array (
      0 => 
      array (
        0 => 'Filament\\Forms\\Components\\Field',
        1 => 'unique',
        2 => 'ignoreRecord',
        3 => 32,
      ),
    ),
    'PHPStan\\Rules\\Methods\\OverridingMethodRenamesParameterCollector' => 
    array (
      0 => 
      array (
        0 => 'Filament\\Resources\\Resource',
        1 => 'form',
        2 => 'App\\Filament\\Resources\\ProductResource',
        3 => 'schema',
        4 => 's',
      ),
      1 => 
      array (
        0 => 'Filament\\Resources\\Resource',
        1 => 'table',
        2 => 'App\\Filament\\Resources\\ProductResource',
        3 => 'table',
        4 => 't',
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductResource\\Pages\\ListProducts.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Filament\\Resources\\ProductResource\\Pages\\ListProducts',
        1 => 'getHeaderActions',
        2 => 'App\\Filament\\Resources\\ProductResource\\Pages\\ListProducts',
        3 => 
        array (
          0 => 'm' . "\0" . 'filament\\actions\\action' . "\0" . 'make',
        ),
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductVariantResource.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Filament\\Resources\\ProductVariantResource',
        1 => 'getPages',
        2 => 'App\\Filament\\Resources\\ProductVariantResource',
        3 => 
        array (
          0 => 'm' . "\0" . 'filament\\resources\\pages\\page' . "\0" . 'route',
        ),
      ),
    ),
    'PHPStan\\Rules\\Methods\\NamedArgumentParameterMethodCallsCollector' => 
    array (
      0 => 
      array (
        0 => 'Filament\\Forms\\Components\\Field',
        1 => 'unique',
        2 => 'ignoreRecord',
        3 => 36,
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductVariantResource\\Pages\\EditProductVariant.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'create',
        2 => 39,
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductVariantResource\\Pages\\ListProductVariants.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Filament\\Resources\\ProductVariantResource\\Pages\\ListProductVariants',
        1 => 'getHeaderActions',
        2 => 'App\\Filament\\Resources\\ProductVariantResource\\Pages\\ListProductVariants',
        3 => 
        array (
          0 => 'm' . "\0" . 'filament\\actions\\action' . "\0" . 'make',
        ),
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PushCampaignResource.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Filament\\Resources\\PushCampaignResource',
        1 => 'getPages',
        2 => 'App\\Filament\\Resources\\PushCampaignResource',
        3 => 
        array (
          0 => 'm' . "\0" . 'filament\\resources\\pages\\page' . "\0" . 'route',
        ),
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Jobs\\SendPushCampaign',
        1 => 'dispatch',
        2 => 47,
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PushCampaignResource\\Pages\\ListPushCampaigns.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Filament\\Resources\\PushCampaignResource\\Pages\\ListPushCampaigns',
        1 => 'getHeaderActions',
        2 => 'App\\Filament\\Resources\\PushCampaignResource\\Pages\\ListPushCampaigns',
        3 => 
        array (
          0 => 'm' . "\0" . 'filament\\actions\\action' . "\0" . 'make',
        ),
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\RoleResource.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Filament\\Resources\\RoleResource',
        1 => 'getPages',
        2 => 'App\\Filament\\Resources\\RoleResource',
        3 => 
        array (
          0 => 'm' . "\0" . 'filament\\resources\\pages\\page' . "\0" . 'route',
        ),
      ),
    ),
    'PHPStan\\Rules\\Methods\\NamedArgumentParameterMethodCallsCollector' => 
    array (
      0 => 
      array (
        0 => 'Filament\\Forms\\Components\\Field',
        1 => 'unique',
        2 => 'ignoreRecord',
        3 => 29,
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\RoleResource\\Pages\\ListRoles.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Filament\\Resources\\RoleResource\\Pages\\ListRoles',
        1 => 'getHeaderActions',
        2 => 'App\\Filament\\Resources\\RoleResource\\Pages\\ListRoles',
        3 => 
        array (
          0 => 'm' . "\0" . 'filament\\actions\\action' . "\0" . 'make',
        ),
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\AccountAddressController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'account.addresses.index',
      1 => 'account.addresses.edit',
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Connection',
        1 => 'transaction',
        2 => 50,
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\AccountOrderController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'account.orders.index',
      1 => 'account.orders.show',
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Support\\Facades\\Gate',
        1 => 'authorize',
        2 => 19,
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\Api\\V1\\AddressController.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Controllers\\Api\\V1\\AddressController',
        1 => 'update',
        2 => 'App\\Http\\Controllers\\Api\\V1\\AddressController',
        3 => 
        array (
          0 => 'm' . "\0" . 'illuminate\\http\\resources\\json\\jsonresource' . "\0" . '__construct',
          1 => 'm' . "\0" . 'app\\http\\controllers\\api\\v1\\addresscontroller' . "\0" . 'persist',
        ),
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Connection',
        1 => 'transaction',
        2 => 42,
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\CatalogController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'catalog',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\ContactController.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'create',
        2 => 13,
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\PasswordResetController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'auth.forgot-password',
      1 => 'auth.reset-password',
    ),
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Controllers\\PasswordResetController',
        1 => 'request',
        2 => 'App\\Http\\Controllers\\PasswordResetController',
        3 => 
        array (
          0 => 'f' . "\0" . 'view',
        ),
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Support\\Facades\\Password',
        1 => 'sendResetLink',
        2 => 23,
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\StorefrontAuthController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'auth.login',
      1 => 'auth.register',
    ),
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Controllers\\StorefrontAuthController',
        1 => 'showLogin',
        2 => 'App\\Http\\Controllers\\StorefrontAuthController',
        3 => 
        array (
          0 => 'f' . "\0" . 'view',
        ),
      ),
      1 => 
      array (
        0 => 'App\\Http\\Controllers\\StorefrontAuthController',
        1 => 'showRegister',
        2 => 'App\\Http\\Controllers\\StorefrontAuthController',
        3 => 
        array (
          0 => 'f' . "\0" . 'view',
        ),
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\StorefrontCartController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'cart',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\StorefrontCheckoutController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'checkout',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Requests\\AddCartItemRequest.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Requests\\AddCartItemRequest',
        1 => 'authorize',
        2 => 'App\\Http\\Requests\\AddCartItemRequest',
        3 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 'App\\Http\\Requests\\AddCartItemRequest',
        1 => 'rules',
        2 => 'App\\Http\\Requests\\AddCartItemRequest',
        3 => 
        array (
        ),
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Requests\\AddressRequest.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Requests\\AddressRequest',
        1 => 'rules',
        2 => 'App\\Http\\Requests\\AddressRequest',
        3 => 
        array (
        ),
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Requests\\Auth\\LoginRequest.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Requests\\Auth\\LoginRequest',
        1 => 'authorize',
        2 => 'App\\Http\\Requests\\Auth\\LoginRequest',
        3 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 'App\\Http\\Requests\\Auth\\LoginRequest',
        1 => 'rules',
        2 => 'App\\Http\\Requests\\Auth\\LoginRequest',
        3 => 
        array (
        ),
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Requests\\Auth\\RegisterRequest.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Requests\\Auth\\RegisterRequest',
        1 => 'authorize',
        2 => 'App\\Http\\Requests\\Auth\\RegisterRequest',
        3 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 'App\\Http\\Requests\\Auth\\RegisterRequest',
        1 => 'rules',
        2 => 'App\\Http\\Requests\\Auth\\RegisterRequest',
        3 => 
        array (
        ),
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Requests\\CheckoutQuoteRequest.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Requests\\CheckoutQuoteRequest',
        1 => 'rules',
        2 => 'App\\Http\\Requests\\CheckoutQuoteRequest',
        3 => 
        array (
        ),
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Requests\\CheckoutRequest.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Requests\\CheckoutRequest',
        1 => 'rules',
        2 => 'App\\Http\\Requests\\CheckoutRequest',
        3 => 
        array (
          0 => 'm' . "\0" . 'illuminate\\validation\\rule' . "\0" . 'requiredif',
        ),
      ),
      1 => 
      array (
        0 => 'App\\Http\\Requests\\CheckoutRequest',
        1 => 'messages',
        2 => 'App\\Http\\Requests\\CheckoutRequest',
        3 => 
        array (
        ),
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Requests\\ContactRequest.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Requests\\ContactRequest',
        1 => 'authorize',
        2 => 'App\\Http\\Requests\\ContactRequest',
        3 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 'App\\Http\\Requests\\ContactRequest',
        1 => 'rules',
        2 => 'App\\Http\\Requests\\ContactRequest',
        3 => 
        array (
        ),
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Requests\\PushDeviceRequest.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Requests\\PushDeviceRequest',
        1 => 'rules',
        2 => 'App\\Http\\Requests\\PushDeviceRequest',
        3 => 
        array (
          0 => 'm' . "\0" . 'illuminate\\validation\\rule' . "\0" . 'in',
        ),
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Requests\\StorefrontCheckoutRequest.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Requests\\StorefrontCheckoutRequest',
        1 => 'rules',
        2 => 'App\\Http\\Requests\\StorefrontCheckoutRequest',
        3 => 
        array (
          0 => 'm' . "\0" . 'illuminate\\validation\\rule' . "\0" . 'requiredif',
        ),
      ),
      1 => 
      array (
        0 => 'App\\Http\\Requests\\StorefrontCheckoutRequest',
        1 => 'messages',
        2 => 'App\\Http\\Requests\\StorefrontCheckoutRequest',
        3 => 
        array (
        ),
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Requests\\UpdateCartItemRequest.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Requests\\UpdateCartItemRequest',
        1 => 'authorize',
        2 => 'App\\Http\\Requests\\UpdateCartItemRequest',
        3 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 'App\\Http\\Requests\\UpdateCartItemRequest',
        1 => 'rules',
        2 => 'App\\Http\\Requests\\UpdateCartItemRequest',
        3 => 
        array (
        ),
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Jobs\\SendOrderCustomerNotifications.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Jobs\\SendOrderCustomerNotifications',
        1 => 
        array (
        ),
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Support\\Facades\\Mail',
        1 => 'raw',
        2 => 29,
      ),
    ),
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Foundation\\Queue\\Queueable',
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Jobs\\SendPushCampaign.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Jobs\\SendPushCampaign',
        1 => 
        array (
        ),
      ),
    ),
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Foundation\\Queue\\Queueable',
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Jobs\\SendTelegramOrderNotification.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Jobs\\SendTelegramOrderNotification',
        1 => 
        array (
        ),
      ),
    ),
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Foundation\\Queue\\Queueable',
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\Address.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Models\\Address',
        1 => 'casts',
        2 => 'App\\Models\\Address',
        3 => 
        array (
        ),
      ),
    ),
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\BusinessSetting.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Models\\BusinessSetting',
        1 => 'casts',
        2 => 'App\\Models\\BusinessSetting',
        3 => 
        array (
        ),
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\Category.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Models\\Category',
        1 => 'casts',
        2 => 'App\\Models\\Category',
        3 => 
        array (
        ),
      ),
    ),
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\Coupon.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Models\\Coupon',
        1 => 'casts',
        2 => 'App\\Models\\Coupon',
        3 => 
        array (
        ),
      ),
    ),
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\DeliveryZone.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Models\\DeliveryZone',
        1 => 'casts',
        2 => 'App\\Models\\DeliveryZone',
        3 => 
        array (
        ),
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\NotificationDelivery.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Models\\NotificationDelivery',
        1 => 'casts',
        2 => 'App\\Models\\NotificationDelivery',
        3 => 
        array (
        ),
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\Order.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Models\\Order',
        1 => 'casts',
        2 => 'App\\Models\\Order',
        3 => 
        array (
        ),
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\PaymentMethod.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Models\\PaymentMethod',
        1 => 'casts',
        2 => 'App\\Models\\PaymentMethod',
        3 => 
        array (
        ),
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\Product.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Models\\Product',
        1 => 'casts',
        2 => 'App\\Models\\Product',
        3 => 
        array (
        ),
      ),
    ),
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\ProductImage.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Models\\ProductImage',
        1 => 'casts',
        2 => 'App\\Models\\ProductImage',
        3 => 
        array (
        ),
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\ProductVariant.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Models\\ProductVariant',
        1 => 'casts',
        2 => 'App\\Models\\ProductVariant',
        3 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 'App\\Models\\ProductVariant',
        1 => 'currentPriceAmount',
        2 => 'App\\Models\\ProductVariant',
        3 => 
        array (
        ),
      ),
    ),
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\PushCampaign.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Models\\PushCampaign',
        1 => 'casts',
        2 => 'App\\Models\\PushCampaign',
        3 => 
        array (
        ),
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\PushDevice.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Models\\PushDevice',
        1 => 'casts',
        2 => 'App\\Models\\PushDevice',
        3 => 
        array (
        ),
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\User.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Models\\User',
        1 => 'casts',
        2 => 'App\\Models\\User',
        3 => 
        array (
        ),
      ),
    ),
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Laravel\\Sanctum\\HasApiTokens',
        1 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
        2 => 'Spatie\\Permission\\Traits\\HasRoles',
        3 => 'Illuminate\\Notifications\\Notifiable',
        4 => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Providers\\AppServiceProvider.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Support\\Facades\\RateLimiter',
        1 => 'for',
        2 => 24,
      ),
      1 => 
      array (
        0 => 'Illuminate\\Support\\Facades\\RateLimiter',
        1 => 'for',
        2 => 25,
      ),
      2 => 
      array (
        0 => 'Illuminate\\Support\\Facades\\RateLimiter',
        1 => 'for',
        2 => 26,
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Providers\\Filament\\AdminPanelProvider.php' => 
  array (
    'PHPStan\\Rules\\Methods\\NamedArgumentParameterMethodCallsCollector' => 
    array (
      0 => 
      array (
        0 => 'Filament\\Panel',
        1 => 'discoverResources',
        2 => 'in',
        3 => 34,
      ),
      1 => 
      array (
        0 => 'Filament\\Panel',
        1 => 'discoverResources',
        2 => 'for',
        3 => 34,
      ),
      2 => 
      array (
        0 => 'Filament\\Panel',
        1 => 'discoverPages',
        2 => 'in',
        3 => 35,
      ),
      3 => 
      array (
        0 => 'Filament\\Panel',
        1 => 'discoverPages',
        2 => 'for',
        3 => 35,
      ),
      4 => 
      array (
        0 => 'Filament\\Panel',
        1 => 'discoverWidgets',
        2 => 'in',
        3 => 39,
      ),
      5 => 
      array (
        0 => 'Filament\\Panel',
        1 => 'discoverWidgets',
        2 => 'for',
        3 => 39,
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Services\\CheckoutQuoteService.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Services\\CheckoutQuoteService',
        1 => 
        array (
        ),
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Services\\CheckoutService.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Services\\CheckoutService',
        1 => 
        array (
        ),
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'create',
        2 => 85,
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Services\\Messaging\\DisabledSmsOrderNotifier.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Services\\Messaging\\DisabledSmsOrderNotifier',
        1 => 'send',
        2 => 'App\\Services\\Messaging\\DisabledSmsOrderNotifier',
        3 => 
        array (
        ),
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Services\\OrderStatusService.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'create',
        2 => 71,
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\routes\\api.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Support\\Facades\\Route',
        1 => 'get',
        2 => 16,
      ),
      1 => 
      array (
        0 => 'Illuminate\\Support\\Facades\\Route',
        1 => 'post',
        2 => 17,
      ),
      2 => 
      array (
        0 => 'Illuminate\\Support\\Facades\\Route',
        1 => 'post',
        2 => 21,
      ),
      3 => 
      array (
        0 => 'Illuminate\\Support\\Facades\\Route',
        1 => 'post',
        2 => 22,
      ),
      4 => 
      array (
        0 => 'Illuminate\\Support\\Facades\\Route',
        1 => 'get',
        2 => 25,
      ),
      5 => 
      array (
        0 => 'Illuminate\\Support\\Facades\\Route',
        1 => 'get',
        2 => 26,
      ),
      6 => 
      array (
        0 => 'Illuminate\\Support\\Facades\\Route',
        1 => 'post',
        2 => 29,
      ),
      7 => 
      array (
        0 => 'Illuminate\\Support\\Facades\\Route',
        1 => 'patch',
        2 => 31,
      ),
      8 => 
      array (
        0 => 'Illuminate\\Support\\Facades\\Route',
        1 => 'get',
        2 => 32,
      ),
      9 => 
      array (
        0 => 'Illuminate\\Support\\Facades\\Route',
        1 => 'post',
        2 => 33,
      ),
      10 => 
      array (
        0 => 'Illuminate\\Support\\Facades\\Route',
        1 => 'post',
        2 => 34,
      ),
      11 => 
      array (
        0 => 'Illuminate\\Support\\Facades\\Route',
        1 => 'post',
        2 => 35,
      ),
      12 => 
      array (
        0 => 'Illuminate\\Support\\Facades\\Route',
        1 => 'delete',
        2 => 36,
      ),
      13 => 
      array (
        0 => 'Illuminate\\Support\\Facades\\Route',
        1 => 'get',
        2 => 37,
      ),
      14 => 
      array (
        0 => 'Illuminate\\Support\\Facades\\Route',
        1 => 'get',
        2 => 38,
      ),
    ),
  ),
  'C:\\projects\\cacao\\backend\\routes\\web.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedRouteFacadeViewCollector' => 
    array (
      0 => 'contact',
    ),
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'home',
      1 => 'sitemap',
      2 => 'product',
      3 => 'simple',
      4 => 'checkout-success',
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Support\\Facades\\Route',
        1 => 'get',
        2 => 20,
      ),
    ),
  ),
); },
	'dependencies' => array (
  'C:\\projects\\cacao\\backend\\app\\Console\\Commands\\BackupDatabase.php' => 
  array (
    'fileHash' => 'f020f775531a516879b8ed935b08b0b5b3b13a9b04389f48dafb98d4f19a67d8',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Contracts\\PaymentGateway.php' => 
  array (
    'fileHash' => '226077abdc6b45fe0998ae898bb3cba749d45a1cf04ad87e4898e97cc17cc180',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Providers\\AppServiceProvider.php',
      1 => 'C:\\projects\\cacao\\backend\\app\\Services\\CheckoutService.php',
      2 => 'C:\\projects\\cacao\\backend\\app\\Services\\Payments\\ManualPaymentGateway.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Contracts\\PaymentResult.php' => 
  array (
    'fileHash' => '69ff6d107cfb3f2a97334f2b6bae913eeff8fc440c0b06113f5e127fb7a8921d',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Contracts\\PaymentGateway.php',
      1 => 'C:\\projects\\cacao\\backend\\app\\Services\\CheckoutService.php',
      2 => 'C:\\projects\\cacao\\backend\\app\\Services\\Payments\\ManualPaymentGateway.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Contracts\\SmsOrderNotifier.php' => 
  array (
    'fileHash' => 'f81ab61e8ae9a4d11eff8b9b924958cb107e0e47683367e8d4890839c0d10020',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Providers\\AppServiceProvider.php',
      1 => 'C:\\projects\\cacao\\backend\\app\\Services\\Messaging\\DisabledSmsOrderNotifier.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\AddressResource.php' => 
  array (
    'fileHash' => '74764adc1f8b8fc6f9237352909bfd931d6b6b03a894d10ef09dd42ecc4f33f7',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\AddressResource\\Pages\\CreateAddress.php',
      1 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\AddressResource\\Pages\\EditAddress.php',
      2 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\AddressResource\\Pages\\ListAddresses.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\AddressResource\\Pages\\CreateAddress.php' => 
  array (
    'fileHash' => 'b02f32c0fe3fd83db4005bdc5eb9e16eac4c55ab3ba974c6a2194974fb59847b',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\AddressResource.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\AddressResource\\Pages\\EditAddress.php' => 
  array (
    'fileHash' => '0d898d532325c49165eb04137bccfc78cad478562d902be6553905976a41fa7c',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\AddressResource.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\AddressResource\\Pages\\ListAddresses.php' => 
  array (
    'fileHash' => '49f59fe2f64e2b34801935958aa4c8e7dd43097cd0b5803a9649c5e3c65c1cbc',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\AddressResource.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\AdminResource.php' => 
  array (
    'fileHash' => 'f21fc25289a8805af1eadf9865ddbe30d7e6de71e69b27d24ba1e2614936af93',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\AddressResource.php',
      1 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\AddressResource\\Pages\\CreateAddress.php',
      2 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\AddressResource\\Pages\\EditAddress.php',
      3 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\AddressResource\\Pages\\ListAddresses.php',
      4 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\AdminUserResource.php',
      5 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\AdminUserResource\\Pages\\CreateAdminUser.php',
      6 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\AdminUserResource\\Pages\\EditAdminUser.php',
      7 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\AdminUserResource\\Pages\\ListAdminUsers.php',
      8 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\BannerResource.php',
      9 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\BannerResource\\Pages\\CreateBanner.php',
      10 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\BannerResource\\Pages\\EditBanner.php',
      11 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\BannerResource\\Pages\\ListBanners.php',
      12 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\BusinessSettingResource.php',
      13 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\BusinessSettingResource\\Pages\\CreateBusinessSetting.php',
      14 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\BusinessSettingResource\\Pages\\EditBusinessSetting.php',
      15 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\BusinessSettingResource\\Pages\\ListBusinessSettings.php',
      16 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CategoryResource.php',
      17 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CategoryResource\\Pages\\CreateCategory.php',
      18 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CategoryResource\\Pages\\EditCategory.php',
      19 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CategoryResource\\Pages\\ListCategories.php',
      20 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ContactRequestResource.php',
      21 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ContactRequestResource\\Pages\\EditContactRequest.php',
      22 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ContactRequestResource\\Pages\\ListContactRequests.php',
      23 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CouponResource.php',
      24 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CouponResource\\Pages\\CreateCoupon.php',
      25 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CouponResource\\Pages\\EditCoupon.php',
      26 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CouponResource\\Pages\\ListCoupons.php',
      27 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CustomerResource.php',
      28 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CustomerResource\\Pages\\EditCustomer.php',
      29 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CustomerResource\\Pages\\ListCustomers.php',
      30 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\DeliveryRateResource.php',
      31 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\DeliveryRateResource\\Pages\\CreateDeliveryRate.php',
      32 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\DeliveryRateResource\\Pages\\EditDeliveryRate.php',
      33 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\DeliveryRateResource\\Pages\\ListDeliveryRates.php',
      34 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\DeliveryZoneResource.php',
      35 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\DeliveryZoneResource\\Pages\\CreateDeliveryZone.php',
      36 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\DeliveryZoneResource\\Pages\\EditDeliveryZone.php',
      37 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\DeliveryZoneResource\\Pages\\ListDeliveryZones.php',
      38 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\FaqResource.php',
      39 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\FaqResource\\Pages\\CreateFaq.php',
      40 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\FaqResource\\Pages\\EditFaq.php',
      41 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\FaqResource\\Pages\\ListFaqs.php',
      42 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\InventoryMovementResource.php',
      43 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\InventoryMovementResource\\Pages\\ListInventoryMovements.php',
      44 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\OrderResource.php',
      45 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\OrderResource\\Pages\\EditOrder.php',
      46 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\OrderResource\\Pages\\ListOrders.php',
      47 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PaymentMethodResource.php',
      48 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PaymentMethodResource\\Pages\\EditPaymentMethod.php',
      49 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PaymentMethodResource\\Pages\\ListPaymentMethods.php',
      50 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PermissionResource.php',
      51 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PermissionResource\\Pages\\CreatePermission.php',
      52 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PermissionResource\\Pages\\EditPermission.php',
      53 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PermissionResource\\Pages\\ListPermissions.php',
      54 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductImageResource.php',
      55 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductImageResource\\Pages\\CreateProductImage.php',
      56 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductImageResource\\Pages\\EditProductImage.php',
      57 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductImageResource\\Pages\\ListProductImages.php',
      58 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductResource.php',
      59 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductResource\\Pages\\CreateProduct.php',
      60 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductResource\\Pages\\EditProduct.php',
      61 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductResource\\Pages\\ListProducts.php',
      62 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductVariantResource.php',
      63 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductVariantResource\\Pages\\CreateProductVariant.php',
      64 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductVariantResource\\Pages\\EditProductVariant.php',
      65 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductVariantResource\\Pages\\ListProductVariants.php',
      66 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PushCampaignResource.php',
      67 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PushCampaignResource\\Pages\\CreatePushCampaign.php',
      68 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PushCampaignResource\\Pages\\EditPushCampaign.php',
      69 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PushCampaignResource\\Pages\\ListPushCampaigns.php',
      70 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\RoleResource.php',
      71 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\RoleResource\\Pages\\CreateRole.php',
      72 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\RoleResource\\Pages\\EditRole.php',
      73 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\RoleResource\\Pages\\ListRoles.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\AdminUserResource.php' => 
  array (
    'fileHash' => 'c41e518966b6588a95695df7bf474566dd8e2a613f22d4df175d84359e4521cf',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\AdminUserResource\\Pages\\CreateAdminUser.php',
      1 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\AdminUserResource\\Pages\\EditAdminUser.php',
      2 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\AdminUserResource\\Pages\\ListAdminUsers.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\AdminUserResource\\Pages\\CreateAdminUser.php' => 
  array (
    'fileHash' => 'c7b72818ccf52c144a4b56014f797dc236ca4e29ce72156b07cbb77ee50efab0',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\AdminUserResource.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\AdminUserResource\\Pages\\EditAdminUser.php' => 
  array (
    'fileHash' => '57f3e9b4d4845fb872f86bd6e4506c10367a151b9207188d62559be0fe0f8488',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\AdminUserResource.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\AdminUserResource\\Pages\\ListAdminUsers.php' => 
  array (
    'fileHash' => '9d9987ec15c83bf501ab6e8d2dc9f89b5168e4d42eff95bd3450090f310a15ff',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\AdminUserResource.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\BannerResource.php' => 
  array (
    'fileHash' => '5b13e8e6108d01499702a3cf9d434083c6c14036063b1a5a6e744fdf34151e3e',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\BannerResource\\Pages\\CreateBanner.php',
      1 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\BannerResource\\Pages\\EditBanner.php',
      2 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\BannerResource\\Pages\\ListBanners.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\BannerResource\\Pages\\CreateBanner.php' => 
  array (
    'fileHash' => '1881d07e5fd6834f9e9298f4825705bacabd6286de23884aa4b688bdce4293a2',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\BannerResource.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\BannerResource\\Pages\\EditBanner.php' => 
  array (
    'fileHash' => '2e8afd6f1b6a4ece9c6f2372f80da85693d79caf8f87c8bc0e6217af6a24f4a1',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\BannerResource.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\BannerResource\\Pages\\ListBanners.php' => 
  array (
    'fileHash' => '621610e5d68c60cee42039e51f122d305fd3fa5d84c6f152e61b879b1534daf8',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\BannerResource.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\BusinessSettingResource.php' => 
  array (
    'fileHash' => '7117ed1b6a331fc884ef79d8bb40d104b7284b19c38b27bc98c8bfccaa73145d',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\BusinessSettingResource\\Pages\\CreateBusinessSetting.php',
      1 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\BusinessSettingResource\\Pages\\EditBusinessSetting.php',
      2 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\BusinessSettingResource\\Pages\\ListBusinessSettings.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\BusinessSettingResource\\Pages\\CreateBusinessSetting.php' => 
  array (
    'fileHash' => 'dbe35fa0cc6a76cd4eccd389a6c2043351a793129ed41f524a025a79f52b35d1',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\BusinessSettingResource.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\BusinessSettingResource\\Pages\\EditBusinessSetting.php' => 
  array (
    'fileHash' => 'f12757041da9c1e9384155728cb82ea08dee39f6b8f84f13ee5c97e11f82602b',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\BusinessSettingResource.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\BusinessSettingResource\\Pages\\ListBusinessSettings.php' => 
  array (
    'fileHash' => 'dcfbe091b1c13decdc54e996315c14a6b6edd5e1cae98890a6fe1c07a0111ae8',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\BusinessSettingResource.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CategoryResource.php' => 
  array (
    'fileHash' => '05cdd1185effd9e17e192e9687946c263a7e47f2f85c3908a3bc447395c363d2',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CategoryResource\\Pages\\CreateCategory.php',
      1 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CategoryResource\\Pages\\EditCategory.php',
      2 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CategoryResource\\Pages\\ListCategories.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CategoryResource\\Pages\\CreateCategory.php' => 
  array (
    'fileHash' => '38e932e27ac5d441b467bf1a3d9fbf9bcbbd29ddc3279e185f5dc35331f5e07e',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CategoryResource.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CategoryResource\\Pages\\EditCategory.php' => 
  array (
    'fileHash' => '6cd723e72f039baf28ef54b888518df6099d0e087471dcb5d6300d6b0c9ee643',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CategoryResource.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CategoryResource\\Pages\\ListCategories.php' => 
  array (
    'fileHash' => '0dc6e758720bc6f077150820329a6809204d9b7494662488ab29908bfa9d1605',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CategoryResource.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ContactRequestResource.php' => 
  array (
    'fileHash' => 'e1129b24247f0c55e52b6207b1340db6f81db59f794ab74ac35177ee5860dd1d',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ContactRequestResource\\Pages\\EditContactRequest.php',
      1 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ContactRequestResource\\Pages\\ListContactRequests.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ContactRequestResource\\Pages\\EditContactRequest.php' => 
  array (
    'fileHash' => '8fa0f41ecda95f93c715e3c01073548a451242b81ba199355e9792cb85bb8bf1',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ContactRequestResource.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ContactRequestResource\\Pages\\ListContactRequests.php' => 
  array (
    'fileHash' => '6ef90f068aacba7719e974a4f9befd02f800dda5eb79a26c5e0b263257208d33',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ContactRequestResource.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CouponResource.php' => 
  array (
    'fileHash' => 'f06668234cd141ca6d6e987963fb41884c3f05c240bd74f736c31eb5f43963a1',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CouponResource\\Pages\\CreateCoupon.php',
      1 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CouponResource\\Pages\\EditCoupon.php',
      2 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CouponResource\\Pages\\ListCoupons.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CouponResource\\Pages\\CreateCoupon.php' => 
  array (
    'fileHash' => 'bad1d24791faa7f2f60ef47ff3029bad3a2f98790a3ef81907996569e7820660',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CouponResource.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CouponResource\\Pages\\EditCoupon.php' => 
  array (
    'fileHash' => '89828628ca92c553c2925f78cb8a2d3ff3faf5696d0ddfc6720c3f9b3f251d86',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CouponResource.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CouponResource\\Pages\\ListCoupons.php' => 
  array (
    'fileHash' => '8fb3d9612cda4abad5152875a56b654bb5584ea8469a7bf502a6de0a428d1f4b',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CouponResource.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CustomerResource.php' => 
  array (
    'fileHash' => 'bb0247d1bcb4379477d894e20bcbe55ba10df0f14e601b4d9896cf2af69d8fce',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CustomerResource\\Pages\\EditCustomer.php',
      1 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CustomerResource\\Pages\\ListCustomers.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CustomerResource\\Pages\\EditCustomer.php' => 
  array (
    'fileHash' => 'b67ca1b67a7875c439f79a1b68a189f60038ce3c8ce4109d7eaa62c0d41b865a',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CustomerResource.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CustomerResource\\Pages\\ListCustomers.php' => 
  array (
    'fileHash' => 'af18adf547119abcc619a76a9d325fb298b97920f7dd8446c3b6e394908bcffb',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CustomerResource.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\DeliveryRateResource.php' => 
  array (
    'fileHash' => '66196228fd83356e9a30777507b46eb7155b33bb00dbc83cb682cb2348f0c8a2',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\DeliveryRateResource\\Pages\\CreateDeliveryRate.php',
      1 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\DeliveryRateResource\\Pages\\EditDeliveryRate.php',
      2 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\DeliveryRateResource\\Pages\\ListDeliveryRates.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\DeliveryRateResource\\Pages\\CreateDeliveryRate.php' => 
  array (
    'fileHash' => 'd208fb6eead70389eedf2ec308be0dfdca17d6a2eeb8eca13d71f8c3ff247b86',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\DeliveryRateResource.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\DeliveryRateResource\\Pages\\EditDeliveryRate.php' => 
  array (
    'fileHash' => '59c99f9860ada82150153e08f901c682132248ff9aba887780871714ada7561b',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\DeliveryRateResource.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\DeliveryRateResource\\Pages\\ListDeliveryRates.php' => 
  array (
    'fileHash' => '7dd20f4739537ddfce8ecadb5790cc69294b53af130f8caba31b2c6a2012557f',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\DeliveryRateResource.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\DeliveryZoneResource.php' => 
  array (
    'fileHash' => 'f9abc41a138437adb558bf9946b84b70007afe25a2a8f522988e5124ea0ce19a',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\DeliveryZoneResource\\Pages\\CreateDeliveryZone.php',
      1 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\DeliveryZoneResource\\Pages\\EditDeliveryZone.php',
      2 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\DeliveryZoneResource\\Pages\\ListDeliveryZones.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\DeliveryZoneResource\\Pages\\CreateDeliveryZone.php' => 
  array (
    'fileHash' => '1d92572b3409b7ae16ccdd9617509066185feacfeec2448c7860127e82cc195e',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\DeliveryZoneResource.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\DeliveryZoneResource\\Pages\\EditDeliveryZone.php' => 
  array (
    'fileHash' => '7ce364ba8bb98889c546c50753bc9e3c1194448459319b1d6a611da11d0d2021',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\DeliveryZoneResource.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\DeliveryZoneResource\\Pages\\ListDeliveryZones.php' => 
  array (
    'fileHash' => '8dd6fc47ea4d4dc6d465dfbdba99f79e572fba41a45017b7ffddf0e1a30522dd',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\DeliveryZoneResource.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\FaqResource.php' => 
  array (
    'fileHash' => '088d2549c0f82d21d97dc6c1c4f65d02170addd10939a0e6c28e3f284ca25fb2',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\FaqResource\\Pages\\CreateFaq.php',
      1 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\FaqResource\\Pages\\EditFaq.php',
      2 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\FaqResource\\Pages\\ListFaqs.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\FaqResource\\Pages\\CreateFaq.php' => 
  array (
    'fileHash' => '27d812c7dab7dd271cd7e789954b18d4b9623b49a5af07038d9d850f459fb639',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\FaqResource.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\FaqResource\\Pages\\EditFaq.php' => 
  array (
    'fileHash' => '5e857268b902b5c33ec6f2a8fd59462ea84defe3ad3182481cf0c0134f999203',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\FaqResource.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\FaqResource\\Pages\\ListFaqs.php' => 
  array (
    'fileHash' => '644992f5c2be503db0811a0d56ae9941b64a7ea57d1603c3e1d2a0f502ee24e1',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\FaqResource.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\InventoryMovementResource.php' => 
  array (
    'fileHash' => '04efae34e685eb686ca80a8b536dab27958364871ad19908e42e1c326c5be008',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\InventoryMovementResource\\Pages\\ListInventoryMovements.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\InventoryMovementResource\\Pages\\ListInventoryMovements.php' => 
  array (
    'fileHash' => '7e80b4440354b453061e09471e21430b7ffc967bbf754853dd697f7af65bb368',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\InventoryMovementResource.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\OrderResource.php' => 
  array (
    'fileHash' => 'b03de6a95c231afe53cb7407bb3122c84aef874398e6c15c57f1a8826ca5d5e7',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\OrderResource\\Pages\\EditOrder.php',
      1 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\OrderResource\\Pages\\ListOrders.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\OrderResource\\Pages\\EditOrder.php' => 
  array (
    'fileHash' => '119b81b67a2cd9dd73470c1e682ddde5033ca8b71673cd53ffe14fea4362582a',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\OrderResource.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\OrderResource\\Pages\\ListOrders.php' => 
  array (
    'fileHash' => '1ab877b42f34521040b27d6759be5be87a6fb8ae125dbd8c7c876bbe8b334be0',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\OrderResource.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PaymentMethodResource.php' => 
  array (
    'fileHash' => 'a708a0ff094312b66a6f74b3e5a9061320d1f9a644c0c630d7a839e7528fccf0',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PaymentMethodResource\\Pages\\EditPaymentMethod.php',
      1 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PaymentMethodResource\\Pages\\ListPaymentMethods.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PaymentMethodResource\\Pages\\EditPaymentMethod.php' => 
  array (
    'fileHash' => '34c24344dbd6ce616c0e634e0bcc390379fe8d55c81295219c05878ffa27d23c',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PaymentMethodResource.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PaymentMethodResource\\Pages\\ListPaymentMethods.php' => 
  array (
    'fileHash' => 'c35d6e91015d6b6aae502b4a9f354a36ba2f01b602b593e4aefca8b10258e3c3',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PaymentMethodResource.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PermissionResource.php' => 
  array (
    'fileHash' => 'bb9afaf974e798be0f28297d1984f8c78e44ca7f59622c10dcb9ce222032bc6d',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PermissionResource\\Pages\\CreatePermission.php',
      1 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PermissionResource\\Pages\\EditPermission.php',
      2 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PermissionResource\\Pages\\ListPermissions.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PermissionResource\\Pages\\CreatePermission.php' => 
  array (
    'fileHash' => 'c6620db38a9514bbfcea6d8944c12c0e1397e852cecd25e616cf10f084636106',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PermissionResource.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PermissionResource\\Pages\\EditPermission.php' => 
  array (
    'fileHash' => 'b9075a5a713c33ebac0999a5272298206adf0cf974601f40d109fc570342968c',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PermissionResource.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PermissionResource\\Pages\\ListPermissions.php' => 
  array (
    'fileHash' => 'a16e62ff150e8f9f5945a424582865d3cb0ee9fc2b6e9310472eca166981972e',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PermissionResource.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductImageResource.php' => 
  array (
    'fileHash' => 'fe8f88bcb1f1435c8b4dd866ee818a5c64a927a585bfe4839019857847897663',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductImageResource\\Pages\\CreateProductImage.php',
      1 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductImageResource\\Pages\\EditProductImage.php',
      2 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductImageResource\\Pages\\ListProductImages.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductImageResource\\Pages\\CreateProductImage.php' => 
  array (
    'fileHash' => '69480fb0265f0d74860dd8a39648e6422740402e65e5ad0f2e638b18ae7c5175',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductImageResource.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductImageResource\\Pages\\EditProductImage.php' => 
  array (
    'fileHash' => '1ec81af441391df9c249725be02646a725c3741e633beb410b0c6d48919c6b62',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductImageResource.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductImageResource\\Pages\\ListProductImages.php' => 
  array (
    'fileHash' => '102a72fd59e7c585260552365528aed3b7f5dd5f47d201b3be2ac38cdb8908ed',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductImageResource.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductResource.php' => 
  array (
    'fileHash' => 'c348e4417d74f4837be14aaa88a82d50e999be85180bc7c64123461c8e1141f4',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductResource\\Pages\\CreateProduct.php',
      1 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductResource\\Pages\\EditProduct.php',
      2 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductResource\\Pages\\ListProducts.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductResource\\Pages\\CreateProduct.php' => 
  array (
    'fileHash' => '4af9e107329685747ed7fed789760bfa20a5c9fcc2980bcb4fc3c2ec8573d5bb',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductResource.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductResource\\Pages\\EditProduct.php' => 
  array (
    'fileHash' => '1a72dc00fe707d289cb9d559354580bce1ed056adaaa610a62ad46f9838cd4d2',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductResource.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductResource\\Pages\\ListProducts.php' => 
  array (
    'fileHash' => 'a981756f21129a4516f8614319435677f73c6a8b8caf1021780356459d9b0637',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductResource.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductVariantResource.php' => 
  array (
    'fileHash' => '8fc872502d6f8c0c4a0232034a23ee8fb2a403a2b8eeddbfa703d52db614b523',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductVariantResource\\Pages\\CreateProductVariant.php',
      1 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductVariantResource\\Pages\\EditProductVariant.php',
      2 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductVariantResource\\Pages\\ListProductVariants.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductVariantResource\\Pages\\CreateProductVariant.php' => 
  array (
    'fileHash' => '0b14a8b7cb95dcee3547d64eaa2c3be0451372355244e9ea8b4a6a32d2106624',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductVariantResource.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductVariantResource\\Pages\\EditProductVariant.php' => 
  array (
    'fileHash' => '188b74f6a48283088ac32b5a6c11d2c137cd6e816a0088dc504c0a0faa9c06d2',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductVariantResource.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductVariantResource\\Pages\\ListProductVariants.php' => 
  array (
    'fileHash' => '0fd57f60efe95a4493f0d4f560dffd469adb242c8097e37ed295c94ca9c132bf',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductVariantResource.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PushCampaignResource.php' => 
  array (
    'fileHash' => 'a86fadabe0ab2489f2576ae40bc3058a60230b1f3d31ae173650330f3e9d5dd3',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PushCampaignResource\\Pages\\CreatePushCampaign.php',
      1 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PushCampaignResource\\Pages\\EditPushCampaign.php',
      2 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PushCampaignResource\\Pages\\ListPushCampaigns.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PushCampaignResource\\Pages\\CreatePushCampaign.php' => 
  array (
    'fileHash' => '122cc5e4560f89c6a833b9bca7469f7e72ec750c11979e8b143355e821629626',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PushCampaignResource.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PushCampaignResource\\Pages\\EditPushCampaign.php' => 
  array (
    'fileHash' => '3208d51bfc05b1a01ebf872590901435a3cfea8b8049a1234101069db9727c7b',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PushCampaignResource.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PushCampaignResource\\Pages\\ListPushCampaigns.php' => 
  array (
    'fileHash' => '67d44b6e06fbd1f1afba433e5d3f3b4546d86f68ef551ef3653233cb8f3567b9',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PushCampaignResource.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\RoleResource.php' => 
  array (
    'fileHash' => 'f18713d33586b95244f91e5ce49a0c676c13df51d8f262cb4142a82b3b23e720',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\RoleResource\\Pages\\CreateRole.php',
      1 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\RoleResource\\Pages\\EditRole.php',
      2 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\RoleResource\\Pages\\ListRoles.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\RoleResource\\Pages\\CreateRole.php' => 
  array (
    'fileHash' => '26f35f928e2a86ba6ab46b8bafed356702abc6887137d8d1c040b33220e4dcfb',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\RoleResource.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\RoleResource\\Pages\\EditRole.php' => 
  array (
    'fileHash' => '3e9dd4feca8ce8b458d05b99db19abb0761626fd5fcacdea9d25def4ac9b380a',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\RoleResource.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\RoleResource\\Pages\\ListRoles.php' => 
  array (
    'fileHash' => '79c275f628773f4512f32130d1c495453b6309f9ede19e4a72b1796448be6ef2',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\RoleResource.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Widgets\\CommerceOverview.php' => 
  array (
    'fileHash' => '231afdc12c106395854cd382950b8291edd9e26f95d9c89641966b45ba2f3596',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\AccountAddressController.php' => 
  array (
    'fileHash' => '299bdb2f55ec4a4acb476e33636ae3f328bd0d0142e88af7b396ac942b711b37',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\routes\\web.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\AccountOrderController.php' => 
  array (
    'fileHash' => '7a1efc011087ac5eb522565e692dbd262a6bfa15381572bb6f1ab2e24e12892f',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\routes\\web.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\Api\\V1\\AddressController.php' => 
  array (
    'fileHash' => 'cc088555d23345fd0b438b313c1a28979e084083d18bd463e4e1e4c36c596966',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\routes\\api.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\Api\\V1\\AuthController.php' => 
  array (
    'fileHash' => '034d3592a5cf4fc4889847c9372c2ad1f0cf6b0a129e35be2391c21c1d59b49e',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\routes\\api.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\Api\\V1\\CheckoutController.php' => 
  array (
    'fileHash' => 'bcd18a8e1375fb418520aa01fb672eff331a19f6cbaeae83d99d7311f6bbe8fc',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\routes\\api.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\Api\\V1\\CheckoutQuoteController.php' => 
  array (
    'fileHash' => '4f1bee4c415634a178cea2e5785ed2719a987806407a27b93306ffc486cb44c0',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\routes\\api.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\Api\\V1\\CommerceOptionsController.php' => 
  array (
    'fileHash' => '3ca9cac34c62debffe28ef9a6391194cb2decd27adec36bb8376de303d5c6dbd',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\routes\\api.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\Api\\V1\\ProductController.php' => 
  array (
    'fileHash' => '144871d18726702ebb7e5b21946028ae6da2dff48f726e6fe955814f569b4a37',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\routes\\api.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\Api\\V1\\PushDeviceController.php' => 
  array (
    'fileHash' => 'f53e2dea0806be03ec827b916369f18de741b3a1477262e92af7888eec2f552f',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\routes\\api.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\CatalogController.php' => 
  array (
    'fileHash' => '46e1485dedb014874bf1dac5e8a329de1e4615fdec49c6c0ab79a3ac64bbb954',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\routes\\web.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\ContactController.php' => 
  array (
    'fileHash' => '14b3f4d7ec85171cab7d5590b38614eeafbc4d3c2a20a54410a8030626fde19a',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\routes\\web.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\Controller.php' => 
  array (
    'fileHash' => '11c9cc2e593c2fb6fe98adb5100d8c31fa99d66511b738646d99e2df12e33d22',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\AccountAddressController.php',
      1 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\AccountOrderController.php',
      2 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\Api\\V1\\AddressController.php',
      3 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\Api\\V1\\AuthController.php',
      4 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\Api\\V1\\CheckoutController.php',
      5 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\Api\\V1\\CheckoutQuoteController.php',
      6 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\Api\\V1\\CommerceOptionsController.php',
      7 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\Api\\V1\\ProductController.php',
      8 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\Api\\V1\\PushDeviceController.php',
      9 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\CatalogController.php',
      10 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\ContactController.php',
      11 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\GoogleAuthController.php',
      12 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\PasswordResetController.php',
      13 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\StorefrontAuthController.php',
      14 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\StorefrontCartController.php',
      15 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\StorefrontCheckoutController.php',
      16 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\WhatsAppWebhookController.php',
      17 => 'C:\\projects\\cacao\\backend\\routes\\api.php',
      18 => 'C:\\projects\\cacao\\backend\\routes\\web.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\GoogleAuthController.php' => 
  array (
    'fileHash' => 'cc69a5fae613866d7065e50ed7c74b7797c3c9e8f8f49af945b58cd32c0175ad',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\routes\\web.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\PasswordResetController.php' => 
  array (
    'fileHash' => '73a0f43fedeec9ec9bcef0d2db58b7023f9aa70197db0dbcbd908a55ac695dde',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\routes\\web.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\StorefrontAuthController.php' => 
  array (
    'fileHash' => '8f0b843eb8db673f1d6d327985b93124037a17852f14f5df3ff9d18d1d6797fd',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\routes\\web.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\StorefrontCartController.php' => 
  array (
    'fileHash' => 'c0851b689df0acad1c78dc01cdd4e44cb6ce35823956b62f568d6bc642ed9916',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\routes\\web.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\StorefrontCheckoutController.php' => 
  array (
    'fileHash' => 'ccc7d9d083529e416b8022960f36c08ba4a8df9af1dccde856d19d55f6e386b3',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\routes\\web.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\WhatsAppWebhookController.php' => 
  array (
    'fileHash' => '9522a9e30648b4cbaded3c657f03d2d2da0ffe80976dfb3140bf9de8119a54e6',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\routes\\api.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Middleware\\SecurityHeaders.php' => 
  array (
    'fileHash' => '8e66d92508820482a87df08c674698dd181d8f22f036492b262ee651a187b800',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Requests\\AddCartItemRequest.php' => 
  array (
    'fileHash' => '9e1ca9454be50e7fe4176fa8bea7c86014a4380328b5562f53d3740671795818',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\StorefrontCartController.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Requests\\AddressRequest.php' => 
  array (
    'fileHash' => '77aa96a6cf25a149a8fd60feb5d3bc61bdc7d2cf7330b4fdb9ff76f573c5cd77',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\AccountAddressController.php',
      1 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\Api\\V1\\AddressController.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Requests\\Auth\\LoginRequest.php' => 
  array (
    'fileHash' => '397b396dde24dda6a40ca70bee54d3104f2a93804736f4d56cf7f6df057f1ec6',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\Api\\V1\\AuthController.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Requests\\Auth\\RegisterRequest.php' => 
  array (
    'fileHash' => 'c8ddda8e46c234f6478fec944eb22db2d36a396c4f053b28c4c34c41f043533f',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\Api\\V1\\AuthController.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Requests\\CheckoutQuoteRequest.php' => 
  array (
    'fileHash' => '0c7fc283d806a7d7662567480ca9eaecda482b110dd375e7c0314079c9aa4501',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\Api\\V1\\CheckoutQuoteController.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Requests\\CheckoutRequest.php' => 
  array (
    'fileHash' => 'edc4f5eef368ba2c92f0126b231f73acc3e04a7ccc7815313df35e60e26456ac',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\Api\\V1\\CheckoutController.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Requests\\ContactRequest.php' => 
  array (
    'fileHash' => '9718844c872e32d242de3685cf2620b1832529e7753b470e7ab7bd48860ed1d3',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\ContactController.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Requests\\PushDeviceRequest.php' => 
  array (
    'fileHash' => '57a608307e764f0f5ab921780d81d4e315a6450cfa995032737b2bee1c53e7aa',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\Api\\V1\\PushDeviceController.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Requests\\StorefrontCheckoutRequest.php' => 
  array (
    'fileHash' => '1acbc3bb514c8d8cbd354fa62a852fab65d9817bc1aa851e0514559a69e609a4',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\StorefrontCheckoutController.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Requests\\UpdateCartItemRequest.php' => 
  array (
    'fileHash' => '83585fa044486d2e3a95ae15cc24ddd7632d0e05562ea260c38a93dc2fae06c4',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\StorefrontCartController.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Resources\\AddressResource.php' => 
  array (
    'fileHash' => '6ece1ce4ba86a65fec3cbd841ada9aea3555a04e50a9b44dbfb5bb21c4efa979',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\Api\\V1\\AddressController.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Resources\\OrderResource.php' => 
  array (
    'fileHash' => 'e8ed6b14567ff403597820439587dabb1c29b98880fbecb010a3dac3426391ee',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\Api\\V1\\CheckoutController.php',
      1 => 'C:\\projects\\cacao\\backend\\routes\\api.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Resources\\ProductResource.php' => 
  array (
    'fileHash' => '82656904d5f86452e8b8b1c6d64191dfdaa4428aaaa66ffe0cd29d72ec744002',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\Api\\V1\\ProductController.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Jobs\\SendOrderCustomerNotifications.php' => 
  array (
    'fileHash' => '498077e3f1022c75d2f641f95d03d789c6ebdc7a1359c1821ae5faba1c2d2ea8',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Services\\CheckoutService.php',
      1 => 'C:\\projects\\cacao\\backend\\app\\Services\\OrderStatusService.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Jobs\\SendPushCampaign.php' => 
  array (
    'fileHash' => '99c56470fa7789fead2c76fc70c80b15c85cf255948fd6100e206aaaddb9aa83',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PushCampaignResource.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Jobs\\SendTelegramOrderNotification.php' => 
  array (
    'fileHash' => '85bae6e9c9c869f527e00c030e23d0e3119fafa219825cbbe7fa681834e6c881',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Services\\CheckoutService.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\Address.php' => 
  array (
    'fileHash' => '8c86778f17415dadc0765503cbad7811d690fc31e9fa328f25656a9d7498be76',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\AddressResource.php',
      1 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\AccountAddressController.php',
      2 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\Api\\V1\\AddressController.php',
      3 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\StorefrontCheckoutController.php',
      4 => 'C:\\projects\\cacao\\backend\\app\\Http\\Requests\\AddressRequest.php',
      5 => 'C:\\projects\\cacao\\backend\\app\\Http\\Resources\\AddressResource.php',
      6 => 'C:\\projects\\cacao\\backend\\app\\Models\\User.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\Banner.php' => 
  array (
    'fileHash' => '38b2754f5436e9c473b904a35e0609157f760aa60707c6189a783e162f2d593d',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\BannerResource.php',
      1 => 'C:\\projects\\cacao\\backend\\routes\\web.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\BusinessSetting.php' => 
  array (
    'fileHash' => '9b839b2d9b019bb5cd572da352bcf0bc756c8a927670002b91762e60d851eeeb',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\BusinessSettingResource.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\Cart.php' => 
  array (
    'fileHash' => '8da2cbc2d67f405c7dc046c35c84bd7255966c789fd6c7fe58ff3b469cc82a8c',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\CartItem.php' => 
  array (
    'fileHash' => 'e21877034c616d6fb1205505bb8798de3ac1cf258f2f777c4d6f9c9ea90eb399',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Models\\Cart.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\Category.php' => 
  array (
    'fileHash' => 'bf470c5ec1904889fb97a738a423b6260cd58fe0e354a3cd35b995379f010280',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CategoryResource.php',
      1 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductResource.php',
      2 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\Api\\V1\\ProductController.php',
      3 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\CatalogController.php',
      4 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\StorefrontCartController.php',
      5 => 'C:\\projects\\cacao\\backend\\app\\Http\\Resources\\ProductResource.php',
      6 => 'C:\\projects\\cacao\\backend\\app\\Models\\Product.php',
      7 => 'C:\\projects\\cacao\\backend\\app\\Models\\ProductImage.php',
      8 => 'C:\\projects\\cacao\\backend\\app\\Models\\ProductVariant.php',
      9 => 'C:\\projects\\cacao\\backend\\app\\Policies\\ProductPolicy.php',
      10 => 'C:\\projects\\cacao\\backend\\app\\Services\\CheckoutQuoteService.php',
      11 => 'C:\\projects\\cacao\\backend\\app\\Services\\CheckoutService.php',
      12 => 'C:\\projects\\cacao\\backend\\routes\\web.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\ContactRequest.php' => 
  array (
    'fileHash' => '45341a5a57d8f78911b0721372989741261e9893df25a3c6e861dbca0038bffe',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ContactRequestResource.php',
      1 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\ContactController.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\Coupon.php' => 
  array (
    'fileHash' => '21f49769534b211a2ccafee2243fb93430da38b630e28647e237df059094820d',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CouponResource.php',
      1 => 'C:\\projects\\cacao\\backend\\app\\Services\\CheckoutQuoteService.php',
      2 => 'C:\\projects\\cacao\\backend\\app\\Services\\CheckoutService.php',
      3 => 'C:\\projects\\cacao\\backend\\app\\Services\\CouponPricingService.php',
      4 => 'C:\\projects\\cacao\\backend\\app\\Services\\OrderStatusService.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\DeliveryRate.php' => 
  array (
    'fileHash' => '7ab42eacd659322cda5c8c6d3c354c7e70e50808d61138a6f3cc45086bea06db',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\DeliveryRateResource.php',
      1 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\Api\\V1\\CommerceOptionsController.php',
      2 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\StorefrontCheckoutController.php',
      3 => 'C:\\projects\\cacao\\backend\\app\\Models\\DeliveryZone.php',
      4 => 'C:\\projects\\cacao\\backend\\app\\Services\\CheckoutQuoteService.php',
      5 => 'C:\\projects\\cacao\\backend\\app\\Services\\CheckoutService.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\DeliveryZone.php' => 
  array (
    'fileHash' => '295dce68a62e995a0d4455413e3961997a81843d4367c5cf437864b105060c8b',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\DeliveryRateResource.php',
      1 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\DeliveryZoneResource.php',
      2 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\Api\\V1\\CommerceOptionsController.php',
      3 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\StorefrontCheckoutController.php',
      4 => 'C:\\projects\\cacao\\backend\\app\\Models\\DeliveryRate.php',
      5 => 'C:\\projects\\cacao\\backend\\app\\Services\\CheckoutQuoteService.php',
      6 => 'C:\\projects\\cacao\\backend\\app\\Services\\CheckoutService.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\Faq.php' => 
  array (
    'fileHash' => 'ac3baffecead2bb743d5586af30941ea1d241c5546725644089c88592863725b',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\FaqResource.php',
      1 => 'C:\\projects\\cacao\\backend\\routes\\web.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\InventoryMovement.php' => 
  array (
    'fileHash' => 'e11353e8d966d9c5e67464f0673cb4d77cfcae3082bc86dc8f049cd5e1be8de5',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\InventoryMovementResource.php',
      1 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductVariantResource\\Pages\\EditProductVariant.php',
      2 => 'C:\\projects\\cacao\\backend\\app\\Services\\CheckoutService.php',
      3 => 'C:\\projects\\cacao\\backend\\app\\Services\\OrderStatusService.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\NotificationDelivery.php' => 
  array (
    'fileHash' => '51a754fb9ce4f03a2a16b66cefe0a4a34f36493ce00a0a35d9adab937d09038c',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\WhatsAppWebhookController.php',
      1 => 'C:\\projects\\cacao\\backend\\app\\Jobs\\SendOrderCustomerNotifications.php',
      2 => 'C:\\projects\\cacao\\backend\\app\\Jobs\\SendPushCampaign.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\Order.php' => 
  array (
    'fileHash' => '785c3017cdda27ba6f37cfcb17d99aa9e8919601bcde4bf3d5ad05c5890104aa',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Contracts\\PaymentGateway.php',
      1 => 'C:\\projects\\cacao\\backend\\app\\Contracts\\SmsOrderNotifier.php',
      2 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\OrderResource.php',
      3 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\OrderResource\\Pages\\EditOrder.php',
      4 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Widgets\\CommerceOverview.php',
      5 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\AccountOrderController.php',
      6 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\Api\\V1\\CheckoutController.php',
      7 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\StorefrontCheckoutController.php',
      8 => 'C:\\projects\\cacao\\backend\\app\\Http\\Resources\\OrderResource.php',
      9 => 'C:\\projects\\cacao\\backend\\app\\Jobs\\SendOrderCustomerNotifications.php',
      10 => 'C:\\projects\\cacao\\backend\\app\\Jobs\\SendTelegramOrderNotification.php',
      11 => 'C:\\projects\\cacao\\backend\\app\\Models\\InventoryMovement.php',
      12 => 'C:\\projects\\cacao\\backend\\app\\Models\\User.php',
      13 => 'C:\\projects\\cacao\\backend\\app\\Policies\\OrderPolicy.php',
      14 => 'C:\\projects\\cacao\\backend\\app\\Services\\CheckoutService.php',
      15 => 'C:\\projects\\cacao\\backend\\app\\Services\\Messaging\\DisabledSmsOrderNotifier.php',
      16 => 'C:\\projects\\cacao\\backend\\app\\Services\\Messaging\\WhatsAppCloudOrderNotifier.php',
      17 => 'C:\\projects\\cacao\\backend\\app\\Services\\OrderStatusService.php',
      18 => 'C:\\projects\\cacao\\backend\\app\\Services\\Payments\\ManualPaymentGateway.php',
      19 => 'C:\\projects\\cacao\\backend\\routes\\api.php',
      20 => 'C:\\projects\\cacao\\backend\\routes\\web.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\OrderItem.php' => 
  array (
    'fileHash' => '9c07ec4c1bd00dcf816f36dc8e68a89c40a0ab07018f07b18ab68541eddb331c',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Jobs\\SendTelegramOrderNotification.php',
      1 => 'C:\\projects\\cacao\\backend\\app\\Models\\Order.php',
      2 => 'C:\\projects\\cacao\\backend\\app\\Services\\CheckoutService.php',
      3 => 'C:\\projects\\cacao\\backend\\app\\Services\\OrderStatusService.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\OrderStatus.php' => 
  array (
    'fileHash' => 'eecf6161207020ddf9917ead05b1a814df4e1eb27e59f3ad0b4f0def0fc35130',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Contracts\\PaymentGateway.php',
      1 => 'C:\\projects\\cacao\\backend\\app\\Contracts\\SmsOrderNotifier.php',
      2 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\OrderResource.php',
      3 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\OrderResource\\Pages\\EditOrder.php',
      4 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Widgets\\CommerceOverview.php',
      5 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\AccountOrderController.php',
      6 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\Api\\V1\\CheckoutController.php',
      7 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\StorefrontCheckoutController.php',
      8 => 'C:\\projects\\cacao\\backend\\app\\Http\\Resources\\OrderResource.php',
      9 => 'C:\\projects\\cacao\\backend\\app\\Jobs\\SendOrderCustomerNotifications.php',
      10 => 'C:\\projects\\cacao\\backend\\app\\Jobs\\SendTelegramOrderNotification.php',
      11 => 'C:\\projects\\cacao\\backend\\app\\Models\\InventoryMovement.php',
      12 => 'C:\\projects\\cacao\\backend\\app\\Models\\Order.php',
      13 => 'C:\\projects\\cacao\\backend\\app\\Models\\OrderStatusHistory.php',
      14 => 'C:\\projects\\cacao\\backend\\app\\Models\\User.php',
      15 => 'C:\\projects\\cacao\\backend\\app\\Policies\\OrderPolicy.php',
      16 => 'C:\\projects\\cacao\\backend\\app\\Services\\CheckoutService.php',
      17 => 'C:\\projects\\cacao\\backend\\app\\Services\\Messaging\\DisabledSmsOrderNotifier.php',
      18 => 'C:\\projects\\cacao\\backend\\app\\Services\\Messaging\\WhatsAppCloudOrderNotifier.php',
      19 => 'C:\\projects\\cacao\\backend\\app\\Services\\OrderStatusService.php',
      20 => 'C:\\projects\\cacao\\backend\\app\\Services\\Payments\\ManualPaymentGateway.php',
      21 => 'C:\\projects\\cacao\\backend\\routes\\api.php',
      22 => 'C:\\projects\\cacao\\backend\\routes\\web.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\OrderStatusHistory.php' => 
  array (
    'fileHash' => 'e379655bdb2df860659612e8c811e2c87ef1b608f713ed364acffe7755288623',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Http\\Resources\\OrderResource.php',
      1 => 'C:\\projects\\cacao\\backend\\app\\Models\\Order.php',
      2 => 'C:\\projects\\cacao\\backend\\app\\Services\\CheckoutService.php',
      3 => 'C:\\projects\\cacao\\backend\\app\\Services\\OrderStatusService.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\PaymentMethod.php' => 
  array (
    'fileHash' => 'ff26c500a98af0974f4de206f6843716056003db1792c17e360d6277d22c6cb9',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Contracts\\PaymentGateway.php',
      1 => 'C:\\projects\\cacao\\backend\\app\\Contracts\\SmsOrderNotifier.php',
      2 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\OrderResource.php',
      3 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\OrderResource\\Pages\\EditOrder.php',
      4 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PaymentMethodResource.php',
      5 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Widgets\\CommerceOverview.php',
      6 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\AccountOrderController.php',
      7 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\Api\\V1\\CheckoutController.php',
      8 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\Api\\V1\\CommerceOptionsController.php',
      9 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\StorefrontCheckoutController.php',
      10 => 'C:\\projects\\cacao\\backend\\app\\Http\\Requests\\CheckoutRequest.php',
      11 => 'C:\\projects\\cacao\\backend\\app\\Http\\Requests\\StorefrontCheckoutRequest.php',
      12 => 'C:\\projects\\cacao\\backend\\app\\Http\\Resources\\OrderResource.php',
      13 => 'C:\\projects\\cacao\\backend\\app\\Jobs\\SendOrderCustomerNotifications.php',
      14 => 'C:\\projects\\cacao\\backend\\app\\Jobs\\SendTelegramOrderNotification.php',
      15 => 'C:\\projects\\cacao\\backend\\app\\Models\\InventoryMovement.php',
      16 => 'C:\\projects\\cacao\\backend\\app\\Models\\Order.php',
      17 => 'C:\\projects\\cacao\\backend\\app\\Models\\User.php',
      18 => 'C:\\projects\\cacao\\backend\\app\\Policies\\OrderPolicy.php',
      19 => 'C:\\projects\\cacao\\backend\\app\\Services\\CheckoutService.php',
      20 => 'C:\\projects\\cacao\\backend\\app\\Services\\Messaging\\DisabledSmsOrderNotifier.php',
      21 => 'C:\\projects\\cacao\\backend\\app\\Services\\Messaging\\WhatsAppCloudOrderNotifier.php',
      22 => 'C:\\projects\\cacao\\backend\\app\\Services\\OrderStatusService.php',
      23 => 'C:\\projects\\cacao\\backend\\app\\Services\\Payments\\ManualPaymentGateway.php',
      24 => 'C:\\projects\\cacao\\backend\\routes\\api.php',
      25 => 'C:\\projects\\cacao\\backend\\routes\\web.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\Product.php' => 
  array (
    'fileHash' => '553bd7c73bc98f16ab026fa18a7e3e28250efe3eba84d6519b330440b486c17b',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductResource.php',
      1 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductVariantResource.php',
      2 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductVariantResource\\Pages\\EditProductVariant.php',
      3 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Widgets\\CommerceOverview.php',
      4 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\Api\\V1\\ProductController.php',
      5 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\CatalogController.php',
      6 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\StorefrontCartController.php',
      7 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\StorefrontCheckoutController.php',
      8 => 'C:\\projects\\cacao\\backend\\app\\Http\\Resources\\ProductResource.php',
      9 => 'C:\\projects\\cacao\\backend\\app\\Models\\CartItem.php',
      10 => 'C:\\projects\\cacao\\backend\\app\\Models\\Category.php',
      11 => 'C:\\projects\\cacao\\backend\\app\\Models\\InventoryMovement.php',
      12 => 'C:\\projects\\cacao\\backend\\app\\Models\\ProductImage.php',
      13 => 'C:\\projects\\cacao\\backend\\app\\Models\\ProductVariant.php',
      14 => 'C:\\projects\\cacao\\backend\\app\\Policies\\ProductPolicy.php',
      15 => 'C:\\projects\\cacao\\backend\\app\\Services\\CheckoutQuoteService.php',
      16 => 'C:\\projects\\cacao\\backend\\app\\Services\\CheckoutService.php',
      17 => 'C:\\projects\\cacao\\backend\\app\\Services\\OrderStatusService.php',
      18 => 'C:\\projects\\cacao\\backend\\routes\\web.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\ProductImage.php' => 
  array (
    'fileHash' => '0ca85187ce56f642c3c797170f89cb2f617fc20cd2418f9ed613d20339c64f86',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductImageResource.php',
      1 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductResource.php',
      2 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\Api\\V1\\ProductController.php',
      3 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\StorefrontCartController.php',
      4 => 'C:\\projects\\cacao\\backend\\app\\Http\\Resources\\ProductResource.php',
      5 => 'C:\\projects\\cacao\\backend\\app\\Models\\Category.php',
      6 => 'C:\\projects\\cacao\\backend\\app\\Models\\Product.php',
      7 => 'C:\\projects\\cacao\\backend\\app\\Models\\ProductVariant.php',
      8 => 'C:\\projects\\cacao\\backend\\app\\Policies\\ProductPolicy.php',
      9 => 'C:\\projects\\cacao\\backend\\app\\Services\\CheckoutQuoteService.php',
      10 => 'C:\\projects\\cacao\\backend\\app\\Services\\CheckoutService.php',
      11 => 'C:\\projects\\cacao\\backend\\routes\\web.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\ProductVariant.php' => 
  array (
    'fileHash' => '4349f5dcad16b3916d4c8b9c42f782fb85238b14b71b9683bd0999e79e2405c7',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductResource.php',
      1 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductVariantResource.php',
      2 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductVariantResource\\Pages\\EditProductVariant.php',
      3 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Widgets\\CommerceOverview.php',
      4 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\Api\\V1\\ProductController.php',
      5 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\CatalogController.php',
      6 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\StorefrontCartController.php',
      7 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\StorefrontCheckoutController.php',
      8 => 'C:\\projects\\cacao\\backend\\app\\Http\\Resources\\ProductResource.php',
      9 => 'C:\\projects\\cacao\\backend\\app\\Models\\CartItem.php',
      10 => 'C:\\projects\\cacao\\backend\\app\\Models\\Category.php',
      11 => 'C:\\projects\\cacao\\backend\\app\\Models\\InventoryMovement.php',
      12 => 'C:\\projects\\cacao\\backend\\app\\Models\\Product.php',
      13 => 'C:\\projects\\cacao\\backend\\app\\Models\\ProductImage.php',
      14 => 'C:\\projects\\cacao\\backend\\app\\Policies\\ProductPolicy.php',
      15 => 'C:\\projects\\cacao\\backend\\app\\Services\\CheckoutQuoteService.php',
      16 => 'C:\\projects\\cacao\\backend\\app\\Services\\CheckoutService.php',
      17 => 'C:\\projects\\cacao\\backend\\app\\Services\\OrderStatusService.php',
      18 => 'C:\\projects\\cacao\\backend\\routes\\web.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\PushCampaign.php' => 
  array (
    'fileHash' => '7178a9bbc222a8bf5eddb9edde540924d7c0780af708aff7adf9fd19ff72d887',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PushCampaignResource.php',
      1 => 'C:\\projects\\cacao\\backend\\app\\Jobs\\SendPushCampaign.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\PushDevice.php' => 
  array (
    'fileHash' => '44d9e8cd31e927297ce6136397f9884d12dd47007a633b5d7dd7f19b0409c173',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\Api\\V1\\PushDeviceController.php',
      1 => 'C:\\projects\\cacao\\backend\\app\\Jobs\\SendOrderCustomerNotifications.php',
      2 => 'C:\\projects\\cacao\\backend\\app\\Jobs\\SendPushCampaign.php',
      3 => 'C:\\projects\\cacao\\backend\\app\\Models\\User.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\User.php' => 
  array (
    'fileHash' => '9f697252f30740a669d084aeced47aa800be368eeec5b9885e87ed47a29c1a17',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\AdminResource.php',
      1 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\AdminUserResource.php',
      2 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\AdminUserResource\\Pages\\CreateAdminUser.php',
      3 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\AdminUserResource\\Pages\\EditAdminUser.php',
      4 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CustomerResource.php',
      5 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\OrderResource\\Pages\\EditOrder.php',
      6 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\AccountAddressController.php',
      7 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\AccountOrderController.php',
      8 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\Api\\V1\\AddressController.php',
      9 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\Api\\V1\\AuthController.php',
      10 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\Api\\V1\\CheckoutController.php',
      11 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\Api\\V1\\PushDeviceController.php',
      12 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\GoogleAuthController.php',
      13 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\StorefrontAuthController.php',
      14 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\StorefrontCheckoutController.php',
      15 => 'C:\\projects\\cacao\\backend\\app\\Http\\Requests\\AddressRequest.php',
      16 => 'C:\\projects\\cacao\\backend\\app\\Http\\Requests\\CheckoutQuoteRequest.php',
      17 => 'C:\\projects\\cacao\\backend\\app\\Http\\Requests\\CheckoutRequest.php',
      18 => 'C:\\projects\\cacao\\backend\\app\\Http\\Requests\\PushDeviceRequest.php',
      19 => 'C:\\projects\\cacao\\backend\\app\\Http\\Requests\\StorefrontCheckoutRequest.php',
      20 => 'C:\\projects\\cacao\\backend\\app\\Jobs\\SendOrderCustomerNotifications.php',
      21 => 'C:\\projects\\cacao\\backend\\app\\Models\\Address.php',
      22 => 'C:\\projects\\cacao\\backend\\app\\Models\\InventoryMovement.php',
      23 => 'C:\\projects\\cacao\\backend\\app\\Models\\Order.php',
      24 => 'C:\\projects\\cacao\\backend\\app\\Models\\PushDevice.php',
      25 => 'C:\\projects\\cacao\\backend\\app\\Policies\\OrderPolicy.php',
      26 => 'C:\\projects\\cacao\\backend\\app\\Policies\\ProductPolicy.php',
      27 => 'C:\\projects\\cacao\\backend\\app\\Providers\\AppServiceProvider.php',
      28 => 'C:\\projects\\cacao\\backend\\app\\Services\\CheckoutService.php',
      29 => 'C:\\projects\\cacao\\backend\\app\\Services\\OrderStatusService.php',
      30 => 'C:\\projects\\cacao\\backend\\routes\\api.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Policies\\OrderPolicy.php' => 
  array (
    'fileHash' => 'db2897e07552f935ba9633158e6da9d6fc9d125e05b497646040dc7939dd76e3',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Policies\\ProductPolicy.php' => 
  array (
    'fileHash' => 'dda200e11b27725740d78b20f7f85e8ab767bcf75cb8eb229467096da7da56a6',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Providers\\AppServiceProvider.php' => 
  array (
    'fileHash' => '03c9164c0602e1c9c279398b4fbd6edb3e1052ffedd65485fa3d06a1927e51bc',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Providers\\Filament\\AdminPanelProvider.php' => 
  array (
    'fileHash' => 'b8e9a2de1bf7e6bf9cec9ab96d6f4793055053302d758bd3cd58d970436e5a29',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Services\\CheckoutQuoteService.php' => 
  array (
    'fileHash' => 'b7d262b36970408e15049a1ae63e705e3f13c3a6546e7268428698571a1516bb',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\Api\\V1\\CheckoutQuoteController.php',
      1 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\StorefrontCheckoutController.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Services\\CheckoutService.php' => 
  array (
    'fileHash' => 'd07fc9df0b5d99953b891caa4187814ccf29265c0b4dc20855d8aeb174cf59c5',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\Api\\V1\\CheckoutController.php',
      1 => 'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\StorefrontCheckoutController.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Services\\CouponPricingService.php' => 
  array (
    'fileHash' => '55a8e243d230427fda4d568794d282def328f0e0d6088c78ad5b01b80e272250',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Services\\CheckoutQuoteService.php',
      1 => 'C:\\projects\\cacao\\backend\\app\\Services\\CheckoutService.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Services\\Messaging\\DisabledSmsOrderNotifier.php' => 
  array (
    'fileHash' => '23befabe1a59bc07f09ebefd48c6144d7ce39a6c46672748968e6f8686dc0286',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Providers\\AppServiceProvider.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Services\\Messaging\\FcmPushSender.php' => 
  array (
    'fileHash' => 'bc1e529efb7c6a6c4bd4fef367d925f7ae22e9300b3bc4cbeab3a5908021a42a',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Jobs\\SendOrderCustomerNotifications.php',
      1 => 'C:\\projects\\cacao\\backend\\app\\Jobs\\SendPushCampaign.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Services\\Messaging\\WhatsAppCloudOrderNotifier.php' => 
  array (
    'fileHash' => '52079e4c17d832d0a6839bf270f4358a1f040826a88634106d3cdabf25100fde',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Jobs\\SendOrderCustomerNotifications.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Services\\OrderStatusService.php' => 
  array (
    'fileHash' => '44db26b075387b065443489439d457467d07d6a78ce61612aecc33710fcb9b68',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\OrderResource\\Pages\\EditOrder.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\app\\Services\\Payments\\ManualPaymentGateway.php' => 
  array (
    'fileHash' => '6c4adcbd39c1ccec73b51ba5fa2b440924fef97ef74d647833f1e59d5c17f557',
    'dependentFiles' => 
    array (
      0 => 'C:\\projects\\cacao\\backend\\app\\Providers\\AppServiceProvider.php',
    ),
  ),
  'C:\\projects\\cacao\\backend\\routes\\api.php' => 
  array (
    'fileHash' => 'dc8543e497a73f172ba66e097aa7fcf7537b857f874698d473d416525345eecf',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\projects\\cacao\\backend\\routes\\console.php' => 
  array (
    'fileHash' => '127b0e0137d66733837f7e9809f36a0295c5cd5647ff6806d60b5f4fec961f35',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\projects\\cacao\\backend\\routes\\web.php' => 
  array (
    'fileHash' => 'cde75c7845f52e70d3825bc66afd8ab4ccaffb81a299b437c81278d33f6dab21',
    'dependentFiles' => 
    array (
    ),
  ),
),
	'packageDependencies' => array (
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\AdminUserResource.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'filament/filament',
    2 => 'filament/schemas',
    3 => 'filament/support',
    4 => 'filament/forms',
    5 => 'filament/tables',
    6 => 'filament/actions',
    7 => 'livewire/livewire',
    8 => 'danharrin/livewire-rate-limiting',
    9 => 'laravel/sanctum',
    10 => 'spatie/laravel-permission',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\BusinessSettingResource\\Pages\\EditBusinessSetting.php' => 
  array (
    0 => 'filament/actions',
    1 => 'filament/schemas',
    2 => 'filament/filament',
    3 => 'danharrin/livewire-rate-limiting',
    4 => 'livewire/livewire',
    5 => 'laravel/framework',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CategoryResource\\Pages\\CreateCategory.php' => 
  array (
    0 => 'filament/actions',
    1 => 'filament/schemas',
    2 => 'filament/filament',
    3 => 'danharrin/livewire-rate-limiting',
    4 => 'livewire/livewire',
    5 => 'laravel/framework',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CustomerResource.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'filament/filament',
    2 => 'filament/schemas',
    3 => 'filament/support',
    4 => 'filament/forms',
    5 => 'filament/tables',
    6 => 'filament/actions',
    7 => 'livewire/livewire',
    8 => 'danharrin/livewire-rate-limiting',
    9 => 'laravel/sanctum',
    10 => 'spatie/laravel-permission',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\FaqResource\\Pages\\CreateFaq.php' => 
  array (
    0 => 'filament/actions',
    1 => 'filament/schemas',
    2 => 'filament/filament',
    3 => 'danharrin/livewire-rate-limiting',
    4 => 'livewire/livewire',
    5 => 'laravel/framework',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\InventoryMovementResource.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'filament/filament',
    2 => 'filament/schemas',
    3 => 'filament/support',
    4 => 'filament/tables',
    5 => 'filament/actions',
    6 => 'livewire/livewire',
    7 => 'danharrin/livewire-rate-limiting',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductImageResource.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'filament/filament',
    2 => 'filament/schemas',
    3 => 'filament/support',
    4 => 'filament/forms',
    5 => 'filament/tables',
    6 => 'filament/actions',
    7 => 'livewire/livewire',
    8 => 'danharrin/livewire-rate-limiting',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductVariantResource\\Pages\\ListProductVariants.php' => 
  array (
    0 => 'filament/tables',
    1 => 'filament/actions',
    2 => 'filament/schemas',
    3 => 'filament/filament',
    4 => 'livewire/livewire',
    5 => 'danharrin/livewire-rate-limiting',
    6 => 'laravel/framework',
    7 => 'filament/support',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PushCampaignResource\\Pages\\CreatePushCampaign.php' => 
  array (
    0 => 'filament/actions',
    1 => 'filament/schemas',
    2 => 'filament/filament',
    3 => 'danharrin/livewire-rate-limiting',
    4 => 'livewire/livewire',
    5 => 'laravel/framework',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Widgets\\CommerceOverview.php' => 
  array (
    0 => 'filament/schemas',
    1 => 'filament/widgets',
    2 => 'livewire/livewire',
    3 => 'filament/support',
    4 => 'laravel/framework',
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\AccountOrderController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
    2 => 'filament/filament',
    3 => 'laravel/sanctum',
    4 => 'spatie/laravel-permission',
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Requests\\UpdateCartItemRequest.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\projects\\cacao\\backend\\app\\Jobs\\SendPushCampaign.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'nesbot/carbon',
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\Banner.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\BusinessSetting.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\InventoryMovement.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'filament/filament',
    2 => 'laravel/sanctum',
    3 => 'spatie/laravel-permission',
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\OrderItem.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\OrderStatusHistory.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\projects\\cacao\\backend\\routes\\web.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\AddressResource\\Pages\\ListAddresses.php' => 
  array (
    0 => 'filament/tables',
    1 => 'filament/actions',
    2 => 'filament/schemas',
    3 => 'filament/filament',
    4 => 'livewire/livewire',
    5 => 'danharrin/livewire-rate-limiting',
    6 => 'laravel/framework',
    7 => 'filament/support',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CategoryResource.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'filament/filament',
    2 => 'filament/schemas',
    3 => 'filament/support',
    4 => 'filament/forms',
    5 => 'filament/tables',
    6 => 'filament/actions',
    7 => 'livewire/livewire',
    8 => 'danharrin/livewire-rate-limiting',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ContactRequestResource\\Pages\\EditContactRequest.php' => 
  array (
    0 => 'filament/actions',
    1 => 'filament/schemas',
    2 => 'filament/filament',
    3 => 'danharrin/livewire-rate-limiting',
    4 => 'livewire/livewire',
    5 => 'laravel/framework',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CouponResource\\Pages\\CreateCoupon.php' => 
  array (
    0 => 'filament/actions',
    1 => 'filament/schemas',
    2 => 'filament/filament',
    3 => 'danharrin/livewire-rate-limiting',
    4 => 'livewire/livewire',
    5 => 'laravel/framework',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CustomerResource\\Pages\\ListCustomers.php' => 
  array (
    0 => 'filament/tables',
    1 => 'filament/actions',
    2 => 'filament/schemas',
    3 => 'filament/filament',
    4 => 'livewire/livewire',
    5 => 'danharrin/livewire-rate-limiting',
    6 => 'laravel/framework',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\DeliveryZoneResource.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'filament/filament',
    2 => 'filament/schemas',
    3 => 'filament/support',
    4 => 'filament/forms',
    5 => 'filament/tables',
    6 => 'filament/actions',
    7 => 'livewire/livewire',
    8 => 'danharrin/livewire-rate-limiting',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\DeliveryZoneResource\\Pages\\ListDeliveryZones.php' => 
  array (
    0 => 'filament/tables',
    1 => 'filament/actions',
    2 => 'filament/schemas',
    3 => 'filament/filament',
    4 => 'livewire/livewire',
    5 => 'danharrin/livewire-rate-limiting',
    6 => 'laravel/framework',
    7 => 'filament/support',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\FaqResource\\Pages\\EditFaq.php' => 
  array (
    0 => 'filament/actions',
    1 => 'filament/schemas',
    2 => 'filament/filament',
    3 => 'danharrin/livewire-rate-limiting',
    4 => 'livewire/livewire',
    5 => 'laravel/framework',
    6 => 'filament/support',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\OrderResource.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'filament/filament',
    2 => 'filament/schemas',
    3 => 'filament/support',
    4 => 'filament/forms',
    5 => 'filament/tables',
    6 => 'filament/actions',
    7 => 'livewire/livewire',
    8 => 'danharrin/livewire-rate-limiting',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\OrderResource\\Pages\\EditOrder.php' => 
  array (
    0 => 'filament/actions',
    1 => 'filament/schemas',
    2 => 'filament/filament',
    3 => 'danharrin/livewire-rate-limiting',
    4 => 'livewire/livewire',
    5 => 'laravel/framework',
    6 => 'symfony/http-foundation',
    7 => 'laravel/sanctum',
    8 => 'spatie/laravel-permission',
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Requests\\PushDeviceRequest.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
    2 => 'filament/filament',
    3 => 'laravel/sanctum',
    4 => 'spatie/laravel-permission',
  ),
  'C:\\projects\\cacao\\backend\\app\\Jobs\\SendOrderCustomerNotifications.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/mailer',
    2 => 'filament/filament',
    3 => 'laravel/sanctum',
    4 => 'spatie/laravel-permission',
    5 => 'nesbot/carbon',
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\Category.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\NotificationDelivery.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\OrderStatus.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\User.php' => 
  array (
    0 => 'filament/filament',
    1 => 'laravel/framework',
    2 => 'laravel/sanctum',
    3 => 'spatie/laravel-permission',
    4 => 'filament/support',
  ),
  'C:\\projects\\cacao\\backend\\app\\Policies\\OrderPolicy.php' => 
  array (
    0 => 'filament/filament',
    1 => 'laravel/framework',
    2 => 'laravel/sanctum',
    3 => 'spatie/laravel-permission',
  ),
  'C:\\projects\\cacao\\backend\\app\\Services\\Messaging\\WhatsAppCloudOrderNotifier.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\projects\\cacao\\backend\\routes\\console.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/console',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\AddressResource.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'filament/filament',
    2 => 'filament/schemas',
    3 => 'filament/support',
    4 => 'filament/forms',
    5 => 'filament/tables',
    6 => 'filament/actions',
    7 => 'livewire/livewire',
    8 => 'danharrin/livewire-rate-limiting',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\AddressResource\\Pages\\CreateAddress.php' => 
  array (
    0 => 'filament/actions',
    1 => 'filament/schemas',
    2 => 'filament/filament',
    3 => 'danharrin/livewire-rate-limiting',
    4 => 'livewire/livewire',
    5 => 'laravel/framework',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\DeliveryRateResource.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'filament/filament',
    2 => 'filament/schemas',
    3 => 'filament/support',
    4 => 'filament/forms',
    5 => 'filament/tables',
    6 => 'filament/actions',
    7 => 'livewire/livewire',
    8 => 'danharrin/livewire-rate-limiting',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\DeliveryZoneResource\\Pages\\EditDeliveryZone.php' => 
  array (
    0 => 'filament/actions',
    1 => 'filament/schemas',
    2 => 'filament/filament',
    3 => 'danharrin/livewire-rate-limiting',
    4 => 'livewire/livewire',
    5 => 'laravel/framework',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductImageResource\\Pages\\ListProductImages.php' => 
  array (
    0 => 'filament/tables',
    1 => 'filament/actions',
    2 => 'filament/schemas',
    3 => 'filament/filament',
    4 => 'livewire/livewire',
    5 => 'danharrin/livewire-rate-limiting',
    6 => 'laravel/framework',
    7 => 'filament/support',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductResource\\Pages\\EditProduct.php' => 
  array (
    0 => 'filament/actions',
    1 => 'filament/schemas',
    2 => 'filament/filament',
    3 => 'danharrin/livewire-rate-limiting',
    4 => 'livewire/livewire',
    5 => 'laravel/framework',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductResource\\Pages\\ListProducts.php' => 
  array (
    0 => 'filament/tables',
    1 => 'filament/actions',
    2 => 'filament/schemas',
    3 => 'filament/filament',
    4 => 'livewire/livewire',
    5 => 'danharrin/livewire-rate-limiting',
    6 => 'laravel/framework',
    7 => 'filament/support',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductVariantResource.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'filament/filament',
    2 => 'filament/schemas',
    3 => 'filament/support',
    4 => 'filament/forms',
    5 => 'filament/tables',
    6 => 'filament/actions',
    7 => 'livewire/livewire',
    8 => 'danharrin/livewire-rate-limiting',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductVariantResource\\Pages\\EditProductVariant.php' => 
  array (
    0 => 'filament/actions',
    1 => 'filament/schemas',
    2 => 'filament/filament',
    3 => 'danharrin/livewire-rate-limiting',
    4 => 'livewire/livewire',
    5 => 'laravel/framework',
    6 => 'symfony/http-foundation',
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\Api\\V1\\AuthController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
    2 => 'filament/filament',
    3 => 'laravel/sanctum',
    4 => 'spatie/laravel-permission',
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\Api\\V1\\ProductController.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\Controller.php' => 
  array (
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\PasswordResetController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\WhatsAppWebhookController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Requests\\AddCartItemRequest.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\CartItem.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\ProductImage.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\PushCampaign.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\PushDevice.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'filament/filament',
    2 => 'laravel/sanctum',
    3 => 'spatie/laravel-permission',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\AdminUserResource\\Pages\\ListAdminUsers.php' => 
  array (
    0 => 'filament/tables',
    1 => 'filament/actions',
    2 => 'filament/schemas',
    3 => 'filament/filament',
    4 => 'livewire/livewire',
    5 => 'danharrin/livewire-rate-limiting',
    6 => 'laravel/framework',
    7 => 'filament/support',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\BusinessSettingResource\\Pages\\ListBusinessSettings.php' => 
  array (
    0 => 'filament/tables',
    1 => 'filament/actions',
    2 => 'filament/schemas',
    3 => 'filament/filament',
    4 => 'livewire/livewire',
    5 => 'danharrin/livewire-rate-limiting',
    6 => 'laravel/framework',
    7 => 'filament/support',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CouponResource.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'filament/filament',
    2 => 'filament/schemas',
    3 => 'filament/support',
    4 => 'filament/forms',
    5 => 'filament/tables',
    6 => 'filament/actions',
    7 => 'livewire/livewire',
    8 => 'danharrin/livewire-rate-limiting',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CustomerResource\\Pages\\EditCustomer.php' => 
  array (
    0 => 'filament/actions',
    1 => 'filament/schemas',
    2 => 'filament/filament',
    3 => 'danharrin/livewire-rate-limiting',
    4 => 'livewire/livewire',
    5 => 'laravel/framework',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PermissionResource.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'filament/filament',
    2 => 'filament/schemas',
    3 => 'filament/support',
    4 => 'filament/forms',
    5 => 'filament/tables',
    6 => 'filament/actions',
    7 => 'livewire/livewire',
    8 => 'danharrin/livewire-rate-limiting',
    9 => 'spatie/laravel-permission',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PermissionResource\\Pages\\EditPermission.php' => 
  array (
    0 => 'filament/actions',
    1 => 'filament/schemas',
    2 => 'filament/filament',
    3 => 'danharrin/livewire-rate-limiting',
    4 => 'livewire/livewire',
    5 => 'laravel/framework',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductImageResource\\Pages\\CreateProductImage.php' => 
  array (
    0 => 'filament/actions',
    1 => 'filament/schemas',
    2 => 'filament/filament',
    3 => 'danharrin/livewire-rate-limiting',
    4 => 'livewire/livewire',
    5 => 'laravel/framework',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductVariantResource\\Pages\\CreateProductVariant.php' => 
  array (
    0 => 'filament/actions',
    1 => 'filament/schemas',
    2 => 'filament/filament',
    3 => 'danharrin/livewire-rate-limiting',
    4 => 'livewire/livewire',
    5 => 'laravel/framework',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\RoleResource.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'filament/filament',
    2 => 'filament/schemas',
    3 => 'filament/support',
    4 => 'filament/forms',
    5 => 'spatie/laravel-permission',
    6 => 'filament/tables',
    7 => 'filament/actions',
    8 => 'livewire/livewire',
    9 => 'danharrin/livewire-rate-limiting',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\RoleResource\\Pages\\CreateRole.php' => 
  array (
    0 => 'filament/actions',
    1 => 'filament/schemas',
    2 => 'filament/filament',
    3 => 'danharrin/livewire-rate-limiting',
    4 => 'livewire/livewire',
    5 => 'laravel/framework',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\RoleResource\\Pages\\ListRoles.php' => 
  array (
    0 => 'filament/tables',
    1 => 'filament/actions',
    2 => 'filament/schemas',
    3 => 'filament/filament',
    4 => 'livewire/livewire',
    5 => 'danharrin/livewire-rate-limiting',
    6 => 'laravel/framework',
    7 => 'filament/support',
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\AccountAddressController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
    2 => 'filament/filament',
    3 => 'laravel/sanctum',
    4 => 'spatie/laravel-permission',
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\Api\\V1\\CheckoutQuoteController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\Api\\V1\\PushDeviceController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
    2 => 'filament/filament',
    3 => 'laravel/sanctum',
    4 => 'spatie/laravel-permission',
    5 => 'nesbot/carbon',
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\GoogleAuthController.php' => 
  array (
    0 => 'symfony/http-foundation',
    1 => 'laravel/framework',
    2 => 'laravel/socialite',
    3 => 'psr/log',
    4 => 'monolog/monolog',
    5 => 'filament/filament',
    6 => 'laravel/sanctum',
    7 => 'spatie/laravel-permission',
    8 => 'nesbot/carbon',
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Requests\\CheckoutQuoteRequest.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
    2 => 'filament/filament',
    3 => 'laravel/sanctum',
    4 => 'spatie/laravel-permission',
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Resources\\OrderResource.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
    2 => 'nesbot/carbon',
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\ContactRequest.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\projects\\cacao\\backend\\app\\Services\\CheckoutService.php' => 
  array (
    0 => 'filament/filament',
    1 => 'laravel/framework',
    2 => 'laravel/sanctum',
    3 => 'spatie/laravel-permission',
    4 => 'symfony/http-kernel',
    5 => 'nesbot/carbon',
    6 => 'ramsey/uuid',
  ),
  'C:\\projects\\cacao\\backend\\app\\Contracts\\PaymentGateway.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\AddressResource\\Pages\\EditAddress.php' => 
  array (
    0 => 'filament/actions',
    1 => 'filament/schemas',
    2 => 'filament/filament',
    3 => 'danharrin/livewire-rate-limiting',
    4 => 'livewire/livewire',
    5 => 'laravel/framework',
    6 => 'filament/support',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\BannerResource\\Pages\\EditBanner.php' => 
  array (
    0 => 'filament/actions',
    1 => 'filament/schemas',
    2 => 'filament/filament',
    3 => 'danharrin/livewire-rate-limiting',
    4 => 'livewire/livewire',
    5 => 'laravel/framework',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PaymentMethodResource.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'filament/filament',
    2 => 'filament/schemas',
    3 => 'filament/support',
    4 => 'filament/forms',
    5 => 'filament/tables',
    6 => 'filament/actions',
    7 => 'livewire/livewire',
    8 => 'danharrin/livewire-rate-limiting',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PaymentMethodResource\\Pages\\ListPaymentMethods.php' => 
  array (
    0 => 'filament/tables',
    1 => 'filament/actions',
    2 => 'filament/schemas',
    3 => 'filament/filament',
    4 => 'livewire/livewire',
    5 => 'danharrin/livewire-rate-limiting',
    6 => 'laravel/framework',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductImageResource\\Pages\\EditProductImage.php' => 
  array (
    0 => 'filament/actions',
    1 => 'filament/schemas',
    2 => 'filament/filament',
    3 => 'danharrin/livewire-rate-limiting',
    4 => 'livewire/livewire',
    5 => 'laravel/framework',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductResource\\Pages\\CreateProduct.php' => 
  array (
    0 => 'filament/actions',
    1 => 'filament/schemas',
    2 => 'filament/filament',
    3 => 'danharrin/livewire-rate-limiting',
    4 => 'livewire/livewire',
    5 => 'laravel/framework',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PushCampaignResource.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'filament/filament',
    2 => 'filament/schemas',
    3 => 'filament/support',
    4 => 'filament/forms',
    5 => 'filament/tables',
    6 => 'filament/actions',
    7 => 'symfony/http-foundation',
    8 => 'livewire/livewire',
    9 => 'danharrin/livewire-rate-limiting',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PushCampaignResource\\Pages\\ListPushCampaigns.php' => 
  array (
    0 => 'filament/tables',
    1 => 'filament/actions',
    2 => 'filament/schemas',
    3 => 'filament/filament',
    4 => 'livewire/livewire',
    5 => 'danharrin/livewire-rate-limiting',
    6 => 'laravel/framework',
    7 => 'filament/support',
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\Api\\V1\\CommerceOptionsController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\StorefrontAuthController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
    2 => 'filament/filament',
    3 => 'laravel/sanctum',
    4 => 'spatie/laravel-permission',
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Resources\\AddressResource.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\projects\\cacao\\backend\\app\\Jobs\\SendTelegramOrderNotification.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'psr/log',
    2 => 'monolog/monolog',
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\Cart.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\Coupon.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\DeliveryZone.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\Product.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\projects\\cacao\\backend\\app\\Services\\OrderStatusService.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'filament/filament',
    2 => 'laravel/sanctum',
    3 => 'spatie/laravel-permission',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\AdminUserResource\\Pages\\CreateAdminUser.php' => 
  array (
    0 => 'filament/actions',
    1 => 'filament/schemas',
    2 => 'filament/filament',
    3 => 'danharrin/livewire-rate-limiting',
    4 => 'livewire/livewire',
    5 => 'laravel/framework',
    6 => 'laravel/sanctum',
    7 => 'spatie/laravel-permission',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\AdminUserResource\\Pages\\EditAdminUser.php' => 
  array (
    0 => 'filament/actions',
    1 => 'filament/schemas',
    2 => 'filament/filament',
    3 => 'danharrin/livewire-rate-limiting',
    4 => 'livewire/livewire',
    5 => 'laravel/framework',
    6 => 'laravel/sanctum',
    7 => 'spatie/laravel-permission',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\BannerResource\\Pages\\CreateBanner.php' => 
  array (
    0 => 'filament/actions',
    1 => 'filament/schemas',
    2 => 'filament/filament',
    3 => 'danharrin/livewire-rate-limiting',
    4 => 'livewire/livewire',
    5 => 'laravel/framework',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CategoryResource\\Pages\\ListCategories.php' => 
  array (
    0 => 'filament/tables',
    1 => 'filament/actions',
    2 => 'filament/schemas',
    3 => 'filament/filament',
    4 => 'livewire/livewire',
    5 => 'danharrin/livewire-rate-limiting',
    6 => 'laravel/framework',
    7 => 'filament/support',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ContactRequestResource.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'filament/filament',
    2 => 'filament/schemas',
    3 => 'filament/support',
    4 => 'filament/forms',
    5 => 'filament/tables',
    6 => 'filament/actions',
    7 => 'livewire/livewire',
    8 => 'danharrin/livewire-rate-limiting',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ContactRequestResource\\Pages\\ListContactRequests.php' => 
  array (
    0 => 'filament/tables',
    1 => 'filament/actions',
    2 => 'filament/schemas',
    3 => 'filament/filament',
    4 => 'livewire/livewire',
    5 => 'danharrin/livewire-rate-limiting',
    6 => 'laravel/framework',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\DeliveryRateResource\\Pages\\ListDeliveryRates.php' => 
  array (
    0 => 'filament/tables',
    1 => 'filament/actions',
    2 => 'filament/schemas',
    3 => 'filament/filament',
    4 => 'livewire/livewire',
    5 => 'danharrin/livewire-rate-limiting',
    6 => 'laravel/framework',
    7 => 'filament/support',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\FaqResource.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'filament/filament',
    2 => 'filament/schemas',
    3 => 'filament/support',
    4 => 'filament/forms',
    5 => 'filament/tables',
    6 => 'filament/actions',
    7 => 'livewire/livewire',
    8 => 'danharrin/livewire-rate-limiting',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\FaqResource\\Pages\\ListFaqs.php' => 
  array (
    0 => 'filament/tables',
    1 => 'filament/actions',
    2 => 'filament/schemas',
    3 => 'filament/filament',
    4 => 'livewire/livewire',
    5 => 'danharrin/livewire-rate-limiting',
    6 => 'laravel/framework',
    7 => 'filament/support',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PaymentMethodResource\\Pages\\EditPaymentMethod.php' => 
  array (
    0 => 'filament/actions',
    1 => 'filament/schemas',
    2 => 'filament/filament',
    3 => 'danharrin/livewire-rate-limiting',
    4 => 'livewire/livewire',
    5 => 'laravel/framework',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductResource.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'filament/filament',
    2 => 'filament/schemas',
    3 => 'filament/support',
    4 => 'filament/forms',
    5 => 'filament/tables',
    6 => 'filament/actions',
    7 => 'livewire/livewire',
    8 => 'danharrin/livewire-rate-limiting',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\RoleResource\\Pages\\EditRole.php' => 
  array (
    0 => 'filament/actions',
    1 => 'filament/schemas',
    2 => 'filament/filament',
    3 => 'danharrin/livewire-rate-limiting',
    4 => 'livewire/livewire',
    5 => 'laravel/framework',
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\CatalogController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\StorefrontCheckoutController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
    2 => 'filament/filament',
    3 => 'laravel/sanctum',
    4 => 'spatie/laravel-permission',
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Requests\\StorefrontCheckoutRequest.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
    2 => 'filament/filament',
    3 => 'laravel/sanctum',
    4 => 'spatie/laravel-permission',
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\Address.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'filament/filament',
    2 => 'laravel/sanctum',
    3 => 'spatie/laravel-permission',
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\Faq.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\ProductVariant.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\projects\\cacao\\backend\\app\\Services\\Payments\\ManualPaymentGateway.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\projects\\cacao\\backend\\app\\Contracts\\SmsOrderNotifier.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\BannerResource.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'filament/filament',
    2 => 'filament/schemas',
    3 => 'filament/support',
    4 => 'filament/forms',
    5 => 'filament/tables',
    6 => 'filament/actions',
    7 => 'livewire/livewire',
    8 => 'danharrin/livewire-rate-limiting',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\BusinessSettingResource\\Pages\\CreateBusinessSetting.php' => 
  array (
    0 => 'filament/actions',
    1 => 'filament/schemas',
    2 => 'filament/filament',
    3 => 'danharrin/livewire-rate-limiting',
    4 => 'livewire/livewire',
    5 => 'laravel/framework',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CategoryResource\\Pages\\EditCategory.php' => 
  array (
    0 => 'filament/actions',
    1 => 'filament/schemas',
    2 => 'filament/filament',
    3 => 'danharrin/livewire-rate-limiting',
    4 => 'livewire/livewire',
    5 => 'laravel/framework',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CouponResource\\Pages\\ListCoupons.php' => 
  array (
    0 => 'filament/tables',
    1 => 'filament/actions',
    2 => 'filament/schemas',
    3 => 'filament/filament',
    4 => 'livewire/livewire',
    5 => 'danharrin/livewire-rate-limiting',
    6 => 'laravel/framework',
    7 => 'filament/support',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\DeliveryZoneResource\\Pages\\CreateDeliveryZone.php' => 
  array (
    0 => 'filament/actions',
    1 => 'filament/schemas',
    2 => 'filament/filament',
    3 => 'danharrin/livewire-rate-limiting',
    4 => 'livewire/livewire',
    5 => 'laravel/framework',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\OrderResource\\Pages\\ListOrders.php' => 
  array (
    0 => 'filament/tables',
    1 => 'filament/actions',
    2 => 'filament/schemas',
    3 => 'filament/filament',
    4 => 'livewire/livewire',
    5 => 'danharrin/livewire-rate-limiting',
    6 => 'laravel/framework',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PermissionResource\\Pages\\CreatePermission.php' => 
  array (
    0 => 'filament/actions',
    1 => 'filament/schemas',
    2 => 'filament/filament',
    3 => 'danharrin/livewire-rate-limiting',
    4 => 'livewire/livewire',
    5 => 'laravel/framework',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PermissionResource\\Pages\\ListPermissions.php' => 
  array (
    0 => 'filament/tables',
    1 => 'filament/actions',
    2 => 'filament/schemas',
    3 => 'filament/filament',
    4 => 'livewire/livewire',
    5 => 'danharrin/livewire-rate-limiting',
    6 => 'laravel/framework',
    7 => 'filament/support',
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\Api\\V1\\AddressController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
    2 => 'filament/filament',
    3 => 'laravel/sanctum',
    4 => 'spatie/laravel-permission',
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Requests\\Auth\\LoginRequest.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Requests\\Auth\\RegisterRequest.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Requests\\CheckoutRequest.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
    2 => 'filament/filament',
    3 => 'laravel/sanctum',
    4 => 'spatie/laravel-permission',
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\Order.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'filament/filament',
    2 => 'laravel/sanctum',
    3 => 'spatie/laravel-permission',
  ),
  'C:\\projects\\cacao\\backend\\app\\Policies\\ProductPolicy.php' => 
  array (
    0 => 'filament/filament',
    1 => 'laravel/framework',
    2 => 'laravel/sanctum',
    3 => 'spatie/laravel-permission',
  ),
  'C:\\projects\\cacao\\backend\\app\\Providers\\AppServiceProvider.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'psr/container',
    2 => 'filament/filament',
    3 => 'laravel/sanctum',
    4 => 'spatie/laravel-permission',
    5 => 'symfony/http-foundation',
  ),
  'C:\\projects\\cacao\\backend\\app\\Services\\CheckoutQuoteService.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\projects\\cacao\\backend\\app\\Services\\Messaging\\FcmPushSender.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'google/auth',
  ),
  'C:\\projects\\cacao\\backend\\app\\Contracts\\PaymentResult.php' => 
  array (
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\BannerResource\\Pages\\ListBanners.php' => 
  array (
    0 => 'filament/tables',
    1 => 'filament/actions',
    2 => 'filament/schemas',
    3 => 'filament/filament',
    4 => 'livewire/livewire',
    5 => 'danharrin/livewire-rate-limiting',
    6 => 'laravel/framework',
    7 => 'filament/support',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\BusinessSettingResource.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'filament/filament',
    2 => 'filament/schemas',
    3 => 'filament/support',
    4 => 'filament/forms',
    5 => 'filament/tables',
    6 => 'filament/actions',
    7 => 'livewire/livewire',
    8 => 'danharrin/livewire-rate-limiting',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CouponResource\\Pages\\EditCoupon.php' => 
  array (
    0 => 'filament/actions',
    1 => 'filament/schemas',
    2 => 'filament/filament',
    3 => 'danharrin/livewire-rate-limiting',
    4 => 'livewire/livewire',
    5 => 'laravel/framework',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\DeliveryRateResource\\Pages\\CreateDeliveryRate.php' => 
  array (
    0 => 'filament/actions',
    1 => 'filament/schemas',
    2 => 'filament/filament',
    3 => 'danharrin/livewire-rate-limiting',
    4 => 'livewire/livewire',
    5 => 'laravel/framework',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\DeliveryRateResource\\Pages\\EditDeliveryRate.php' => 
  array (
    0 => 'filament/actions',
    1 => 'filament/schemas',
    2 => 'filament/filament',
    3 => 'danharrin/livewire-rate-limiting',
    4 => 'livewire/livewire',
    5 => 'laravel/framework',
    6 => 'filament/support',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\InventoryMovementResource\\Pages\\ListInventoryMovements.php' => 
  array (
    0 => 'filament/tables',
    1 => 'filament/actions',
    2 => 'filament/schemas',
    3 => 'filament/filament',
    4 => 'livewire/livewire',
    5 => 'danharrin/livewire-rate-limiting',
    6 => 'laravel/framework',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PushCampaignResource\\Pages\\EditPushCampaign.php' => 
  array (
    0 => 'filament/actions',
    1 => 'filament/schemas',
    2 => 'filament/filament',
    3 => 'danharrin/livewire-rate-limiting',
    4 => 'livewire/livewire',
    5 => 'laravel/framework',
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\Api\\V1\\CheckoutController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
    2 => 'filament/filament',
    3 => 'laravel/sanctum',
    4 => 'spatie/laravel-permission',
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\StorefrontCartController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Requests\\AddressRequest.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
    2 => 'filament/filament',
    3 => 'laravel/sanctum',
    4 => 'spatie/laravel-permission',
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Resources\\ProductResource.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\DeliveryRate.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\PaymentMethod.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\projects\\cacao\\backend\\app\\Providers\\Filament\\AdminPanelProvider.php' => 
  array (
    0 => 'filament/filament',
    1 => 'laravel/framework',
    2 => 'filament/support',
    3 => 'filament/actions',
    4 => 'filament/schemas',
    5 => 'danharrin/livewire-rate-limiting',
    6 => 'livewire/livewire',
    7 => 'filament/widgets',
  ),
  'C:\\projects\\cacao\\backend\\app\\Services\\CouponPricingService.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'nesbot/carbon',
  ),
  'C:\\projects\\cacao\\backend\\app\\Services\\Messaging\\DisabledSmsOrderNotifier.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\projects\\cacao\\backend\\routes\\api.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'filament/filament',
    2 => 'laravel/sanctum',
    3 => 'spatie/laravel-permission',
    4 => 'symfony/http-foundation',
  ),
  'C:\\projects\\cacao\\backend\\app\\Console\\Commands\\BackupDatabase.php' => 
  array (
    0 => 'symfony/console',
    1 => 'laravel/framework',
    2 => 'symfony/finder',
    3 => 'symfony/process',
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\ContactController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Middleware\\SecurityHeaders.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
    2 => 'symfony/http-kernel',
    3 => 'psr/container',
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Requests\\ContactRequest.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\AdminResource.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'filament/filament',
    2 => 'laravel/sanctum',
    3 => 'spatie/laravel-permission',
  ),
),
	'exportedNodesCallback' => static function (): array { return array (
  'C:\\projects\\cacao\\backend\\app\\Console\\Commands\\BackupDatabase.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Console\\Commands\\BackupDatabase',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Console\\Command',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'signature',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'description',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'handle',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'int',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Contracts\\PaymentGateway.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedInterfaceNode::__set_state(array(
       'name' => 'App\\Contracts\\PaymentGateway',
       'phpDoc' => NULL,
       'extends' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'createPayment',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'App\\Contracts\\PaymentResult',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'order',
               'type' => 'App\\Models\\Order',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'method',
               'type' => 'App\\Models\\PaymentMethod',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'proofPath',
               'type' => '?string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Contracts\\PaymentResult.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Contracts\\PaymentResult',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'status',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 1,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'reference',
               'type' => '?string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 1,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Contracts\\SmsOrderNotifier.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedInterfaceNode::__set_state(array(
       'name' => 'App\\Contracts\\SmsOrderNotifier',
       'phpDoc' => NULL,
       'extends' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'send',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => '?string',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'order',
               'type' => 'App\\Models\\Order',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'event',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\AddressResource.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\AddressResource',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Filament\\Resources\\AdminResource',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'viewPermission',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'managePermission',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'model',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'modelLabel',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'pluralModelLabel',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'form',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'Filament\\Schemas\\Schema',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'schema',
               'type' => 'Filament\\Schemas\\Schema',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'table',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'Filament\\Tables\\Table',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'table',
               'type' => 'Filament\\Tables\\Table',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getPages',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\AddressResource\\Pages\\CreateAddress.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\AddressResource\\Pages\\CreateAddress',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Filament\\Resources\\Pages\\CreateRecord',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'resource',
          ),
           'phpDoc' => NULL,
           'type' => 'string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\AddressResource\\Pages\\EditAddress.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\AddressResource\\Pages\\EditAddress',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Filament\\Resources\\Pages\\EditRecord',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'resource',
          ),
           'phpDoc' => NULL,
           'type' => 'string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getHeaderActions',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\AddressResource\\Pages\\ListAddresses.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\AddressResource\\Pages\\ListAddresses',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Filament\\Resources\\Pages\\ListRecords',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'resource',
          ),
           'phpDoc' => NULL,
           'type' => 'string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getHeaderActions',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\AdminResource.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\AdminResource',
       'phpDoc' => NULL,
       'abstract' => true,
       'final' => false,
       'extends' => 'Filament\\Resources\\Resource',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'viewPermission',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'managePermission',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'canViewAny',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'canCreate',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'canEdit',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'record',
               'type' => 'Illuminate\\Database\\Eloquent\\Model',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'canDelete',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'record',
               'type' => 'Illuminate\\Database\\Eloquent\\Model',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'canDeleteAny',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'canManage',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\AdminUserResource.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\AdminUserResource',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Filament\\Resources\\AdminResource',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'viewPermission',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'managePermission',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'model',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'modelLabel',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'pluralModelLabel',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getEloquentQuery',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'form',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'Filament\\Schemas\\Schema',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'schema',
               'type' => 'Filament\\Schemas\\Schema',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'table',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'Filament\\Tables\\Table',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'table',
               'type' => 'Filament\\Tables\\Table',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        8 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getPages',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\AdminUserResource\\Pages\\CreateAdminUser.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\AdminUserResource\\Pages\\CreateAdminUser',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Filament\\Resources\\Pages\\CreateRecord',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'resource',
          ),
           'phpDoc' => NULL,
           'type' => 'string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'afterCreate',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\AdminUserResource\\Pages\\EditAdminUser.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\AdminUserResource\\Pages\\EditAdminUser',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Filament\\Resources\\Pages\\EditRecord',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'resource',
          ),
           'phpDoc' => NULL,
           'type' => 'string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'mutateFormDataBeforeSave',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/** @param array<string, mixed> $data */',
             'namespace' => 'App\\Filament\\Resources\\AdminUserResource\\Pages',
             'uses' => 
            array (
              'adminuserresource' => 'App\\Filament\\Resources\\AdminUserResource',
              'user' => 'App\\Models\\User',
              'editrecord' => 'Filament\\Resources\\Pages\\EditRecord',
              'validationexception' => 'Illuminate\\Validation\\ValidationException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'data',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'afterSave',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\AdminUserResource\\Pages\\ListAdminUsers.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\AdminUserResource\\Pages\\ListAdminUsers',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Filament\\Resources\\Pages\\ListRecords',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'resource',
          ),
           'phpDoc' => NULL,
           'type' => 'string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getHeaderActions',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\BannerResource.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\BannerResource',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Filament\\Resources\\AdminResource',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'viewPermission',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'managePermission',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'model',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'modelLabel',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'pluralModelLabel',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'form',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'Filament\\Schemas\\Schema',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 's',
               'type' => 'Filament\\Schemas\\Schema',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'table',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'Filament\\Tables\\Table',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 't',
               'type' => 'Filament\\Tables\\Table',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getPages',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\BannerResource\\Pages\\CreateBanner.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\BannerResource\\Pages\\CreateBanner',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Filament\\Resources\\Pages\\CreateRecord',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'resource',
          ),
           'phpDoc' => NULL,
           'type' => 'string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\BannerResource\\Pages\\EditBanner.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\BannerResource\\Pages\\EditBanner',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Filament\\Resources\\Pages\\EditRecord',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'resource',
          ),
           'phpDoc' => NULL,
           'type' => 'string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\BannerResource\\Pages\\ListBanners.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\BannerResource\\Pages\\ListBanners',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Filament\\Resources\\Pages\\ListRecords',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'resource',
          ),
           'phpDoc' => NULL,
           'type' => 'string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getHeaderActions',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\BusinessSettingResource.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\BusinessSettingResource',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Filament\\Resources\\AdminResource',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'viewPermission',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'managePermission',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'model',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'modelLabel',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'pluralModelLabel',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'form',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'Filament\\Schemas\\Schema',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'schema',
               'type' => 'Filament\\Schemas\\Schema',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'table',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'Filament\\Tables\\Table',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'table',
               'type' => 'Filament\\Tables\\Table',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getPages',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\BusinessSettingResource\\Pages\\CreateBusinessSetting.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\BusinessSettingResource\\Pages\\CreateBusinessSetting',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Filament\\Resources\\Pages\\CreateRecord',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'resource',
          ),
           'phpDoc' => NULL,
           'type' => 'string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\BusinessSettingResource\\Pages\\EditBusinessSetting.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\BusinessSettingResource\\Pages\\EditBusinessSetting',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Filament\\Resources\\Pages\\EditRecord',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'resource',
          ),
           'phpDoc' => NULL,
           'type' => 'string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\BusinessSettingResource\\Pages\\ListBusinessSettings.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\BusinessSettingResource\\Pages\\ListBusinessSettings',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Filament\\Resources\\Pages\\ListRecords',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'resource',
          ),
           'phpDoc' => NULL,
           'type' => 'string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getHeaderActions',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CategoryResource.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\CategoryResource',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Filament\\Resources\\AdminResource',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'viewPermission',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'managePermission',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'model',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'modelLabel',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'pluralModelLabel',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'form',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'Filament\\Schemas\\Schema',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'schema',
               'type' => 'Filament\\Schemas\\Schema',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'table',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'Filament\\Tables\\Table',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'table',
               'type' => 'Filament\\Tables\\Table',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getPages',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CategoryResource\\Pages\\CreateCategory.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\CategoryResource\\Pages\\CreateCategory',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Filament\\Resources\\Pages\\CreateRecord',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'resource',
          ),
           'phpDoc' => NULL,
           'type' => 'string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CategoryResource\\Pages\\EditCategory.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\CategoryResource\\Pages\\EditCategory',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Filament\\Resources\\Pages\\EditRecord',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'resource',
          ),
           'phpDoc' => NULL,
           'type' => 'string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CategoryResource\\Pages\\ListCategories.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\CategoryResource\\Pages\\ListCategories',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Filament\\Resources\\Pages\\ListRecords',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'resource',
          ),
           'phpDoc' => NULL,
           'type' => 'string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getHeaderActions',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ContactRequestResource.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\ContactRequestResource',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Filament\\Resources\\AdminResource',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'viewPermission',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'managePermission',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'model',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'modelLabel',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'pluralModelLabel',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'form',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'Filament\\Schemas\\Schema',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'schema',
               'type' => 'Filament\\Schemas\\Schema',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'table',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'Filament\\Tables\\Table',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'table',
               'type' => 'Filament\\Tables\\Table',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getPages',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ContactRequestResource\\Pages\\EditContactRequest.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\ContactRequestResource\\Pages\\EditContactRequest',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Filament\\Resources\\Pages\\EditRecord',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'resource',
          ),
           'phpDoc' => NULL,
           'type' => 'string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ContactRequestResource\\Pages\\ListContactRequests.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\ContactRequestResource\\Pages\\ListContactRequests',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Filament\\Resources\\Pages\\ListRecords',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'resource',
          ),
           'phpDoc' => NULL,
           'type' => 'string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CouponResource.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\CouponResource',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Filament\\Resources\\AdminResource',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'viewPermission',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'managePermission',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'model',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'modelLabel',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'pluralModelLabel',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'form',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'Filament\\Schemas\\Schema',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 's',
               'type' => 'Filament\\Schemas\\Schema',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'table',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'Filament\\Tables\\Table',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 't',
               'type' => 'Filament\\Tables\\Table',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getPages',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CouponResource\\Pages\\CreateCoupon.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\CouponResource\\Pages\\CreateCoupon',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Filament\\Resources\\Pages\\CreateRecord',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'resource',
          ),
           'phpDoc' => NULL,
           'type' => 'string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CouponResource\\Pages\\EditCoupon.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\CouponResource\\Pages\\EditCoupon',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Filament\\Resources\\Pages\\EditRecord',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'resource',
          ),
           'phpDoc' => NULL,
           'type' => 'string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CouponResource\\Pages\\ListCoupons.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\CouponResource\\Pages\\ListCoupons',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Filament\\Resources\\Pages\\ListRecords',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'resource',
          ),
           'phpDoc' => NULL,
           'type' => 'string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getHeaderActions',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CustomerResource.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\CustomerResource',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Filament\\Resources\\AdminResource',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'viewPermission',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'managePermission',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'model',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'modelLabel',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'pluralModelLabel',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getEloquentQuery',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'form',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'Filament\\Schemas\\Schema',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'schema',
               'type' => 'Filament\\Schemas\\Schema',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'table',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'Filament\\Tables\\Table',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'table',
               'type' => 'Filament\\Tables\\Table',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        8 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'canCreate',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        9 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getPages',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CustomerResource\\Pages\\EditCustomer.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\CustomerResource\\Pages\\EditCustomer',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Filament\\Resources\\Pages\\EditRecord',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'resource',
          ),
           'phpDoc' => NULL,
           'type' => 'string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\CustomerResource\\Pages\\ListCustomers.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\CustomerResource\\Pages\\ListCustomers',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Filament\\Resources\\Pages\\ListRecords',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'resource',
          ),
           'phpDoc' => NULL,
           'type' => 'string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\DeliveryRateResource.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\DeliveryRateResource',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Filament\\Resources\\AdminResource',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'viewPermission',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'managePermission',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'model',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'modelLabel',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'pluralModelLabel',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'form',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'Filament\\Schemas\\Schema',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'schema',
               'type' => 'Filament\\Schemas\\Schema',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'table',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'Filament\\Tables\\Table',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'table',
               'type' => 'Filament\\Tables\\Table',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getPages',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\DeliveryRateResource\\Pages\\CreateDeliveryRate.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\DeliveryRateResource\\Pages\\CreateDeliveryRate',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Filament\\Resources\\Pages\\CreateRecord',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'resource',
          ),
           'phpDoc' => NULL,
           'type' => 'string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\DeliveryRateResource\\Pages\\EditDeliveryRate.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\DeliveryRateResource\\Pages\\EditDeliveryRate',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Filament\\Resources\\Pages\\EditRecord',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'resource',
          ),
           'phpDoc' => NULL,
           'type' => 'string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getHeaderActions',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\DeliveryRateResource\\Pages\\ListDeliveryRates.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\DeliveryRateResource\\Pages\\ListDeliveryRates',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Filament\\Resources\\Pages\\ListRecords',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'resource',
          ),
           'phpDoc' => NULL,
           'type' => 'string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getHeaderActions',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\DeliveryZoneResource.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\DeliveryZoneResource',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Filament\\Resources\\AdminResource',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'viewPermission',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'managePermission',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'model',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'modelLabel',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'pluralModelLabel',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'form',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'Filament\\Schemas\\Schema',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 's',
               'type' => 'Filament\\Schemas\\Schema',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'table',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'Filament\\Tables\\Table',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 't',
               'type' => 'Filament\\Tables\\Table',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getPages',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\DeliveryZoneResource\\Pages\\CreateDeliveryZone.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\DeliveryZoneResource\\Pages\\CreateDeliveryZone',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Filament\\Resources\\Pages\\CreateRecord',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'resource',
          ),
           'phpDoc' => NULL,
           'type' => 'string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\DeliveryZoneResource\\Pages\\EditDeliveryZone.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\DeliveryZoneResource\\Pages\\EditDeliveryZone',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Filament\\Resources\\Pages\\EditRecord',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'resource',
          ),
           'phpDoc' => NULL,
           'type' => 'string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\DeliveryZoneResource\\Pages\\ListDeliveryZones.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\DeliveryZoneResource\\Pages\\ListDeliveryZones',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Filament\\Resources\\Pages\\ListRecords',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'resource',
          ),
           'phpDoc' => NULL,
           'type' => 'string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getHeaderActions',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\FaqResource.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\FaqResource',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Filament\\Resources\\AdminResource',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'viewPermission',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'managePermission',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'model',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'modelLabel',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'pluralModelLabel',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'form',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'Filament\\Schemas\\Schema',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'schema',
               'type' => 'Filament\\Schemas\\Schema',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'table',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'Filament\\Tables\\Table',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'table',
               'type' => 'Filament\\Tables\\Table',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getPages',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\FaqResource\\Pages\\CreateFaq.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\FaqResource\\Pages\\CreateFaq',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Filament\\Resources\\Pages\\CreateRecord',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'resource',
          ),
           'phpDoc' => NULL,
           'type' => 'string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\FaqResource\\Pages\\EditFaq.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\FaqResource\\Pages\\EditFaq',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Filament\\Resources\\Pages\\EditRecord',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'resource',
          ),
           'phpDoc' => NULL,
           'type' => 'string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getHeaderActions',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\FaqResource\\Pages\\ListFaqs.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\FaqResource\\Pages\\ListFaqs',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Filament\\Resources\\Pages\\ListRecords',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'resource',
          ),
           'phpDoc' => NULL,
           'type' => 'string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getHeaderActions',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\InventoryMovementResource.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\InventoryMovementResource',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Filament\\Resources\\AdminResource',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'viewPermission',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'managePermission',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'model',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'modelLabel',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'pluralModelLabel',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'form',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'Filament\\Schemas\\Schema',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'schema',
               'type' => 'Filament\\Schemas\\Schema',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'table',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'Filament\\Tables\\Table',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'table',
               'type' => 'Filament\\Tables\\Table',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'canCreate',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        8 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getPages',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\InventoryMovementResource\\Pages\\ListInventoryMovements.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\InventoryMovementResource\\Pages\\ListInventoryMovements',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Filament\\Resources\\Pages\\ListRecords',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'resource',
          ),
           'phpDoc' => NULL,
           'type' => 'string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\OrderResource.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\OrderResource',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Filament\\Resources\\AdminResource',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'viewPermission',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'managePermission',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'model',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'modelLabel',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'pluralModelLabel',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'form',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'Filament\\Schemas\\Schema',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'schema',
               'type' => 'Filament\\Schemas\\Schema',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'table',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'Filament\\Tables\\Table',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'table',
               'type' => 'Filament\\Tables\\Table',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'canCreate',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        8 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getPages',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\OrderResource\\Pages\\EditOrder.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\OrderResource\\Pages\\EditOrder',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Filament\\Resources\\Pages\\EditRecord',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'resource',
          ),
           'phpDoc' => NULL,
           'type' => 'string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'handleRecordUpdate',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/** @param array<string, mixed> $data */',
             'namespace' => 'App\\Filament\\Resources\\OrderResource\\Pages',
             'uses' => 
            array (
              'orderresource' => 'App\\Filament\\Resources\\OrderResource',
              'order' => 'App\\Models\\Order',
              'orderstatus' => 'App\\Models\\OrderStatus',
              'orderstatusservice' => 'App\\Services\\OrderStatusService',
              'editrecord' => 'Filament\\Resources\\Pages\\EditRecord',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'auth' => 'Illuminate\\Support\\Facades\\Auth',
              'logicexception' => 'LogicException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Model',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'record',
               'type' => 'Illuminate\\Database\\Eloquent\\Model',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'data',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\OrderResource\\Pages\\ListOrders.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\OrderResource\\Pages\\ListOrders',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Filament\\Resources\\Pages\\ListRecords',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'resource',
          ),
           'phpDoc' => NULL,
           'type' => 'string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PaymentMethodResource.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\PaymentMethodResource',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Filament\\Resources\\AdminResource',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'viewPermission',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'managePermission',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'model',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'modelLabel',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'pluralModelLabel',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'form',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'Filament\\Schemas\\Schema',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 's',
               'type' => 'Filament\\Schemas\\Schema',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'table',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'Filament\\Tables\\Table',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 't',
               'type' => 'Filament\\Tables\\Table',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getPages',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PaymentMethodResource\\Pages\\EditPaymentMethod.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\PaymentMethodResource\\Pages\\EditPaymentMethod',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Filament\\Resources\\Pages\\EditRecord',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'resource',
          ),
           'phpDoc' => NULL,
           'type' => 'string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PaymentMethodResource\\Pages\\ListPaymentMethods.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\PaymentMethodResource\\Pages\\ListPaymentMethods',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Filament\\Resources\\Pages\\ListRecords',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'resource',
          ),
           'phpDoc' => NULL,
           'type' => 'string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PermissionResource.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\PermissionResource',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Filament\\Resources\\AdminResource',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'viewPermission',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'managePermission',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'model',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'modelLabel',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'pluralModelLabel',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'form',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'Filament\\Schemas\\Schema',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'schema',
               'type' => 'Filament\\Schemas\\Schema',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'table',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'Filament\\Tables\\Table',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'table',
               'type' => 'Filament\\Tables\\Table',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getPages',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PermissionResource\\Pages\\CreatePermission.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\PermissionResource\\Pages\\CreatePermission',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Filament\\Resources\\Pages\\CreateRecord',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'resource',
          ),
           'phpDoc' => NULL,
           'type' => 'string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PermissionResource\\Pages\\EditPermission.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\PermissionResource\\Pages\\EditPermission',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Filament\\Resources\\Pages\\EditRecord',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'resource',
          ),
           'phpDoc' => NULL,
           'type' => 'string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PermissionResource\\Pages\\ListPermissions.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\PermissionResource\\Pages\\ListPermissions',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Filament\\Resources\\Pages\\ListRecords',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'resource',
          ),
           'phpDoc' => NULL,
           'type' => 'string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getHeaderActions',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductImageResource.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\ProductImageResource',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Filament\\Resources\\AdminResource',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'viewPermission',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'managePermission',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'model',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'modelLabel',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'pluralModelLabel',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'form',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'Filament\\Schemas\\Schema',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'schema',
               'type' => 'Filament\\Schemas\\Schema',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'table',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'Filament\\Tables\\Table',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'table',
               'type' => 'Filament\\Tables\\Table',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getPages',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductImageResource\\Pages\\CreateProductImage.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\ProductImageResource\\Pages\\CreateProductImage',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Filament\\Resources\\Pages\\CreateRecord',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'resource',
          ),
           'phpDoc' => NULL,
           'type' => 'string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductImageResource\\Pages\\EditProductImage.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\ProductImageResource\\Pages\\EditProductImage',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Filament\\Resources\\Pages\\EditRecord',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'resource',
          ),
           'phpDoc' => NULL,
           'type' => 'string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductImageResource\\Pages\\ListProductImages.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\ProductImageResource\\Pages\\ListProductImages',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Filament\\Resources\\Pages\\ListRecords',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'resource',
          ),
           'phpDoc' => NULL,
           'type' => 'string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getHeaderActions',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductResource.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\ProductResource',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Filament\\Resources\\AdminResource',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'viewPermission',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'managePermission',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'model',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'modelLabel',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'pluralModelLabel',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'form',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'Filament\\Schemas\\Schema',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 's',
               'type' => 'Filament\\Schemas\\Schema',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'table',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'Filament\\Tables\\Table',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 't',
               'type' => 'Filament\\Tables\\Table',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getPages',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductResource\\Pages\\CreateProduct.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\ProductResource\\Pages\\CreateProduct',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Filament\\Resources\\Pages\\CreateRecord',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'resource',
          ),
           'phpDoc' => NULL,
           'type' => 'string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductResource\\Pages\\EditProduct.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\ProductResource\\Pages\\EditProduct',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Filament\\Resources\\Pages\\EditRecord',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'resource',
          ),
           'phpDoc' => NULL,
           'type' => 'string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductResource\\Pages\\ListProducts.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\ProductResource\\Pages\\ListProducts',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Filament\\Resources\\Pages\\ListRecords',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'resource',
          ),
           'phpDoc' => NULL,
           'type' => 'string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getHeaderActions',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductVariantResource.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\ProductVariantResource',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Filament\\Resources\\AdminResource',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'viewPermission',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'managePermission',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'model',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'modelLabel',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'pluralModelLabel',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'form',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'Filament\\Schemas\\Schema',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'schema',
               'type' => 'Filament\\Schemas\\Schema',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'table',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'Filament\\Tables\\Table',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'table',
               'type' => 'Filament\\Tables\\Table',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getPages',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductVariantResource\\Pages\\CreateProductVariant.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\ProductVariantResource\\Pages\\CreateProductVariant',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Filament\\Resources\\Pages\\CreateRecord',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'resource',
          ),
           'phpDoc' => NULL,
           'type' => 'string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductVariantResource\\Pages\\EditProductVariant.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\ProductVariantResource\\Pages\\EditProductVariant',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Filament\\Resources\\Pages\\EditRecord',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'resource',
          ),
           'phpDoc' => NULL,
           'type' => 'string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'handleRecordUpdate',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/** @param array<string, mixed> $data */',
             'namespace' => 'App\\Filament\\Resources\\ProductVariantResource\\Pages',
             'uses' => 
            array (
              'productvariantresource' => 'App\\Filament\\Resources\\ProductVariantResource',
              'inventorymovement' => 'App\\Models\\InventoryMovement',
              'productvariant' => 'App\\Models\\ProductVariant',
              'editrecord' => 'Filament\\Resources\\Pages\\EditRecord',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'auth' => 'Illuminate\\Support\\Facades\\Auth',
              'db' => 'Illuminate\\Support\\Facades\\DB',
              'validationexception' => 'Illuminate\\Validation\\ValidationException',
              'logicexception' => 'LogicException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Model',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'record',
               'type' => 'Illuminate\\Database\\Eloquent\\Model',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'data',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\ProductVariantResource\\Pages\\ListProductVariants.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\ProductVariantResource\\Pages\\ListProductVariants',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Filament\\Resources\\Pages\\ListRecords',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'resource',
          ),
           'phpDoc' => NULL,
           'type' => 'string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getHeaderActions',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PushCampaignResource.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\PushCampaignResource',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Filament\\Resources\\AdminResource',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'viewPermission',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'managePermission',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'model',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'modelLabel',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'pluralModelLabel',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'form',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'Filament\\Schemas\\Schema',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'schema',
               'type' => 'Filament\\Schemas\\Schema',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'table',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'Filament\\Tables\\Table',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'table',
               'type' => 'Filament\\Tables\\Table',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getPages',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PushCampaignResource\\Pages\\CreatePushCampaign.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\PushCampaignResource\\Pages\\CreatePushCampaign',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Filament\\Resources\\Pages\\CreateRecord',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'resource',
          ),
           'phpDoc' => NULL,
           'type' => 'string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PushCampaignResource\\Pages\\EditPushCampaign.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\PushCampaignResource\\Pages\\EditPushCampaign',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Filament\\Resources\\Pages\\EditRecord',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'resource',
          ),
           'phpDoc' => NULL,
           'type' => 'string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\PushCampaignResource\\Pages\\ListPushCampaigns.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\PushCampaignResource\\Pages\\ListPushCampaigns',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Filament\\Resources\\Pages\\ListRecords',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'resource',
          ),
           'phpDoc' => NULL,
           'type' => 'string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getHeaderActions',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\RoleResource.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\RoleResource',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Filament\\Resources\\AdminResource',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'viewPermission',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'managePermission',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'model',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'modelLabel',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'pluralModelLabel',
          ),
           'phpDoc' => NULL,
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'form',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'Filament\\Schemas\\Schema',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'schema',
               'type' => 'Filament\\Schemas\\Schema',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'table',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'Filament\\Tables\\Table',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'table',
               'type' => 'Filament\\Tables\\Table',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getPages',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\RoleResource\\Pages\\CreateRole.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\RoleResource\\Pages\\CreateRole',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Filament\\Resources\\Pages\\CreateRecord',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'resource',
          ),
           'phpDoc' => NULL,
           'type' => 'string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\RoleResource\\Pages\\EditRole.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\RoleResource\\Pages\\EditRole',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Filament\\Resources\\Pages\\EditRecord',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'resource',
          ),
           'phpDoc' => NULL,
           'type' => 'string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Resources\\RoleResource\\Pages\\ListRoles.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Resources\\RoleResource\\Pages\\ListRoles',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Filament\\Resources\\Pages\\ListRecords',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'resource',
          ),
           'phpDoc' => NULL,
           'type' => 'string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getHeaderActions',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Filament\\Widgets\\CommerceOverview.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Filament\\Widgets\\CommerceOverview',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Filament\\Widgets\\StatsOverviewWidget',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getStats',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\AccountAddressController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\AccountAddressController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'index',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\View\\View',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'store',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'App\\Http\\Requests\\AddressRequest',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'edit',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\View\\View',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'address',
               'type' => 'App\\Models\\Address',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'update',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'App\\Http\\Requests\\AddressRequest',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'address',
               'type' => 'App\\Models\\Address',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'destroy',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'address',
               'type' => 'App\\Models\\Address',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\AccountOrderController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\AccountOrderController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'index',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\View\\View',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'show',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\View\\View',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'order',
               'type' => 'App\\Models\\Order',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\Api\\V1\\AddressController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Api\\V1\\AddressController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'index',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\Resources\\Json\\AnonymousResourceCollection',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'store',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\JsonResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'App\\Http\\Requests\\AddressRequest',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'update',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'App\\Http\\Resources\\AddressResource',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'App\\Http\\Requests\\AddressRequest',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'address',
               'type' => 'App\\Models\\Address',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'destroy',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\JsonResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'address',
               'type' => 'App\\Models\\Address',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'makeDefault',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'App\\Http\\Resources\\AddressResource',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'address',
               'type' => 'App\\Models\\Address',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\Api\\V1\\AuthController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Api\\V1\\AuthController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'register',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\JsonResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'r',
               'type' => 'App\\Http\\Requests\\Auth\\RegisterRequest',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'login',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\JsonResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'r',
               'type' => 'App\\Http\\Requests\\Auth\\LoginRequest',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'logout',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\JsonResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'r',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\Api\\V1\\CheckoutController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Api\\V1\\CheckoutController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__invoke',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'App\\Http\\Resources\\OrderResource',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'r',
               'type' => 'App\\Http\\Requests\\CheckoutRequest',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'service',
               'type' => 'App\\Services\\CheckoutService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\Api\\V1\\CheckoutQuoteController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Api\\V1\\CheckoutQuoteController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__invoke',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\JsonResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'App\\Http\\Requests\\CheckoutQuoteRequest',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'quotes',
               'type' => 'App\\Services\\CheckoutQuoteService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\Api\\V1\\CommerceOptionsController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Api\\V1\\CommerceOptionsController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__invoke',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\JsonResponse',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\Api\\V1\\ProductController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Api\\V1\\ProductController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'index',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\Resources\\Json\\AnonymousResourceCollection',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'show',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'App\\Http\\Resources\\ProductResource',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'slug',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\Api\\V1\\PushDeviceController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Api\\V1\\PushDeviceController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'store',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\JsonResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'App\\Http\\Requests\\PushDeviceRequest',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'destroy',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\JsonResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\CatalogController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\CatalogController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'index',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\View\\View',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'category',
               'type' => '?App\\Models\\Category',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\ContactController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\ContactController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'store',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'App\\Http\\Requests\\ContactRequest',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\Controller.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Controller',
       'phpDoc' => NULL,
       'abstract' => true,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\GoogleAuthController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\GoogleAuthController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'redirect',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Symfony\\Component\\HttpFoundation\\RedirectResponse|Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'callback',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\PasswordResetController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\PasswordResetController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'request',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\View\\View',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'email',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'reset',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\View\\View',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'token',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'update',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\StorefrontAuthController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\StorefrontAuthController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'showLogin',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\View\\View',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'login',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'showRegister',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\View\\View',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'register',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'logout',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\StorefrontCartController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\StorefrontCartController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'index',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\View\\View',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'store',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'App\\Http\\Requests\\AddCartItemRequest',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'update',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'App\\Http\\Requests\\UpdateCartItemRequest',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'variant',
               'type' => 'App\\Models\\ProductVariant',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'destroy',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'variant',
               'type' => 'App\\Models\\ProductVariant',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\StorefrontCheckoutController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\StorefrontCheckoutController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'index',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\View\\View|Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'store',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'App\\Http\\Requests\\StorefrontCheckoutRequest',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'checkout',
               'type' => 'App\\Services\\CheckoutService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'quote',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\JsonResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'quotes',
               'type' => 'App\\Services\\CheckoutQuoteService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Controllers\\WhatsAppWebhookController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\WhatsAppWebhookController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'verify',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\Response',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'handle',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\Response',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Middleware\\SecurityHeaders.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Middleware\\SecurityHeaders',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'handle',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Symfony\\Component\\HttpFoundation\\Response',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'next',
               'type' => 'Closure',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Requests\\AddCartItemRequest.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Requests\\AddCartItemRequest',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Foundation\\Http\\FormRequest',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'authorize',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'rules',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/** @return array<string, array<int, string>> */',
             'namespace' => 'App\\Http\\Requests',
             'uses' => 
            array (
              'formrequest' => 'Illuminate\\Foundation\\Http\\FormRequest',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Requests\\AddressRequest.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Requests\\AddressRequest',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Foundation\\Http\\FormRequest',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'authorize',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'rules',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/** @return array<string, array<int, string>> */',
             'namespace' => 'App\\Http\\Requests',
             'uses' => 
            array (
              'address' => 'App\\Models\\Address',
              'formrequest' => 'Illuminate\\Foundation\\Http\\FormRequest',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Requests\\Auth\\LoginRequest.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Requests\\Auth\\LoginRequest',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Foundation\\Http\\FormRequest',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'authorize',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'rules',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/** @return array<string, array<int, string>> */',
             'namespace' => 'App\\Http\\Requests\\Auth',
             'uses' => 
            array (
              'formrequest' => 'Illuminate\\Foundation\\Http\\FormRequest',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Requests\\Auth\\RegisterRequest.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Requests\\Auth\\RegisterRequest',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Foundation\\Http\\FormRequest',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'authorize',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'rules',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/** @return array<string, array<int, string>> */',
             'namespace' => 'App\\Http\\Requests\\Auth',
             'uses' => 
            array (
              'formrequest' => 'Illuminate\\Foundation\\Http\\FormRequest',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Requests\\CheckoutQuoteRequest.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Requests\\CheckoutQuoteRequest',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Foundation\\Http\\FormRequest',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'authorize',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'rules',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/** @return array<string, array<int, string>> */',
             'namespace' => 'App\\Http\\Requests',
             'uses' => 
            array (
              'formrequest' => 'Illuminate\\Foundation\\Http\\FormRequest',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Requests\\CheckoutRequest.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Requests\\CheckoutRequest',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Foundation\\Http\\FormRequest',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'authorize',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'rules',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/** @return array<string, array<int, string>> */',
             'namespace' => 'App\\Http\\Requests',
             'uses' => 
            array (
              'paymentmethod' => 'App\\Models\\PaymentMethod',
              'formrequest' => 'Illuminate\\Foundation\\Http\\FormRequest',
              'rule' => 'Illuminate\\Validation\\Rule',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'messages',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/** @return array<string, string> */',
             'namespace' => 'App\\Http\\Requests',
             'uses' => 
            array (
              'paymentmethod' => 'App\\Models\\PaymentMethod',
              'formrequest' => 'Illuminate\\Foundation\\Http\\FormRequest',
              'rule' => 'Illuminate\\Validation\\Rule',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Requests\\ContactRequest.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Requests\\ContactRequest',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Foundation\\Http\\FormRequest',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'authorize',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'rules',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/** @return array<string, array<int, string>> */',
             'namespace' => 'App\\Http\\Requests',
             'uses' => 
            array (
              'formrequest' => 'Illuminate\\Foundation\\Http\\FormRequest',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Requests\\PushDeviceRequest.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Requests\\PushDeviceRequest',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Foundation\\Http\\FormRequest',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'authorize',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'rules',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/** @return array<string, array<int, mixed>> */',
             'namespace' => 'App\\Http\\Requests',
             'uses' => 
            array (
              'formrequest' => 'Illuminate\\Foundation\\Http\\FormRequest',
              'rule' => 'Illuminate\\Validation\\Rule',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Requests\\StorefrontCheckoutRequest.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Requests\\StorefrontCheckoutRequest',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Foundation\\Http\\FormRequest',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'authorize',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'rules',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/** @return array<string, array<int, string>> */',
             'namespace' => 'App\\Http\\Requests',
             'uses' => 
            array (
              'paymentmethod' => 'App\\Models\\PaymentMethod',
              'formrequest' => 'Illuminate\\Foundation\\Http\\FormRequest',
              'rule' => 'Illuminate\\Validation\\Rule',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'messages',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/** @return array<string, string> */',
             'namespace' => 'App\\Http\\Requests',
             'uses' => 
            array (
              'paymentmethod' => 'App\\Models\\PaymentMethod',
              'formrequest' => 'Illuminate\\Foundation\\Http\\FormRequest',
              'rule' => 'Illuminate\\Validation\\Rule',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Requests\\UpdateCartItemRequest.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Requests\\UpdateCartItemRequest',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Foundation\\Http\\FormRequest',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'authorize',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'rules',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/** @return array<string, array<int, string>> */',
             'namespace' => 'App\\Http\\Requests',
             'uses' => 
            array (
              'formrequest' => 'Illuminate\\Foundation\\Http\\FormRequest',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Resources\\AddressResource.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Resources\\AddressResource',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/** @mixin Address */',
         'namespace' => 'App\\Http\\Resources',
         'uses' => 
        array (
          'address' => 'App\\Models\\Address',
          'request' => 'Illuminate\\Http\\Request',
          'jsonresource' => 'Illuminate\\Http\\Resources\\Json\\JsonResource',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Http\\Resources\\Json\\JsonResource',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'toArray',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/** @return array<string, mixed> */',
             'namespace' => 'App\\Http\\Resources',
             'uses' => 
            array (
              'address' => 'App\\Models\\Address',
              'request' => 'Illuminate\\Http\\Request',
              'jsonresource' => 'Illuminate\\Http\\Resources\\Json\\JsonResource',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Resources\\OrderResource.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Resources\\OrderResource',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/** @mixin Order */',
         'namespace' => 'App\\Http\\Resources',
         'uses' => 
        array (
          'order' => 'App\\Models\\Order',
          'request' => 'Illuminate\\Http\\Request',
          'jsonresource' => 'Illuminate\\Http\\Resources\\Json\\JsonResource',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Http\\Resources\\Json\\JsonResource',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'toArray',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/** @return array<string, mixed> */',
             'namespace' => 'App\\Http\\Resources',
             'uses' => 
            array (
              'order' => 'App\\Models\\Order',
              'request' => 'Illuminate\\Http\\Request',
              'jsonresource' => 'Illuminate\\Http\\Resources\\Json\\JsonResource',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Http\\Resources\\ProductResource.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Resources\\ProductResource',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/** @mixin Product */',
         'namespace' => 'App\\Http\\Resources',
         'uses' => 
        array (
          'product' => 'App\\Models\\Product',
          'productvariant' => 'App\\Models\\ProductVariant',
          'request' => 'Illuminate\\Http\\Request',
          'jsonresource' => 'Illuminate\\Http\\Resources\\Json\\JsonResource',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Http\\Resources\\Json\\JsonResource',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'toArray',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/** @return array<string, mixed> */',
             'namespace' => 'App\\Http\\Resources',
             'uses' => 
            array (
              'product' => 'App\\Models\\Product',
              'productvariant' => 'App\\Models\\ProductVariant',
              'request' => 'Illuminate\\Http\\Request',
              'jsonresource' => 'Illuminate\\Http\\Resources\\Json\\JsonResource',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Jobs\\SendOrderCustomerNotifications.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Jobs\\SendOrderCustomerNotifications',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
        0 => 'Illuminate\\Contracts\\Queue\\ShouldQueue',
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Foundation\\Queue\\Queueable',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'tries',
          ),
           'phpDoc' => NULL,
           'type' => 'int',
           'public' => true,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'orderId',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 1,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'event',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 1,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'handle',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'whatsApp',
               'type' => 'App\\Services\\Messaging\\WhatsAppCloudOrderNotifier',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'push',
               'type' => 'App\\Services\\Messaging\\FcmPushSender',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Jobs\\SendPushCampaign.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Jobs\\SendPushCampaign',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
        0 => 'Illuminate\\Contracts\\Queue\\ShouldQueue',
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Foundation\\Queue\\Queueable',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'campaignId',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 1,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'handle',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'push',
               'type' => 'App\\Services\\Messaging\\FcmPushSender',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Jobs\\SendTelegramOrderNotification.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Jobs\\SendTelegramOrderNotification',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
        0 => 'Illuminate\\Contracts\\Queue\\ShouldQueue',
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Foundation\\Queue\\Queueable',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'tries',
          ),
           'phpDoc' => NULL,
           'type' => 'int',
           'public' => true,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'backoff',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/** @var array<int, int> */',
             'namespace' => 'App\\Jobs',
             'uses' => 
            array (
              'order' => 'App\\Models\\Order',
              'shouldqueue' => 'Illuminate\\Contracts\\Queue\\ShouldQueue',
              'queueable' => 'Illuminate\\Foundation\\Queue\\Queueable',
              'http' => 'Illuminate\\Support\\Facades\\Http',
              'log' => 'Illuminate\\Support\\Facades\\Log',
              'throwable' => 'Throwable',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => 'array',
           'public' => true,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'orderId',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 1,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'handle',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'failed',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'exception',
               'type' => '?Throwable',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\Address.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\Address',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @property int $id
 * @property int $user_id
 * @property string $label
 * @property string $recipient_name
 * @property string $phone
 * @property string $line_one
 * @property string|null $line_two
 * @property string $district
 * @property string $province
 * @property string $department
 * @property string|null $reference
 * @property bool $is_default
 */',
         'namespace' => 'App\\Models',
         'uses' => 
        array (
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'guarded',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'casts',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'user',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/** @return BelongsTo<User, $this> */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\Banner.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\Banner',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'guarded',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\BusinessSetting.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\BusinessSetting',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'guarded',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getValue',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'mixed',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'key',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'default',
               'type' => '?mixed',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'casts',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\Cart.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\Cart',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'guarded',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'items',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/** @return HasMany<CartItem, $this> */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\CartItem.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\CartItem',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'guarded',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'variant',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/** @return BelongsTo<ProductVariant, $this> */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\Category.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\Category',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property bool $is_active
 */',
         'namespace' => 'App\\Models',
         'uses' => 
        array (
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
          'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'guarded',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'casts',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'parent',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/** @return BelongsTo<Category, $this> */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'products',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/** @return HasMany<Product, $this> */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\ContactRequest.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\ContactRequest',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'guarded',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\Coupon.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\Coupon',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @property string $code
 * @property string $type
 * @property int $value
 * @property int|null $minimum_amount
 * @property int|null $maximum_discount_amount
 * @property int|null $usage_limit
 * @property int $usage_count
 * @property bool $is_active
 * @property Carbon|null $starts_at
 * @property Carbon|null $ends_at
 */',
         'namespace' => 'App\\Models',
         'uses' => 
        array (
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
          'carbon' => 'Illuminate\\Support\\Carbon',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'guarded',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'casts',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\DeliveryRate.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\DeliveryRate',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @property int $id
 * @property int $delivery_zone_id
 * @property int $amount
 * @property int|null $free_from_amount
 * @property bool $is_active
 * @property-read DeliveryZone $deliveryZone
 */',
         'namespace' => 'App\\Models',
         'uses' => 
        array (
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'guarded',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'deliveryZone',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/** @return BelongsTo<DeliveryZone, $this> */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\DeliveryZone.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\DeliveryZone',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @property int $id
 * @property string $name
 * @property array<int, string> $districts
 * @property bool $is_active
 */',
         'namespace' => 'App\\Models',
         'uses' => 
        array (
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'guarded',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'casts',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'rates',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/** @return HasMany<DeliveryRate, $this> */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\Faq.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\Faq',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'guarded',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\InventoryMovement.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\InventoryMovement',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @property int $id
 * @property string $type
 * @property int $quantity_delta
 * @property int $balance_after
 * @property string|null $reason
 * @property Carbon $created_at
 */',
         'namespace' => 'App\\Models',
         'uses' => 
        array (
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'carbon' => 'Illuminate\\Support\\Carbon',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'guarded',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'variant',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/** @return BelongsTo<ProductVariant, $this> */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'carbon' => 'Illuminate\\Support\\Carbon',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'order',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/** @return BelongsTo<Order, $this> */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'carbon' => 'Illuminate\\Support\\Carbon',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'actor',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/** @return BelongsTo<User, $this> */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'carbon' => 'Illuminate\\Support\\Carbon',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\NotificationDelivery.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\NotificationDelivery',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'guarded',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'casts',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\Order.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\Order',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @property int $id
 * @property string $number
 * @property int|null $user_id
 * @property int $order_status_id
 * @property int $payment_method_id
 * @property string $customer_name
 * @property string $customer_email
 * @property string $customer_phone
 * @property int $subtotal_amount
 * @property int $discount_amount
 * @property int $delivery_amount
 * @property int $total_amount
 * @property string|null $coupon_code
 * @property array<string, mixed> $delivery_address
 * @property Carbon $created_at
 * @property-read OrderStatus $status
 * @property-read PaymentMethod $paymentMethod
 */',
         'namespace' => 'App\\Models',
         'uses' => 
        array (
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
          'carbon' => 'Illuminate\\Support\\Carbon',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'guarded',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'casts',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'items',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/** @return HasMany<OrderItem, $this> */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'carbon' => 'Illuminate\\Support\\Carbon',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'status',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/** @return BelongsTo<OrderStatus, $this> */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'carbon' => 'Illuminate\\Support\\Carbon',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'paymentMethod',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/** @return BelongsTo<PaymentMethod, $this> */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'carbon' => 'Illuminate\\Support\\Carbon',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'user',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/** @return BelongsTo<User, $this> */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'carbon' => 'Illuminate\\Support\\Carbon',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'statusHistories',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/** @return HasMany<OrderStatusHistory, $this> */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'carbon' => 'Illuminate\\Support\\Carbon',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\OrderItem.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\OrderItem',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @property int $id
 * @property int $order_id
 * @property int|null $product_variant_id
 * @property int $quantity
 */',
         'namespace' => 'App\\Models',
         'uses' => 
        array (
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'guarded',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\OrderStatus.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\OrderStatus',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @property int $id
 * @property string $code
 * @property string $name
 * @property bool $is_terminal
 * @property int $sort_order
 */',
         'namespace' => 'App\\Models',
         'uses' => 
        array (
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'guarded',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\OrderStatusHistory.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\OrderStatusHistory',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @property string|null $note
 * @property Carbon $created_at
 * @property-read OrderStatus $status
 */',
         'namespace' => 'App\\Models',
         'uses' => 
        array (
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'carbon' => 'Illuminate\\Support\\Carbon',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'guarded',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'status',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/** @return BelongsTo<OrderStatus, $this> */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'carbon' => 'Illuminate\\Support\\Carbon',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\PaymentMethod.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\PaymentMethod',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string|null $instructions
 * @property bool $requires_proof
 * @property bool $is_active
 */',
         'namespace' => 'App\\Models',
         'uses' => 
        array (
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'guarded',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'casts',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\Product.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\Product',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @property int $id
 * @property int|null $category_id
 * @property string $name
 * @property string $slug
 * @property string|null $short_description
 * @property string|null $description
 * @property bool $is_active
 * @property bool $is_featured
 * @property-read Category|null $category
 * @property-read Collection<int, ProductVariant> $variants
 * @property-read Collection<int, ProductImage> $images
 */',
         'namespace' => 'App\\Models',
         'uses' => 
        array (
          'collection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
          'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'guarded',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'casts',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'category',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/** @return BelongsTo<Category, $this> */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Database\\Eloquent\\Collection',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'variants',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/** @return HasMany<ProductVariant, $this> */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Database\\Eloquent\\Collection',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'images',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/** @return HasMany<ProductImage, $this> */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Database\\Eloquent\\Collection',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\ProductImage.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\ProductImage',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @property int $id
 * @property int $product_id
 * @property int|null $product_variant_id
 * @property string $path
 * @property string|null $alt_text
 * @property bool $is_primary
 * @property int $sort_order
 */',
         'namespace' => 'App\\Models',
         'uses' => 
        array (
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'guarded',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'booted',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'void',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'casts',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'product',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/** @return BelongsTo<Product, $this> */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'variant',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/** @return BelongsTo<ProductVariant, $this> */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\ProductVariant.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\ProductVariant',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @property int $id
 * @property int $product_id
 * @property string $name
 * @property string $sku
 * @property int|null $cacao_percentage
 * @property int $weight_grams
 * @property int $price_amount
 * @property int|null $cost_amount
 * @property int|null $promotional_price_amount
 * @property int $stock
 * @property int $low_stock_threshold
 * @property bool $is_active
 * @property-read Product $product
 */',
         'namespace' => 'App\\Models',
         'uses' => 
        array (
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
          'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'guarded',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'casts',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'product',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/** @return BelongsTo<Product, $this> */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'images',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/** @return HasMany<ProductImage, $this> */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'currentPriceAmount',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'int',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\PushCampaign.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\PushCampaign',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'guarded',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'casts',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\PushDevice.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\PushDevice',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'casts',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'user',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/** @return BelongsTo<User, $this> */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Models\\User.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\User',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $phone
 * @property string $password
 * @property bool $is_active
 * @property string|null $google_id
 */',
         'namespace' => 'App\\Models',
         'uses' => 
        array (
          'userfactory' => 'Database\\Factories\\UserFactory',
          'filamentuser' => 'Filament\\Models\\Contracts\\FilamentUser',
          'panel' => 'Filament\\Panel',
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
          'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
          'authenticatable' => 'Illuminate\\Foundation\\Auth\\User',
          'notifiable' => 'Illuminate\\Notifications\\Notifiable',
          'hasapitokens' => 'Laravel\\Sanctum\\HasApiTokens',
          'hasroles' => 'Spatie\\Permission\\Traits\\HasRoles',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Foundation\\Auth\\User',
       'implements' => 
      array (
        0 => 'Filament\\Models\\Contracts\\FilamentUser',
      ),
       'usedTraits' => 
      array (
        0 => 'Laravel\\Sanctum\\HasApiTokens',
        1 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
        2 => 'Spatie\\Permission\\Traits\\HasRoles',
        3 => 'Illuminate\\Notifications\\Notifiable',
        4 => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'hidden',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'casts',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'canAccessPanel',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'panel',
               'type' => 'Filament\\Panel',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'addresses',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/** @return HasMany<Address, $this> */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'userfactory' => 'Database\\Factories\\UserFactory',
              'filamentuser' => 'Filament\\Models\\Contracts\\FilamentUser',
              'panel' => 'Filament\\Panel',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
              'authenticatable' => 'Illuminate\\Foundation\\Auth\\User',
              'notifiable' => 'Illuminate\\Notifications\\Notifiable',
              'hasapitokens' => 'Laravel\\Sanctum\\HasApiTokens',
              'hasroles' => 'Spatie\\Permission\\Traits\\HasRoles',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'orders',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/** @return HasMany<Order, $this> */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'userfactory' => 'Database\\Factories\\UserFactory',
              'filamentuser' => 'Filament\\Models\\Contracts\\FilamentUser',
              'panel' => 'Filament\\Panel',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
              'authenticatable' => 'Illuminate\\Foundation\\Auth\\User',
              'notifiable' => 'Illuminate\\Notifications\\Notifiable',
              'hasapitokens' => 'Laravel\\Sanctum\\HasApiTokens',
              'hasroles' => 'Spatie\\Permission\\Traits\\HasRoles',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'pushDevices',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/** @return HasMany<PushDevice, $this> */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'userfactory' => 'Database\\Factories\\UserFactory',
              'filamentuser' => 'Filament\\Models\\Contracts\\FilamentUser',
              'panel' => 'Filament\\Panel',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
              'authenticatable' => 'Illuminate\\Foundation\\Auth\\User',
              'notifiable' => 'Illuminate\\Notifications\\Notifiable',
              'hasapitokens' => 'Laravel\\Sanctum\\HasApiTokens',
              'hasroles' => 'Spatie\\Permission\\Traits\\HasRoles',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Policies\\OrderPolicy.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Policies\\OrderPolicy',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'viewAny',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'user',
               'type' => 'App\\Models\\User',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'view',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'user',
               'type' => 'App\\Models\\User',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'order',
               'type' => 'App\\Models\\Order',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'update',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'user',
               'type' => 'App\\Models\\User',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'order',
               'type' => 'App\\Models\\Order',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Policies\\ProductPolicy.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Policies\\ProductPolicy',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'viewAny',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'user',
               'type' => 'App\\Models\\User',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'view',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'user',
               'type' => 'App\\Models\\User',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'product',
               'type' => 'App\\Models\\Product',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'create',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'user',
               'type' => 'App\\Models\\User',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'update',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'user',
               'type' => 'App\\Models\\User',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'product',
               'type' => 'App\\Models\\Product',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'delete',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'user',
               'type' => 'App\\Models\\User',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'product',
               'type' => 'App\\Models\\Product',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Providers\\AppServiceProvider.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Providers\\AppServiceProvider',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Support\\ServiceProvider',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'register',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'boot',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Providers\\Filament\\AdminPanelProvider.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Providers\\Filament\\AdminPanelProvider',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Filament\\PanelProvider',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'panel',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Filament\\Panel',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'panel',
               'type' => 'Filament\\Panel',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Services\\CheckoutQuoteService.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Services\\CheckoutQuoteService',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'couponPricing',
               'type' => 'App\\Services\\CouponPricingService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 4,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'quote',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @param  array<int, array{variant_id: int, quantity: int}>  $items
     * @return array{subtotal_amount: int, discount_amount: int, delivery_amount: int, total_amount: int, coupon_code: ?string, delivery_rate_id: int}
     */',
             'namespace' => 'App\\Services',
             'uses' => 
            array (
              'coupon' => 'App\\Models\\Coupon',
              'deliveryrate' => 'App\\Models\\DeliveryRate',
              'productvariant' => 'App\\Models\\ProductVariant',
              'str' => 'Illuminate\\Support\\Str',
              'validationexception' => 'Illuminate\\Validation\\ValidationException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'items',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'district',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'couponCode',
               'type' => '?string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Services\\CheckoutService.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Services\\CheckoutService',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'payments',
               'type' => 'App\\Contracts\\PaymentGateway',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 4,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'couponPricing',
               'type' => 'App\\Services\\CouponPricingService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 4,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'checkout',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @param  array<int, array{variant_id: int, quantity: int}>  $requestedItems
     * @param  array<string, mixed>  $address
     */',
             'namespace' => 'App\\Services',
             'uses' => 
            array (
              'paymentgateway' => 'App\\Contracts\\PaymentGateway',
              'sendordercustomernotifications' => 'App\\Jobs\\SendOrderCustomerNotifications',
              'sendtelegramordernotification' => 'App\\Jobs\\SendTelegramOrderNotification',
              'coupon' => 'App\\Models\\Coupon',
              'deliveryrate' => 'App\\Models\\DeliveryRate',
              'inventorymovement' => 'App\\Models\\InventoryMovement',
              'order' => 'App\\Models\\Order',
              'orderstatus' => 'App\\Models\\OrderStatus',
              'paymentmethod' => 'App\\Models\\PaymentMethod',
              'productvariant' => 'App\\Models\\ProductVariant',
              'user' => 'App\\Models\\User',
              'db' => 'Illuminate\\Support\\Facades\\DB',
              'str' => 'Illuminate\\Support\\Str',
              'validationexception' => 'Illuminate\\Validation\\ValidationException',
              'conflicthttpexception' => 'Symfony\\Component\\HttpKernel\\Exception\\ConflictHttpException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'App\\Models\\Order',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'user',
               'type' => 'App\\Models\\User',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'requestedItems',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'address',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            3 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'paymentMethodId',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            4 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'deliveryRateId',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            5 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'couponCode',
               'type' => '?string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            6 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'proofPath',
               'type' => '?string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            7 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'whatsAppOptIn',
               'type' => 'bool',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Services\\CouponPricingService.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Services\\CouponPricingService',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'discount',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'int',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'coupon',
               'type' => '?App\\Models\\Coupon',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'subtotal',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'couponWasRequested',
               'type' => 'bool',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Services\\Messaging\\DisabledSmsOrderNotifier.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Services\\Messaging\\DisabledSmsOrderNotifier',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
        0 => 'App\\Contracts\\SmsOrderNotifier',
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'send',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => '?string',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'order',
               'type' => 'App\\Models\\Order',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'event',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Services\\Messaging\\FcmPushSender.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Services\\Messaging\\FcmPushSender',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'send',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => '?string',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'token',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'title',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'body',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            3 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'route',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            4 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'channelId',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Services\\Messaging\\WhatsAppCloudOrderNotifier.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Services\\Messaging\\WhatsAppCloudOrderNotifier',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'send',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => '?string',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'order',
               'type' => 'App\\Models\\Order',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Services\\OrderStatusService.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Services\\OrderStatusService',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'transition',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'App\\Models\\Order',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'order',
               'type' => 'App\\Models\\Order',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'target',
               'type' => 'App\\Models\\OrderStatus',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'actor',
               'type' => '?App\\Models\\User',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            3 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'note',
               'type' => '?string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\projects\\cacao\\backend\\app\\Services\\Payments\\ManualPaymentGateway.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Services\\Payments\\ManualPaymentGateway',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
        0 => 'App\\Contracts\\PaymentGateway',
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'createPayment',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'App\\Contracts\\PaymentResult',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'order',
               'type' => 'App\\Models\\Order',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'method',
               'type' => 'App\\Models\\PaymentMethod',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'proofPath',
               'type' => '?string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
); },
];
