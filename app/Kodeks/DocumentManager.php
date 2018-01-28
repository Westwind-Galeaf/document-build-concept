<?php namespace App\Kodeks;

use App\Document;

/**
 * Class DocumentManager
 * @package App\Kodeks
 */
class DocumentManager
{
    /**
     * Целевая модель документа.
     *
     * @var Document $documentModel
     */
    private $documentModel;

    /**
     * Менеджер стратегий.
     *
     * @var StrategyManager $strategyManager
     */
    private $strategyManager;

    /**
     * DocumentManager constructor.
     * @param $id
     */
    public function __construct(int $id)
    {
        $this->documentModel = Document::findOrFail($id);
        $this->strategyManager = new StrategyManager;
    }

    /**
     * Получение документа.
     *
     * @return \App\Kodeks\Document
     */
    public function getDocument()
    {
        return (new Builder($this->documentModel, $this->getStrategy()))->build();
    }

    /**
     * Получение объекта стратегии.
     *
     * @return mixed
     */
    private function getStrategy()
    {
        $strategy = $this->strategyManager->getStrategy($this->documentModel);

        return new $strategy;
    }
}
