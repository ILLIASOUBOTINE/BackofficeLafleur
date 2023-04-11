<?php

namespace App\Console\Commands;

use App\Models\Produit;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class NotifyProductOutOfStock extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:product-out-of-stock';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notify recipients when a product is out of stock';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $products = Produit::where('quantiteTotale', 0)->get();

        // if ($products->count() > 0) {
        //     $recipients = ['soubotineillia@gmail.com']; // адреса получателей

        //     foreach ($recipients as $recipient) {
        //         Mail::to($recipient)->send(new ProductOutOfStockNotification($products));
        //     }
        // }
        if ($products->count() > 0) {
            $email = 'soubotineillia@gmail.com';
            $subject = 'Out of stock notification';
            $body = 'The following products are out of stock: ' . $products->implode('name', ', ');
            
            Mail::raw($body, function ($message) use ($email, $subject) {
                $message->to($email)->subject($subject);
            });
        }
        

        return Command::SUCCESS;
    }
}