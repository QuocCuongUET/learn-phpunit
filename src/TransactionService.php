<?php declare(strict_types=1);
final class TransactionService
{
    public static function calculateTaxes($userId)
    {
        $user = Users::find($userId);

        if ($user) {
            if ($user->getIsTaxed()) {
                $incomes = Incomes::getIncomesByUser($userId);

                $income = Incomes::sumIncomes($incomes);

                if ($income > 50000) {
                    $taxes = $income * 0.2;
                } else {
                    $taxes = $income * 0.15;
                }
            } else {
                $taxes = 0;
            }
        } else {
            $taxes = 0;
        }

        return $taxes;
    }
}