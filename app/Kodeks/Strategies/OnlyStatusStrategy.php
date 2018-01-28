<?php namespace App\Kodeks\Strategies;

use App\Document;
use App\Kodeks\Interfaces\StrategyInterface;

/**
 * Class OnlyStatusStrategy
 * @package App\Kodeks\Strategies
 */
class OnlyStatusStrategy implements StrategyInterface
{
    /**
     * @param Document $document
     * @return bool
     */
    public static function match(Document $document)
    {
        return $document->documentAttributes()
            ->where('name', 'two')
            ->exists();
    }

    /**
     * @param Document $document
     * @return \stdClass
     */
    public function apply(Document $document)
    {
        $data = new \stdClass();

        $data->text = null;
        $data->status = $document->status->status;

        return $data;
    }
}
