<div class="form-group">
    {!! Form::label('title', 'Name:') !!}
    {!! Form::text('title', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('body', 'Body:') !!}
    {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('published_at', 'Publish On:') !!}
    {!! Form::input('date', 'published_at', date('Y-m-d'), ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('tag_list', 'Tags:') !!}
    <select id="tag_list" class="form-control" multiple="multiple" name="tag_list[]">
        @foreach( $tags as $id => $name)
            <option value="{{ $id }}"
                @foreach( $article->tags as $tag)
                    @if($name == $tag->name )
                        selected=""
                    @endif
                @endforeach
            >{{ $name }}</option>
        @endforeach
    </select>
    <!-- {!! Form::select('tag_list[]', $tags, null, ['id' => 'tag_list', 'class' => 'form-control', 'multiple']) !!}
     -->
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class'=>'btn btn-primary form-control']) !!}
</div>

@section('footer')
    <script type="text/javascript">
        $('#tag_list').select2();
    </script>
@endsection