<?php

namespace ConfrariaWeb\Account\Commands;

use ConfrariaWeb\Account\Services\AccountService;
use ConfrariaWeb\Financial\Services\FinancialService;
use ConfrariaWeb\Financial\Services\InvoiceService;
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
    protected $description = 'Generate invoices in the financial';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(AccountService $accountService, InvoiceService $invoiceService)
    {
        $accounts = $accountService->all();
        foreach ($accounts as $account) {
            if ($account->invoices->isEmpty()) {
                $invoiceService->create([
                    'financialable_type' => $account::class,
                    'financialable_id' => $account->id,
                    'period' => 'monthly',
                    'initial_date' => $account->created_at,
                    'amount' => $account->plan->price,
                    'quotas' => 0,
                ]);
            }
        }
        //return 0;
    }
}
