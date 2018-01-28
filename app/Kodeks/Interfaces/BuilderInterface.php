<?php namespace App\Kodeks\Interfaces;

use App\Document;

/**
 * Interface BuilderInterface
 *
 * @package App\Kodeks\Interfaces
 */
interface BuilderInterface
{
    /**
     * Подготовка сборщика.
     *
     * @param Document $document
     * @param StrategyInterface $strategy
     */
    public function __construct(Document $document, StrategyInterface $strategy);

    /**
     * Сборка документа.
     *
     * @return Document
     */
    public function build();
}