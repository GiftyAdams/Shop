<aside class="w-40 bg-gray-100 p-4">
    <ul class="space-y-2 text-sm">
        {{-- <li><a href="/admin/dashboard" class="block rounded-md px-2 py-1 hover:bg-gray-200">Dashboard</a>
        </li>
        <li><a href="/admin/orders" class="block rounded-md px-2 py-1 hover:bg-gray-200">Orders</a></li>
        <li><a href="/admin/customers" class="block rounded-md px-2 py-1 hover:bg-gray-200">Customers</a></li>
        <li><a href="/admin/show" class="block rounded-md px-2 py-1 hover:bg-gray-200">Products</a></li>
        <li><a href="/admin/categories" class="block rounded-md px-2 py-1 hover:bg-gray-200">Categories</a></li>
        <li><a href="#" class="block rounded-md px-2 py-1 hover:bg-gray-200">Brands</a></li>
        <li><a href="#" class="block rounded-md px-2 py-1 hover:bg-gray-200">Log Out</a></li> --}}
        <li>
            <a href="/admin/dashboard" 
               class="{{ request()->is('admin/dashboard') ? 'font-extrabold' : 'font-medium' }} 
                      text-black rounded-md px-3 py-2 text-sm hover:bg-gray-200">
                Dashboard
            </a>
        </li>
        
        <li>
            <a href="/admin/orders" 
               class="{{ request()->is('admin/orders*') ? 'font-extrabold' : 'font-medium' }} 
                      text-black rounded-md px-3 py-2 text-sm hover:bg-gray-200">
                Orders
            </a>
        </li>
        
        <li>
            <a href="/admin/customers" 
               class="{{ request()->is('admin/customers') ? 'font-extrabold' : 'font-medium' }} 
                      text-black rounded-md px-3 py-2 text-sm hover:bg-gray-200">
                Customers
            </a>
        </li>
        
        <li>
            <a href="/admin/show" 
               class="{{ request()->is('admin/show') ? 'font-extrabold' : 'font-medium' }} 
                      text-black rounded-md px-3 py-2 text-sm hover:bg-gray-200">
                Products
            </a>
        </li>
        
        <li>
            <a href="/admin/categories" 
               class="{{ request()->is('admin/categories') ? 'font-extrabold' : 'font-medium' }} 
                      text-black rounded-md px-3 py-2 text-sm hover:bg-gray-200">
                Categories
            </a>
        </li>
        
        <li>
            <a href="/admin/brands" 
               class="{{ request()->is('admin/brands') ? 'font-extrabold' : 'font-medium' }} 
                      text-black rounded-md px-3 py-2 text-sm hover:bg-gray-200">
                Brands
            </a>
        </li>
        
        <li>
            <a href="/admin/genders" 
               class="{{ request()->is('admin/genders') ? 'font-extrabold' : 'font-medium' }} 
                      text-black rounded-md px-3 py-2 text-sm hover:bg-gray-200">
                Genders
            </a>
        </li>

        <li>
            <a href="/admin/reviews" 
               class="{{ request()->is('admin/reviews') ? 'font-extrabold' : 'font-medium' }} 
                      text-black rounded-md px-3 py-2 text-sm hover:bg-gray-200">
                Reviews
            </a>
        </li>

        <li>
            <form action="/logout" method="POST">
                @csrf
                <button type="submit"
                        class="font-medium text-black rounded-md px-3 py-2 text-sm hover:bg-gray-200 w-full text-left">
                    Log Out
                </button>
            </form>
        </li>
    
    </ul>
</aside>