<?php namespace App\Kodeks;

/**
 * Class Document
 * @package App\Kodeks
 */
class Document
{
    /**
     * Исходные данные.
     *
     * @var \stdClass $data
     */
    private $data;

    /**
     * Document constructor.
     * @param \stdClass $data
     */
    public function __construct(\stdClass $data)
    {
        $this->data = $data;
    }

    /**
     * Получение статуса.
     *
     * @return mixed
     */
    public function getStatus()
    {
        return $this->data->status;
    }

    /**
     * Получение текста.
     *
     * @return mixed
     */
    public function getText()
    {
        return $this->data->text;
    }

    /**
     * Преобразование.
     *
     * @todo подразумевается, что к документу можно применить стратегию преобразования.
     * @return array
     */
    public function transform()
    {
        return [
            'text' => $this->data->text,
            'status' => $this->data->status
        ];
    }
}
