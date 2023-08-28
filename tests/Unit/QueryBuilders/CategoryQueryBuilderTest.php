<?php

namespace Tests\Unit\QueryBuilders;

use Tests\TestCase;
use App\Models\Category;
use App\QueryBuilders\CategoryQueryBuilder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryQueryBuilderTest extends TestCase
{
    /** @test */
    public function it_generates_the_query_builder_object()
    {
        $this->assertInstanceOf(expected: CategoryQueryBuilder::class, actual: Category::query());
    }

    /** @test */
    public function it_can_check_for_only_visible_categories()
    {
        $query = Category::query()->shownInMenu();
        $this->assertEquals(
            expected: 'select * from "categories" where "is_visible" = ? and "categories"."deleted_at" is null',
            actual: $query->toSql(),
        );
        $this->assertEquals(
            expected: [true],
            actual: $query->getBindings(),
        );
    }

    /** @test */
    public function it_can_check_for_first_level_categories()
    {
        $query = Category::query()->firstLevel();
        $this->assertEquals(
            expected: 'select * from "categories" where "category_id" is null and "categories"."deleted_at" is null',
            actual: $query->toSql(),
        );
        $this->assertEquals(
            expected: [],
            actual: $query->getBindings(),
        );
    }
}
