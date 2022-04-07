<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdn.tailgrids.com/tailgrids-fallback.css" />
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

<!-- ====== Table Section Start -->
<section class="">
   <div class="container">
      <div class="flex flex-wrap -mx-4">
         <div class="w-full px-4">
            {{-- <div class="max-w-full overflow-x-auto"> --}}
            <div class="max-w-full">
               <table class="table-auto w-full">
                  <thead>
                     <tr class="bg-black text-center">
                        <th
                           class="
                           w-1/6
                           min-w-[160px]
                           text-lg
                           font-semibold
                           text-white
                           py-4
                           lg:py-7
                           px-3
                           lg:px-4
                           "
                           >
                           Title
                        </th>
                        <th
                           class="
                           w-1/6
                           min-w-[160px]
                           text-lg
                           font-semibold
                           text-white
                           py-4
                           lg:py-7
                           px-3
                           lg:px-4
                           "
                           >
                           Description
                        </th>
                        <th
                           class="
                           w-1/6
                           min-w-[160px]
                           text-lg
                           font-semibold
                           text-white
                           py-4
                           lg:py-7
                           px-3
                           lg:px-4
                           "
                           >
                           Options
                        </th>
                     </tr>
                  </thead>
                  <tbody>
                    @foreach (auth()->user()->posts()->withTrashed()->get() as $post)
                     <tr>
                        
                        <td
                           class="
                           text-center text-dark
                           font-medium
                           text-base
                           py-5
                           px-2
                           bg-[#fafafa]
                           border-b border-[#E8E8E8]
                           "
                           >
                           {{ $post->title }}
                        </td>
                        <td
                           class="
                           text-center text-dark
                           font-medium
                           text-base
                           py-5
                           px-2
                           bg-white
                           border-b border-[#E8E8E8]
                           "
                           >
                           {{ Str::limit($post->body, 10) }}
                        </td>
                        <td
                           class="
                           text-center text-dark
                           font-medium
                           text-base
                           py-5
                           px-2
                           bg-white
                           border-b border-r border-[#E8E8E8]
                           "
                           >
                           @if ($post->trashed())
                              <a
                                 href="{{ route('posts.restore', $post->slug) }}"
                                 class="
                                 border border-info
                                 py-2
                                 px-6
                                 text-info
                                 inline-block
                                 rounded
                                 hover:bg-info hover:text-white
                                 "
                                 >
                                 Restore
                              </a>
                              <form id="{{ $post->id }}" action="{{ route('posts.delete', $post->slug) }}" method="POST">
                                 @csrf
                                 @method('DELETE')
                              </form>
                           @else
                              <form id="{{ $post->id }}" action="{{ route('posts.destroy', $post->slug) }}" method="POST">
                                 @csrf
                                 @method('DELETE')
                              </form>
                           @endif
                           
                            <button class="
                              border border-danger
                              py-2
                              px-6
                              text-danger
                              inline-block
                              rounded
                              hover:bg-danger hover:text-white
                              " type="submit" onclick="event.preventDefault();
                                if(confirm('Are you sure ?'))
                                document.getElementById({{ $post->id }}).submit();">Supprimer</button>
                                <a
                                href="{{ route('posts.edit', $post->slug) }}"
                                class="
                                border border-info
                                py-2
                                px-6
                                text-info
                                inline-block
                                rounded
                                hover:bg-info hover:text-white
                                "
                                >
                             Modifier
                             </a>
                        </td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- ====== Table Section End -->   