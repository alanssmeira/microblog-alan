<?php 
require "../inc/funcoes-posts.php";
require "../inc/cabecalho-admin.php"; 

// Recuperando dados da pessoa logada na sessão
$posts = lerPosts($conexao, $_SESSION['id'], $_SESSION['tipo']);

// contar posts
$quantidade = count($posts);

?>      
    
<div class="row">
  <article class="col-12 bg-white rounded shadow my-1 py-4">
    <h2 class="text-center">Posts <span class="badge badge-primary"><?=$quantidade?></span></h2>
    <p class="lead text-right">
      <a class="btn btn-primary" href="post-insere.php">Inserir novo post</a>
    </p>
            
    <div class="table-responsive"> 

      <table class="table table-hover">
        <thead class="thead-light">
          <tr>
            <th>Título</th>
            <th>Data</th>
            <th>Autor</th>
            <th colspan="2" class="text-center">Operações</th>
          </tr>
        </thead>
      
        <tbody>
        <?php foreach ($posts as $post) { ?>
          <tr>
            <td> <?=$post['titulo']?> </td>
            <td> <?=$post['data']?> </td>

            <!-- Restringe ao admin, acesso ao usuario que criou o post -->
            <?php if($_SESSION['tipo'] == 'admin'){ ?>
            <td> <?=$post['autor']?> </td>
            <?php } ?>

            <td class="text-center">
              <a class="btn btn-warning btn-sm" 
              href="post-atualiza.php?id=<?=$post['id']?>">
                  Atualizar
              </a>
            </td>
            <td class="text-center">
              <a class="btn btn-danger btn-sm excluir"
              href="post-exclui.php?id=<?=$post['id']?>">
                  Excluir
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>                
      </table>
      
    </div>
  </article>
</div>
     

<?php require "../inc/rodape-admin.php"; ?> 