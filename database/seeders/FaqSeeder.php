<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Faq;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faqs = [
            [
                'question' => 'Dimana lokasi toko bunga Anda?',
                'answer' => 'Kami memiliki berada di Kota Bandung lebih tepatnya di Taman Konservasi Tega Lega, Lapangan Tegallega, Jl. Moch. Toha Los 16, Ciateul, Kota Bandung, Jawa Barat 40252. Anda juga dapat memesan bunga online melalui situs web kami.',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'question' => 'Apa metode pembayaran yang Anda terima?',
                'answer' => 'Kami menerima pembayaran menggunakan kartu kredit, transfer bank, dan pembayaran tunai saat pengiriman. Kami juga menerima pembayaran menggunakan dompet digital seperti OVO, GoPay, dan DANA.',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'question' => 'Bagaimana cara melakukan pemesanan?',
                'answer' => 'Anda dapat melakukan pemesanan melalui situs web kami dengan memilih produk yang diinginkan lau anda akan di arahkan ke kontak kami dengan produk yang di inginkan. Anda juga dapat menghubungi kami melalui WhatsApp atau telepon untuk bantuan lebih lanjut.',
                'order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}
