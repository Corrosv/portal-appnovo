<!-- Herdar as caracteristicaS do meu taplate -->
@extends('layout.app')
<!-- ajustar o titulo -->
 @section('tille','Admin')
 <!-- Carregar no yield conteudo -->
  @section('conteudo')
<div class="mt-4">
  <!-- cabeçalho -->
    <div>
        <h2>Noticias</h2>
        <!--- route('nome.da.rota',$) -->
        <a href="/admin/noticias/create"
        class="btn btn-success"
        >Novo</a>
    </div>
    <!-- tabela -->
     <div class="table-responsive">
      <table class="table table-hover table-striped">
        <!-- digite o nome das colunas -->
        <thead class="text-center">
          <tr>
            <th>Titulo</th>
            <th>Data</th>
            <th>Autor</th>
            <th colspan="3">Ações</th>
          </tr>
          </thead>
          <!-- digite o conteudo da tabela -->
          <tbody>
            @foreach($noticias as $noticia)
            <tr>
              <td>{{$noticia->titulo}}</td>
              <td>{{$noticia->data}}</td>
              <td>{{$noticia->autor->nome}}</td>
              <td>
                <!-- HREF é o link da pagina exemplo: /admin/noticias/1/show -->
                <!-- route('admin.noticias.show,$noticia)  esse é o que pode usar na casa-->
                <a href="/admin/noticias/{{$noticia->id}}"
                class="btn btn-sm btn-primary">
              <i class="bi bi-eye"></i>
              </a>
              </td>
              <td>
                <a href="/admin/noticias/{{$noticia->id}}/edit"
                class="btn btn-sm btn-warning">
              <i class="bi bi-pencil"></i></td>
              <td>
                <td>
                  <button type="button" class="btn btn-sm btn-danger"
                  data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"
                  data-noticia-id="{{$noticia->id}}">
                  <i class="bi bi-trash"></i>
                  </button>
                </td>
              </td>
            </tr>
            @endforeach
          </tbody>
      </table>
     </div>
</div>
<!-- modal - nome dado para mensagem que aparece na tela quando vai excluir um item -->
<div class="modal fade" id="confirmDeleteModal"
  tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Remoção</h5>
        <button type="button" class="btn btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        Você tem certeza que quer remover?
      </div>
      <div class="modal-footer">
        <form id="deleteForm" aria-roledescription="" method="POST" action="">
          @csrf
          @method('DELETE')
          <button type="button" class="btn btn-secondary"
          data-bs-dismiss="modal"> Cancelar</button>
          <button type="submit" class="btn btn-danger">
            Remover</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  var confirmDeleteModal =
    document.getElementById('confirmDeleteModal')
  confirmDeleteModal.addEventListener('show.bs.modal',function(event){

    var button = event.relatedTarget
    var noticiaId = button.getAttribute('data-noticia-id');
    var form = document.getElementById('deleteForm');
    console.log(noticiaId)
    form.action = "/admin/noticias/" + noticiaId;

  });
</script>
@endsection