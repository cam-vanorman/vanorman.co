<ul class="inline-flex list-reset">

    @foreach ($socialNetworks as $network)
        <li class="px-2">
            <a
                class="transition duration-300 rounded-full p-3 text-center bg-steel-blue border-2 text-secondary border-secondary hover:border-steel-blue hover:bg-secondary hover:text-tertiary block"
                rel="nofollow noopener" target="_blank"
                href="{{ $network->url }}"
            >
                <span class="hidden sr-only">{{ $network->title }}</span>
                <i data-feather="{{ $network->icon }}"></i>
            </a>
        </li>
    @endforeach

</ul>