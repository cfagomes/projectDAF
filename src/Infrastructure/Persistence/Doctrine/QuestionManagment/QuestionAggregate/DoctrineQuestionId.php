<?php
/**
 * Created by PhpStorm.
 * User: carinagomes
 * Date: 22/12/2018
 * Time: 16:58
 */

namespace App\Infrastructure\Persistence\Doctrine\QuestionManagment\QuestionAggregate;

use App\Domain\QuestionManagment\QuestionAggregate\QuestionId;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;

/**
 * DoctrineUserId
 *
 * @package App\Infrastructure\Persistence\Doctrine\QuestionManagment\QuestionAggregate
 */
final class DoctrineQuestionId extends StringType
{

    /**
     * @inheritdoc
     *
     * @param QuestionId $value
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return (string) $value;
    }

    /**
     * @inheritdoc
     * @throws \Exception
     */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return new QuestionId($value);
    }

    public function getName()
    {
        return 'QuestionId';
    }
}
