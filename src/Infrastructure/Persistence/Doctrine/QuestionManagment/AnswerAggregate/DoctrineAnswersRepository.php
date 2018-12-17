<?php
/**
 * Created by PhpStorm.
 * User: carinagomes
 * Date: 16/12/2018
 * Time: 23:08
 */

namespace App\Infrastructure\Persistence\Doctrine\QuestionManagment\AnswerAggregate;


use App\Domain\QuestionManagment\AnswerAggregate\Answer;
use App\Domain\QuestionManagment\AnswerAggregate\AnswerId;
use App\Domain\QuestionManagment\AnswersRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

class DoctrineAnswersRepository implements AnswersRepository
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
     * Adds an answer to the repository
     *
     * @param Answer $answer
     * @return Answer
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function add(Answer $answer): Answer
    {
        $this->entityManager->persist($answer);
        $this->entityManager->flush();
        return $answer;
    }

    /**
     * Persists answer changes
     *
     * @param Answer $answer
     * @return Answer
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function update(Answer $answer): Answer
    {
        $this->entityManager->flush($answer);
        return $answer;
    }

    /**
     * Removes answer from repository
     *
     * @param Answer $answer
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function remove(Answer $answer): void
    {
        $this->entityManager->remove($answer);
        $this->entityManager->flush();
    }

    /**
     * Retrieves the user with provided userId
     *
     * @param AnswerId $answerId
     * @return Answer
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public function withAnswerId(AnswerId $answerId): Answer
    {
        $answer = $this->entityManager->find(Answer::class, $answerId);
        if (!$answer instanceof Answer) {
            throw new \RuntimeException("Answer not found.");
        }

        return $answer;
    }
}