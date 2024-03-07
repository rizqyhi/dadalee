<x-app-layout>
    <div class="space-y-4">
        <div class="flex bg-white overflow-hidden shadow-sm sm:rounded-lg p-4 space-x-2">
            <x-gravatar email="{{ auth()->user()->email }}" class="w-10 h-10 rounded-full" />
            <form method="POST" action="{{ route('posts.store') }}" class="w-full">
                @csrf
                <textarea name="content" placeholder="How's your day?" rows="3" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"></textarea>
                <x-input-error :messages="$errors->get('content')" class="mt-2" />
                <x-primary-button class="mt-4 float-right">Post</x-primary-button>
            </form>
        </div>

        @foreach($posts as $post)
            @if($loop->last && $posts->hasMorePages())
                <x-post :post="$post"
                        hx-get="{{ $posts->nextPageUrl() }}"
                        hx-trigger="revealed"
                        hx-select=".post"
                        hx-swap="afterend"
                ></x-post>
            @else
                <x-post :post="$post"></x-post>
            @endif
        @endforeach
    </div>
</x-app-layout>
