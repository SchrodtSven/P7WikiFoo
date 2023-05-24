# P7WikiFoo
Library for client access to public APIs of different "Wiki" services 
(Wikimedia, wikipedia, Wikidata & other projects); requires PHP 8.2+

Version  0.2 - in development


## Outlook / TODOs

 - Extend routing to work in sub directories of $DOCUMENT_ROOT!!!
 


## Files, Stats & Unit Testing
<pre>
<code>

.
├── LICENSE
├── P7WikiFoo
├── README.md
├── data
│   └── Mock
│       ├── LoremIpsum.txt
│       ├── Metasyntactix.php
│       ├── firstNames.php
│       ├── lastNames.php
│       ├── namesMails.php
│       └── snake2Camel.php
├── doq
│   └── Structure_Of_API_I.txt
├── foo.php
├── foo.sh
├── gitit.sh
├── make
├── phpunit.xml
├── public
│   ├── bootstrap.php
│   ├── reflector.php
│   ├── sess2.php
│   └── session.php
├── router.php
├── src
│   └── P7WikiFoo
│       ├── Api
│       ├── App
│       │   ├── Controllers
│       │   │   └── FooController.php
│       │   ├── Models
│       │   └── Views
│       │       ├── Doclets
│       │       │   └── raw.table.phtml
│       │       ├── Documents
│       │       │   └── default.doc.phtml
│       │       ├── Partlets
│       │       │   └── ulli.phtml
│       │       └── Widgets
│       ├── App.php
│       ├── Communication
│       │   └── Http
│       │       ├── ClientInterface.php
│       │       ├── CurlClient.php
│       │       ├── Parser.php
│       │       ├── Protocol.php
│       │       ├── Request.php
│       │       ├── RequestInterface.php
│       │       ├── Response.php
│       │       └── Router.php
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
│       │   ├── Foo.php
│       │   └── Frontend
│       │       ├── HtmlAttributes.php
│       │       ├── HtmlCollection.php
│       │       ├── HtmlElement.php
│       │       └── HtmlSyntax.php
│       ├── Internal
│       │   ├── Data
│       │   │   ├── CodeBuilder.php
│       │   │   ├── CodeTpl.php
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
│       │   ├── Kernel
│       │   │   ├── ActionController.php
│       │   │   ├── Dry
│       │   │   │   └── Container.php
│       │   │   ├── FrontController.php
│       │   │   ├── PhtmlParser.php
│       │   │   ├── SessionManager.php
│       │   │   └── ViewModel.php
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
│       │       │   ├── ArrayContentsTrait.php
│       │       │   ├── ArrayContextTrait.php
│       │       │   ├── ArrayCustomTrait.php
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
│       │       │   ├── TypeConverterTrait.php
│       │       │   └── ValueTrait.php
│       │       ├── P7Array.php
│       │       ├── P7String.php
│       │       └── StackInterface.php
│       └── Tools
│           ├── DebugHelper.php
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

58 directories, 110 files
     100 files     141 text files.
classified 131 filesDuplicate file check 131 files (127 known unique)Unique:      100 files                                               131 unique files.                              
Counting:  100      14 files ignored.

github.com/AlDanial/cloc v 1.96  T=0.06 s (2089.1 files/s, 204494.0 lines/s)
-------------------------------------------------------------------------------
Language                     files          blank        comment           code
-------------------------------------------------------------------------------
PHP                            111           1235           3953           5871
JSON                             1              0              0           1000
Text                            15             49              0            485
Markdown                         1              9              0            180
Bourne Shell                     2              1              5             19
XML                              1              0              0             16
-------------------------------------------------------------------------------
SUM:                           131           1294           3958           7571
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

Time: 00:00.090, Memory: 26.39 MB

OK (1053 tests, 3906 assertions)
</code>
</pre>
.
├── LICENSE
├── P7WikiFoo
├── README.md
├── data
│   └── Mock
│       ├── LoremIpsum.txt
│       ├── Metasyntactix.php
│       ├── firstNames.php
│       ├── lastNames.php
│       ├── namesMails.php
│       └── snake2Camel.php
├── doq
│   └── Structure_Of_API_I.txt
├── gitit.sh
├── make
├── phpunit.xml
├── public
│   ├── bootstrap.php
│   ├── reflector.php
│   ├── sess2.php
│   └── session.php
├── router.php
├── src
│   └── P7WikiFoo
│       ├── Api
│       ├── App
│       │   ├── Controllers
│       │   │   └── FooController.php
│       │   ├── Models
│       │   └── Views
│       │       ├── Doclets
│       │       │   └── raw.table.phtml
│       │       ├── Documents
│       │       │   └── default.doc.phtml
│       │       ├── Partlets
│       │       │   └── ulli.phtml
│       │       └── Widgets
│       ├── App.php
│       ├── Communication
│       │   └── Http
│       │       ├── ClientInterface.php
│       │       ├── CurlClient.php
│       │       ├── Parser.php
│       │       ├── Protocol.php
│       │       ├── Request.php
│       │       ├── RequestInterface.php
│       │       ├── Response.php
│       │       └── Router.php
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
│       │   └── Frontend
│       │       ├── HtmlAttributes.php
│       │       ├── HtmlCollection.php
│       │       ├── HtmlElement.php
│       │       └── HtmlSyntax.php
│       ├── Internal
│       │   ├── Data
│       │   │   ├── CodeBuilder.php
│       │   │   ├── CodeTpl.php
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
│       │   ├── Kernel
│       │   │   ├── ActionController.php
│       │   │   ├── Dry
│       │   │   │   └── Container.php
│       │   │   ├── FrontController.php
│       │   │   ├── PhtmlParser.php
│       │   │   ├── SessionManager.php
│       │   │   └── ViewModel.php
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
│       │       │   ├── ArrayContentsTrait.php
│       │       │   ├── ArrayContextTrait.php
│       │       │   ├── ArrayCustomTrait.php
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
│       │       │   ├── TypeConverterTrait.php
│       │       │   └── ValueTrait.php
│       │       ├── P7Array.php
│       │       ├── P7String.php
│       │       └── StackInterface.php
│       └── Tools
│           ├── DebugHelper.php
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

