@props(['items', 'nameTable', 'nameField'])

<div class="container mt-6">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <a href="{{ route($nameTable.'.create') }}" class="btn btn-success mb-3">Create</a>
                <ul class="list-group">
                @foreach ($items as $item)
       
   
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <p>{{($item->{$nameField})}} </p>
                        <div class="d-flex">
                           
                            <x-btn-edit  route="{{route($nameTable.'.edit', $item->{'id'.$nameTable})}}"/>
                            <x-btn-delete  route="{{route($nameTable.'.destroy', $item->{'id'.$nameTable})}}"/>
                        </div>
                       
                    </li>
                @endforeach 
                </ul>
            </div>
        </div>    
</div>