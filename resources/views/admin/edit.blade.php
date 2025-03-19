<x-auth-layout>
    <main class="flex-1 p-6 bg-white">
        <div class="container">
            <h2 class="text-xl font-semibold mb-4">Edit Category</h2>
    
            <form action="{{ route('categories.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
    
                <div class="mb-3">
                    <label for="name">Category Name</label>
                    <input type="text" name="name" class="form-control border p-2" value="{{ $category->name }}" required>
                </div>
    
                <button type="submit" class="bg-blue-500 text-white px-4 py-2">Update</button>
            </form>
        </div>
    </main>
</x-auth-layout>