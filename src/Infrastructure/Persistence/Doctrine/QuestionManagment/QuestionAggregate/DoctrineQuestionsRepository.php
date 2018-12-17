<?php
/**
 * Created by PhpStorm.
 * User: carinagomes
 * Date: 15/12/2018
 * Time: 22:43
 */

namespace App\Infrastructure\Persistence\Doctrine\QuestionManagment\QuestionAggregate;


use App\Domain\QuestionManagment\QuestionAggregate\Question;
use App\Domain\QuestionManagment\QuestionAggregate\QuestionId;
use App\Domain\QuestionManagment\QuestionsRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

class DoctrineQuestionsRepository implements QuestionsRepository
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * Creates a DoctrineUsersRepository
     *
     * @param EntityManagerInterface|EntityManager $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Adds a question to the repository
     *
     * @param Question $question
     * @return Question
     *
     * @throws \Doctrine\ORM\ORMException
     */
    public function add(Question $question): Question
    {
        $this->entityManager->persist($question);
        $this->entityManager->flush();
        return $question;
    }

    /**
     * Persists question changes
     *
     * @param Question $question
     * @return Question
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function update(Question $question): Question
    {
        $this->entityManager->flush($question);
        return $question;
    }

    /**
     * Removes question from repository
     *
     * @param Question $question
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function remove(Question $question): Void
    {
        $this->entityManager->remove($question);
        $this->entityManager->flush();
    }

    /**
     * Retrieves the question with provided questionId
     *
     * @param QuestionId $questionId
     * @return Question
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public function withQuestionId(QuestionId $questionId): Question
    {
        $question = $this->entityManager->find(Question::class, $questionId);
        if (!$question instanceof Question) {
            throw new \RuntimeException("Question not found.");
        }

        return $question;
    }
}