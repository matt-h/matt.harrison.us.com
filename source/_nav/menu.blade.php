<nav class="hidden lg:flex items-center justify-end text-lg">
    <a title="{{ $page->siteName }} Blog" href="/blog"
        class="ml-6 text-gray-700 hover:text-blue-600 {{ $page->isActive('/blog') ? 'active text-blue-600' : '' }}">
        Blog
    </a>

    <a title="{{ $page->siteName }} About" href="/about"
        class="ml-6 text-gray-700 hover:text-blue-600 {{ $page->isActive('/about') ? 'active text-blue-600' : '' }}">
        About
    </a>

    <a title="{{ $page->siteName }} License" href="/license"
        class="ml-6 text-gray-700 hover:text-blue-600 {{ $page->isActive('/license') ? 'active text-blue-600' : '' }}">
        License
    </a>

    <a title="{{ $page->siteName }} Projects" href="/projects"
        class="ml-6 text-gray-700 hover:text-blue-600 {{ $page->isActive('/projects') ? 'active text-blue-600' : '' }}">
        Projects
    </a>
</nav>
