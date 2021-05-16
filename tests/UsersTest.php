<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class UsersTest extends TestCase
{
    public function test_it_return_null_when_no_data(): void
    {
        Users::create([]);

        $resutl = Users::find(1);

        $this->assertEquals($resutl, null);
    }

    public function test_it_return_null_when_not_found_data(): void
    {
        Users::create([
            ['id' => '1', 'is_taxed' => false],
            ['id' => '2', 'is_taxed' => true],
            ['id' => '3', 'is_taxed' => false],
            ['id' => '4', 'is_taxed' => true]
        ]);

        $resutl = Users::find(5);

        $this->assertEquals($resutl, null);
    }

    public function test_it_return_user(): void
    {
        Users::create([
            ['id' => '1', 'is_taxed' => false],
            ['id' => '2', 'is_taxed' => true],
            ['id' => '3', 'is_taxed' => false],
            ['id' => '4', 'is_taxed' => true]
        ]);

        $resutl = Users::find(1);

        $this->assertInstanceOf(
            User::class,
            $resutl
        );

        $this->assertEquals('1', $resutl->getId());
        $this->assertEquals(false, $resutl->getIsTaxed());
    }
}