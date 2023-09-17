@include('frontend.navbar')
<section class="text-gray-600 body-font" id="programs">
   <div class="container px-5 pb-20 mx-auto">
        <div class="flex flex-col">
            <div class="flex sm:flex-row flex-col py-6 mb-12">
            <p class=" leading-relaxed text-base sm:pl-2 pl-0">CBO INGENZI came into existence as a result of the motivation and personal initiative of its founder members to enhance the socio-economic status of the underprivileged people within community.</p>
            </div>
        </div>
        <div class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4">
            @foreach ($programs as $program)
                <div class="p-4 md:w-1/3 sm:mb-0 mb-6">
                    <div class="rounded-lg h-64 overflow-hidden">
                        <img alt="content" class="object-cover object-center h-full w-full" src="uploads/{{ $program->image}}">
                    </div>
                    <h3 class="text-blue-600 font-semibold text-2xl">{{$program->category->name}}</h3>
                    <h2 class="text-xl font-medium title-font text-gray-900 mt-5">{{$program->title}}</h2>
                    <p class="text-base leading-relaxed mt-2">{!! $program->description !!}</p>
                </div>
            @endforeach
        </div>
  </div>
</section>

@include('frontend.footer')
