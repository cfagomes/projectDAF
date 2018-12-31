<?php
/**
 * Created by PhpStorm.
 * User: carinagomes
 * Date: 31/12/2018
 * Time: 17:21
 */

namespace App\Application\QuestionManagment\QuestionAggregate;


use App\Domain\QuestionManagment\QuestionAggregate\QuestionId;

class UpdateQuestionCommand
{
    private $questionId;
    private $title;
    private $body;

    /**
     * @param $questionId
     * @param $title
     * @param $body
     */

    public function __construct(QuestionId $questionId, String $title, String $body)
    {
        $this->questionId = $questionId;
        $this->title = $title;
        $this->body = $body;
    }

    /**
     * @return QuestionId
     */

    public function getQuestionId(): QuestionId
    {
        return $this->questionId;
    }


    /**
     * @return String
     */

    public function getTitle(): String
    {
        return $this->title;
    }


    /**
     * @return String
     */

    public function getBody(): String
    {
        return $this->body;
    }

}