<?php namespace App\Kodeks;

use App\Document as DocumentModel;
use App\Kodeks\Interfaces\BuilderInterface;
use App\Kodeks\Interfaces\StrategyInterface;

/**
 * Class Builder
 * @package App\Kodeks
 */
class Builder implements BuilderInterface
{
    /**
     * Целевая модель документа.
     *
     * @var Document $document
     */
    private $document;

    /**
     * Выбранная стратегия сборки документа.
     *
     * @var StrategyInterface
     */
    private $strategy;

    /**
     * Builder constructor.
     * @param DocumentModel $document
     * @param StrategyInterface $strategy
     */
    public function __construct(DocumentModel $document, StrategyInterface $strategy)
    {
        $this->document = $document;
        $this->strategy = $strategy;
    }

    /**
     * Сборка документа.
     *
     * @return Document
     */
    public function build()
    {
        return new Document($this->getData());
    }

    /**
     * Получение данных, применяя стратегию.
     *
     * @return mixed
     */
    private function getData()
    {
        return $this->strategy->apply($this->document);
    }
}
