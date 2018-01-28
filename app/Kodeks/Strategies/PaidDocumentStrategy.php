<?php namespace App\Kodeks\Strategies;

use App\Document;
use App\Kodeks\Interfaces\StrategyInterface;

/**
 * Class PaidDocumentStrategy
 * @package App\Kodeks\Strategies
 */
class PaidDocumentStrategy implements StrategyInterface
{
    /**
     * @param Document $document
     * @return bool
     */
    public static function match(Document $document)
    {
        return $document->documentAttributes()
            ->where('name', 'three')
            ->exists();
    }

    /**
     * @param Document $document
     * @return \stdClass
     */
    public function apply(Document $document)
    {
        $data = new \stdClass();

        $data->text = substr($document->text->text, 0, 10);
        $data->status = $document->status->status;

        return $data;
    }
}
