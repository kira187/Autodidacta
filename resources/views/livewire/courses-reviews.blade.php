<section class="mt-4">
    <h1 class="font-bold text-3xl mb-2 text-gray-800">Valoración</h1>

    @can('enrolled', $course)
        <article class="my-4">            
            @can('valued', $course)
                {!! Form::textarea('comment', null, ['rows' => '3', 'class' => 'form-input w-full', 'placeholder' => 'Cuentanos que te parecio el curso', 'wire:model' => 'comment']) !!}
                
                <div class="flex items-center">
                    <button class="btn btn-primary mr-2" wire:click="store" >Guardar</button>
                    <ul class="flex">
                        <li class="mr-1 cursor-pointer" wire:click="$set('rating', 1)">
                            <i class="fas fa-star text-{{$rating >= 1 ? 'yellow' : 'gray'}}-300"></i>                                                                                                
                        </li>
                        <li class="mr-1 cursor-pointer" wire:click="$set('rating', 2)">
                            <i class="fas fa-star text-{{$rating >= 2 ? 'yellow' : 'gray'}}-300"></i>
                        </li>
                        <li class="mr-1 cursor-pointer" wire:click="$set('rating', 3)">
                            <i class="fas fa-star text-{{$rating >= 3 ? 'yellow' : 'gray'}}-300"></i>
                        </li>
                        <li class="mr-1 cursor-pointer" wire:click="$set('rating', 4)">
                            <i class="fas fa-star text-{{$rating >= 4 ? 'yellow' : 'gray' }}-300"></i>
                        </li>
                        <li class="mr-1 cursor-pointer" wire:click="$set('rating', 5)">
                            <i class="fas fa-star text-{{$rating == 5 ? 'yellow' : 'gray'}}-300"></i>
                        </li>
                    </ul>
                </div>
            @else
                <div class="bg-teal-100 border-l-4 border-teal-500 text-teal-700 p-4" role="alert">
                    <p class="font-bold">Ya calificaste este curso.</p>
                    <p>{{ session('info') }}</p>
                </div>
            @endcan
        </article>
    @endcan

    <div class="card">
        <div class="card-body">
            <p class="text-gray-800 text-xl">{{ $course->reviews->count() }} Calificaciones</p>

            @foreach ($course->reviews as $review)
                <article class="flex mb-4 text-gray-800">
                    <figure class="mr-4">
                        <img class="h-12 w-12 object-cover rounded-full shadow-lg" src="{{$review->user->profile_photo_url}}" alt="">
                    </figure>

                    <div class="card flex-1">
                        <div class="card-body bg-gray-100">
                            <p><b>{{$review->user->name}}</b>  <i class="fas fa-star text-yellow-300"> ({{$review->rating}})</i></p>

                            {{ $review->comment}}
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
