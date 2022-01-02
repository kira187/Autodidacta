<div class="card">
    <div class="card-body">
        @if ($newQuestion == true)
            <button class="mb-6 h-10 px-5 border-2 border-gray-800 text-gray-800 transition-colors duration-150 bg-white focus:shadow-outline hover:bg-gray-800 hover:text-white" wire:click="listComments">Volver a todas las preguntas</button>
    
            <div class="border p-5 mb-10">
                <h1 class="font-bold">Consejos para obtener respuestas a tus preguntas más rápido</h1>
                <ul class="mt-2 list-disc pl-5 text-sm">
                    <li> Busca para comprobar si tu pregunta se ha preguntado antes</li>
                    <li>No te cortes con los detalles; proporciona capturas de pantalla, mensajes de error, código u otras pistas siempre que sea posible</li>
                    <li>Revisa la gramática y la ortografía</li>
                </ul>
            </div>
    
            <div class="space-y-4 text-gray-700">
                <div class="flex flex-wrap">
                    <div class="w-full">
                        <label class="block mb-1 font-semibold">Título o resumen</label>
                        <input class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="text" placeholder="P. ej.: ¿Por qué utilizamos fit_transform() para training_set?"/>
                    </div>
                </div>
                <div class="flex flex-wrap">
                    <div class="w-full">
                        <label class="block mb-1 font-semibold">Detalles (opcional)</label>
                        <textarea class="w-full h-16 px-3 py-2 text-base text-gray-700 placeholder-gray-600 border rounded-lg focus:shadow-outline" placeholder="P. ej.: En el minuto 05:28, no he entendido esta parte. Aquí tienes una captura de pantalla de lo que intenté hacer..."></textarea>
                    </div>
                </div>
            </div>
        @else    
            <div class="sm:px-8 pt-6 pb-8 flex flex-col my-2">
                <!--Buscar-->
                <div class="-mx-3 md:flex mb-2">
                <div class="md:w-full px-3">
                    <div class="relative flex w-full flex-wrap items-stretch mb-3">
                    <span
                        class="z-10 h-full leading-snug font-normal text-center text-gray-400 absolute bg-transparent rounded text-base items-center justify-center w-8 pl-2 py-2">
                        <i class="fas fa-search"></i>
                    </span>
                    <input type="text" placeholder="Buscar todas las preguntas del curso" class="px-2 py-2 placeholder-gray-400 text-gray-600 border-gray-300 relative bg-white rounded text-sm border border-grey-lighter w-full pl-10 focus:outline-none" />
                    </div>
                </div>
                </div>
                <!-- Filtros -->
                <div class="-mx-3 md:flex mb-4">
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <div class="relative">
                        <select class="block appearance-none rounded-md shadow-sm w-full border border-gray-300 py-2 bg-white px-4 pr-8 leading-tight focus:outline-none focus:border-gray-500 sm:text-sm text-gray-500">
                            <option hidden selected>Todas las clases</option>
                            <option>Element 1</option>
                            <option>Element 2</option>
                            <option>Element 3</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                </div>
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <div class="relative">
                        <select class="block appearance-none rounded-md shadow-sm w-full border border-gray-300 py-2 bg-white px-4 pr-8 leading-tight focus:outline-none focus:border-gray-500 sm:text-sm text-gray-500">
                            <option hidden selected>Seleccionar orden</option>
                            <option>Element 1</option>
                            <option>Element 2</option>
                            <option>Element 3</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                </div>
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <div class="relative">
                        <select class="block appearance-none rounded-md shadow-sm w-full border border-gray-300 py-2 bg-white px-4 pr-8 leading-tight focus:outline-none focus:border-gray-500 sm:text-sm text-gray-500">
                            <option hidden selected>Filtrar preguntas</option>
                            <option>Element 1</option>
                            <option>Element 2</option>
                            <option>Element 3</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                </div>
                </div>

                <!-- Comments placeholder -->
                <h3 class="font-bold sm:text-lg py-4">Todos las preguntas en este curso <span class="text-gray-500 text-base">(@php echo (rand(1,50)) @endphp)</span></h3>                        
                <ul>
                    <li class="p-2 pt-6 hover:bg-gray-50">
                        <div class="flex items-start">
                        <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"/>
                        <div class="ml-3 w-full">
                            <span class="font-bold text-gray-700 sm:text-base text-sm cursor-pointer">ERROR AL MARCAR UNIDAD COMO CULMINADA</span>
                            <p class="text-gray-500 text-sm sm:block hidden pb-4">Buenas noches profesor!Cuando le doy como culminada una unidad me arroja este error y por ende no</p>
                        </div>
                        <div class="ml-4">
                            <div class="flex pb-0.5">
                            <span class="font-semibold pr-2">1</span> <svg class="h-6 w-6 text-gray-700"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="12" y1="5" x2="12" y2="19" />  <line x1="16" y1="9" x2="12" y2="5" />  <line x1="8" y1="9" x2="12" y2="5" /></svg>
                            </div>
                            <div class="flex pb-0.5">
                            <span class="font-semibold pr-2">0</span> <svg class="h-6 w-6 text-gray-700"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M21 14l-3 -3h-7a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1h9a1 1 0 0 1 1 1v10" />  <path d="M14 15v2a1 1 0 0 1 -1 1h-7l-3 3v-10a1 1 0 0 1 1 -1h2" /></svg>
                            </div>      
                        </div>
                        </div>
                        <div class="text-xs flex sm:ml-10 justify-center sm:justify-start">
                        <a href="#" class="text-blue-500 sm:ml-3">Cesar Arion Espinosa </a>
                        <a href="#" class="px-2 text-blue-500">• Clase 39 •</a>
                        <div class="text-gray-500">hace 15 días</div>
                        </div>
                    </li>
                    <li class="comment-element">
                        <div class="comment-content">
                        <img class="h-10 w-10 rounded-full" src="https://images.pexels.com/photos/61100/pexels-photo-61100.jpeg?crop=faces&fit=crop&h=200&w=200&auto=compress&cs=tinysrgb"/>
                        <div class="ml-3 w-full">
                            <span class="comment-title">$withCount</span>
                            <p class="comment-body">text-gray-500 text-sm sm:block hidden pb-4">En el minuto 5:59 me genera el siguiente error : SQLSTATE[42S02]: Base table or view not found: 1146</p>
                        </div>
                        <div class="ml-4">
                            <div class="flex pb-0.5">
                            <span class="font-semibold pr-2">1</span> <svg class="h-6 w-6 text-gray-700"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="12" y1="5" x2="12" y2="19" />  <line x1="16" y1="9" x2="12" y2="5" />  <line x1="8" y1="9" x2="12" y2="5" /></svg>
                            </div>
                            <div class="flex pb-0.5">
                            <span class="font-semibold pr-2">0</span> <svg class="h-6 w-6 text-gray-700"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M21 14l-3 -3h-7a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1h9a1 1 0 0 1 1 1v10" />  <path d="M14 15v2a1 1 0 0 1 -1 1h-7l-3 3v-10a1 1 0 0 1 1 -1h2" /></svg>
                            </div>      
                        </div>
                        </div>
                        <div class="comment-autor">
                        <a href="#" class="text-blue-500 sm:ml-3">Alexa Correa</a>
                        <a href="#" class="px-2 text-blue-500">• Clase 25 •</a>
                        <div class="text-gray-500">hace 1 días</div>
                        </div>
                    </li>
                    <li class="comment-element">
                        <div class="comment-content">
                        <img class="h-10 w-10 rounded-full" src="https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?crop=faces&fit=crop&h=200&w=200&auto=compress&cs=tinysrgb"/>
                        <div class="ml-3 w-full">
                            <span class="comment-title">ErrorException</span>
                            <p class="comment-body">Saludos estoy en el minuto 21:35 de la sección 2 capitulo 9 y al correr la migración me aparece el siguie..</p>
                        </div>
                        <div class="ml-4">
                            <div class="flex pb-0.5">
                            <span class="font-semibold pr-2">1</span> <svg class="h-6 w-6 text-gray-700"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="12" y1="5" x2="12" y2="19" />  <line x1="16" y1="9" x2="12" y2="5" />  <line x1="8" y1="9" x2="12" y2="5" /></svg>
                            </div>
                            <div class="flex pb-0.5">
                            <span class="font-semibold pr-2">0</span> <svg class="h-6 w-6 text-gray-700"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M21 14l-3 -3h-7a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1h9a1 1 0 0 1 1 1v10" />  <path d="M14 15v2a1 1 0 0 1 -1 1h-7l-3 3v-10a1 1 0 0 1 1 -1h2" /></svg>
                            </div>      
                        </div>
                        </div>
                        <div class="comment-autor">
                        <a href="#" class="text-blue-500 sm:ml-3">Javier de Jesus Correa</a>
                        <a href="#" class="px-2 text-blue-500">• Clase 3 •</a>
                        <div class="text-gray-500">hace 2 días</div>
                        </div>
                    </li>
                </ul>
            </div>
            <button class="w-full h-10 px-6 border-2 border-gray-800 text-gray-600 transition-colors duration-150 bg-white rounded-lg focus:shadow-outline hover:bg-gray-800 hover:text-white">Ver más</button>
            <p class="mt-5">
                <button class="font-semibold text-blue-500 hover:text-blue-600" wire:click="$set('newQuestion', true)">Hacer otra pregunta &rarr;</button>
            </p>
        @endif
    </div>
</div>
