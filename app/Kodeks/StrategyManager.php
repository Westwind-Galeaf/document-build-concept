<?php namespace App\Kodeks;

use App\Document;
use App\Exceptions\StrategyNotFound;
use App\Kodeks\Strategies\FullDocumentStrategy;
use App\Kodeks\Strategies\OnlyStatusStrategy;
use App\Kodeks\Strategies\PaidDocumentStrategy;

/**
 * Class StrategyManager
 * @package App\Kodeks
 */
class StrategyManager
{
    /**
     * Доступные стратегии поведения.
     *
     * @var array $strategies
     */
    private $strategies = [
        FullDocumentStrategy::class,
        OnlyStatusStrategy::class,
        PaidDocumentStrategy::class
    ];

    /**
     * Получения соответствующей стратегии.
     *
     * @param Document $document
     * @return mixed
     * @throws StrategyNotFound
     */
    public function getStrategy(Document $document)
    {
        foreach ($this->strategies as $strategy) {
            if ($strategy::match($document)) {
                return $strategy;
            }
        }

        throw new StrategyNotFound();
    }
}
