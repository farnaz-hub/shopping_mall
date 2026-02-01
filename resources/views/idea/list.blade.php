<div class="container-fluid">
    {{--    <input type="hidden" name="task_id" value="{{$task->id}}">--}}
    <form method="post" action="{{route('idea.save', ['task' => $task])}}">
        @csrf
        <div class="col-md-6 col-sm-6 col-xs-12 form-group">
            <label>Title</label>
            <input name="title" type="text" placeholder="title" class="form-control" value="{{$task->title}}" disabled>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12 form-group">
            <label>Customer</label>
            <select class="form-control" name="customer_id" disabled>
                @foreach($customers as $customer)
                    <option value="{{$customer->id}}"
                            @if($customer->id == $task->customer_id) selected @endif>{{$customer->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12 form-group">
            <label>Solver</label>
            <select class="form-control" name="solver_id" disabled>
                @foreach($solvers as $solver)
                    <option value="{{$solver->id}}"
                            @if($solver->id == $task->solver_id) selected @endif>{{$solver->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12 form-group">
            <label>Category</label>
            <select class="form-control" name="category_id" disabled>
                @foreach($categories as $category)
                    <option value="{{$category->id}}"
                            @if($category->id == $task->category_id) selected @endif>{{$category->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12 form-group">
            <label>Start Time</label>
            <input name="start_time" type="datetime-local" class="form-control" value="{{$task->start_time}}" disabled>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12 form-group">
            <label>End Time</label>
            <input name="end_time" type="datetime-local" class="form-control" value="{{$task->end_time}}" disabled>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12 form-group">
            <label>Priority</label>
            <select class="form-control" name="priority" disabled>
                <option value="1" @if($task->priority == 1) selected @endif>Up</option>
                <option value="2" @if($task->priority == 2) selected @endif>Middle</option>
                <option value="3" @if($task->priority == 3) selected @endif>Down</option>
                <option value="4" @if($task->priority == 4) selected @endif>Emergency</option>
            </select>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12 form-group">
            <label>Status</label>
            <select name="status" class="form-control" disabled>
                <option value="1" @if($task->status == 1) selected @endif>New</option>
                <option value="2" @if($task->status == 2) selected @endif>Pending</option>
                <option value="3" @if($task->status == 3) selected @endif>Problem</option>
                <option value="4" @if($task->status == 4) selected @endif>Done</option>
            </select>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12 form-group">
            <label>Description</label>
            <textarea name="description" type="text" rows="3" class="form-control"
                      disabled>{{$task->description}}</textarea>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-6 col-sm-6 col-xs-12 form-group" style="margin-bottom: 20px">
            <label>? Send Message</label>
            <input name="send_message" type="checkbox" class="form-check-input" value="1"
                   @if($task->send_message) checked @endif disabled>
        </div>
        <div class="clearfix"></div>
        <ul class="timeline" style="padding: 5px; background-color: #e9eaed; list-style: none">
            @foreach($task->ideas()->orderBy('id')->get() as $idea)
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
                                            {{$idea->owner->name}}
                                            <small class="pull-left text-muted">
                                                {{$idea->created_at->format('Y-m-d H:i')}}
                                            </small>
                                        </h2>
                                    </div>
                                    <div class="panel-body">
                                        <p>{{$idea->comment}}</p>
                                    </div>
                                    <div>
                                        <button href="{{ route('idea.delete', ['idea' => $idea]) }}"
                                                onclick="removeComment(this);return false"
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
            <label>New Comment</label>
            <textarea name="comment" type="text" rows="7" class="form-control"></textarea>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-6 col-sm-6 col-xs-12 form-group">
            <button type="submit" class="btn btn-success">submit</button>
        </div>
    </form>
</div>

<script>
    function removeComment(el) {
        $.ajax({
            url: $(el).attr('href'),
            method: 'DELETE',
            data: {
                _token: '{{csrf_token()}}'
            },
            success: function (result) {
                $.ajax({
                    url: '{{route('idea.list', ['task' => $task])}}',
                    method: 'GET',
                    success: function (result) {
                        $('.modal-body').html(result)
                    }
                })
            }
        })
    }
</script>
