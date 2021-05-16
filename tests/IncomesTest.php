<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class IncomesTest extends TestCase
{
    public function test_it_return_empty_array_when_no_data(): void
    {
        Incomes::create([]);

        $resutl = Incomes::getIncomesByUser(1);

        $this->assertEquals($resutl, []);
    }

    public function test_it_return_null_when_not_found_data(): void
    {
        Incomes::create([
            ['user_id' => '1', 'entry_date' => '2021-01-01', 'amount' => 200],
            ['user_id' => '2', 'entry_date' => '2021-01-01', 'amount' => 4000],
            ['user_id' => '3', 'entry_date' => '2021-01-01', 'amount' => 200],
            ['user_id' => '4', 'entry_date' => '2021-01-01', 'amount' => 4000]
        ]);

        $resutl = Incomes::getIncomesByUser(5);

        $this->assertEquals($resutl, []);
    }

    public function test_it_return_incomes(): void
    {
        Incomes::create([
            ['user_id' => '1', 'entry_date' => '2021-01-01', 'amount' => 200],
            ['user_id' => '2', 'entry_date' => '2021-01-01', 'amount' => 4000],
            ['user_id' => '3', 'entry_date' => '2021-01-01', 'amount' => 200],
            ['user_id' => '4', 'entry_date' => '2021-01-01', 'amount' => 4000]
        ]);

        $resutl = Incomes::getIncomesByUser(1);

        $this->assertEquals(count($resutl), 1);

        $this->assertInstanceOf(
            Income::class,
            $resutl[0]
        );

        $this->assertEquals('1', $resutl[0]->getUserId());
        $this->assertEquals('2021-01-01', $resutl[0]->getEntryDate());
        $this->assertEquals(200, $resutl[0]->getAmount());
    }

    public function test_it_return_sum_incomes(): void
    {
        Incomes::create([
            ['user_id' => '1', 'entry_date' => '2021-01-01', 'amount' => 200],
            ['user_id' => '1', 'entry_date' => '2021-01-01', 'amount' => 4000],
            ['user_id' => '3', 'entry_date' => '2021-01-01', 'amount' => 200],
            ['user_id' => '4', 'entry_date' => '2021-01-01', 'amount' => 4000]
        ]);

        $incomes = Incomes::getIncomesByUser(1);

        $sum_incomes = Incomes::sumIncomes($incomes);

        $this->assertEquals(4200.0, $sum_incomes);
    }

    public function test_it_return_sum_incomes_is_0(): void
    {
        Incomes::create([
            ['user_id' => '1', 'entry_date' => '2021-01-01', 'amount' => 200],
            ['user_id' => '1', 'entry_date' => '2021-01-01', 'amount' => 4000],
            ['user_id' => '3', 'entry_date' => '2021-01-01', 'amount' => 200],
            ['user_id' => '4', 'entry_date' => '2021-01-01', 'amount' => 4000]
        ]);

        $incomes = Incomes::getIncomesByUser(5);

        $sum_incomes = Incomes::sumIncomes($incomes);

        $this->assertEquals(0, $sum_incomes);
    }
}