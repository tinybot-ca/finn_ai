@extends ('layouts.app')

@section ('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <!-- New Submission Card -->
            <div class="card">

                <div class="card-header">
                    <h4>New Submission</h4>
                </div>

                <!-- Action Buttons -->
                <ul class="list-group list-group-flush">
                    <li class="list-group-item grid-bg">
                        <a class="btn btn-outline-primary btn-sm " href="{{ url()->previous() }}">Cancel</a>
                        <a class="btn btn-outline-primary btn-sm " href="/comments/delete">Delete</a>
                    </li>
                </ul>
                
                <div class="card-body">
                    
                    {{-- @include ('layouts.errors') --}}

                    <form method="POST" action="/comments" novalidate>
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="comment" class="col-sm-4 col-form-label text-md-right">
                                Comment
                            </label>

                            <div class="col-md-6">
                                <textarea class="form-control{{ $errors->has('comment') ? ' is-invalid' : '' }}" id="comment" name="comment" required disabled>{{ $comment->body }}</textarea>
                            </div>

                            @if ($errors->has('date'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('comment') }}</strong>
                                </span>
                            @endif
                        </div>

                    </form>
            
                </div><!-- card-body -->
            </div><!-- card -->
            
        </div><!-- col-md-12 -->
    </div><!-- row -->
</div><!-- container -->

@endsection