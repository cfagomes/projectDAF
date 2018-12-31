<?php
/**
 * Created by PhpStorm.
 * User: carinagomes
 * Date: 31/12/2018
 * Time: 16:59
 */

namespace App\Controller\QuestionManagment\QuestionManagment;

use App\Application\QuestionManagment\QuestionAggregate\CreateQuestionCommand;
use App\Application\QuestionManagment\QuestionAggregate\CreateQuestionHandler;
use App\Controller\UserManagement\OAuth2\AuthenticatedControllerInterface;
use App\Controller\UserManagement\OAuth2\AuthenticatedControllerMethods;
use App\Domain\UserManagement\User;
use App\Domain\UserManagement\User\Email;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateQuestionController extends AbstractController implements AuthenticatedControllerInterface
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
        $tags = explode(",",filter_var($_POST['tags'], FILTER_SANITIZE_STRING));

        $command = new CreateQuestionCommand($this->currentUser(), $title, $body, $tags);


        return new Response(json_encode($this->handler->handle($command)), 200, ['content-type' => 'application/json']);
    }
}