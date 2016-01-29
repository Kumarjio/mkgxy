<?php
// @codingStandardsIgnoreFile
// @codeCoverageIgnoreStart
// this is an autogenerated file - do not edit
spl_autoload_register(
    function($class) {
        static $classes = null;
        if ($classes === null) {
            $classes = array(
                'accessdeniedauthenticator' => '/Tests/classes/AccessDeniedAuthenticator.php',
                'accessgrantedauthenticator' => '/Tests/classes/AccessGrantedAuthenticator.php',
                'accessortest' => '/Tests/AccessorTest.php',
                'achild' => '/Tests/classes/Dependencies/AChild.php',
                'acity' => '/Tests/classes/Dependencies/ACity.php',
                'allcarproperties' => '/Tests/classes/AllCarProperties.php',
                'anotherchild' => '/Tests/classes/Dependencies/AnotherChild.php',
                'aparent' => '/Tests/classes/Dependencies/AParent.php',
                'asibling' => '/Tests/classes/Dependencies/ASibling.php',
                'author' => '/examples/mod_rewrite/Author.php',
                'availableservicestest' => '/Tests/AvailableServicesTest.php',
                'book' => '/examples/mod_rewrite/Book.php',
                'bookauthor' => '/examples/mod_rewrite/BookAuthor.php',
                'bookauthors' => '/examples/mod_rewrite/BookAuthors.php',
                'brand' => '/Tests/classes/Brand.php',
                'cachetest' => '/Tests/CacheTest.php',
                'capital' => '/Tests/classes/JSONCaching/Capital.php',
                'capitals' => '/Tests/classes/JSONCaching/Capitals.php',
                'car' => '/Tests/classes/Car.php',
                'carcollection' => '/Tests/classes/CarCollection.php',
                'carproperties' => '/Tests/classes/CarProperties.php',
                'carproperty' => '/Tests/classes/CarProperty.php',
                'carswithproperties' => '/Tests/classes/CarsWithProperties.php',
                'city' => '/Tests/classes/City.php',
                'client' => '/Tests/classes/Client.php',
                'collectiontest' => '/Tests/CollectionTest.php',
                'columnaliastest' => '/Tests/ColumnAliasTest.php',
                'configparsertest' => '/Tests/ConfigParserTest.php',
                'configparsertestjson' => '/Tests/ConfigParserTestJSON.php',
                'democities' => '/examples/cities/DemoCities.php',
                'democity' => '/examples/cities/DemoCity.php',
                'democountries' => '/examples/cities/DemoCountries.php',
                'democountry' => '/examples/cities/DemoCountry.php',
                'demostate' => '/examples/cities/DemoState.php',
                'demostates' => '/examples/cities/DemoStates.php',
                'forsqltest' => '/Tests/classes/ForSQLTest.php',
                'grandparent' => '/Tests/classes/Dependencies/GrandParent.php',
                'ixhprofruns' => '/xhprof/xhprof_lib/utils/xhprof_runs.php',
                'jsontest' => '/Tests/JSONTest.php',
                'leafnode' => '/Tests/classes/LeafNode.php',
                'leafnodes' => '/Tests/classes/LeafNodes.php',
                'ludodb' => '/LudoDB.php',
                'ludodbadapter' => '/LudoDBInterfaces.php',
                'ludodbadaptertest' => '/Tests/LudoDBAdapterTest.php',
                'ludodballtests' => '/Tests/LudoDBAllTests.php',
                'ludodbauthenticator' => '/LudoDBInterfaces.php',
                'ludodbcache' => '/LudoDBCache.php',
                'ludodbclassnotfoundexception' => '/LudoDBExceptions.php',
                'ludodbcollection' => '/LudoDBCollection.php',
                'ludodbcollectionconfigparser' => '/LudoDBCollectionConfigParser.php',
                'ludodbconfigparser' => '/LudoDBConfigParser.php',
                'ludodbconnectionexception' => '/LudoDBExceptions.php',
                'ludodbexception' => '/LudoDBExceptions.php',
                'ludodbinvalidargumentsexception' => '/LudoDBExceptions.php',
                'ludodbinvalidconfigexception' => '/LudoDBExceptions.php',
                'ludodbinvalidmodeldataexception' => '/LudoDBExceptions.php',
                'ludodbinvalidserviceexception' => '/LudoDBExceptions.php',
                'ludodbiterator' => '/LudoDBIterator.php',
                'ludodbmodel' => '/LudoDBModel.php',
                'ludodbmodeltests' => '/Tests/LudoDBModelTests.php',
                'ludodbmysql' => '/LudoDBMysql.php',
                'ludodbmysqli' => '/LudoDBMySqlI.php',
                'ludodbobject' => '/LudoDBObject.php',
                'ludodbobjectnotfoundexception' => '/LudoDBExceptions.php',
                'ludodbpdo' => '/LudoDBPDO.php',
                'ludodbpdooracle' => '/LudoDBPDOOracle.php',
                'ludodbprofiling' => '/LudoDBProfiling.php',
                'ludodbprogress' => '/progress/LudoDBProgress.php',
                'ludodbprogresstest' => '/Tests/LudoDBProgressTest.php',
                'ludodbregistry' => '/LudoDBRegistry.php',
                'ludodbrequesthandler' => '/LudoDBRequestHandler.php',
                'ludodbrevision' => '/LudoDBRevision.php',
                'ludodbservice' => '/LudoDBInterfaces.php',
                'ludodbservicenotimplementedexception' => '/LudoDBExceptions.php',
                'ludodbserviceregistry' => '/LudoDBServiceRegistry.php',
                'ludodbsql' => '/LudoDBSQL.php',
                'ludodbtreecollection' => '/LudoDBTreeCollection.php',
                'ludodbtreecollectiontest' => '/Tests/LudoDBTreeCollectionTest.php',
                'ludodbunauthorizedexception' => '/LudoDBExceptions.php',
                'ludodbutility' => '/LudoDBUtility.php',
                'ludodbutilitymock' => '/Tests/LudoDBUtilityTest.php',
                'ludodbutilitytest' => '/Tests/LudoDBUtilityTest.php',
                'ludodbvalidationtest' => '/Tests/LudoDBValidationTest.php',
                'ludodbvalidator' => '/LudoDBValidator.php',
                'ludojs' => '/LudoJS.php',
                'ludojstests' => '/Tests/LudoJSTests.php',
                'manager' => '/Tests/classes/Manager.php',
                'modelwithsqlmethod' => '/Tests/classes/ModelWithSqlMethod.php',
                'movie' => '/Tests/classes/Movie.php',
                'mysqlitests' => '/Tests/MysqlITests.php',
                'noludodbclass' => '/Tests/classes/Dependencies/NoLudoDBClass.php',
                'pdotests' => '/Tests/PDOTests.php',
                'people' => '/Tests/classes/People.php',
                'peopleplain' => '/Tests/classes/PeoplePlain.php',
                'performancetest' => '/Tests/PerformanceTest.php',
                'person' => '/Tests/classes/Person.php',
                'personforconfigparser' => '/Tests/classes/PersonForConfigParser.php',
                'personforutility' => '/Tests/classes/PersonForUtility.php',
                'personwithauthinterface' => '/Tests/classes/PersonWithAuthInterface.php',
                'personwithvalidation' => '/Tests/classes/Validation/PersonWithValidation.php',
                'phone' => '/Tests/classes/Phone.php',
                'phonecollection' => '/Tests/classes/PhoneCollection.php',
                'project' => '/Tests/classes/Project.php',
                'projects' => '/Tests/classes/Projects.php',
                'requesthandlermock' => '/Tests/classes/RequestHandlerMock.php',
                'requesthandlertest' => '/Tests/RequestHandlerTest.php',
                'section' => '/Tests/classes/Section.php',
                'sqltest' => '/Tests/SQLTest.php',
                'testbase' => '/Tests/TestBase.php',
                'testcountry' => '/Tests/classes/TestCountry.php',
                'testgame' => '/Tests/classes/TestGame.php',
                'testnode' => '/Tests/classes/TestNode.php',
                'testnodes' => '/Tests/classes/TestNodes.php',
                'testnodeswithleafs' => '/Tests/classes/TestNodesWithLeafs.php',
                'testtable' => '/Tests/classes/TestTable.php',
                'testtimer' => '/Tests/classes/TestTimer.php',
                'tludojscountries' => '/Tests/classes/LudoJS/LudoJSCountries.php',
                'tludojscountry' => '/Tests/classes/LudoJS/LudoJSCountry.php',
                'tludojsperson' => '/Tests/classes/LudoJS/LudoJSPerson.php',
                'xhpprofiling' => '/xhprof/XHPProfiling.php',
                'xhprofruns_default' => '/xhprof/xhprof_lib/utils/xhprof_runs.php'
            );
        }
        $cn = strtolower($class);
        if (isset($classes[$cn])) {
            require __DIR__ . $classes[$cn];
        }
    }
);
// @codeCoverageIgnoreEnd