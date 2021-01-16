<x-instructor-layout :course="$course">

    <div>
        @livewire('instructor.courses-goals', ['course' => $course], key('courses-goals'. $course->id))
    </div>

    <div class="my-12">
        @livewire('instructor.courses-requirements', ['course' => $course], key('courses-requirements'.  $course->id))
    </div>

    <div>
        @livewire('instructor.courses-audience', ['course' => $course], key('courses-audience'. $course->id))
    </div>

</x-instructor-layout>