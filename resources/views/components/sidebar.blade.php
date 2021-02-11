<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link @if(request()->is('admin')) active @endif" aria-current="page" href="{{ route('admin.dashboard') }}">
                    <span data-feather="home"></span>
                    Управление
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->is('admin/news') || request()->is('admin/news/*')) active @endif"
                   href="{{ route('news.index') }}">
                    <span data-feather="file"></span>
                    Новости
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->is('feedback') || request()->is('feedback/*')) active @endif" href="{{ route('feedback.index') }}">
                    <span data-feather="file"></span>
                    Обратная связь
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->is('resource') || request()->is('resource/*')) active @endif" href="{{ route('resource.index') }}">
                    <span data-feather="file"></span>
                    Ресурсы обновления
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->is('admin/userProfile') || request()->is('userProfile/*')) active @endif" href="{{ route('userProfile.index') }}">
                    <span data-feather="file"></span>
                    Профили пользователей
                </a>
            </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Saved reports</span>
            <a class="link-secondary" href="#" aria-label="Add a new report">
                <span data-feather="plus-circle"></span>
            </a>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Current month
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Last quarter
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Social engagement
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Year-end sale
                </a>
            </li>
        </ul>
    </div>
</nav>
