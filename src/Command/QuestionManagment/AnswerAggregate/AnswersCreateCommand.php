<?php
/**
 * Created by PhpStorm.
 * User: carinagomes
 * Date: 31/12/2018
 * Time: 18:43
 */

namespace App\Command\QuestionManagment\AnswerAggregate;

use App\Application\QuestionManagment\AnswerAggregate\CreateAnswerCommand;
use App\Application\QuestionManagment\QuestionAggregate\CreateQuestionCommand;
use App\Application\UserManagement\CreateUserCommand;
use App\Domain\QuestionManagment\AnswerAggregate\Answer;
use App\Domain\QuestionManagment\QuestionAggregate\Question;
use App\Domain\UserManagement\User;
use App\Domain\UserManagement\User\Email;
use League\Tactician\CommandBus;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class AnswersCreateCommand extends Command
{
    /**
     * @var CommandBus
     */
    private $commandBus;

    /**
     * @var SymfonyStyle
     */
    private $style;

    /**
     * @var User
     */
    private $user;

    /**
     * @var string
     */
    private $body;

    /**
     * @var Question
     */
    private $question;

    /**
     * UsersCreateCommand constructor.
     * @param CommandBus $commandBus
     */
    public function __construct(CommandBus $commandBus)
    {
        parent::__construct();
        $this->commandBus = $commandBus;
    }

    /**
     * @inheritdoc
     */
    public function configure()
    {
        $this
            ->setName('questions:create')
            ->setHelp('Creates a new question')
            ->addArgument('user', InputArgument::REQUIRED, 'User')
            ->addArgument('body', InputArgument::REQUIRED, 'Answers body')
            ->addArgument('question', InputArgument::OPTIONAL, 'Answers question')
        ;
    }

    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        parent::initialize($input, $output);
        $this->style = new SymfonyStyle($input, $output);

        $this->user = $input->getArgument('user');
        $this->body = $input->getArgument('body');
        $this->question = $input->getArgument('question');

    }

    protected function interact(InputInterface $input, OutputInterface $output)
    {
        $this->style->title('Add a new answer');
        parent::interact($input, $output);
        // $response = $this->style->askHidden('Please provided a password');
        //  $this->password =  new User\Password($response);
    }

    /**
     * @inheritdoc
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var Answer $answer */
        $answer = $this->commandBus->handle(new CreateAnswerCommand($this->body, $this->user, $this->question));

        $this->style->success("Question {$answer->body()} successfully created!");
        return 0;
    }
}
