@extends('_layouts.master')

@push('meta')
  <meta property="og:locale" content="es_ES"/>
  <meta property="og:title" content="{{ $page->title }}"/>
  <meta property="og:type" content="article"/>
  <meta property="og:url" content="{{ $page->getUrl() }}"/>
  <meta property="og:description" content="{{ $page->description }}"/>
  <meta property="og:image" content="{{ $page->cover_image }}"/>
  <meta property="og:image:width" content="1100"/>
  <meta property="og:image:height" content="440"/>
  @if($page->reference)
    <link rel="alternate" hreflang="en" href="{{ $page->reference }}"/>
  @endif
  @foreach($page->categories as $i => $tag)
    <meta property="article:tag" content="{{ $tag }}"/>
  @endforeach
@endpush

@section('body')
  <div class="w-full flex md:flex-row scrollbar">
    <!-- POST CONTENT -->
    <div class="w-full lg:w-4/5 bg-white rounded-none md:rounded-lg border shadow">
      @if ($page->cover_image)
        <img src="{{ $page->cover_image }}" alt="{{ $page->title }} cover image" class="mb-2 w-full rounded-none md:rounded-t-lg">
      @endif

      <div class="w-full p-6 md:p-12 md:pb-6">
        <h1 class="leading-none mb-2 text-4xl text-center md:text-left md:text-5xl">{{ $page->title }}</h1>

        <p class="text-gray-700 text-md md:mt-0">
          <a href="/acerca-de-mi">{{ $page->author }}</a>
          • <span
              class="inline-block bg-purple-200 leading-loose tracking-wide
            text-gray-800 uppercase text-xs font-semibold rounded px-2 pt-px cursor-default"
          >
            {{ $page->reading_time->full }}
          </span>
          <span class="hidden md:inline-block">• {{ strftime("%d de %B, %Y", $page->getDate()->getTimestamp()) }}</span>
        </p>
        @if ($page->categories)
          @foreach ($page->categories as $i => $category)
            <a
                href="{{ '/blog/secciones/' . $category }}"
                title="View posts in {{ $category }}"
                class="inline-block bg-gray-300 hover:bg-purple-200 leading-loose tracking-wide text-gray-800 uppercase text-xs font-semibold rounded mr-4 px-3 pt-px"
            >{{ $category }}</a>
          @endforeach
        @endif

        <div class="post-content border-b border-purple-200 mb-10 pb-4 anchor-tags break-words" v-pre>
          @yield('content')
        </div>

        <div class="share-btn flex flex-col items-center mb-8"
             data-title="{{ $page->title }}"
             data-desc="{{ $page->getExcerpt(200) }}">
          <span class="mb-4 ">Si te pareció interesante el artículo, ayúdame a difundirlo: </span>
          <div class="flex flex-row items-center justify-center w-full -mx-4">
            <a class="mx-2 md:mx-3 shadow md:shadow-lg cursor-pointer rounded-full hover:bg-gray-200"
               data-id="tw">
              <svg class="w-10 md:w-16" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M23.9999 0C37.2555 0 48 10.746 48 24.0001C48 37.2557 37.2555 48 23.9999 48C10.7443 48 0 37.2555 0 24.0001C0 10.746 10.7445 0 23.9999 0Z"
                    fill="white"/>
                <path
                    d="M39.0045 16.1686C37.9561 16.6215 36.828 16.926 35.6446 17.0641C36.8537 16.3605 37.7806 15.249 38.2171 13.9216C37.0862 14.5741 35.8351 15.0466 34.5016 15.3001C33.4351 14.1976 31.9156 13.509 30.2326 13.509C27.0047 13.509 24.3857 16.0486 24.3857 19.1835C24.3857 19.629 24.4368 20.0625 24.5371 20.4781C19.6771 20.2411 15.3661 17.9805 12.4832 14.5471C11.9792 15.3856 11.6911 16.359 11.6911 17.4C11.6911 19.368 12.7231 21.108 14.2922 22.1236C13.3322 22.0936 12.4321 21.84 11.6417 21.4126V21.4846C11.6417 24.2356 13.6576 26.5292 16.3336 27.0511C15.8431 27.1802 15.3271 27.2507 14.7931 27.2507C14.4166 27.2507 14.0506 27.2162 13.6936 27.1487C14.4375 29.4047 16.5976 31.0456 19.1581 31.0908C17.1557 32.6147 14.6341 33.5207 11.8936 33.5207C11.4211 33.5207 10.9561 33.4937 10.4971 33.4413C13.0876 35.0523 16.1596 35.9928 19.4641 35.9928C30.2221 35.9928 36.1051 27.3408 36.1051 19.8407L36.0886 19.1057C37.2285 18.3076 38.2201 17.3086 39.0045 16.1686Z"
                    fill="#26A6D1"/>
              </svg>
            </a>
            <a class="mx-2 md:mx-3 shadow md:shadow-lg cursor-pointer rounded-full hover:bg-gray-200"
               data-id="fb">
              <svg class="w-10 md:w-16" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M23.9999 0C37.2555 0 48 10.746 48 24.0001C48 37.2557 37.2555 48 23.9999 48C10.7443 48 0 37.2555 0 24.0001C0 10.746 10.7445 0 23.9999 0Z"
                    fill="white"/>
                <path
                    d="M26.922 16.5224H30.0151V11.9534H26.3791V11.9699C21.9736 12.1259 21.0706 14.6024 20.991 17.2034H20.982V19.485H17.9821V23.9594H20.982V35.9533H25.503V23.9594H29.2065L29.922 19.485H25.5045V18.1065C25.5045 17.2275 26.0895 16.5224 26.922 16.5224Z"
                    fill="#3B5998"/>
              </svg>
            </a>
            <a class="mx-2 md:mx-3 shadow md:shadow-lg cursor-pointer rounded-full hover:bg-gray-200"
               data-id="in">
              <svg class="w-10 md:w-16" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M23.9999 0C37.2555 0 48 10.746 48 24.0001C48 37.2542 37.2555 48 23.9999 48C10.7443 48 0 37.254 0 24.0001C0 10.7462 10.7445 0 23.9999 0Z"
                    fill="white"/>
                <path
                    d="M13.524 32.9759H18.018V17.9969H13.524V32.9759ZM31.0321 17.478C28.851 17.478 26.8995 18.2745 25.5151 20.0326V17.9476H21.0046V32.9761H25.5151V24.8491C25.5151 23.1316 27.0887 21.456 29.0596 21.456C31.0306 21.456 31.5166 23.1316 31.5166 24.8071V32.9746H36.0107V24.4726C36.0105 18.567 33.2146 17.478 31.0321 17.478ZM15.75 16.5C16.992 16.5 18.0001 15.4919 18.0001 14.2499C18.0001 13.0079 16.992 12 15.75 12C14.508 12 13.4999 13.008 13.4999 14.2501C13.4999 15.4921 14.508 16.5 15.75 16.5Z"
                    fill="#0E76A8"/>
              </svg>
            </a>
            <a class="mx-2 md:mx-3 shadow md:shadow-lg cursor-pointer rounded-full hover:bg-gray-200 hidden md:flex"
               data-id="re">
              <svg class="w-10 md:w-16" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M48 24C48 37.255 37.255 48 24 48C10.745 48 0 37.255 0 24C0 10.745 10.745 0 24 0C37.255 0 48 10.745 48 24Z"
                    fill="white"/>
                <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M40.9329 24.5486C40.9329 22.2184 39.0443 20.3298 36.7141 20.3298C35.7847 20.3298 34.9259 20.6312 34.2286 21.1403C31.8973 19.4333 28.8314 18.3043 25.4286 18.0553L26.2731 13.2986H29.944C30.4307 14.139 31.3385 14.7048 32.3796 14.7048C33.9327 14.7048 35.1921 13.4458 35.1921 11.8923C35.1921 10.3389 33.9327 9.07983 32.3796 9.07983C31.3385 9.07983 30.4307 9.64563 29.944 10.4861H24L22.548 18.0571C19.1543 18.3094 16.0975 19.4374 13.7714 21.1403C13.0741 20.6312 12.2153 20.3298 11.2859 20.3298C8.95569 20.3298 7.06714 22.2188 7.06714 24.5486C7.06714 26.1573 7.96729 27.5552 9.2915 28.2667C9.25452 28.5919 9.23438 28.9208 9.23438 29.2533C9.23438 35.4664 15.8452 40.5029 24 40.5029C32.1548 40.5029 38.7656 35.4664 38.7656 29.2529C38.7656 28.9208 38.7455 28.5919 38.7085 28.2667C40.0327 27.5552 40.9329 26.157 40.9329 24.5486ZM28.2371 32.5338C27.0245 33.1377 25.5201 33.4706 24 33.4717H23.9927C22.433 33.4717 20.8956 33.1227 19.6633 32.4891L18.3768 34.99C20.0229 35.8367 21.965 36.2842 23.9927 36.2842H24C25.9746 36.2831 27.873 35.8572 29.4906 35.0515L28.2371 32.5338ZM26.7546 27.3611C26.7546 28.9146 28.0137 30.1736 29.5671 30.1736C31.1202 30.1736 32.3796 28.9146 32.3796 27.3611C32.3796 25.8076 31.1202 24.5486 29.5671 24.5486C28.0137 24.5486 26.7546 25.8076 26.7546 27.3611ZM18.3171 24.5486C16.7637 24.5486 15.5046 25.8076 15.5046 27.3611C15.5046 28.9146 16.7637 30.1736 18.3171 30.1736C19.8702 30.1736 21.1296 28.9146 21.1296 27.3611C21.1296 25.8076 19.8702 24.5486 18.3171 24.5486Z"
                      fill="#F76937"/>
              </svg>
            </a>
            <a class="mx-2 md:mx-3 shadow md:shadow-lg cursor-pointer rounded-full hover:bg-gray-200 hidden md:flex"
               data-id="tg">
              <svg class="w-10 md:w-16" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M24 48C37.2548 48 48 37.2548 48 24C48 10.7452 37.2548 0 24 0C10.7452 0 0 10.7452 0 24C0 37.2548 10.7452 48 24 48Z"
                    fill="white"/>
                <path
                    d="M10.982 23.48L34.122 14.558C35.196 14.17 36.134 14.82 35.786 16.444L35.788 16.442L31.848 35.004C31.556 36.32 30.774 36.64 29.68 36.02L23.68 31.598L20.786 34.386C20.466 34.706 20.196 34.976 19.576 34.976L20.002 28.87L31.122 18.824C31.606 18.398 31.014 18.158 30.376 18.582L16.634 27.234L10.71 25.386C9.42404 24.978 9.39604 24.1 10.982 23.48V23.48Z"
                    fill="#039BE5"/>
              </svg>
            </a>
            <a class="mx-2 md:mx-3 shadow md:shadow-lg cursor-pointer rounded-full hover:bg-gray-200"
               data-id="wa">
              <svg class="w-10 md:w-16" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M23.9871 0.0125848C10.7401 0.0153956 0.00357906 10.7565 0.00638989 24.0035C0.00732684 28.5905 1.32364 33.081 3.79905 36.9428L0.0672913 46.6251C-0.131435 47.14 0.124914 47.7186 0.639859 47.9173C0.755009 47.9617 0.877281 47.9845 1.00068 47.9843C1.11517 47.9849 1.22882 47.9653 1.33648 47.9263L11.3306 44.3584C22.5751 51.3616 37.3678 47.9233 44.3709 36.6787C51.374 25.4342 47.9357 10.6416 36.6912 3.63847C32.8795 1.26444 28.4778 0.00818114 23.9871 0.0125848Z"
                    fill="white"/>
                <path
                    d="M35.4224 28.098C35.4224 28.098 32.9739 26.8987 31.4407 26.0992C29.7058 25.2057 27.667 26.8787 26.7076 27.8302C25.2144 27.2566 23.8505 26.3909 22.6959 25.2837C21.5886 24.1293 20.7228 22.7654 20.1494 21.272C21.1009 20.3106 22.7699 18.2738 21.8804 16.5389C21.0909 15.0038 19.8816 12.5572 19.8816 12.5553C19.712 12.2185 19.3673 12.0059 18.9901 12.0056H16.9914C14.0805 12.5083 11.964 15.0482 11.9943 18.002C11.9943 21.1401 15.7501 27.1686 18.2827 29.7031C20.8152 32.2375 26.8436 35.9914 29.9837 35.9914C32.9375 36.0217 35.4774 33.9052 35.9801 30.9944V28.9956C35.9804 28.6144 35.7642 28.2663 35.4224 28.098Z"
                    fill="#4CAF50"/>
              </svg>
            </a>
          </div>
        </div>

        <div id="commento"></div>
      </div>
    </div>

    <!-- POST INSIDE NAVIGATION -->
    <navigation-on-page :headings="pageHeadings"></navigation-on-page>
  </div>

  <!-- PREV/NEXT POSTS -->
  <nav class="flex flex-col md:flex-row items-center md:justify-between md:text-base my-4 md:w-3/4 break-words">
    <div class="mx-4 md:w-1/3 text-center lg:text-left py-4">
      @if ($next = $page->getNext())
        <a href="{{ $next->getUrl() }}" title="Anterior: {{ $next->title }}">
          &LeftArrow; <br>{{ $next->title }}
        </a>
      @endif
    </div>

    <div class="mx-4 md:w-1/3 text-center lg:text-right py-4">
      @if ($previous = $page->getPrevious())
        <a href="{{ $previous->getUrl() }}" title="Siguiente: {{ $previous->title }}">
          &RightArrow; <br>
          {{ $previous->title }}
        </a>
      @endif
    </div>
  </nav>

  <!-- CONTRIBUTE IN GITHUB -->
  <div
      class="fixed z-100 bottom-0 left-0 right-0 flex-auto w-full max-w-6xl mx-auto pt-4 pb-8 hidden xl:flex xl:justify-end">
    <a class="mr-6"
       href="https://github.com/kennyhorna/kennyhorna-blog/edit/master/source/_posts/{{ $page->getFilename() }}.md">
      <span
          class="px-3 py-2 rounded bg-white text-gray-800 font-semibold text-gray-800 text-sm flex flex-row inline-block shadow">
        <svg class="text-gray-800 fill-current w-4 mr-2 inline-block" xmlns="http://www.w3.org/2000/svg"
             viewBox="0 0 512 512" xml:space="preserve">
          <g><path
                d="M255.968,5.329C114.624,5.329,0,120.401,0,262.353c0,113.536,73.344,209.856,175.104,243.872 c12.8,2.368,17.472-5.568,17.472-12.384c0-6.112-0.224-22.272-0.352-43.712c-71.2,15.52-86.24-34.464-86.24-34.464 c-11.616-29.696-28.416-37.6-28.416-37.6c-23.264-15.936,1.728-15.616,1.728-15.616c25.696,1.824,39.2,26.496,39.2,26.496 c22.848,39.264,59.936,27.936,74.528,21.344c2.304-16.608,8.928-27.936,16.256-34.368 c-56.832-6.496-116.608-28.544-116.608-127.008c0-28.064,9.984-51.008,26.368-68.992c-2.656-6.496-11.424-32.64,2.496-68 c0,0,21.504-6.912,70.4,26.336c20.416-5.696,42.304-8.544,64.096-8.64c21.728,0.128,43.648,2.944,64.096,8.672 c48.864-33.248,70.336-26.336,70.336-26.336c13.952,35.392,5.184,61.504,2.56,68c16.416,17.984,26.304,40.928,26.304,68.992 c0,98.72-59.84,120.448-116.864,126.816c9.184,7.936,17.376,23.616,17.376,47.584c0,34.368-0.32,62.08-0.32,70.496 c0,6.88,4.608,14.88,17.6,12.352C438.72,472.145,512,375.857,512,262.353C512,120.401,397.376,5.329,255.968,5.329z"/></g>
        </svg>
        <span class="leading-tight">Editar en Github</span>
      </span>
    </a>
  </div>
@endsection

@push('scripts')
  <script src="{{ mix('js/share-buttons.js', 'assets/build') }}"></script>
  <script src="https://cdn.commento.io/js/commento.js"></script>
@endpush
