<div class="container-fluid">
    <form method="post" action="{{route('message.save')}}">
        <div>
            <label>Content</label>
            <textarea type="text" name="content"></textarea>
        </div>

        <div>
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>
</div>
