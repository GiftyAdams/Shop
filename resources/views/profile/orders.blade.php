<x-auth-layout>
    <main class="px-20">
        <div class="py-5">
            <x-header> My Profile</x-header>
        </div>
        <div class="grid grid-cols-4 gap-4 ">
            <div class="col-span-1">
                <x-user-nav />
            </div>

            <div class="col-span-3">
               <x-orders-card />
               
            </div>
            {{-- <div class="border border-gray-200 mt-2"></div> --}}
    </main>
</x-auth-layout>