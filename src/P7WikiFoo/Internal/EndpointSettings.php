<?php

declare(strict_types=1);
/**
 * Class holding endpoints of Wikidata project  
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7WikiFoo
 * @package P7WikiFoo
 * @version 0.1
 * @since 2023-05-10
 */


namespace SchrodtSven\P7WikiFoo\Internal;

class EndpointSettings
{
    /**
     * Main endpoint for SPARQL query requests
     * 
     * @var string
     */
    public const SPARQL_MAIN = 'https://query.wikidata.org/bigdata/namespace/wdq/sparql?query=%s';


    /**
     * Endpoint for generic searches
     * 
     * For individual endpoint generation:
     * @see EndpointBuilder
     *  
     * @var string
     */
    public const GENERIC_SEARCH = 'https://www.wikidata.org/w/api.php?action=query&list=search&srsearch=%s';

    /**
     * Suffix to receive responses in json format
     * 
     * For individual endpoint generation:
     * @see SchrodtSven\P7WikiFoo\Endpoints\QueryBuilder 
     * @var string
     */
    public const FORMAT_JSON_SUFFIX = 'format=json';

    public const LIST_SEARCH_SUFFIX = 'list=search';

    
    
    public const WIKI_API_ACTION = 'api.php?action=query';
}