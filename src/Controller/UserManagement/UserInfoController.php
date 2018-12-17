<?php

/**
 * This file is part of S4Skeleton project
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Controller\UserManagement;

use App\Application\QuestionManagment\AnswerAggregate\DeleteAnswerCommand;
use App\Controller\UserManagement\OAuth2\AuthenticatedControllerInterface;
use App\Controller\UserManagement\OAuth2\AuthenticatedControllerMethods;
use App\Domain\QuestionManagment\AnswerAggregate\AnswerId;
use League\Tactician\CommandBus;
use MongoDB\Driver\Command;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * UserInfoController
 *
 * @package App\Controller\UserManagement
 */
final class UserInfoController extends AbstractController implements AuthenticatedControllerInterface
{
    use AuthenticatedControllerMethods;

    /**
     * @return Response
     *
     * @Route("/users/me")
     */
    public function info()
    {
        return new Response(json_encode($this->currentUser()), 200, ['content-type' => 'application/json']);
    }
}
