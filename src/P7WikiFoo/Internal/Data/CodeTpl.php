<?php

declare(strict_types=1);
/**
 * Class holding simple template parts
 * 
 * 
 * @TODO -> adding indentation
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7WikiFoo
 * @package P7WikiFoo
 * @version 0.1
 * @since 2023-05-04
 */


namespace SchrodtSven\P7WikiFoo\Internal\Data;

use SchrodtSven\P7WikiFoo\Internal\Type\P7String;

class CodeTpl
{
    public const ARRAY_DEFINITION = '$%s = [%s]';

    public const TERNARY_OP = '(%s) ? %s : %s';

    public const TERNARY_OP_NL = '
        (%s) 
            ? %s 
            : %s';

    public function printL(string|P7String $assignment): P7String
    {
        return $this->finish($assignment);
    }
    

    public function finish(P7String $assignment): P7String
    {
        return $assignment->append(';' . PHP_EOL);
    }
}