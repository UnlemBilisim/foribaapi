<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 27.12.2017
 * Time: 16:46
 */

namespace Bulut\ArchiveService;


class SendEnvelopeResponse
{
    public $Detail;
    public $Result;
    public $preCheckErrorResults;
    public $preCheckSuccessResults;

    /**
     * @return mixed
     */
    public function getDetail()
    {
        return $this->Detail;
    }

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->Result;
    }

    /**
     * @return mixed
     */
    public function getPreCheckErrorResults()
    {
        return $this->preCheckErrorResults;
    }

    /**
     * @return mixed
     */
    public function getPreCheckSuccessResults()
    {
        return $this->preCheckSuccessResults;
    }


}