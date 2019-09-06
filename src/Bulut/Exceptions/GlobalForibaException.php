<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 6.09.2019
 * Time: 10:44
 */

namespace Bulut\Exceptions;

use Throwable;

class GlobalForibaException extends \Exception
{
    public function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}