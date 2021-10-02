<x-app-layout>

    <div class="container py-8">
        <div class="card">
            <div class="card-body text-gray-600">
                <h1 class="text-2xl font-bold">Crear nuevo curso</h1>
                <hr class="mt-2 mb-6">

                {!! Form::open(['route' => 'instructor.courses.store', 'files' => true, 'autocomplete' => 'off']) !!}
                    {!! Form::hidden('user_id', auth()->user()->id) !!}
                    
                    <div class="mb-4">
                        {!! Form::label('title', 'Titulo del curso', ['class' => 'font-medium text-sm']) !!}
                        {!! Form::text('title', $tituloCurso, ['class' => 'form-input block w-full mt-1 border border'. ($errors->has('title')? ' border-red-600' : '')]) !!}
                
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
                    
                    <div class="grid grid-cols-3 gap-4 mb-4">
                        <div class="col-span-3 lg:col-span-1">
                            {!! Form::label('category_id', 'Categoria:') !!}
                            {!! Form::select('category_id', $categories, null, ['class' => 'form-input block w-full mt-1 border']) !!}
                        </div>
                    
                        <div class="col-span-3 lg:col-span-1">
                            {!! Form::label('level_id', 'Nivel:') !!}
                            {!! Form::select('level_id', $levels, null, ['class' => 'form-input block w-full mt-1 border']) !!}
                        </div>
                    
                        <div class="col-span-3 lg:col-span-1">
                            {!! Form::label('price_id', 'Precio:') !!}
                            {!! Form::select('price_id', $prices, null, ['class' => 'form-input block w-full mt-1 border']) !!}
                        </div>
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

                    <h1 class="text-2xl font-bold mt-8 mb-2">Instructor</h1>
                    <div class="grid grid-cols-3 gap-4 mb-4">
                        <div class="col-span-3 lg:col-span-1">
                            {!! Form::label('V', 'Nombre:') !!}
                            {!! Form::text('nombre_instructor', $instructor, ['class' => 'form-input block w-full mt-1 border'. ($errors->has('subtitle')? ' border-red-600' : '')]) !!}
                        </div>
                    
                        <div class="col-span-3 lg:col-span-1">
                            {!! Form::label('correo_instructor', 'Correo:') !!}
                            {!! Form::text('correo_instructor', $instructor.'@instructor.com', ['class' => 'form-input block w-full mt-1 border'. ($errors->has('subtitle')? ' border-red-600' : '')]) !!}
                        </div>
                    
                        <div class="col-span-3 lg:col-span-1">
                            {!! Form::label('password', 'Contraseña:') !!}
                            {!! Form::text('password', null, ['class' => 'form-input block w-full mt-1 border'. ($errors->has('subtitle')? ' border-red-600' : '')]) !!}
                        </div>
                    </div>

                    <h1 class="text-2xl font-bold mt-8 mb-2">Secciones</h1>
                    <button class="add_form_field btn btn-danger">Agregar nueva seccion &nbsp; 
                        <span style="font-size:16px; font-weight:bold;">+ </span>
                    </button>
                    <div class="container1">
                        <div>
                            {!! Form::label('title', 'Seccion', ['class' => 'font-medium text-sm']) !!}
                            <input class="form-input block w-full mt-1 border" type="text" name="secciones[]">
                        </div>
                    </div>

                    <h1 class="text-2xl font-bold mt-8 mb-2">Lecciones</h1>
                    @foreach ($videos as $video)
                        <P class="mt-5 font-bold text-lg"> Posicion en lista #{{ $video['posicion_list']}}</P>
                        <hr class="mt-2 mb-6">
                        <div class="grid grid-cols-6 gap-4 mb-4">
                            <div class="col-span-6 lg:col-span-4">
                                {!! Form::label('titulo', 'Titulo:') !!}
                                {!! Form::text('titulo[]', $video['titulo'], ['class' => 'form-input block w-full mt-1 border'. ($errors->has('subtitle')? ' border-red-600' : '')]) !!}
                            </div>
                        
                            <div class="col-span-6 lg:col-span-1">
                                {!! Form::label('video_id', 'Video ID:') !!}
                                {!! Form::text('video_id[]', $video['video_id'], ['readonly' => 'readonly', 'class' => 'form-input block w-full mt-1 border'. ($errors->has('subtitle')? ' border-red-600' : '')]) !!}
                            </div>
                        
                            <div class="col-span-6 lg:col-span-1">
                                {!! Form::label('section_id', 'Section:') !!}
                                {!! Form::text('section_id[]', null, ['class' => 'form-input block w-full mt-1 border'. ($errors->has('subtitle')? ' border-red-600' : '')]) !!}
                            </div>
                        </div>
                        <div class="mb-4">
                            {!! Form::label('description_video', 'Descripcion', ['class' => 'font-medium text-sm']) !!}
                            {!! Form::textarea('description_video[]', $video['descripcion'], ['class' => 'form-input block w-full mt-1 border'. ($errors->has('description')? ' border-red-600' : '')]) !!}
                        </div>
                    @endforeach

                    <h1 class="text-2xl font-bold mt-8 mb-2">Metas</h1>
                    <button class="add_form_field_metas btn btn-danger">Agregar nueva meta &nbsp; 
                        <span style="font-size:16px; font-weight:bold;">+ </span>
                    </button>
                    <div class="container2">
                        <div>
                            {!! Form::label('title', 'Meta', ['class' => 'font-medium text-sm']) !!}
                            <input class="form-input block w-full mt-1 border" type="text" name="metas[]">
                        </div>
                    </div>

                    <h1 class="text-2xl font-bold mt-8 mb-2">Requerimientos</h1>
                    <button class="add_form_field_requerimientos btn btn-danger">Agregar nueva Requerimiento &nbsp; 
                        <span style="font-size:16px; font-weight:bold;">+ </span>
                    </button>
                    <div class="container3">
                        <div>
                            {!! Form::label('title', 'Requerimiento', ['class' => 'font-medium text-sm']) !!}
                            <input class="form-input block w-full mt-1 border" type="text" name="requerimientos[]">
                        </div>
                    </div>
                    <h1 class="text-2xl font-bold mt-8 mb-2">Audiencia</h1>
                    <button class="add_form_field_audiencia btn btn-danger">Agregar Audiencia &nbsp; 
                        <span style="font-size:16px; font-weight:bold;">+ </span>
                    </button>
                    <div class="container4">
                        <div>
                            {!! Form::label('title', 'Audiencia', ['class' => 'font-medium text-sm']) !!}
                            <input class="form-input block w-full mt-1 border" type="text" name="audiencia[]">
                        </div>
                    </div>

                    <div class="flex justify-end">
                        {!! Form::submit('Crear nuevo curso', ['class' => 'btn btn-primary cursor-pointer']) !!}
                    </div>

                {!! Form::close() !!}
            </div>
        </div>

    </div

    <x-slot name="js">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>
        <script>
            document.getElementById("title").addEventListener('keyup', slugChange);

            function slugChange(){
                
                title = document.getElementById("title").value;
                document.getElementById("slug").value = slug(title);

            }

            function slug (str) {
                var $slug = '';
                var trimmed = str.trim(str);
                $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
                replace(/-+/g, '-').
                replace(/^-|-$/g, '');
                return $slug.toLowerCase();
            }

            //CKEDITOR
            ClassicEditor
                .create( document.querySelector( '#description' ), {
                    toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'blockQuote' ],
                    heading: {
                        options: [
                            { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                            { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                            { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
                        ]
                    }
                } )
                .catch( error => {
                    console.log( error );
                } );

                //Cambiar imagen
            document.getElementById("file").addEventListener('change', cambiarImagen);

            function cambiarImagen(event){
                var file = event.target.files[0];

                var reader = new FileReader();
                reader.onload = (event) => {
                    document.getElementById("picture").setAttribute('src', event.target.result); 
                };

                reader.readAsDataURL(file);
            }
        </script>
        <script>
            $(document).ready(function() {
                var max_fields = 20;
                var wrapper = $(".container1");
                var add_button = $(".add_form_field");

                var x = 1;
                $(add_button).click(function(e) {
                    e.preventDefault();
                    if (x < max_fields) {
                        x++;
                        $(wrapper).append('<div> <label for="seccion" class="font-medium text-sm">Seccion</label> <input class="form-input block w-full mt-1 border" type="text" name="secciones[]"> <a href="#" class="delete btn btn-success">Delete</a></div>');
                    } else {
                        alert('You Reached the limits')
                    }
                });

                $(wrapper).on("click", ".delete", function(e) {
                    e.preventDefault();
                    $(this).parent('div').remove();
                    x--;
                })
            });

            $(document).ready(function() {
                var max_fields = 20;
                var wrapper = $(".container2");
                var add_button = $(".add_form_field_metas");

                var x = 1;
                $(add_button).click(function(e) {
                    e.preventDefault();
                    if (x < max_fields) {
                        x++;
                        $(wrapper).append('<div> <label for="metas" class="font-medium text-sm">Metas</label> <input class="form-input block w-full mt-1 border" type="text" name="metas[]"> <a href="#" class="delete btn btn-success">Delete</a></div>');
                    } else {
                        alert('You Reached the limits')
                    }
                });

                $(wrapper).on("click", ".delete", function(e) {
                    e.preventDefault();
                    $(this).parent('div').remove();
                    x--;
                })
            });

            $(document).ready(function() {
                var max_fields = 20;
                var wrapper = $(".container3");
                var add_button = $(".add_form_field_requerimientos");

                var x = 1;
                $(add_button).click(function(e) {
                    e.preventDefault();
                    if (x < max_fields) {
                        x++;
                        $(wrapper).append('<div> <label for="requerimientos" class="font-medium text-sm">Requerimientos</label> <input class="form-input block w-full mt-1 border" type="text" name="requerimientos[]"> <a href="#" class="delete btn btn-success">Delete</a></div>');
                    } else {
                        alert('You Reached the limits')
                    }
                });

                $(wrapper).on("click", ".delete", function(e) {
                    e.preventDefault();
                    $(this).parent('div').remove();
                    x--;
                })
            });


            $(document).ready(function() {
                var max_fields = 20;
                var wrapper = $(".container4");
                var add_button = $(".add_form_field_audiencia");

                var x = 1;
                $(add_button).click(function(e) {
                    e.preventDefault();
                    if (x < max_fields) {
                        x++;
                        $(wrapper).append('<div> <label for="audicencia" class="font-medium text-sm">Audiencia</label> <input class="form-input block w-full mt-1 border" type="text" name="audiencia[]"> <a href="#" class="delete btn btn-success">Delete</a></div>');
                    } else {
                        alert('You Reached the limits')
                    }
                });

                $(wrapper).on("click", ".delete", function(e) {
                    e.preventDefault();
                    $(this).parent('div').remove();
                    x--;
                })
            });
        </script>
    </x-slot>

</x-app-layout>