<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class TransactionServiceTest extends TestCase
{
    public function test_it_return_0_when_not_found_user(): void
    {
        $resutl = TransactionService::calculateTaxes(1);

        $this->assertEquals($resutl, 0);
    }

    public function test_it_return_0_when_user_not_used_taxed(): void
    {
        Users::create([
            ['id' => '1', 'is_taxed' => false]
        ]);

        $resutl = TransactionService::calculateTaxes(1);

        $this->assertEquals($resutl, 0);
    }

    public function test_it_return_taxed_at_15_percent_when_total_amount_smaller_50000(): void
    {
        Users::create([
            ['id' => '1', 'is_taxed' => true]
        ]);

        Incomes::create([
            ['user_id' => '1', 'entry_date' => '2021-02-01', 'amount' => 2000],
            ['user_id' => '1', 'entry_date' => '2021-02-01', 'amount' => 1000]
        ]);

        $resutl = TransactionService::calculateTaxes(1);

        $this->assertEquals($resutl, 3000 * 0.15);
    }

    public function test_it_return_taxed_at_20_percent_when_total_amount_greater_than_50000(): void
    {
        Users::create([
            ['id' => '1', 'is_taxed' => true]
        ]);

        Incomes::create([
            ['user_id' => '1', 'entry_date' => '2021-02-01', 'amount' => 20000],
            ['user_id' => '1', 'entry_date' => '2021-02-01', 'amount' => 10000],
            ['user_id' => '1', 'entry_date' => '2021-02-01', 'amount' => 20001],
        ]);

        $resutl = TransactionService::calculateTaxes(1);

        $this->assertEquals($resutl, 50001 * 0.2);
    }
}