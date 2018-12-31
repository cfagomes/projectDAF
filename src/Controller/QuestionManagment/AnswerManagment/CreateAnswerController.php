<?php
/**
 * Created by PhpStorm.
 * User: carinagomes
 * Date: 31/12/2018
 * Time: 17:02
 */

namespace App\Controller\QuestionManagment\AnswerManagment;


use App\Application\QuestionManagment\AnswerAggregate\CreateAnswerCommand;
use App\Application\QuestionManagment\AnswerAggregate\CreateAnswerHandler;
use App\Controller\UserManagement\OAuth2\AuthenticatedControllerMethods;
use Symfony\Bridge\PsrHttpMessage\Tests\Fixtures\Response;

class CreateAnswerController
{
    use AuthenticatedControllerMethods;

    private $handler;

    public function __construct(CreateAnswerHandler $handler)
    {
        $this->handler = $handler;
    }

    /**
     * @Route("/answer/add")
     * @throws \Exception
     */
    public function create()
    {
        $questionId = filter_var($_POST['questionId'], FILTER_SANITIZE_STRING);
        $body = filter_var($_POST['body'], FILTER_SANITIZE_STRING);


        $command = new CreateAnswerCommand($this->currentUser(), $body, $questionId );
        $this->handler->handle($command);

        return new Response(json_encode($this->handler->handle($command) ), 200, ['content-type' => 'application/json']);
    }
}