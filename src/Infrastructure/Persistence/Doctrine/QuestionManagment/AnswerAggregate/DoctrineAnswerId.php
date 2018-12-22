<?php
/**
 * Created by PhpStorm.
 * User: carinagomes
 * Date: 22/12/2018
 * Time: 17:02
 */

namespace App\Infrastructure\Persistence\Doctrine\QuestionManagment\AnswerAggregate;

use App\Domain\QuestionManagment\AnswerAggregate\AnswerId;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;

/**
 * Created by PhpStorm.
 * User: carinagomes
 * Date: 22/12/2018
 * Time: 16:58
 */

/**
 * DoctrineUserId
 *
 * @package App\Infrastructure\Persistence\Doctrine\QuestionManagment\AnswerAggregate
 */
final class DoctrineAnswerId extends StringType
{

    /**
     * @inheritdoc
     *
     * @param AnswerId $value
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
        return new AnswerId($value);
    }

    public function getName()
    {
        return 'AnswerId';
    }
}
