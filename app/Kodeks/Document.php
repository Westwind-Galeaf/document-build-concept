<?php
/**
 * Created by PhpStorm.
 * User: wg
 * Date: 28.01.18
 * Time: 23:59
 */

namespace App\Kodeks;


class Document
{
    /**
     * @var \stdClass
     */
    private $data;

    public function __construct(\stdClass $data)
    {
        $this->data = $data;
    }

    public function getStatus()
    {
        return $this->data->status;
    }

    public function getText()
    {
        return $this->data->text;
    }

    public function transform()
    {
        return [
            'text' => $this->data->text,
            'status' => $this->data->status
        ];
    }
}