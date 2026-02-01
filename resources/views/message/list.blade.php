<div class="container-fluid">
    <form method="post" action="{{route('message.save', ['ticket' => $ticket])}}">
        @csrf
        <div class="col-md-6 col-sm-6 col-xs-12 form-group">
            <label>Title</label>
            <input name="title" type="text" id="title" placeholder="title" class="form-control"
                   value="{{$ticket->title}}" disabled>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12 form-group">
            <label>Type</label>
            <select name="type_id" class="form-control" disabled>
                @foreach($types as $type)
                    <option value="{{$type->id}}"
                            @if($type->id == $ticket->type_id) selected @endif>{{$type->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12 form-group">
            <label>Category</label>
            <select name="category_id" class="form-control" disabled>
                @foreach($categories as $category)
                    <option value="{{$category->id}}"
                            @if($category->id == $ticket->category_id) selected @endif>{{$category->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-6 col-sm-6 col-xs-12 form-group">
            <label>Priority</label>
            <div id="priority" class="btn-group" data-toggle="buttons">
                <label class="btn btn-default @if($ticket->priority == 1) active @endif" disabled>
                    <input name="priority" type="radio" value="1" @if($ticket->priority == 1) checked @endif>up
                </label>
                <label class="btn btn-default @if($ticket->priority == 2) active @endif" disabled>
                    <input name="priority" type="radio" value="2" @if($ticket->priority == 2) checked @endif>middle
                </label>
                <label class="btn btn-default @if($ticket->priority == 3) active @endif" disabled>
                    <input name="priority" type="radio" value="3" @if($ticket->priority == 3) checked @endif>down
                </label>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12 form-group">
            <label>Status</label>
            <div id="status" class="btn-group" data-toggle="buttons">
                <label class="btn btn-default @if($ticket->status == 1) active @endif" disabled>
                    <input name="status" type="radio" value="1" @if($ticket->status == 1) checked @endif>closed
                </label>
                <label class="btn btn-default @if($ticket->status == 2) active @endif" disabled>
                    <input name="status" type="radio" value="2" @if($ticket->status == 2) checked @endif>pending
                    response
                </label>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12 form-group">
            <label for="description">Description</label>
            <textarea rows="5" name="description" type="text" id="description" placeholder="description"
                      class="form-control" disabled>{{$ticket->description}}</textarea>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12 form-group">
            <label style="margin: 30px">Do you want to receive message from support team?</label>
            <input name="send_message" type="checkbox" value="1" class="form-check-input"
                   @if($ticket->send_message) checked @endif disabled>
        </div>
        <div class="clearfix"></div>
        <ul class="timeline" style="padding: 5px; background-color: #e9eaed; list-style: none">
            @foreach($ticket->messages()->orderBy('id')->get() as $message)
                <li style="margin-bottom: 20px; position: relative">
                    <div class="row">
                        <div class="col-xs-1 text-center" style="padding-right: 0">
                            <div
                                style="background-color: #a036ba; color: #fff; width: 40px; height: 40px; border-radius: 50%; line-height: 40px; margin: 0 auto; box-shadow: 0 2px 5px rgba(0,0,0,0.1)">
                                <i class="fa fa-comment"></i>
                            </div>
                        </div>
                        <div class="col-xs-11" style="padding-right: 5px">
                            <div class="timeline-item"
                                 style="background: #fff; border-radius: 5px; border-right: 4px solid #f312e0; padding: 15px; box-shadow: 0 1px 3px rgba(0,0,0,0.1)">
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        <h2 class="panel-title">
                                            {{$message->customer?->name}}
                                            <small class="pull-left text-muted">
                                                {{$message->created_at->format('Y-m-d H:i')}}
                                            </small>
                                        </h2>
                                    </div>
                                    <div class="panel-body">
                                        <p>{{$message->content}}</p>
                                    </div>
                                    <div>
                                        <button href="{{ route('message.delete', ['message' => $message]) }}"
                                                onclick="removeMessage(this);return false"
                                                class="btn btn-danger btn-sm fa fa-minus-circle">Delete
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
        <div class="col-md-12 col-sm-12 col-xs-12 form-group">
            <label>New Message</label>
            <textarea name="content" type="text" rows="7" class="form-control"></textarea>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12 form-group">
            <button type="submit" class="btn btn-success">submit</button>
        </div>
    </form>
</div>

<script>
    function removeMessage(el) {
        $.ajax({
            url: $(el).attr('href'),
            method: 'DELETE',
            data: {
                _token: '{{csrf_token()}}'
            },
            success: function (result) {
                $.ajax({
                    url: '{{route('message.list', ['ticket' => $ticket])}}',
                    method: 'GET',
                    success: function (result) {
                        $('.modal-body').html(result)
                    }
                })
            }
        })
    }
</script>
