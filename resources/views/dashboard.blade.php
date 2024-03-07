<x-app-layout>
    <div class="space-y-4">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <h2 class="mb-2 font-bold text-xl">Post Now!</h2>
            <form method="POST" action="{{ route('posts.store') }}">
                @csrf
                <textarea name="content" rows="3" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"></textarea>
                <x-input-error :messages="$errors->get('content')" class="mt-2" />
                <x-primary-button class="mt-4">Post</x-primary-button>
            </form>
        </div>

        @foreach($posts as $post)
            <x-post :post="$post"></x-post>
        @endforeach

        {{ $posts->render() }}
    </div>
</x-app-layout>
