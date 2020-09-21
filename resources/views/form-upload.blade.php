@extends('layouts.app')
<div class="container">
    <div class="center">
        <form action="{{route('addObjFile')}}" method="post" enctype="multipart/form-data">
            @csrf
            <h3> Select the STL Object File to upload:</h3>
            <label class="file">
                  <input type="file" id="objFile" name="objFile" required>
                  <span class="file-custom"></span>
            </label>
            <label class="submit">
                <input type="submit" value="Upload Object" name="submit" id="submit">
                <span class="submit-custom"></span>
            </label>
            @if ($errors->any())
                <div class="error-message">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            </form>
        <div id="obj">
            @isset($message)
                <div class="alert-message">
                   <span>
                       {{ $message }}
                   </span>
                </div>
                <model-stl src="{{$modelStl}}"></model-stl>
            @endisset
        </div>
    </div>
</div>
