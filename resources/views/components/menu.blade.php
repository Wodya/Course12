<aside class="menu ml-3">
    <p class="menu-label">
        Новости
    </p>
    <ul class="menu-list">
        <li><a class="menu-list @if(Request::is('news/*')) is-active @endif" href="{{route('news.category.list')}}">Категории</a></li>
    </ul>
    <p class="menu-label">
        Administration
    </p>
    <ul class="menu-list">
        <li><a>Team Settings</a></li>
        <li>
            <a class="">Manage Your Team</a>
            <ul>
                <li><a>Members</a></li>
                <li><a>Plugins</a></li>
                <li><a>Add a member</a></li>
            </ul>
        </li>
        <li><a>Invitations</a></li>
        <li><a>Cloud Storage Environment Settings</a></li>
        <li><a>Authentication</a></li>
    </ul>
    <p class="menu-label">
        Transactions
    </p>
    <ul class="menu-list">
        <li><a>Payments</a></li>
        <li><a>Transfers</a></li>
        <li><a>Balance</a></li>
    </ul>
</aside>
