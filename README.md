# P7WikiFoo
Library for client access to public APIs of different "Wiki" services 
(Wikimedia, wikipedia, Wikidata & other projects); requires PHP 8.2+

Version  0.2 - in development





## Files
<pre>
<code>
.
├── LICENSE
├── P7WikiFoo
├── README.md
├── cache
├── data
│   └── Mock
│       ├── Metasyntactix.php
│       ├── firstNames.php
│       ├── lastNames.php
│       ├── namesMails.php
│       └── snake2Camel.php
├── doq
│   └── Structure_Of_API_I.txt
├── dump
├── make
├── phpunit.xml
├── public
│   └── bootstrap.php
├── router.php
├── src
│   └── P7WikiFoo
│       ├── Api
│       ├── App.php
│       ├── Communication
│       │   └── Http
│       │       ├── ClientInterface.php
│       │       ├── CurlClient.php
│       │       ├── Parser.php
│       │       ├── Protocol.php
│       │       ├── Request.php
│       │       └── Response.php
│       ├── Entity
│       │   ├── Action
│       │   │   ├── Query
│       │   │   │   ├── List
│       │   │   │   │   ├── Allcategories
│       │   │   │   │   │   └── readme.md
│       │   │   │   │   ├── Alldeletedrevisions
│       │   │   │   │   │   └── readme.md
│       │   │   │   │   ├── Prefixsearch
│       │   │   │   │   │   └── readme.md
│       │   │   │   │   ├── Querypage
│       │   │   │   │   │   └── readme.md
│       │   │   │   │   └── Search
│       │   │   │   │       ├── Module.php
│       │   │   │   │       └── readme.md
│       │   │   │   ├── Meta
│       │   │   │   └── Prop
│       │   │   └── Query.php
│       │   └── Foo.php
│       ├── Internal
│       │   ├── Data
│       │   │   ├── DataSupplier.php
│       │   │   ├── MockTpl.php
│       │   │   ├── Mockerizr.php
│       │   │   └── NamedSymbols.php
│       │   ├── EndpointBuilder.php
│       │   ├── EndpointSettings.php
│       │   ├── Endpoints.php
│       │   ├── File
│       │   │   ├── DirectoryFilter.php
│       │   │   └── FileError.php
│       │   ├── SingletonFactory.php
│       │   ├── Test
│       │   │   └── P7TestCase.php
│       │   ├── TextProcessing
│       │   │   ├── BeggarmanParser.php
│       │   │   ├── TextTransformer.php
│       │   │   └── TplContainer.php
│       │   └── Type
│       │       ├── Dry
│       │       │   ├── ArrayAccessTrait.php
│       │       │   ├── ArrayCallbackTrait.php
│       │       │   ├── ArrayPartsTrait.php
│       │       │   ├── ArraySortTrait.php
│       │       │   ├── CodeBuildingTrait.php
│       │       │   ├── IteratorTrait.php
│       │       │   ├── MultiByteStringTrait.php
│       │       │   ├── PrintfTrait.php
│       │       │   ├── StackOperationTrait.php
│       │       │   ├── StringBoolTrait.php
│       │       │   ├── StringContextTrait.php
│       │       │   ├── StringEmbracingTrait.php
│       │       │   ├── StringTransformingTrait.php
│       │       │   ├── SubStringTrait.php
│       │       │   └── TypeConverterTrait.php
│       │       ├── P7Array.php
│       │       ├── P7String.php
│       │       └── StackInterface.php
│       └── Tools
│           └── Tpl
│               ├── MethodDocBlock.tpl
│               └── TestCase.tpl
└── test
    ├── Api
    ├── AppTest.php
    ├── Communication
    │   └── Http
    │       ├── CurlClientTest.php
    │       ├── ParserTest.php
    │       ├── ProtocolTest.php
    │       ├── RequestTest.php
    │       └── ResponseTest.php
    ├── Entity
    │   ├── Action
    │   │   ├── Query
    │   │   │   └── List
    │   │   │       └── Search
    │   │   │           └── ModuleTest.php
    │   │   └── QueryTest.php
    │   └── FooTest.php
    ├── Internal
    │   ├── Data
    │   │   └── NamedSymbolsTest.php
    │   ├── EndpointBuilderTest.php
    │   ├── EndpointSettingsTest.php
    │   ├── EndpointsTest.php
    │   ├── File
    │   │   └── DirectoryFilterTest.php
    │   ├── Test
    │   │   └── P7TestCaseTest.php
    │   ├── TextProcessing
    │   │   └── BeggarmanParserTest.php
    │   └── Type
    │       ├── P7ArrayTest.php
    │       ├── P7StringTest.php
    │       └── StackInterfaceTest.php
    └── Tools

</code>
</pre>