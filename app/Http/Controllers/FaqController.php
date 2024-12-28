<?php

namespace App\Http\Controllers;

use App\Models\Faq;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::where('is_active', true)
            ->orderBy('order')
            ->get();

        $seo = [
            'title' => 'Pertanyaan yang Sering Diajukan - ' . config('site_settings.company_name'),
            'description' => 'Temukan jawaban untuk pertanyaan umum tentang toko bunga kami, layanan pengiriman, dan rangkaian bunga.',
            'schema' => $this->getFaqSchema($faqs)
        ];


        return view('pages.faq', compact('faqs', 'seo'));
    }

    private function getFaqSchema($faqs)
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => $faqs->map(function ($faq) {
                return [
                    '@type' => 'Question',
                    'name' => $faq->question,
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => $faq->answer
                    ]
                ];
            })->toArray()
        ];
    }
}
