<div class="rounded border w-64 space-y-2 sticky top-0">
    <ul class="grid grid-rows-5">
        <li>
            <a href="/profile"
                class="{{ request()->is('profile') ? 'bg-black text-white  ' : 'font-medium' }}
            side-nav">
                <x-svg.user />
                <span>Personal Information</span>
            </a>
        </li>
        <li>
            <a href="/profile/orders"
                class="{{ request()->is('profile/orders') ? 'bg-black text-white  ' : 'font-medium' }}
            side-nav">
                <x-svg.shopping-bag />
                <span>My Orders</span>
            </a>
        </li>
        <li>
            <a href="/wishlist"
                class="{{ request()->is('wishlist') ? 'bg-black text-white  ' : 'font-medium' }}
             side-nav">
                <x-svg.heart />
                <span class="active:">My Wishlist</span>
            </a>
        </li>
        <li>
            <a href="#"
                class="{{ request()->is('address') ? 'bg-black text-white  ' : 'font-medium' }}
             side-nav ">
                <x-svg.location />
                <span>Manage Address</span>
            </a>
        </li>
        <li>
            <a href="/profile/settings"
                class="{{ request()->is('profile/settings') ? 'bg-black text-white  ' : 'font-medium' }}
             side-nav">
                <x-svg.setting />
                <span>Settings</span>
            </a>
        </li>
    </ul>
</div>
