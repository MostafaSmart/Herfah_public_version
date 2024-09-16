<form hidden id="delet_form" method="POST">
    {{ method_field('DELETE') }}
    {{ csrf_field() }}
    <button type="submit" id="deleteBtn"></button>
  </form>