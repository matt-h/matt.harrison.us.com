<nav id="js-nav-menu" class="hidden w-auto px-2 pt-6 pb-2 bg-gray-200 shadow lg:hidden">
    <ul class="my-0">
        <li class="pl-4">
            <a
                title="{{ $page->siteName }} Blog"
                href="/blog/"
                class="block mt-0 mb-4 text-sm no-underline {{ $page->isActive('/blog/') ? 'active text-blue-500' : 'text-gray-800 hover:text-blue-500' }}"
            >Blog</a>
        </li>
        <li class="pl-4">
            <a
                title="{{ $page->siteName }} About"
                href="/about/"
                class="block mt-0 mb-4 text-sm no-underline {{ $page->isActive('/about/') ? 'active text-blue-500' : 'text-gray-800 hover:text-blue-500' }}"
            >About</a>
        </li>
        <li class="pl-4">
            <a
                title="{{ $page->siteName }} License"
                href="/license/"
                class="block mt-0 mb-4 text-sm no-underline {{ $page->isActive('/license/') ? 'active text-blue-500' : 'text-gray-800 hover:text-blue-500' }}"
            >License</a>
        </li>
        <li class="pl-4">
            <a
                title="{{ $page->siteName }} Projects"
                href="/projects/"
                class="block mt-0 mb-4 text-sm no-underline {{ $page->isActive('/projects/') ? 'active text-blue-500' : 'text-gray-800 hover:text-blue-500' }}"
            >Projects</a>
        </li>
    </ul>
</nav>
