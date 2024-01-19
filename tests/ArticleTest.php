<?php

use App\Article;
use PHPUnit\Framework\TestCase;

class ArticleTest extends TestCase
{
    protected $article;

    public function setUp(): void
    {
        $this->article = new Article;
    }

    public function testTitleIsEmptyByDefault()
    {
        $this->assertEmpty($this->article->title);
    }

    // public function testSlugIsEmptyWithNoTitle()
    // {
    //     $this->assertSame($this->article->getSlug(), "");
    // }

    // public function testSlugHasSpacesReplacesByUnderscores()
    // {
    //     $this->article->title = "An example article";

    //     $this->assertEquals($this->article->getSlug(), 'An_example_article');
    // }

    // public function testSlugHasWhiteSpacesReplacedBySingleUndersore()
    // {
    //     $this->article->title = "An example   \n   article";

    //     $this->assertEquals($this->article->getSlug(), 'An_example_article');
    // }

    // public function testSlugDoesNotStartOrEndWithAnUnderscore()
    // {
    //     $this->article->title = " An example article ";

    //     $this->assertEquals($this->article->getSlug(), 'An_example_article');
    // }

    // public function testSlugDoesNotContainsAnyNonWordCharacters()
    // {
    //     $this->article->title = "An! example! article?";

    //     $this->assertEquals($this->article->getSlug(), 'An_example_article');
    // }

    public static function titleProvider()
    {
        return [
            'Slug have spaces replaced by underscore' => ['An example article', 'An_example_article'],
            'Slug have white spaces removed' => ["An example   \n   article", 'An_example_article'],
            'Slug can not start or end with underscore' => [' An example article ', 'An_example_article'],
            'Slug can only contain word characters' => ['An! example! article?', 'An_example_article']
        ];
    }

    /**
     * @dataProvider titleProvider
     */
    public function testSlug($title, $slug)
    {
        $this->article->title = $title;

        $this->assertEquals($this->article->getSlug(), $slug);
    }
}