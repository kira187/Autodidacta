<div>    
    <div class="max-w-7xl mx-auto px-4 pb-10 sm:px-6 lg:px-8 grid sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-x-6 gap-y-8">
        

        {{-- Recomendados --}}
        @if(isset($courses) && $courses->isNotEmpty() && $courses->count() > 4)
            <div>
                <h2 class="font-popins font-bold text-2xl text-gray-700 text-center lg:text-center leading-tight mt-16">Creemos que te podría gustar.</h2>
            </div>
            <div id="recomender-slick" class=" course-slick container grid sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-x-6 gap-y-8 ">
                @foreach ($courses as $course)
                    <x-course-card :course="$course"/>
                @endforeach
            
            </div>
        @endif


        {{-- Mas populares --}}
        @if(isset($courses) && $courses->isNotEmpty() && $courses->count() > 4)
            <div>
                <h2 class="font-popins font-bold text-2xl text-gray-700 text-center lg:text-center leading-tight mt-4">Cursos más populares.</h2>
            </div>
            <div id="popular-slick" class=" course-slick container grid sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-x-6 gap-y-8 ">
                @foreach ($courses as $course)
                    <x-course-card :course="$course"/>
                @endforeach
            
            </div>
        @endif


        {{-- Curso vistos --}}
        @if(isset($courses_view) && $courses_view->isNotEmpty() && $courses_view->count() > 4)

            <div>
                <h2 class="font-popins font-bold text-2xl text-gray-700 text-center lg:text-center leading-tight mt-4">Continuar viendo.</h2>
            </div>
            <div id="view-slick" class=" course-slick container grid sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-x-6 gap-y-8 ">
                
                @foreach ($courses_view as $course)
                    <x-course-card-progress :course="$course"/>
                @endforeach
                
            </div>
        @endif


        {{-- Cursos de programacion --}}
        @if(isset($courses_programming) && $courses_programming->isNotEmpty() && $courses_programming->count() > 4)
            <div>
                <h2 class="font-popins font-bold text-2xl text-gray-700 text-center lg:text-center leading-tight mt-4">Cursos de Programación.</h2>
            </div>
            <div id="programming-slick" class=" course-slick container grid sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-x-6 gap-y-8 ">
                @foreach ($courses_programming as $course)
                    <x-course-card :course="$course"/>
                @endforeach
            </div>
        @endif


        {{-- Cursos de desarrollo web --}}
        @if(isset($courses_web_development) && $courses_web_development->isNotEmpty() && $courses_web_development->count() > 4)
            <div>
                <h2 class="font-popins font-bold text-2xl text-gray-700 text-center lg:text-center leading-tight mt-4">Cursos de Desarrollo Web.</h2>
            </div>
            <div id="web-slick" class=" course-slick container grid sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-x-6 gap-y-8 ">
                @foreach ($courses_web_development as $course)
                    <x-course-card :course="$course"/>
                @endforeach
            </div>
        @endif


        {{-- Cursos de diseño web --}}
        @if(isset($courses_web_development) && $courses_web_development->isNotEmpty() && $courses_web_development->count() > 4)
            <div>
                <h2 class="font-popins font-bold text-2xl text-gray-700 text-center lg:text-center leading-tight mt-4">Cursos de Diseño Web.</h2>
            </div>
            <div id="design-slick" class=" course-slick container grid sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-x-6 gap-y-8 ">
                @foreach ($courses_web_development as $course)
                    <x-course-card :course="$course"/>
                @endforeach
            </div>
        @endif
        

        {{-- Cursos de electronica --}}
        @if(isset($courses_web_development) && $courses_web_development->isNotEmpty() && $courses_web_development->count() > 4)
            <div>
                <h2 class="font-popins font-bold text-2xl text-gray-700 text-center lg:text-center leading-tight mt-4">Cursos de Electrónica.</h2>
            </div>
            <div id="electronic-slick" class=" course-slick container grid sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-x-6 gap-y-8 ">
                @foreach ($courses_web_development as $course)
                    <x-course-card :course="$course"/>
                @endforeach
            </div>
        @endif

        
        {{-- Cursos de matematicas --}}
        @if(isset($courses_web_development) && $courses_web_development->isNotEmpty() && $courses_web_development->count() > 4)
            <div>
                <h2 class="font-popins font-bold text-2xl text-gray-700 text-center lg:text-center leading-tight mt-4">Cursos de Matématicas.</h2>
            </div>
            <div id="math-slick" class=" course-slick container grid sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-x-6 gap-y-8 ">
                @foreach ($courses_web_development as $course)
                    <x-course-card :course="$course"/>
                @endforeach
            </div>
        @endif

        
    </div>
</div>
