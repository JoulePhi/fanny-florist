<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "FloristShop",
    "name": "{{ config('site_settings.company_name') }}",
    "image": "{{ asset('images/store-front.jpg') }}",
    "address": {
        "@type": "PostalAddress",
        "streetAddress": "{{ config('site_settings.address') }}",
        "addressLocality": "{{ config('site_settings.city') }}",
        "addressRegion": "{{ config('site_settings.state') }}",
        "postalCode": "{{ config('site_settings.postal_code') }}",
        "addressCountry": "ID"
    },
    "geo": {
        "@type": "GeoCoordinates",
        "latitude": {{ config('site_settings.latitude') }},
        "longitude": {{ config('site_settings.longitude') }}
    },
    "url": "{{ url('/') }}",
    "telephone": "{{ config('site_settings.phone') }}",
    "priceRange": "Rp",
    "openingHoursSpecification": {!! json_encode(config('site_settings.opening_hours_schema')) !!}
}
</script>
