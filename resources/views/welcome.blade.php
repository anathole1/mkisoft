


<!-- </header> -->
@include('frontend.navbar')
<!-- navbar -->
<!-- featured section -->
<section class="body-font bg-gradient-to-tr from-teal-300 to-blue-400 text-white" id="home">
    @foreach ($background as $history)

    <h1 class="text-2xl p-6 font-medium">Welcome to CBO INGENZI, where community empowerment and positive change are at the heart of everything we do.</h1>
    <p class="px-8">We are delighted to have you visit our virtual home, where we share our mission, vision, and commitment to empowering communities and driving positive change throughout Rwanda.</p>
  <div class="container mx-auto flex px-5 pb-20 md:flex-row flex-col items-center">
    <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-6 md:mb-0">
      <img class="h-full rounded" alt="hero" src="uploads/{{ $history->image}}">
    </div>
    <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center ">
      <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium">{{$history->title}}

      </h1>
      <p class="mb-8 leading-relaxed text-justify">{!!  $history->description !!} </p>
      <div class="flex justify-center">

      </div>
    </div>
  </div>
  @endforeach
</section>

<!-- About us/our history -->

<section class="text-gray-600 bg-blue-100">
  <div class="container px-5 pb-20 mx-auto">
    <div class="flex flex-wrap">
        @foreach ($abouts as $about)

      <div  class="xl:w-1/3 lg:w-1/2 md:w-full px-8 py-6 border-l-2 border-emerald-400 border-opacity-60">
        <h2 class="text-lg sm:text-xl text-gray-900 font-medium title-font mb-2" >{{$about->title}}</h2>
        <p class="leading-relaxed text-base mb-4 text-justify">{!! $about->description !!}</p>

      </div>
      @endforeach

    </div>

  </div>
</section>



<!-- Contact US -->
<section class="text-gray-600 body-font relative bg-blue-200 pt-3" id="contact">
  <div class="container px-5 pb-20 mx-auto flex sm:flex-nowrap flex-wrap">
    <div class="lg:w-2/3 md:w-1/2 bg-gray-300 rounded-lg overflow-hidden sm:mr-10 p-10 flex items-end justify-start relative">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15950.066660759829!2d30.507149629387545!3d-1.946265473099968!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x19db4779ee9930b9%3A0xcfa740784c15c598!2sKayonza!5e0!3m2!1sen!2srw!4v1693555698409!5m2!1sen!2srw" width="100%" height="100%" class="absolute inset-0" frameborder="0" title="map" marginheight="0" marginwidth="0" scrolling="no" ></iframe>
    <!-- <iframe width="100%" height="100%" class="absolute inset-0" frameborder="0" title="map" marginheight="0" marginwidth="0" scrolling="no" src="https://maps.google.com/maps?width=100%&height=600&hl=en&q=%C4%B0zmir+(My%20Business%20Name)&ie=UTF8&t=&z=14&iwloc=B&output=embed" style="filter: grayscale(1) contrast(1.2) opacity(0.4);"></iframe> -->
      <div class="bg-white relative flex flex-wrap py-6 rounded shadow-md">
        <div class="lg:w-1/2 px-6">
          <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs">ADDRESS</h2>
          <p class="mt-1">Rwanda, Eastern Province, Kayonza District , Nyamirama Sector</p>
        </div>
        <div class="lg:w-1/2 px-6 mt-4 lg:mt-0">
          <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs">EMAIL</h2>
          <a class="text-blue-500 leading-relaxed" href="mailto:contact@cboingenzi.org">contact@cboingenzi.org</a>
          <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs mt-4">PHONE</h2>
          <p class="leading-relaxed">+250788484223 / +250785545749</p>
        </div>
      </div>
    </div>
    <div class="lg:w-1/3 md:w-1/2 bg-white flex flex-col md:ml-auto w-full md:py-8 mt-8 px-3 md:mt-0">
      <h2 class="text-gray-900 text-lg mb-1 font-medium title-font text-center">Feedback</h2>
      <p class="leading-relaxed mb-5 text-gray-600">For any enquires please reach out to us & We'll be in touch later.</p>

      <x-splade-form :action="route('contact.store')" class="p-4 bg-white rounded-md" >


        <x-splade-input name="names" label="Names" />
        <x-splade-input name="email" label="Email" />
        <x-splade-input name="subject" label="Subject" />
        <x-splade-textarea name="message" label="Your message" autosize />

        <x-splade-submit class="mt-2 text-white bg-blue-500 mb-2 border-0 py-2 px-6 focus:outline-none hover:bg-blue-600 rounded text-lg" >Send </x-splade-submit>
    </x-splade-form>

    </div>
  </div>
</section>

@include('frontend.footer')
