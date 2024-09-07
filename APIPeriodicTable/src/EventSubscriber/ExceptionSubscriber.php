<?php

namespace App\EventSubscriber;

use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

class ExceptionSubscriber implements EventSubscriberInterface
{
    public function __construct(private readonly Environment $environment)
    {
    }

    public function onKernelException(ExceptionEvent $event): void
    {
       $exception = $event->getThrowable();
       $url = $event->getRequest()->getPathInfo();

       if (str_contains($url, 'api')){
           $status = $exception instanceof HttpException ? $exception->getStatusCode() : 500;
           $message = $exception instanceof HttpException ? $exception->getMessage() : 'Internal Server Error';
           $data = ['status'=> $status, 'message'=>$message];
           $event->setResponse(new JsonResponse($data, $status));

       }elseif (!str_contains($url, 'api') && $exception instanceof HttpExceptionInterface && $exception->getStatusCode() === 404){
           $error = $this->environment->render('errors/404.html.twig');
           $response = new Response($error);
           $event->setResponse($response);
       }
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::EXCEPTION => 'onKernelException',
        ];
    }
}
