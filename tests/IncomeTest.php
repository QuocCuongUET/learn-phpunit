<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class IncomeTest extends TestCase
{
    public function test_it_create_income_data(): void
    {
        $income = Income::create('1', '2021-02-01', 1000);

        $this->assertInstanceOf(
            Income::class,
            $income
        );

        $this->assertEquals('1', $income->getUserId());
        $this->assertEquals('2021-02-01', $income->getEntryDate());
        $this->assertEquals(1000, $income->getAmount());
    }
}