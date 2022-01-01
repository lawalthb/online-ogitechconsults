@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
 <!-- MAIN CONTENT-->
 <div class="main-content">
    <div class="section__content section__content--p30">
        <div class="row">
            <div class="col-md-12">
                <div class="overview-wrap">
                    <h2 class="title-1">Banners</h2>
                    <button class="au-btn au-btn-icon au-btn--blue">
                    View Applications
                    </button>
                </div>
            </div>
        </div>
        <div class="row m-t-25">
            <div class="col-sm-6 mx-auto">
              <img class="img-thumbnail" caption="lawal" src="{{asset('uploads/1719101776615377.png')}}" />
            </div>
            <div class="col-sm-6  mx-auto">
               
                <img class="img-thumbnail" src="{{asset('uploads/1719560289806513.jpg')}}" />
                
            </div>
            <div class="col-sm-6  mx-auto">
               
                <img class="img-thumbnail" src="{{asset('uploads/1719560289806513.jpg')}}" />
                
            </div>

            <div class="col-sm-6  mx-auto">
               
                <img class="img-thumbnail" src="{{asset('uploads/1719560289806513.jpg')}}" />
                
            </div>
          </div>
    </div>
 </div>    
@endsection


