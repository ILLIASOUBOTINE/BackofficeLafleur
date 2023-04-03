<form action="{{ $route }}" method="POST">
    @method('DELETE')
    @csrf
                                                                
    <button type="submit" class="btn btn-danger bg-danger" >Supprimer</button>
</form>