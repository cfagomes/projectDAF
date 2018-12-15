<?php

/**
 * This file is part of S4Skeleton project
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Domain\QuestionManagment\AnswerAggregate;

use JsonSerializable;
use League\OAuth2\Server\Entities\UserEntityInterface;

/**
 * Vote
 *
 * @package App\Domain\QuestionManagment\AnswerAggregate
 */
final class Vote implements JsonSerializable
{
    private $vote;

    private const positive = 1;
    private const negative = 0;

    /**
     * Vote constructor.
     * @param bool $vote
     * @throws \Exception
     */
    private function __construct (bool $vote)
    {
        $this->vote = $vote;
    }

    public function vote()
    {
        return $this->vote;
    }

    public static function positive()
    {
        return new Vote((bool) self::positive);
    }

    public static function negative()
    {
        return new Vote((bool) self::negative);
    }

    public function isPositive()
    {
        return $this->vote;
    }

    public function isNegative()
    {
        return $this->vote;
    }

    //$vote = vote::positive();

    /**
     * Specify data which should be serialized to JSON
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return [
            'vote' => $this->vote
        ];
    }


}