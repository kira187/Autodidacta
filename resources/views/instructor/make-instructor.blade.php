<x-app-layout>
    {{--  Header site  --}}
    <div class="relative flex flex-col-reverse py-16 lg:pt-0 lg:flex-col lg:pb-0">
        <div class="inset-y-0 top-0 right-0 z-0 w-full max-w-xl px-4 mx-auto md:px-0 lg:pr-0 lg:mb-0 lg:mx-0 lg:w-7/12 lg:max-w-full lg:absolute xl:px-0">
          <svg class="absolute left-0 hidden h-full text-gray-50 transform -translate-x-1/2 lg:block" viewBox="0 0 100 100" fill="currentColor" preserveAspectRatio="none slice">
            <path d="M50 0H100L50 100H0L50 0Z"></path>
          </svg>
          <img class="object-cover w-full h-56 rounded shadow-lg lg:rounded-none lg:shadow-none md:h-96 lg:h-full" src="{{asset('img/home/teacher.jpg')}}" alt="" />
        </div>
        <div class="relative flex flex-col items-start w-full max-w-xl px-4 mx-auto md:px-0 lg:px-8 lg:max-w-screen-xl">
          <div class="mb-16 lg:my-40 lg:max-w-lg lg:pr-5">
            <h2 class="mb-5 font-sans text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl sm:leading-none">
                Ven a enseñar <br class="hidden md:block" /> con 
              <span class="inline-block text-red-500">nosotros</span>
            </h2>
            <p class="pr-5 mb-5 text-base text-gray-700 md:text-lg">
              Enseña lo que sabes y ayuda a los estudiantes a explorar sus intereses, adquirir nuevas habilidades y avanzar en sus carreras.
            </p>
            <div class="flex items-center">
              <a
                href="{{ route('upgrade.to-instructor')}}" class="inline-flex items-center justify-center h-12 px-6 mr-6 font-medium tracking-wide text-white transition duration-200 rounded shadow-md bg-red-600 hover:bg-red-700 focus:shadow-outline focus:outline-none" > Empieza ahora </a>
            </div>
          </div>
        </div>
    </div>

    <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
        <div class="max-w-xl mb-10 sm:mx-auto">
          <h2 class="font-sans text-3xl font-bold leading-tight tracking-tight text-gray-900 sm:text-4xl sm:text-center">
            Hay tantas razones para empezar
          </h2>
        </div>
        <div class="grid gap-12 row-gap-8 lg:grid-cols-3">
          <div class="flex">
            <div class="mr-4">
              <div class="flex items-center justify-center w-10 h-10 mb-3 rounded-full bg-indigo-50">
                <svg class="h-8 w-8 text-red-500"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                  </svg>                  
              </div>
            </div>
            <div>
              <h6 class="mb-2 font-semibold leading-5">Inspira a los estudiantes </h6>
              <p class="text-sm text-gray-900"> Enseña lo que sabes y ayuda a los estudiantes a explorar sus intereses, adquirir nuevas habilidades y avanzar en sus carreras. </p>
            </div>
          </div>
          <div class="flex">
            <div class="mr-4">
              <div class="flex items-center justify-center w-10 h-10 mb-3 rounded-full bg-indigo-50">
                <i class="fas fa-chalkboard-teacher fa-2x text-red-500"></i>
              </div>
            </div>
            <div>
              <h6 class="mb-2 font-semibold leading-5">Enseña a tu manera </h6>
              <p class="text-sm text-gray-900">
                Publica el curso que quieras, como quieras y ten siempre el control de tu propio contenido.
              </p>
            </div>
          </div>
          <div class="flex">
            <div class="mr-4">
              <div class="flex items-center justify-center w-10 h-10 mb-3 rounded-full bg-indigo-50">
                <i class="fas fa-hands-helping text-red-500 fa-2x"></i>
              </div>
            </div>
            <div>
              <h6 class="mb-2 font-semibold leading-5">Apoya a la comunidad </h6>
              <p class="text-sm text-gray-900">
                Amplía tu red profesional, desarrolla tus conocimientos y gana dinero con cada inscripción de pago.
              </p>
            </div>
          </div>
        </div>
    </div>

    <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
        <div class="max-w-xl mb-10 md:mx-auto sm:text-center lg:max-w-2xl md:mb-12">
          <h2 class="max-w-lg mb-6 font-sans text-3xl font-bold leading-none tracking-tight text-gray-900 sm:text-4xl md:mx-auto">
            Como empezar
          </h2>
        </div>
        <div class="grid max-w-screen-lg gap-8 lg:grid-cols-2 sm:mx-auto">
          <div class="flex flex-col justify-center">
            <div class="flex">
              <div class="mr-4">
                <div class="flex items-center justify-center w-10 h-10 mb-3 rounded-full bg-indigo-50">
                    <i class="fas fa-book-reader fa-2x text-red-500"></i>
                </div>
              </div>
              <div>
                <h6 class="mb-2 font-semibold leading-5">
                  Crea tu programa
                </h6>
                <p class="text-sm text-gray-900">
                    El primer paso lo das con tu pasión y conocimiento. Después, solo tienes que escoger un tema prometedor.
                </p>
                <p class="text-sm text-gray-900"> Tú decides la forma de enseñar, cómo le vas a poner tu sello propio.</p>
                <hr class="w-full my-6 border-gray-300" />
              </div>
            </div>
            <div class="flex">
              <div class="mr-4">
                <div class="flex items-center justify-center w-10 h-10 mb-3 rounded-full bg-indigo-50">
                    <i class="fas fa-video text-red-500 fa-2x"></i>
                </div>
              </div>
              <div>
                <h6 class="mb-2 font-semibold leading-5">Graba tus videos</h6>
                <p class="text-sm text-gray-900">
                    Utiliza herramientas básicas como un smartphone o una cámara DSLR. Añade un buen micrófono y ya lo tienes todo listo para empezar.
                    Si no te gusta aparecer frente a la cámara, captura solo tu pantalla. En cualquier caso, te recomendamos preparar al menos dos horas de vídeo para un curso de pago.
                </p>
                <hr class="w-full my-6 border-gray-300" />
              </div>
            </div>
            <div class="flex">
              <div class="mr-4">
                <div class="flex items-center justify-center w-10 h-10 mb-3 rounded-full bg-indigo-50">
                    <i class="fas fa-cloud-upload-alt fa-2x text-red-500"></i>
                </div>
              </div>
              <div>
                <h6 class="mb-2 font-semibold leading-5">Publica tu curso</h6>
                <p class="text-sm text-gray-900">
                    Consigue tus primeras valoraciones y reseñas promocionando tu curso mediante tus redes sociales y profesionales.

                    Tu curso se podrá encontrar en nuestra tienda virtual, donde obtendrás ingresos por cada inscripción de pago.
                </p>
              </div>
            </div>
          </div>
          <div class="grid grid-cols-2 gap-5">
            <img class="object-cover w-full h-56 col-span-2 rounded shadow-lg" src="{{asset('img/home/woman-listening.jpg')}}" alt="" />
            <img class="object-cover w-full h-48 rounded shadow-lg" src="{{asset('img/home/woman-reading.jpg')}}" alt="" />
            <img class="object-cover w-full h-48 rounded shadow-lg" src="{{asset('img/home/woman-laptop.jpg')}}" alt="" />
          </div>
        </div>
      </div>
</x-app-layout>