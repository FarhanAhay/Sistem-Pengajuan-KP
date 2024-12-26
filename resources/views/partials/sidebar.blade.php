<div class="sidebar p-3" style="width: 250px; min-height: 100vh;">
    <h5 class="text-center mb-4">Menu</h5>
    <div class="list-group list-group-flush">
        <!-- Sidebar untuk Mahasiswa -->
        @if(auth()->user()->role == 'mahasiswa')
            <a href="{{ route('mahasiswa.dashboard') }}" 
               class="list-group-item list-group-item-action {{ request()->is('mahasiswa') ? 'active' : '' }}">
               <i class="fas fa-home icon"></i> Dashboard
            </a>
            <a href="{{ route('profile') }}" 
               class="list-group-item list-group-item-action {{ request()->is('profile') ? 'active' : '' }}">
               <i class="fas fa-user icon"></i> Profile
            </a>
            <a href="{{ route('proposals.index') }}" 
                class="list-group-item list-group-item-action {{ request()->is('proposals') ? 'active' : '' }}"">
               <i class="fas fa-book icon"></i> Proposal
            </a>
            <a href="#" class="list-group-item list-group-item-action">
               <i class="fas fa-cog icon"></i> Settings
            </a>
        @endif

        <!-- Sidebar untuk Admin -->
        @if(auth()->user()->role == 'admin')
            <a href="{{ route('admin.dashboard') }}" 
               class="list-group-item list-group-item-action {{ request()->is('admin') ? 'active' : '' }}">
               <i class="fas fa-home icon"></i> Dashboard
            </a>
            <a href="{{ route('profile') }}" 
               class="list-group-item list-group-item-action {{ request()->is('profile') ? 'active' : '' }}">
               <i class="fas fa-user icon"></i> Profile
            </a>
            <a href="{{ route('admin.status-pengajuan') }}" 
               class="list-group-item list-group-item-action {{ request()->is('admin/status-pengajuan') ? 'active' : '' }}">
               <i class="fas fa-check-circle icon"></i> Status Pengajuan
            </a>
            <a href="{{ route('admin.manage-users') }}" 
               class="list-group-item list-group-item-action {{ request()->is('admin/manage-users') ? 'active' : '' }}">
               <i class="fas fa-users icon"></i> Manage Users
            </a>
            <a href="#" class="list-group-item list-group-item-action {{ request()->is('admin/settings') ? 'active' : '' }}">
               <i class="fas fa-cogs icon"></i> Settings
            </a>
        @endif
    </div>
</div>
