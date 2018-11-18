@extends('layouts.app')

@section('content')



<h1>My Groups @if ($data['count'] > 0) ({{ $data['count'] }}) @endif </h1>

<!-- Modal -->
<div class="modal fade" id="groupModal" role="dialog">
        <div class="modal-dialog">
        
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Create New Group</h4>
            </div>
            <div class="modal-body">
            <p>Fill out the form to create a new group!</p>
    
            <form action="/group/process" enctype="multipart/form-data" method="POST">
                <div class="form-group">
                    <label>Group Name</label>
                    <input type="text" name="group_name" value="">
                    <br><br>
                </div>

                <div class="form-group">
                    <label for="userSelect">Select users that can access: </label>
                    {!! Form::Label('item', 'Item:') !!}
                    <select multiple class="form-control" name="item_id[]">
                        @foreach($data['users'] as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-primary btn-lg">Create Group</button>
                {{ csrf_field() }}
            </form>
    
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="replaceModal" role="dialog">
        <div class="modal-dialog">
        
            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Upload Group File</h4>
            </div>
            <div class="modal-body">
                <p>Fill out the form to upload a file to a specific group.</p>
                <form action="/groupFile" method="POST" enctype="multipart/form-data">
                    <label for="file">Select a file</label>
                    <input type="file" class="form-control-file" name="new_file" id="new_file">
                    <div class="form-group">
                            <label for="userSelect">Select groups that can access: </label>
                            {!! Form::Label('item', 'Item:') !!}
                            <select multiple class="form-control" name="item_id[]">
                                @foreach($data['groups'] as $group)
                                <option value="{{$group->group_id}}">{{$group->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    <input type="submit" name="submit" value="Submit">
                    {{ csrf_field() }}
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </div>
            
        </div>
        </div>

    

<div class="container">
    <div id="content">
        <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
            <li class="active"><a href="#red" data-toggle="tab">My Groups</a></li>
            <li><a href="#orange" data-toggle="modal" data-target="#groupModal">Create New Group</a></li>
            @if (count($data['groups']) > 0)<li><a href="#green" data-toggle="modal" data-target="#replaceModal">Upload Group File</a></li> @else @endif
        </ul>
        <div id="my-tab-content" class="tab-content">
            <div class="tab-pane active" id="red">
                <div>
                    @if(count($data['groups']) > 0)
                        @foreach ($data['groups'] as $group)
                            <div class="well">
                                <h3>Group <a href="/groups/{{$group->group_id}}">{{$group->name}}</a> </h3>
                                
                            </div>
                        @endforeach
                    @else 
                        <p> I don't own any groups. </p>
                    @endif
                </div>
            </div>
            <div class="tab-pane" id="orange">
                swag
            </div>
            <div class="tab-pane" id="green">
                    swag
            </div>
        </div>
    </div>
</div>



@endsection