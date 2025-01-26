<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;

class MarkOldSocksInactive extends Command
{
    protected $signature = 'products:mark-inactive';
    protected $description = 'Mark products as inactive when category is "Socks" and created more than 2 years ago';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $products = Product::whereHas('category', function($query) {
            $query->where('name', 'Socks');
        })->where('created_at', '<', now()->subYears(2))
          ->update(['active' => false]);

        $this->info('Old socks products have been marked as inactive.');
    }
}
