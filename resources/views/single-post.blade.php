<x-app-layout>
    <div class="space-y-6">
    <x-post :post="$post"></x-post>

    <h2 class="mb-2 font-bold text-xl">Replies</h2>

    @forelse($replies as $reply)
        <x-post :post="$reply"></x-post>
    @empty
        <div class="sm:rounded-lg p-4 border border-dashed border-gray-300">
            No replies yet :(
        </div>
    @endforelse

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
        <h3 class="mb-2 font-bold">Reply to this post</h3>
        <form method="POST" action="{{ route('posts.store') }}">
            @csrf
            <input type="hidden" name="parent_id" value="{{ $post->id }}">
            <textarea name="content" rows="3" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"></textarea>
            <x-input-error :messages="$errors->get('content')" class="mt-2" />
            <x-primary-button class="mt-4">Post</x-primary-button>
        </form>
    </div>
    </div>
</x-app-layout>
