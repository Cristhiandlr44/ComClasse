<nav class="admin-tools-nav" aria-label="Ferramentas administrativas">
    <a href="{{ route('admin.site.editor') }}" class="admin-tools-nav__link @if(request()->routeIs('admin.site.editor')) is-active @endif">
        <i class="bi bi-house-door" aria-hidden="true"></i>
        Editor da home
    </a>
    <a href="{{ route('admin.site.links') }}" class="admin-tools-nav__link @if(request()->routeIs('admin.site.links*')) is-active @endif">
        <i class="bi bi-link-45deg" aria-hidden="true"></i>
        Encaminhamentos
    </a>
</nav>
