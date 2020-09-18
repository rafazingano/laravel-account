<?php

namespace ConfrariaWeb\Account\Commands;

use ConfrariaWeb\Account\Services\AccountService;
use Illuminate\Console\Command;

class GenerateInvoices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'account:generate-invoices';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Invoices';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @param AccountService $accountService
     * @return void
     */
    public function handle(AccountService $accountService)
    {
        $accountService->generateInvoices();
    }
}
