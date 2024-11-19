@props(['title', 'description', 'image', 'url'])

{{-- Open Graph --}}
<meta property="og:title" content="{{ $title }}">
<meta property="og:description" content="{{ $description }}">
<meta property="og:image" content="{{ $image }}">
<meta property="og:url" content="{{ $url }}">
<meta property="og:type" content="website">

{{-- Twitter Card --}}
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $title }}">
<meta name="twitter:description" content="{{ $description }}">
<meta name="twitter:image" content="{{ $image }}">

{{-- WhatsApp Preview --}}
<meta property="og:site_name" content="{{ config('app.name') }}">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
