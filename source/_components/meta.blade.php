<title>{{ $page->site['name'] }} – {{ $page->site['role'] }}{{ $title ? ' | ' . $title : '' }}</title>

<meta name="description" content="{{ $description ? $description : $page->site['description'] }}">

<meta property="og:title" content="{{ $title ?  $title . ' | ' : '' }}{{ $page->site['name'] }}"/>
<meta property="og:type" content="{{ $type }}" />
<meta property="og:url" content="{{ $url }}"/>
<meta property="og:description" content="{{ $description ? $description : $page->site['description'] }}" />