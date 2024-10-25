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
 <section class="notes">

     <?php if (isset($myNotes) && $myNotes->num_rows > 0) : ?>

         <?php while ($note = $myNotes->fetch_object()) : ?>

             <article class="notes__note">

                 <header class="note__title"><?= $note->title ?></header>
                 <p class="note_content">
                     Laavar perras Poppy y Canela, con shampo y agua. Importante secar bien pelo y oidos.
                 </p>
             </article>

         <?php endwhile; ?>

     <?php endif; ?>

 </section>