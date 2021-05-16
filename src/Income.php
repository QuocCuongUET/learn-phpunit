<?php declare(strict_types=1);
final class Income
{
    private string $user_id;
    private string $entry_date;
    private float $amount;

    private function __construct(string $user_id, string $entry_date, float $amount)
    {
       $this->user_id = $user_id;
       $this->entry_date = $entry_date;
       $this->amount = $amount;
    }

    public static function create(string $user_id, string $entry_date, float $amount): self
    {
        return new self($user_id, $entry_date, $amount);
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function getEntryDate()
    {
        return $this->entry_date;
    }

    public function getAmount()
    {
        return $this->amount;
    }
}