<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "{{ config('site_settings.company_name') }}",
    "url": "{{ url('/') }}",
    "logo": "{{ asset('images/logo.png') }}",
    "contactPoint": {
        "@type": "ContactPoint",
        "telephone": "{{ config('site_settings.phone') }}",
        "contactType": "customer service",
        "availableLanguage": ["en", "id"]
    },
    "sameAs": [
        "{{ config('site_settings.facebook_url') }}",
        "{{ config('site_settings.instagram_url') }}"
    ]
}
</script>
