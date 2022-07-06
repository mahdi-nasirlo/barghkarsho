    {{-- @foreach ($replyComments as $replyComment)
        <div class="space-y-4 mt-2">
            <div class="flex">
                <div class="flex-shrink-0 ml-3">
                    <img class="mt-3 rounded-full w-6 h-6 sm:w-8 sm:h-8" src="{{ $replyComment->user->avatar }}" </div>
                    <div class="flex-1 bg-gray-100 rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
                        <strong>{{ $replyComment->user->name }}</strong> <span class="text-xs text-gray-400">
                            {{ $replyComment->created_at->format('H:i') }}
                        </span>
                        <p class="text-xs sm:text-sm">
                            {{ $replyComment->content }}
                        </p>
                    </div>
                </div>
            </div>
    @endforeach --}}
    {{-- src="https://images.unsplash.com/photo-1604426633861-11b2faead63c?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=200&h=200&q=80" --}}
    {{-- 3:34 PM --}}

    {{-- @foreach ($comments as $comment)
        <img class="mt-2 rounded-full w-8 h-8 sm:w-10 sm:h-10" <div class="flex w-full mt-3">
        <div class="flex-shrink-0 ml-1 md:ml-3">
            src="{{ $comment->user->avatar }}" alt="">
        </div>
        <div
            class="flex-1 border shadow-sm rounded-lg px-1 md:px-4 py-2 sm:px-6 sm:py-4 leading-relaxed @if ($comment->parent_id !== 0) bg-slate-50 @endif">

            <div class="flex justify-between">
                <div class="flex items-center">
                    <span class="text-xs text-gray-400 flex items-center">
                        {{ jdate($comment->created_at)->ago() }}
                    </span>
                    <strong class="mr-2">{{ $comment->user->name }}</strong>
                </div>

                @auth
                    <button data-modal-toggle="defaultModal"
                        class="commentModalBtn text-sm flex rounded-md border border-white text-gray-500 font-semibold hover:rounded-md px-2 py-1 hover:text-blue-800 hover:border-orange-500"
                        replay_name="{{ $comment->user->name . ' برای ' }}" parent_id='{{ $comment->id }}'>
                        پاسخ
                    </button>
                @endauth

            </div>

            <p class="text-sm">
                {{ $comment->content }}
            </p>

            @include('layouts.comment.child', ['comments' => $comment->child])
        </div>
        </div>
    @endforeach --}}

    @foreach ($comments as $comment)
        @if ($comment->is_visible)
            <li class="mt-4">
                <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                        <a class="pe-3" href="#">
                            @if ($comment->user->avatar)
                                <img class="w-10 h-10 p-1 rounded" src="{{ $comment->user->avatar }}"
                                    alt="Bordered avatar">
                            @else
                                <div class="relative w-10 h-10 overflow-hidden bg-gray-100 rounded dark:bg-gray-600">
                                    <svg style="width: 20px;color: rgb(255, 115, 0)" class="" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd">
                                        </path>
                                    </svg>
                                </div>
                            @endif

                        </a>
                        <div class="commentor-detail">
                            <h6 class="mb-0"><a href="javascript:void(0)" class="text-dark media-heading">
                                    {{ $comment->user->name }}
                                </a>
                            </h6>
                            <small class="text-muted">
                                {{ \Morilog\Jalali\Jalalian::forge($comment->created_at)->format('%A, %d %B %Y') }}
                            </small>
                        </div>
                    </div>
                    {{-- <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#commentModal"
                    class="text-muted"><i class="mdi mdi-reply commentModalBtn"
                        answer="{{ $comment->user->name }}"></i> پاسخ </a> --}}
                    @auth
                        {{-- <button data-bs-toggle="modal" data-bs-target="#commentModal"
                        class="commentModalBtn py-0 btn px-1 rounded-md border border-1 border-white text-gray-500 font-semibold hover:rounded-md hover:text-blue-800 hover:border-orange-500"
                        replay_name="{{ $comment->user->name }}" parent_id='{{ $comment->id }}'>
                        پاسخ
                    </button> --}}
                        <button style="height: 28px; line-height: 12px bg-warning" data-bs-toggle="modal"
                            data-bs-target="#commentModal" type="button" replay_name="{{ $comment->user->name }}"
                            parent_id='{{ $comment->id }}'
                            class="commentModalBtn btn btn-sm btn-outline-warning">پاسخ</button>
                    @endauth
                    <!-- Modal Content Start -->
                    <div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="commentModal-title"
                        style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content rounded shadow border-0">
                                <div class="modal-header border-bottom">
                                    <h5 class="modal-title" id="commentModal-title">ثبت پاسخ به </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="بستن"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="comment_form" class="mt-3" method="POST"
                                        action="{{ route('comment.stor') }}">

                                        @csrf

                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <label class="form-label">نظر شما</label> --}}
                                                <div class="form-icon position-relative">
                                                    <i data-feather="message-circle" class="fea icon-sm icons"></i>
                                                    <textarea id="message" placeholder="کامنت شما" rows="5" name="content"
                                                        class="form-control ps-5 border border-slate-300 rounded focus:border-orange-400" required=""></textarea>
                                                </div>
                                            </div>
                                            <!--end col-->


                                            <input type="hidden" id="commentable_id" name="commentable_id"
                                                value="{{ $commentable->id }}">

                                            <input type="hidden" name="commentable_type"
                                                value="{{ get_class($commentable) }}">

                                            <input id="parent_id" type="hidden" name="parent_id" value="0">
                                        </div>
                                        <!--end row-->
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button id="send_replay_comments" class="btn btn-primary">ارسال
                                        دیدگاه</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Content End -->
                </div>
                <div class="mt-3">
                    <p class="text-muted fst-italic p-3 bg-light rounded">
                        " {{ $comment->content }} "
                    </p>
                </div>

                @if ($comment->child()->count() > 0)
                    <ul class="list-unstyled ps-4 ps-md-5 sub-comment">
                        @include('layouts.comment.child', ['comments' => $comment->child])
                    </ul>
                @endif
            </li>
        @endif
    @endforeach
