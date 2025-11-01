 <nav id="sidebar" class="sidebar js-sidebar">
     <div class="sidebar-content js-simplebar">
         <a class="sidebar-brand" href="index.html">
             <span class="align-middle">NumberOne Accountent</span>
         </a>
         <ul class="sidebar-nav">
             <li class="sidebar-header">Home</li>

             <li class="sidebar-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                 <a class="sidebar-link" href="{{ route('admin.dashboard') }}">
                     <i class="align-middle" data-feather="sliders"></i>
                     <span class="align-middle">First Section</span>
                 </a>
             </li>

             <li class="sidebar-item {{ request()->routeIs('admin.about') ? 'active' : '' }}">
                 <a class="sidebar-link" href="{{ route('admin.about') }}">
                     <i class="align-middle" data-feather="sliders"></i>
                     <span class="align-middle">About Page</span>
                 </a>
             </li>

             <li class="sidebar-item {{ request()->routeIs('admin.contact') ? 'active' : '' }}">
                 <a class="sidebar-link" href="{{ route('admin.contact') }}">
                     <i class="align-middle" data-feather="sliders"></i>
                     <span class="align-middle">Contact Page</span>
                 </a>
             </li>

             <li class="sidebar-item {{ request()->routeIs('admin.legal_documentation') ? 'active' : '' }}">
                 <a class="sidebar-link" href="{{ route('admin.legal_documentation') }}">
                     <i class="align-middle" data-feather="sliders"></i>
                     <span class="align-middle">Legal</span>
                 </a>
             </li>

             <li class="sidebar-item {{ request()->routeIs('admin.resources') ? 'active' : '' }}">
                 <a class="sidebar-link" href="{{ route('admin.resources') }}">
                     <i class="align-middle" data-feather="sliders"></i>
                     <span class="align-middle">Resources</span>
                 </a>
             </li>

             <li class="sidebar-item {{ request()->routeIs('admin.pricing') ? 'active' : '' }}">
                 <a class="sidebar-link" href="{{ route('admin.pricing') }}">
                     <i class="align-middle" data-feather="sliders"></i>
                     <span class="align-middle">Pricing</span>
                 </a>
             </li>
             <li class="sidebar-item {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                 <a class="sidebar-link" href="{{ route('admin.users.index') }}">
                     <i class="align-middle" data-feather="users"></i>
                     <span class="align-middle">Users</span>
                 </a>
             </li>

             <li class="sidebar-item {{ request()->routeIs('admin.transactions.*') ? 'active' : '' }}">
                 <a class="sidebar-link" href="{{ route('admin.transactions.index') }}">
                     <i class="align-middle" data-feather="credit-card"></i>
                     <span class="align-middle">Total Transaction List</span>
                 </a>
             </li>
         </ul>
         {{-- <ul class="sidebar-nav">
             <li class="sidebar-header">
                 About
             </li>

             <li class="sidebar-item ">
                 <a class="sidebar-link" href="{{ route('admin.about') }}">
                     <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">About Page</span>
                 </a>
             </li>



         </ul>
         <ul class="sidebar-nav">
             <li class="sidebar-header">
                 Contact
             </li>

             <li class="sidebar-item ">
                 <a class="sidebar-link" href="{{ route('admin.contact') }}">
                     <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Contact Page</span>
                 </a>
             </li>



         </ul>

         <ul class="sidebar-nav">
             <li class="sidebar-header">
                 Legal Documentation
             </li>

             <li class="sidebar-item active">
                 <a class="sidebar-link" href="{{ route('admin.legal_documentation') }}">
                     <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Legal</span>
                 </a>
             </li>



         </ul>

         <ul class="sidebar-nav">
             <li class="sidebar-header">
                 Resources
             </li>

             <li class="sidebar-item active">
                 <a class="sidebar-link" href="{{ route('admin.resources') }}">
                     <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Resources</span>
                 </a>
             </li>



         </ul>

         <ul class="sidebar-nav">
             <li class="sidebar-header">
                 Pricing
             </li>

             <li class="sidebar-item active">
                 <a class="sidebar-link" href="{{ route('admin.pricing') }}">
                     <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Pricing</span>
                 </a>
             </li>



         </ul> --}}

     </div>
 </nav>
