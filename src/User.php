<?php declare(strict_types=1);
final class User
{
    private string $id;
    private bool $is_taxed;

    private function __construct(string $id, bool $is_taxed)
    {
        $this->id = $id;
        $this->is_taxed = $is_taxed;
    }

    public static function create(string $id, bool $is_taxed): self
    {
        return new self($id, $is_taxed);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getIsTaxed()
    {
        return $this->is_taxed;
    }
}