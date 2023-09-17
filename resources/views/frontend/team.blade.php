
@include('frontend.navbar')

<!-- Our Team -->
<section class="text-gray-600 body-font" id="team">
  <div class="container px-5 pb-20 mx-auto">
    <div class="flex flex-col text-center w-full mb-20">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Our Team</h1>
      <p class="lg:w-2/3 mx-auto leading-relaxed text-base">We believed that knowledge would lead to awareness</p>
    </div>
    <div class="flex flex-wrap -m-2">
        @foreach ($staffs as $staff)


    <div class="p-2 lg:w-1/4 md:w-1/3 w-full">
        <div class="h-full flex-col items-center justify-center mx-auto px-8 border-b-blue-500 hover:border-b-blue-600 border-b-4 p-4 rounded-lg">
          <img alt="team" class="w-52 h-60 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mx-4" src="uploads/{{$staff->image}}">
          <div class="flex-grow items-center text-center pt-6">
            <h2 class="text-gray-900 title-font font-medium">{{$staff->names}}</h2>
            <p class="text-gray-500">{{$staff->title}}</p>
          </div>
        </div>
      </div>
      @endforeach


    </div>
  </div>
</section>

@include('frontend.footer')
