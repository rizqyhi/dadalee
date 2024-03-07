<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-4">
            <x-gravatar email="{{ $user->email }}" class="w-20 h-20 rounded-full" />
            <div>
                <h1 class="mb-2">
                    <span class="mr-2 text-3xl font-bold">{{ $user->name }}</span>
                    <span>({{ $user->username }})</span>
                </h1>
                <div>{{ $user->posts->count() }} posts</div>
            </div>
        </div>
    </x-slot>

    <div class="space-y-4">
        @foreach($posts as $post)
            <x-post :post="$post"></x-post>
        @endforeach

        {{ $posts->links() }}
    </div>
</x-app-layout>
