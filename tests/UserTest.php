<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class UserTest extends TestCase
{
    public function test_it_create_user_data(): void
    {
        $user = User::create('1', false);

        $this->assertInstanceOf(
            User::class,
            $user
        );

        $this->assertEquals('1', $user->getId());
        $this->assertEquals(false, $user->getIsTaxed());
    }
}