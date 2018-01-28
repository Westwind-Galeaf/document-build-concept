<?php namespace Tests\Unit;


use App\Attribute;
use App\Document;
use App\Kodeks\DocumentManager;
use App\Status;
use App\Text;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * Class ExampleTest
 * @package Tests\Unit
 */
class DocumentTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var Document $document
     */
    private $document;

    /**
     * @var Text $text
     */
    private $text;

    /**
     * @var Status $status
     */
    private $status;

    /**
     * @var DocumentManager $manager
     */
    private $manager;

    /**
     * Подготовка условий.
     */
    public function setUp()
    {
        parent::setUp();

        $this->document = factory(Document::class)->create();
        $this->text = factory(Text::class)->create(['document_id' => $this->document->id]);
        $this->status = factory(Status::class)->create(['document_id' => $this->document->id]);
        $this->manager = new DocumentManager($this->document->id);
    }

    /**
     * Получение полного документа.
     *
     * @return void
     */
    public function testFullDocument()
    {
        $attribute = factory(Attribute::class)->create(['name' => 'one']);
        $this->document->documentAttributes()->attach($attribute);

        $document = $this->manager->getDocument();

        $this->assertEquals($this->text->text, $document->getText());
        $this->assertEquals($this->status->status, $document->getStatus());
        $this->assertEquals([
            'text' => $this->text->text,
            'status' => $this->status->status
        ], $document->transform());
    }

    /**
     * Получения документа с наличием только Статуса.
     *
     * @return void
     */
    public function testOnlyStatusDocument()
    {
        $attribute = factory(Attribute::class)->create(['name' => 'two']);
        $this->document->documentAttributes()->attach($attribute);

        $document = $this->manager->getDocument();

        $this->assertEquals($this->status->status, $document->getStatus());
        $this->assertNull($document->getText());
        $this->assertEquals([
            'text' => null,
            'status' => $this->status->status
        ], $document->transform());
    }

    /**
     * Получение платного документа.
     *
     * @return void
     */
    public function testPaidDocument()
    {
        $attribute = factory(Attribute::class)->create(['name' => 'three']);
        $this->document->documentAttributes()->attach($attribute);
        $patternText = substr($this->text->text, 0, 10);

        $document = $this->manager->getDocument();

        $this->assertEquals($this->status->status, $document->getStatus());
        $this->assertEquals($patternText, $document->getText());
        $this->assertEquals([
            'text' => $patternText,
            'status' => $this->status->status
        ], $document->transform());
    }
}
