@props(['src', 'alt', 'class' => ''])

<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-src="{{ $src }}"
    alt="{{ $alt }}" class="lazy {{ $class }}" loading="lazy">
