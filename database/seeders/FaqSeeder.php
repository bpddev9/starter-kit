<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Faq::insert([
            [
                'question' => 'How do I contact customer support?',
                'answer' => 'To contact our team, please visit the “Service” tab, available at the bottom of the homepage. Click on “Help and Support” button to leave us a message at any time, or email ',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'question' => 'Why did my payment get declined?',
                'answer' => 'Please ensure you are using a valid Visa or Mastercard and the correct card details have been entered. The name should match your Lotto.com account. If everything seems right but you are still experiencing issues, please try to use another card. We also encourage you to reach out to your card provider to find out if they process payments for lottery courier services as some don’t.',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
