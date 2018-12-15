<?php

/**
 * This file is part of S4Skeleton project
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Domain\QuestionManagment\AnswerAggregate;

use App\Domain\Comparable;
use App\Domain\Stringable;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
 * AnswerId
 *
 * @package App\Domain\QuestionManagment\AnswerAggregate
 */
final class AnswerId implements Stringable, \JsonSerializable, Comparable
{

    /**
     * @var UuidInterface
     */
    private $uuid;

    /**
     * Creates a AnswerId
     *
     * @param string|null $uuidTxt
     * @throws \Exception
     */
    public function __construct(string $uuidTxt = null)
    {
        $this->uuid = $uuidTxt
            ? Uuid::fromString($uuidTxt)
            : Uuid::uuid4();
    }

    /**
     * Returns a text version of the object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->uuid;
    }

    /**
     * Converts this answer ID into a json string
     *
     * @return string
     */
    public function jsonSerialize()
    {
        return (string) $this->uuid;
    }

    /**
     * Returns true if other object is equal to current one
     *
     * @param mixed $other
     *
     * @return bool
     */
    public function equalsTo($other): bool
    {
        if (! $other instanceof AnswerId) {
            return false;
        }

        return (bool) $other->uuid->equals($this->uuid);
    }
}
