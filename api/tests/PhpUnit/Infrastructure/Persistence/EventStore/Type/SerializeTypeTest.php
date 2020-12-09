<?php

namespace Tests\App\Infrastructure\Persistence\EventStore\Type;

use App\Infrastructure\Persistence\EventStore\Type\SerializeType;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Infrastructure\Persistence\EventStore\Type\SerializeType
 *
 * @internal
 */
class SerializeTypeTest extends TestCase
{
    public function testConvertToDatabaseValue()
    {
        $platform = $this->prophesize(AbstractPlatform::class);
        $type = new SerializeType();

        self::assertSame('{"id":"7cb97c7e-3792-4766-aa88-3a1c92f9abbf"}', $type->convertToDatabaseValue('{"id":"7cb97c7e-3792-4766-aa88-3a1c92f9abbf"}', $platform->reveal()));
        self::assertSame(null, $type->convertToDatabaseValue('', $platform->reveal()));
        self::assertSame(null, $type->convertToDatabaseValue(null, $platform->reveal()));
    }

    public function testConvertToDatabaseValueShouldThrowExceptionOnInvalidValue()
    {
        $platform = $this->prophesize(AbstractPlatform::class);
        $type = new SerializeType();

        self::expectException(\RuntimeException::class);
        $type->convertToDatabaseValue([], $platform->reveal());
    }

    public function testConvertToPHPValue()
    {
        $platform = $this->prophesize(AbstractPlatform::class);
        $type = new SerializeType();

        self::assertSame('{"id":"7cb97c7e-3792-4766-aa88-3a1c92f9abbf"}', $type->convertToPHPValue('{"id":"7cb97c7e-3792-4766-aa88-3a1c92f9abbf"}', $platform->reveal()));
        self::assertSame(null, $type->convertToPHPValue('', $platform->reveal()));
        self::assertSame(null, $type->convertToPHPValue(null, $platform->reveal()));
    }

    public function testConvertToPHPValueShouldThrowExceptionOnInvalidValue()
    {
        $platform = $this->prophesize(AbstractPlatform::class);
        $type = new SerializeType();

        self::expectException(\RuntimeException::class);
        $type->convertToPHPValue([], $platform->reveal());
    }
}
