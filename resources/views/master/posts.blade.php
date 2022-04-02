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
                    @foreach (auth()->user()->posts as $post)
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
                           <a
                              href="javascript:void(0)"
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
                           <a
                              href="javascript:void(0)"
                              class="
                              border border-danger
                              py-2
                              px-6
                              text-danger
                              inline-block
                              rounded
                              hover:bg-danger hover:text-white
                              "
                              >
                           Supprimer
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