58 directories, 107 files
     100 files     138 text files.
classified 128 filesDuplicate file check 128 files (124 known unique)Unique:      100 files                                               128 unique files.                              
Counting:  100      14 files ignored.

github.com/AlDanial/cloc v 1.96  T=0.04 s (3205.6 files/s, 325168.2 lines/s)
-------------------------------------------------------------------------------
Language                     files          blank        comment           code
-------------------------------------------------------------------------------
PHP                            109           1227           3944           5843
JSON                             1              0              0           1000
Text                            15             49              0            485
Markdown                         1             15              0            387
XML                              1              0              0             16
Bourne Shell                     1              0              5             13
-------------------------------------------------------------------------------
SUM:                           128           1291           3949           7744
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

Time: 00:00.090, Memory: 26.39 MB

OK (1053 tests, 3906 assertions)
</code>
</pre>
.
├── LICENSE
├── P7WikiFoo
├── README.md
├── data
│   └── Mock
│       ├── LoremIpsum.txt
│       ├── Metasyntactix.php
│       ├── firstNames.php
│       ├── lastNames.php
│       ├── namesMails.php
│       └── snake2Camel.php
├── doq
│   └── Structure_Of_API_I.txt
├── gitit.sh
├── make
├── phpunit.xml
├── public
│   ├── bootstrap.php
│   ├── reflector.php
│   ├── sess2.php
│   └── session.php
├── router.php
├── src
│   └── P7WikiFoo
│       ├── Api
│       ├── App
│       │   ├── Controllers
│       │   │   └── FooController.php
│       │   ├── Models
│       │   └── Views
│       │       ├── Doclets
│       │       │   └── raw.table.phtml
│       │       ├── Documents
│       │       │   └── default.doc.phtml
│       │       ├── Partlets
│       │       │   └── ulli.phtml
│       │       └── Widgets
│       ├── App.php
│       ├── Communication
│       │   └── Http
│       │       ├── ClientInterface.php
│       │       ├── CurlClient.php
│       │       ├── Parser.php
│       │       ├── Protocol.php
│       │       ├── Request.php
│       │       ├── RequestInterface.php
│       │       ├── Response.php
│       │       └── Router.php
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
│       │   └── Frontend
│       │       ├── HtmlAttributes.php
│       │       ├── HtmlCollection.php
│       │       ├── HtmlElement.php
│       │       └── HtmlSyntax.php
│       ├── Internal
│       │   ├── Data
│       │   │   ├── CodeBuilder.php
│       │   │   ├── CodeTpl.php
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
│       │   ├── Kernel
│       │   │   ├── ActionController.php
│       │   │   ├── Dry
│       │   │   │   └── Container.php
│       │   │   ├── FrontController.php
│       │   │   ├── PhtmlParser.php
│       │   │   ├── SessionManager.php
│       │   │   └── ViewModel.php
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
│       │       │   ├── ArrayContentsTrait.php
│       │       │   ├── ArrayContextTrait.php
│       │       │   ├── ArrayCustomTrait.php
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
│       │       │   ├── TypeConverterTrait.php
│       │       │   └── ValueTrait.php
│       │       ├── P7Array.php
│       │       ├── P7String.php
│       │       └── StackInterface.php
│       └── Tools
│           ├── DebugHelper.php
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

58 directories, 107 files
     100 files     138 text files.
classified 128 filesDuplicate file check 128 files (124 known unique)Unique:      100 files                                               128 unique files.                              
Counting:  100      14 files ignored.

github.com/AlDanial/cloc v 1.96  T=0.04 s (3125.7 files/s, 322263.1 lines/s)
-------------------------------------------------------------------------------
Language                     files          blank        comment           code
-------------------------------------------------------------------------------
PHP                            109           1227           3944           5843
JSON                             1              0              0           1000
Markdown                         1             21              0            594
Text                            15             49              0            485
XML                              1              0              0             16
Bourne Shell                     1              0              5             13
-------------------------------------------------------------------------------
SUM:                           128           1297           3949           7951
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

Time: 00:00.090, Memory: 26.39 MB

OK (1053 tests, 3906 assertions)
</code>
</pre>
