<?php

namespace App\Command\QuestionManagment\QuestionAggregate;

    use App\Application\QuestionManagment\QuestionAggregate\CreateQuestionCommand;
    use App\Application\UserManagement\CreateUserCommand;
    use App\Domain\QuestionManagment\QuestionAggregate\Question;
    use App\Domain\UserManagement\User;
    use App\Domain\UserManagement\User\Email;
    use League\Tactician\CommandBus;
    use Symfony\Component\Console\Command\Command;
    use Symfony\Component\Console\Input\InputArgument;
    use Symfony\Component\Console\Input\InputInterface;
    use Symfony\Component\Console\Output\OutputInterface;
    use Symfony\Component\Console\Style\SymfonyStyle;

    /**
     * UsersCreateCommand
     *
     * @package App\Command\UserManagement
     */
final class QuestionsCreateCommand extends Command
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
    private $title;

    /**
     * @var string
     */
    private $body;

    /**
     * @var array
     */
    private $tags;

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
            ->addArgument('title', InputArgument::REQUIRED, 'Questions title')
            ->addArgument('body', InputArgument::REQUIRED, 'Questions body')
            ->addArgument('tags', InputArgument::OPTIONAL, 'Questions tags')
        ;
    }

    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        parent::initialize($input, $output);
        $this->style = new SymfonyStyle($input, $output);

        $this->user = $input->getArgument('user');
        $this->title = $input->getArgument('title');
        $this->body = $input->getArgument('body');
    }

    protected function interact(InputInterface $input, OutputInterface $output)
    {
        $this->style->title('Add a new question');
        parent::interact($input, $output);
       // $response = $this->style->askHidden('Please provided a password');
      //  $this->password =  new User\Password($response);
    }

    /**
     * @inheritdoc
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var Question $question */
        $question = $this->commandBus->handle(new CreateQuestionCommand($this->title, $this->body, $this->user, $this->tags));

        $this->style->success("Question {$question->title()} successfully created!");
        return 0;
    }
}
