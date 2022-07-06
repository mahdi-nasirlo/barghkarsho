 <!-- START SIDEBAR -->
 <div class="col-lg-3 col-12 sm:mt-2 max-h-2">
     <div class="card border px-3 sidebar rounded mb-6">
         <div class="py-4">
             <!-- SEARCH -->
             <div class="widget">
                 <form role="search" method="get">
                     <div class="input-group mb-3 border rounded">
                         <input type="text" id="s" name="s" class="form-control border-0"
                             placeholder="جستجوی کلمه کلیدی...">
                         <button type="submit" class="input-group-text bg-transparent border-0" id="searchsubmit"><i
                                 class="uil uil-search"></i></button>
                     </div>
                 </form>
             </div>
             <!-- SEARCH -->

             <!-- Categories -->
             @if ($cats->count() > 0)
                 <div class="widget mb-4 pb-2">
                     <h5 class="widget-title">دسته بندیها </h5>
                     <ul class="list-unstyled mt-4 mb-0 blog-categories">
                         @foreach ($cats as $cat)
                             @if ($cat->posts->count() > 0)
                                 <li>
                                     <a href="{{ route('article.list', $cat) }}">
                                         {{ $cat->name }}
                                     </a>
                                     <span class="float-end">
                                         {{ $cat->posts->count() }}
                                     </span>
                                 </li>
                             @endif
                         @endforeach
                     </ul>
                 </div>
             @endif
             <!-- Categories -->

             <!-- پست های اخیر -->
             @if ($lastArticles = App\Models\Blog\Post::latest()->take(3))
                 <div class="widget mb-4 pb-2">
                     <h5 class="widget-title">پست های اخیر</h5>
                     <div class="mt-4">
                         @foreach ($lastArticles->get() as $lastArticle)
                             <div class="clearfix post-recent d-flex items-center align-items-center">
                                 <div class="post-recent-thumb float-start"> <a href="jvascript:void(0)"> <img
                                             alt="img" src="{{ asset('/storage/' . $lastArticle->image) }}"
                                             class="img-fluid rounded"></a>
                                 </div>
                                 <div class="post-recent-content float-start">
                                     <a href="{{ route('article.single', $lastArticle) }}">
                                         {{ $lastArticle->title }}
                                     </a>
                                     <span class="text-muted mt-2">
                                         {{ jdate($lastArticle->created_at)->format('%d %B %Y') }}
                                     </span>
                                 </div>
                             </div>
                         @endforeach
                     </div>
                 </div>
             @endif
             <!-- پست های اخیر -->

             <!-- TAG CLOUDS -->
             <div class="widget">
                 <h5 class="widget-title">برچسب های ابری</h5>
                 <div class="tagcloud mt-4">
                     @foreach (\App\Models\Tag::all() as $tag)
                         <a href="jvascript:void(0)" class="rounded">
                             {{ json_decode($tag->name)->fa }}
                         </a>
                     @endforeach

                 </div>
             </div>
             <!-- TAG CLOUDS -->

             {{-- <!-- SOCIAL -->
                            <div class="widget">
                                <h5 class="widget-title">دنبال کردن ما</h5>
                                <ul class="list-unstyled social-icon mb-0 mt-4">
                                    <li class="list-inline-item"><a href="javascript:void(0)"
                                            class="rounded"><i data-feather="facebook"
                                                class="fea icon-sm fea-social"></i></a></li>
                                    <li class="list-inline-item"><a href="javascript:void(0)"
                                            class="rounded"><i data-feather="instagram"
                                                class="fea icon-sm fea-social"></i></a></li>
                                    <li class="list-inline-item"><a href="javascript:void(0)"
                                            class="rounded"><i data-feather="twitter"
                                                class="fea icon-sm fea-social"></i></a></li>
                                    <li class="list-inline-item"><a href="javascript:void(0)"
                                            class="rounded"><i data-feather="linkedin"
                                                class="fea icon-sm fea-social"></i></a></li>
                                    <li class="list-inline-item"><a href="javascript:void(0)"
                                            class="rounded"><i data-feather="github"
                                                class="fea icon-sm fea-social"></i></a></li>
                                    <li class="list-inline-item"><a href="javascript:void(0)"
                                            class="rounded"><i data-feather="youtube"
                                                class="fea icon-sm fea-social"></i></a></li>
                                    <li class="list-inline-item"><a href="javascript:void(0)"
                                            class="rounded"><i data-feather="gitlab"
                                                class="fea icon-sm fea-social"></i></a></li>
                                </ul>
                                <!--end icon-->
                            </div>
                            <!-- SOCIAL --> --}}
         </div>
     </div>
 </div>
 <!--end col-->
 <!-- END SIDEBAR -->
