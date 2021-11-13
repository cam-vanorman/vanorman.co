<title>{{ $title && $page->site['name'] !== $title  ? $title . ' | ' . $page->site['name'] : $page->site['name'] }}</title>

<meta name="description" content="{{ $description ? $description : $page->site['description'] }}">

<meta property="og:title" content="{{ isset($title) ?  $title . ' | ' : '' }}{{ $page->site['name'] }}"/>
<meta property="og:type" content="{{ isset($type) ? $type : '' }}" />
<meta property="og:url" content="{{ $url }}"/>
<meta property="og:image" content="{{ isset($image) ? $image : $page->site['logo'] }}" />
<meta property="og:description" content="{{ $description ? $description : $page->site['description'] }}" />