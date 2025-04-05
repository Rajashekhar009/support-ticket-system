<div class="card overflow-hidden">
    <div class="card-body pt-3">
        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
            <li class="nav-item">
                <a class="nav-link rounded {{ Route::is('dashboard') ? 'text-white bg-dark' : 'text-dark bg-light' }}" href="/dashboard">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link rounded {{ Request::is('tickets') ? 'text-white bg-dark' : 'text-dark bg-light' }}" href="/tickets">Tickets List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link rounded {{ Route::is('tickets.create') ? 'text-white bg-dark' : 'text-dark bg-light' }}" href="/tickets/create">Create Ticket</a>
            </li>
            <li class="nav-item">
                <a class="nav-link rounded text-dark bg-light" href="/logout">Logout</a>
            </li>
        </ul>
    </div>
</div>
