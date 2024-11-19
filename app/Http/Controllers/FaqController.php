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
            'title' => 'Frequently Asked Questions - ' . config('site_settings.company_name'),
            'description' => 'Find answers to common questions about our flower shop, delivery service, and floral arrangements.',
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
