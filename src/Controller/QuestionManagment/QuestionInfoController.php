<?php
/**
 * Created by PhpStorm.
 * User: carinagomes
 * Date: 17/12/2018
 * Time: 14:19
 */

namespace App\Controller\QuestionManagment;


use App\Application\QuestionManagment\QuestionAggregate\CreateQuestionCommand;
use App\Application\QuestionManagment\QuestionAggregate\CreateQuestionHandler;
use App\Controller\UserManagement\OAuth2\AuthenticatedControllerMethods;
use App\Domain\UserManagement\User;
use App\Domain\UserManagement\User\Email;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuestionInfoController extends AbstractController
{
    use AuthenticatedControllerMethods;

    private $handler;

    public function __construct(CreateQuestionHandler $handler)
    {
        $this->handler = $handler;
    }

    /**
     * @Route("/question/add")
     * @throws \Exception
     */
    public function create()
    {
        $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
        $body = filter_var($_POST['body'], FILTER_SANITIZE_STRING);
        if (isset($_POST['tags'])){
            $tags = explode(",",filter_var($_POST['tags'], FILTER_SANITIZE_STRING));
        }

        $mail = new Email('john.doe@example.com');
        $user = new User("test", $mail);

        $command = new CreateQuestionCommand($user, $title, $body, $tags);
        $this->handler->handle($command);

        return new Response(json_encode("Question Created"), 200, ['content-type' => 'application/json']);
    }
}