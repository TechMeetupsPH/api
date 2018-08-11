@extends('_layout')

@section('styles')
    @parent
@endsection

@section('content')
<div class="parallax-container teal lighten-2">
  <br/>
  <br/>
  <br/>
  <br/>
  <br/> <h4 class="center-align white-text">join tech meetups</h4>
  <h4 class="center-align white-text">or</h4>
  <div class="center-align">
    <a href="want-to-start-a-tech-meetup" class="waves-effect waves-light btn-large blue">
      start your own
    </a>
  </div>
</div>
<div class="container-fluid">

  <div class="row">

    @foreach ($meetups as $meetup)
    <div class="col s12 m3">
      <div class="card medium">
        <div class="card-image">
          <img src="{{ $meetup->summary_image_url }}">
        </div>
        <div class="card-content">
          <h6>
            <a href="/meetup/{{ $meetup->id }}">
                {{ $meetup->title }}
            </a>
          </h6>
          <div>
            When: {{ $meetup->start_date_for_dashboard }}
            <br>
            Where: {{ $meetup->city }}
            <br>
            Hosted By Joe Palala
          </div>
        </div>
      </div>
    </div>
    @endforeach

  </div>

</div>
@endsection

@section('scripts')
    @parent
@endsection
