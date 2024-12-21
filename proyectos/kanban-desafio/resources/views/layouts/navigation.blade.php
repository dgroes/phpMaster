<nav class="navbar bg-base-100">
    <!-- Logo -->
    <div class="flex-1">
      <a href="{{ route('dashboard') }}" class="btn btn-ghost text-xl">Kanban Chanchito Feliz</a>
    </div>
  
    <!-- Links -->
    <div class="flex-none">
      <ul class="menu menu-horizontal px-4">
          <li><a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</a></li>
        <li><a href="{{ route('tasks.create') }}" class="{{ request()->routeIs('tasks.create') ? 'active' : '' }}">Nueva tarea</a></li>
        <!-- Dropdown -->
        <li>
          <details>
            <summary>{{Auth::user()->name}}</summary>
            <ul class="bg-base-100 rounded-t-none p-2">
              <li><a href="{{ route('profile.edit') }}">Profile</a></li>
              <li>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); this.closest('form').submit();">
                    Log Out
                  </a>
                </form>
              </li>
            </ul>
          </details>
        </li>
      </ul>
    </div>
  </nav>
  