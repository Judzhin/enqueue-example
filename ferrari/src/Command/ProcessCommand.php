<?php

namespace App\Command;

use App\Message\ProcessMessage;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\MessageBusInterface;

/**
 * Class ProcessCommand
 * @package App\Command
 */
class ProcessCommand extends Command
{
    /** @var MessageBusInterface */
    private $commonBus;

    protected static $defaultName = 'mq:process';

    /**
     * ProcessCommand constructor.
     *
     * @param MessageBusInterface $commonBus
     */
    public function __construct(MessageBusInterface $commonBus)
    {
        $this->commonBus = $commonBus;
        parent::__construct(self::$defaultName);
    }

    protected function configure()
    {
        $this
            ->setDescription('Add a short description for your command')
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    /**
     * @inheritDoc
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     * @throws \Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        /** @var SymfonyStyle $io */
        $io = new SymfonyStyle($input, $output);

        /** @var ProcessMessage $message */
        $message = new ProcessMessage(sprintf(
            'Send car work to process at %s', (new \DateTime)->format('d-m-Y H:i:s')
        ));

        $this->commonBus
            ->dispatch(new Envelope($message));

        $io->writeln(sprintf('Send message "%s"', $message->getContent()));

        return 0;
    }
}
