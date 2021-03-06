<?php

namespace Rezzza\CommandBus\Domain\Exception;

use Rezzza\CommandBus\Domain\CommandInterface;

class CommandHandlerFailedException extends \LogicException
{
    private $command;

    public function __construct(CommandInterface $command, \Exception $exception)
    {
        $message = sprintf('Command [%s] failed with message: %s', get_class($command), $exception->getMessage());

        parent::__construct($message, $exception->getCode(), $exception);

        $this->command = $command;
    }

    public function getCommand()
    {
        return $this->command;
    }
}
