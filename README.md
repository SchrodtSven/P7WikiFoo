# P7WikiFoo
Library for client access to public APIs of different "Wiki" services 
(Wikimedia, wikipedia, Wikidata & other projects); requires PHP 8.2+

Version  0.2 - in development


## Outlook / TODOs

 - Extend routing to work in sub directories of $DOCUMENT_ROOT!!!
 


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


## STATS     100 files     117 text files.
classified 108 filesDuplicate file check 108 files (104 known unique)Unique:      100 files                                               107 unique files.                              
Counting:  100      14 files ignored.

github.com/AlDanial/cloc v 1.96  T=0.06 s (1909.4 files/s, 193543.5 lines/s)
-------------------------------------------------------------------------------
Language                     files          blank        comment           code
-------------------------------------------------------------------------------
PHP                             89           1031           3087           5194
JSON                             1              0              0           1000
Text                            14             48              0            314
Markdown                         1             10              0            142
XML                              1              0              0             16
Bourne Shell                     1              0              0              4
-------------------------------------------------------------------------------
SUM:                           107           1089           3087           6670
-------------------------------------------------------------------------------
  PHPUnit 9.5.27 by Sebastian Bergmann and contributors.

Runtime:       PHP 8.2.5
Configuration: /Users/svenschrodt/projects/P7WikiFoo/phpunit.xml

.............................................................   61 / 1053 (  5%)
.............................................................  122 / 1053 ( 11%)
.............................................................  183 / 1053 ( 17%)
.............................................................  244 / 1053 ( 23%)
.............................................................  305 / 1053 ( 28%)
.............................................................  366 / 1053 ( 34%)
.............................................................  427 / 1053 ( 40%)
.............................................................  488 / 1053 ( 46%)
.............................................................  549 / 1053 ( 52%)
.............................................................  610 / 1053 ( 57%)
.............................................................  671 / 1053 ( 63%)
.............................................................  732 / 1053 ( 69%)
.............................................................  793 / 1053 ( 75%)
.............................................................  854 / 1053 ( 81%)
.............................................................  915 / 1053 ( 86%)
.............................................................  976 / 1053 ( 92%)
............................................................. 1037 / 1053 ( 98%)
................                                              1053 / 1053 (100%)

Time: 00:00.091, Memory: 26.39 MB

OK (1053 tests, 3906 assertions)
