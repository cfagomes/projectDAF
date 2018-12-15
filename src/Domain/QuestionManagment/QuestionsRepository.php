<?php

namespace App\Domain\QuestionManagment;

use App\Domain\QuestionManagment\QuestionAggregate\Question;
use App\Domain\QuestionManagment\QuestionAggregate\QuestionId;

interface QuestionsRepository
{
    /**
     * Adds a question to the repository
     *
     * @param Question $question
     * @return Question
     */
    public function add(Question $question): Question;

    /**
     * Persists question changes
     *
     * @param Question $question
     * @return Question
     */
    public function update(Question $question): Question;

    /**
     * Removes question from repository
     *
     * @param Question $question
     */
    public function remove(Question $question): Void;

    /**
     * Retrieves the question with provided questionId
     *
     * @param QuestionId $questionId
     * @return Question
     *
     */
    public function withQuestionId(QuestionId $questionId): Question;
}