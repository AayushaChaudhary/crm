@extends('layouts.sidebar')
@section('main')
<div class="w-full">
    <div class="text-black font-bold py-3 px-5">Update leaves
        <a href="{{ route('leave.index') }}">
        <button class="bg-blue-600 text-white py-2 px-4 font-bold rounded-full float-right">
            Go Back
        </button>
        </a>
    </div>
</div>

<form method="POST" action="{{ route('leave.update',$leave) }}" enctype="multipart/form-data">
    @csrf
    @method('put')

    @if ($errors->any())
    {{ $errors }}
    @endif
   

    <!-- Name -->
    <div>
        <x-label for="subject" :value="__('subject')" />
        <input type="text" name="subject" id="subject" value= "{{ $leave->subject }}" class="w-full rounded-md">
    </div>

    <!-- Image -->
    <div>
        <x-label for="image" :value="__('image')" />
        <input type="file" name="image" id="image" value= "{{ $leave->image }}" class="w-full rounded-md">
    </div>

    <!-- description -->
    <div>
        <x-label for="description" :value="__('description')" />
        <textarea id="description" name="description" id="description" class="w-full rounded-md editor">{{ $leave->description }}</textarea>
    </div>


   

<div class="pt-3">
    <button class="bg-blue-500 py-2 px-4 rounded-md pt-4 ">Save</button>
</div>
    
    </div>
</form>
@endsection

@section('js')
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script>
    ClassicEditor
				.create( document.querySelector( '.editor' ), {
					
					licenseKey: '',
					
					
					
				} )
				.then( editor => {
					window.editor = editor;
			
					
					
					
				} )
				.catch( error => {
					console.error( 'Oops, something went wrong!' );
					console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
					console.warn( 'Build id: yjf4l01o2hvl-nohdljl880ze' );
					console.error( error );
				} );
		
</script>
@endsection
