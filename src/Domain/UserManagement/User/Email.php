<?php

/**
 * This file is part of S4Skeleton project
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Domain\UserManagement\User;

use App\Domain\Comparable;
use App\Domain\Stringable;
use JsonSerializable;

/**
 * Email
 *
 * @package App\Domain\UserManagement\User
 */
final class Email implements Stringable, JsonSerializable, Comparable
{
    /**
     * @var string
     */
    private $mail;

    /**
     * Creates an E-mail
     *
     * @param string $mail
     */
    public function __construct(string $mail)
    {
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException("Invalid e-mail address.");
        }
        $this->mail = $mail;
    }

    /**
     * Returns a text version of the object
     *
     * @return string
     */
    public function __toString()
    {
        return $this->mail;
    }

    /**
     * Specify data which should be serialized to JSON
     *
     * @return mixed data which can be serialized by json_encode(),
     *               which is a value of any type other than a resource.
     */
    public function jsonSerialize()
    {
        return $this->mail;
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
        if (! $other instanceof Email) {
            return false;
        }

        return $this->mail === $other->mail;
    }
}
