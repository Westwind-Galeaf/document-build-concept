<?php namespace App\Kodeks\Strategies;

use App\Document;
use App\Kodeks\Interfaces\StrategyInterface;

/**
 * Class FullDocumentStrategy
 * @package App\Kodeks\Strategies
 */
class FullDocumentStrategy implements StrategyInterface
{
    /**
     * @param Document $document
     * @return bool
     */
    public static function match(Document $document)
    {
        return $document->documentAttributes()
            ->where('name', 'one')
            ->exists();
    }

    /**
     * @param Document $document
     * @return \stdClass
     */
    public function apply(Document $document)
    {
        $data = new \stdClass();

        $data->text = $document->text->text;
        $data->status = $document->status->status;

        return $data;
    }
}
