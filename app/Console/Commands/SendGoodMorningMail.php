<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendGoodMorningMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:goodmorning';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Good Morning email to customers with post_code 1216 and country Bangladesh';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $batchSize = 500; // Process 500 emails at a time

        Customer::whereJsonContains('address->post_code', '1216')
                ->whereJsonContains('address->country', 'Bangladesh')
                ->chunk($batchSize, function ($customers) {
                foreach ($customers as $customer) {
                    try {
                        // Try to queue the email
                        Mail::to($customer->email)->queue(new GoodMorningMail());
    
                    } catch (\Exception $e) {
                        // Log the error if an error occurs
                        \Log::error('Failed to send email to: ' . $customer->email . ' - Error: ' . $e->getMessage());
    
                        // we can continue processing other customers without stopping
                        continue;
                    }
                }
            });
    
        $this->info('Good Morning emails queued successfully.');
    }
}
