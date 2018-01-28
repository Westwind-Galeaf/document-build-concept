<?php namespace App\Kodeks\Interfaces;

use App\Document;

/**
 * Interface StrategyInterface
 * @package App\Kodeks\Interfaces
 */
interface StrategyInterface
{
    /**
     * Проверка на соответствие выбранной стратегии.
     *
     * @param Document $document
     * @return mixed
     */
    public static function match(Document $document);

    /**
     * Применение стратегии.
     *
     * @param Document $document
     * @return mixed
     */
    public function apply(Document $document);
}