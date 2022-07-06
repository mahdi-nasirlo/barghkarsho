@if ($comments->count() > 0)
    <div class="card shadow rounded border-0 mt-4">
        <div class="py-3 px-2">
            <h5 class="card-title mb-0">نظرات :</h5>

            @error('content')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror

            <ul class="media-list list-unstyled mb-0">
                @include('layouts.comment.child', [
                    'commetns' => $comments,
                    'commentable' => $commentable,
                ])
            </ul>
        </div>
    </div>
@endif
