 {{-- <div class="text-gray-600 body-font w-full lg:w-11/12 mx-auto">
     @include('layouts.comment.commentHead', ['product' => $product])
     <div class="text-gray-600 body-font mx-auto ">
         <div class="pt-1 mx-auto ">
             <div class="w-full mx-auto px-4">
                 <div class="w-full lg:w-full mx-auto">
                     @if (count($comments) > 0)
                         <div class="border mb-5 rounded-md bg-white px-1 md:px-4 flex items-center py-2">
                             <div class="antialiased w-full">
                                 <div class="space-y-4">
                                     @include('layouts.comment.child', ['comments' => $comments])
                                 </div>
                             </div>
                         </div>
                     @else
                         <div class="mx-auto w-full mb-4">
                             <div class="w-full text-center">
                                 <i class="fa-solid fa-message text-gray-300 text-6xl"></i>
                             </div>
                             <div class="w-full text-center text-2xl text-gray-300">پیامی وجود ندارد</div>
                     @endif
                 </div>
             </div>
         </div>
     </div>
 </div> --}}

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

 <script></script>
