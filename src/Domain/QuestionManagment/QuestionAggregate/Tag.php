<?php

/**
 * This file is part of S4Skeleton project
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Domain\QuestionManagment\QuestionAggregate;

use JsonSerializable;
use League\OAuth2\Server\Entities\UserEntityInterface;

/**
 * Tag
 *
 * @package App\Domain\QuestionManagment\QuestionAggregate
 */
class Tag implements JsonSerializable
{
    /**
     * @var string
     */
    private $tagId;

    /**
     * @var string
     */
    private $description;

    /**
     * Tag constructor.
     * @param string $description
     * @throws \Exception
     */
    public function __construct(string $description)
    {
        $this->tagId = new TagId();
        $this->description = $description;
    }

    /**
     * Tag's internal ID
     *
     * @return TagId
     */
    public function tagId(): TagId
    {
        return $this->tagId;
    }

    public function description(): string
    {
        return $this->description;
    }

 /*   /**
     * Specify data which should be serialized to JSON
     *
     * @return mixed data which can be serialized by json_encode(),
     *               which is a value of any type other than a resource.
     */
   /* public function jsonSerialize()
    {
        return [
            'tagId' => $this->tagId,
            'description' => $this->description,
        ];
    }*/

    /**
     * Return the user's identifier.
     *
     * @return mixed
     */
    public function getIdentifier()
    {
        return $this->tagId;
    }

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
            'tagId' => $this->tagId(),
            'description' => $this->description,
        ];
    }
}