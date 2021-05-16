<?php declare(strict_types=1);
final class Incomes
{
    public static $incomes = [];
    const MIN_DATE = "2021-01-01";
    const MAX_DATE = "2021-12-31";

    public static function getIncomesByUser($userId)
    {
        $data = [];
        foreach (self::$incomes as $income) {
            if ((int)$income->getUserId() == (int)$userId) {
                $entryDate = $income->getEntryDate();
                if ($entryDate >= self::MIN_DATE && $entryDate <= self::MAX_DATE) {
                    $data[] = $income;
                }
            }
        }

        return $data;
    }

    public static function sumIncomes($incomes)
    {
        $sum = 0;
        if (count($incomes) == 0) {
            return $sum;
        }

        foreach($incomes as $income) {
            $sum += $income->getAmount();
        }

        return $sum;
    }

    public static function create($data)
    {
        Incomes::$incomes = [];
        foreach ($data as $income) {
            Incomes::$incomes[] = Income::create($income['user_id'], $income['entry_date'], $income['amount']);
        }
    }
}

