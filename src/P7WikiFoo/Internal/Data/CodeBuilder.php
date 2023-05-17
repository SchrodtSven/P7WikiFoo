<?php

declare(strict_types=1);
/**
 * Class building source code partials
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7WikiFoo
 * @package P7WikiFoo
 * @version 0.2
 * @since 2023-05-17
 */

namespace SchrodtSven\P7WikiFoo\Internal\Data;

use Iterator;
use SchrodtSven\P7WikiFoo\Internal\Type\P7Array;
use SchrodtSven\P7WikiFoo\Internal\Type\P7String;
use SchrodtSven\P7WikiFoo\App;
use SchrodtSven\P7WikiFoo\Internal\File\FileError;
use SchrodtSven\P7WikiFoo\Internal\SingletonFactory;
use SchrodtSven\P7WikiFoo\Internal\Type\Dry\TypeConverterTrait;
use SchrodtSven\P7WikiFoo\Internal\Type\Dry\ValueTrait;

class CodeBuilder
{
    use TypeConverterTrait;
    use ValueTrait;

    public function defineArray(string|P7String $name, array|P7Array $data, bool $isList = true): P7String
    {
        $name = $this->sanitizeP7String($name);
        $data = $this->sanitizeP7Array($data);
        $data->walk(function(&$item, $key) use($isList) {
            $item = ($isList)   ?  $this->literalize($item)
                                : $this->literalize($key) .' => ' . $this->literalize($item);
        });

        return new P7String(sprintf(
                                    CodeTpl::ARRAY_DEFINITION,
                                    $name,
                                    $data->join(', ')
                            )
                    );
    }
}