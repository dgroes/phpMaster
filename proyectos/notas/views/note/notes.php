 <!-- SECCIÓN DE BUSQUEDA DE NOTAS -->
 <?php if (isset($_SESSION['identity'])) : ?>
     <section class="search">
         <h2 class="search__title">Notas</h2>

         <article class="search__form">
             <form action="">
                 <input type="search" name="search" class="search__input" placeholder="Buscar Nota" aria-label="Search" />
                 <input type="submit" value="Buscar" class="search__submit">
             </form>
         </article>
     </section>
 <?php endif; ?>


 <!-- SECCIÓN DE NOTAS -->
 <a class="notes_create" href="<?= base_url ?>/note/create">Nueva Nota +</a>
 <section class="notes">

     <?php if ($myNotes && $myNotes->num_rows > 0) : ?>
         <?php while ($note = $myNotes->fetch_object()) : ?>
             <?php $noteColor = $note->color; ?>
             <section class="notes__note">
                 <div class="note__titled"><?= $note->title ?></div>
                 <div class="note__contentd"><?= $note->content ?></div>
                 <div class="note__footerd">
                     <a href="">ver</a>
                     <a href="">eliminar</a>
                     <a href="">editar</a>
                 </div>
             </section>
         <?php endwhile; ?>

     <?php else:  ?>
         <div>
             Aun no has creado notas
         </div>

     <?php endif; ?>




 </section>