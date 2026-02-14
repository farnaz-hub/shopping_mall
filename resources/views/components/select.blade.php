<div class="col-md-6 col-sm-6 col-xs-12 form-group">
    <label>{{$label}}</label>
    <div id="{{$id}}" class="btn-group" data-toggle="buttons">
        @foreach($values as $key => $value)
            <label class="btn btn-default">
                <input name="{{$name}}" type="radio" value="{{$key}}">{{$value}}
            </label>
        @endforeach
    </div>
</div>
