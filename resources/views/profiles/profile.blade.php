@extends('layouts.app')

@section('content')
      <div class="container">
            <div class="col-lg-4">
                  <div class="panel panel-default">
                        <div class="panel-heading">
                              <p class="text-center">
                                    {{ $user->name }}'s Profile.
                              </p>
                        </div>
                        
                        <div class="panel-body">
                              <center>
                                    <img src="{{ $user->avatar }}" width="140px" height="140px" style="border-radius: 50%;" alt="">
                              </center>
                              <br>  
                              <p class="text-center">
                                    {{ $user->profile->location }}
                              </p>
                              <br>
                              <p class="text-center">
                                    @if(Auth::id() == $user->id)
                                          <a href="{{ route('profile.edit') }}" class="btn btn-info">Edit your profile</a>
                                    @endif
                              </p>
                        </div>
                  </div>
                  
                  @if(Auth::id() !== $user->id)
                        <div class="panel panel-default">
                              <div class="panel-body">
                                    <friend :profile_user_id="{{ $user->id }}"></friend>
                              </div>
                        </div>
                  @endif

                  <div class="panel panel-default">
                        <div class="panel-heading">
                              <p class="text-center">
                                    About me .
                              </p>
                        </div>
                        <div class="panel-body">
                              <p class="text-center">
                                    {{ $user->profile->about }}
                              </p>
                        </div>
                  </div>
            </div>
      </div>
@stop



