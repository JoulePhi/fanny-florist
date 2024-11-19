<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    public function index()
    {
        $seo = [
            'title' => 'Contact Us - ' . config('site_settings.company_name'),
            'description' => 'Get in touch with ' . config('site_settings.company_name') . '. Visit our store or contact us for flower delivery and arrangements.',
            'schema' => $this->getContactSchema()
        ];

        return view('pages.contact', compact('seo'));
    }

    // public function store(ContactRequest $request)
    // {
    //     Mail::to(config('site_settings.email'))
    //         ->send(new ContactFormMail($request->validated()));

    //     return back()->with('success', 'Thank you for your message. We will get back to you soon!');
    // }

    private function getContactSchema()
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'ContactPage',
            'name' => 'Contact ' . config('site_settings.company_name'),
            'description' => 'Contact us for flower arrangements and delivery.',
            'mainEntity' => [
                '@type' => 'LocalBusiness',
                'name' => config('site_settings.company_name'),
                'address' => [
                    '@type' => 'PostalAddress',
                    'streetAddress' => config('site_settings.address'),
                    'addressLocality' => config('site_settings.city'),
                    'addressRegion' => config('site_settings.state'),
                    'postalCode' => config('site_settings.postal_code'),
                    'addressCountry' => 'ID'
                ],
                'telephone' => config('site_settings.phone'),
                'email' => config('site_settings.email')
            ]
        ];
    }
}
