<div class="mb-4">
    {!! Form::label('title', 'Titulo del curso', ['class' => 'font-medium text-sm']) !!}
    {!! Form::text('title', null, ['class' => 'form-input block w-full mt-1 border border'. ($errors->has('title')? ' border-red-600' : '')]) !!}

    @error('title')
        <strong class="text-xs text-red-600">{{ $message}}</strong>
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('slug', 'Slug del curso', ['class' => 'font-medium text-sm']) !!}
    {!! Form::text('slug', null, ['readonly' => 'readonly', 'class' => 'form-input block w-full mt-1 border'. ($errors->has('slug')? ' border-red-600' : '')]) !!}

    @error('slug')
        <strong class="text-xs text-red-600">{{ $message}}</strong>
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('subtitle', 'Subtitulo', ['class' => 'font-medium text-sm']) !!}
    {!! Form::text('subtitle', null, ['class' => 'form-input block w-full mt-1 border'. ($errors->has('subtitle')? ' border-red-600' : '')]) !!}

    @error('subtitle')
        <strong class="text-xs text-red-600">{{ $message}}</strong>
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('description', 'Descripción del curso', ['class' => 'font-medium text-sm']) !!}
    {!! Form::textarea('description', null, ['class' => 'form-input block w-full mt-1 border'. ($errors->has('description')? ' border-red-600' : '')]) !!}
    
    @error('description')
        <strong class="text-xs text-red-600">{{ $message}}</strong>
    @enderror
</div>

<div class="grid grid-cols-2 gap-4 mb-4">
    <div class="col-span-3 lg:col-span-1">
        {!! Form::label('category_id', 'Categoria:') !!}
        {!! Form::select('category_id', $categories, null, ['class' => 'form-input block w-full mt-1 border']) !!}
    </div>

    <div class="col-span-3 lg:col-span-1">
        {!! Form::label('level_id', 'Nivel:') !!}
        {!! Form::select('level_id', $levels, null, ['class' => 'form-input block w-full mt-1 border']) !!}
    </div>

    {{-- <div class="col-span-3 lg:col-span-1">
        {!! Form::label('price_id', 'Precio:') !!}
        {!! Form::select('price_id', $prices, null, ['class' => 'form-input block w-full mt-1 border']) !!}
    </div> --}}
    {!! Form::hidden('price_id', 1) !!}
</div>

<h1 class="text-2xl font-bold mt-8 mb-2">Imagen del curso</h1>

<div class="grid grid-cols-2 gap-4">
    <figure class="col-span-2 lg:col-span-1">
        @isset($course->image)
            <img id="picture" class="w-full h-64 object-cover object-center rounded" src="{{Storage::url($course->image->url)}}" alt="">
        @else 
            <img id="picture" class="w-full h-64 object-contain object-center rounded" src="{{asset('img/home/bg-cover.png')}}" alt="">
        @endisset
    </figure>

    <div class="col-span-2 lg:col-span-1">
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-10" role="alert">
            <p class="font-bold">Recuerda</p>
            <p>La imagen de presentación es uno de los apartados esenciales. Ya que das a conocer a los estudiantes tu trabajo y para eso ha de llamar su atención.</p>
        </div>

        {!! Form::file('file', ['class' => 'form-input w-full border'. ($errors->has('file')? ' border-red-600' : ''), 'id' => 'file', 'accept' => 'image/*']) !!}
        
        @error('file')
            <strong class="text-xs text-red-600">{{ $message}}</strong>
        @enderror  
    </div>
</div>