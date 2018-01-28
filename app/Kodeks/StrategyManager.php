<?php
/**
 * Created by PhpStorm.
 * User: wg
 * Date: 28.01.18
 * Time: 23:29
 */

namespace App\Kodeks;


use App\Document;
use App\Exceptions\StrategyNotFound;
use App\Kodeks\Strategies\FullDocumentStrategy;
use App\Kodeks\Strategies\OnlyStatusStrategy;
use App\Kodeks\Strategies\PaidDocumentStrategy;

class StrategyManager
{
    private $strategies = [
        FullDocumentStrategy::class,
        OnlyStatusStrategy::class,
        PaidDocumentStrategy::class
    ];

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